<?php

namespace Coyote\Http\Controllers;

use Coyote\Http\Factories\FlagFactory;
use Coyote\Http\Resources\ActivityResource as ActivityResource;
use Coyote\Http\Resources\Api\MicroblogResource;
use Coyote\Http\Resources\FlagResource;
use Coyote\Http\Resources\MicroblogCollection;
use Coyote\Microblog;
use Coyote\Repositories\Contracts\ActivityRepositoryInterface as ActivityRepository;
use Coyote\Repositories\Contracts\MicroblogRepositoryInterface as MicroblogRepository;
use Coyote\Repositories\Contracts\ReputationRepositoryInterface as ReputationRepository;
use Coyote\Repositories\Contracts\TopicRepositoryInterface as TopicRepository;
use Coyote\Repositories\Contracts\WikiRepositoryInterface as WikiRepository;
use Coyote\Repositories\Criteria\Forum\SkipHiddenCategories;
use Coyote\Repositories\Criteria\Topic\OnlyThoseWithAccess as OnlyThoseTopicsWithAccess;
use Coyote\Repositories\Criteria\Forum\OnlyThoseWithAccess as OnlyThoseForumsWithAccess;
use Coyote\Services\Microblogs\Builder;
use Coyote\Services\Session\Renderer;

class HomeController extends Controller
{
    use FlagFactory;

    /**
     * @var MicroblogRepository
     */
    protected $microblog;

    /**
     * @var ReputationRepository
     */
    protected $reputation;

    /**
     * @var ActivityRepository
     */
    protected $activity;

    /**
     * @var TopicRepository
     */
    protected $topic;

    /**
     * @var WikiRepository
     */
    protected $wiki;

    /**
     * @param MicroblogRepository $microblog
     * @param ReputationRepository $reputation
     * @param ActivityRepository $activity
     * @param TopicRepository $topic
     * @param WikiRepository $wiki
     */
    public function __construct(
        MicroblogRepository $microblog,
        ReputationRepository $reputation,
        ActivityRepository $activity,
        TopicRepository $topic,
        WikiRepository $wiki
    ) {
        parent::__construct();

        $this->microblog = $microblog;
        $this->reputation = $reputation;
        $this->activity = $activity;
        $this->topic = $topic;
        $this->wiki = $wiki;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $result = [];
        $reflection = new \ReflectionClass($this);

        $cache = $this->getCacheFactory();

        $this->topic->pushCriteria(new OnlyThoseTopicsWithAccess());
        $this->topic->pushCriteria(new SkipHiddenCategories($this->userId));

        foreach ($reflection->getMethods(\ReflectionMethod::IS_PRIVATE) as $method) {
            $method = $method->name;
            $snake = snake_case($method);

            if (substr($snake, 0, 3) === 'get') {
                $name = substr($snake, 4);

                if (in_array($name, ['reputation', 'blog', 'patronage'])) {
                    $result[$name] = $cache->remember('homepage:' . $name, 30 * 60, function () use ($method) {
                        return $this->$method();
                    });
                } else {
                    $result[$name] = $this->$method();
                }
            }
        }

        return $this->view('home', $result)
            ->with('settings', $this->getSettings())
            ->with('flags', $this->flags());
    }

    /**
     * @return array
     */
    private function getReputation()
    {
        return [
            'month'   => $this->reputation->monthly(),
            'year'    => $this->reputation->yearly(),
            'total'   => $this->reputation->total()
        ];
    }

    /**
     * @return mixed
     */
    private function getBlog()
    {
        /** @var \Coyote\Wiki $parent */
        $parent = $this->wiki->findByPath('Blog');
        if (!$parent) {
            return [];
        }

        return $parent->children()->latest()->limit(5)->get(['created_at', 'path', 'title', 'long_title']);
    }

    /**
     * @return array
     */
    private function getMicroblogs()
    {
        /** @var Builder $builder */
        $builder = app(Builder::class);

        $microblogs = $builder->orderByScore()->popular();

        MicroblogResource::withoutWrapping();

        return (new MicroblogCollection($microblogs))->resolve($this->request);
    }

    /**
     * @return mixed
     */
    private function getNewest()
    {
        return $this->topic->newest();
    }

    /**
     * @return mixed
     */
    private function getInteresting()
    {
        return $this->topic->interesting();
    }

    /**
     * @return array
     */
    private function getActivities()
    {
        $this->activity->pushCriteria(new OnlyThoseForumsWithAccess($this->auth));
        $this->activity->pushCriteria(new SkipHiddenCategories($this->userId));

        $result = $this->activity->latest(20);

        return ActivityResource::collection($result)->toArray($this->request);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function getViewers()
    {
        /** @var Renderer $viewers */
        $viewers = app(Renderer::class);
        return $viewers->render();
    }

    /**
     * @return array
     */
    private function getPatronage()
    {
        /** @var \Coyote\Wiki $parent */
        $parent = $this->wiki->findByPath('Patronat');
        if (!$parent) {
            return [];
        }

        return $parent->children()->latest()->limit(1)->first(['path', 'title', 'excerpt']);
    }

    private function flags()
    {
        if (!$this->userId || !$this->auth->can('microblog-delete')) {
            return [];
        }

        return FlagResource::collection($this->getFlagFactory()->findAllByModel(Microblog::class))->toArray($this->request);
    }
}
