<?php  //[STAMP] 3afba76c077993ae1c1f2a4433819876
namespace _generated;

// This class was automatically generated by build task
// You should not change it manually as it will be overwritten on next build
// @codingStandardsIgnoreFile

use Codeception\Module\Asserts;
use Helper\Unit;
use Codeception\Module\Laravel5;

trait UnitTesterActions
{
    /**
     * @return \Codeception\Scenario
     */
    abstract protected function getScenario();

    
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that two variables are equal. If you're comparing floating-point values,
     * you can specify the optional "delta" parameter which dictates how great of a precision
     * error are you willing to tolerate in order to consider the two values equal.
     *
     * Regular example:
     * ```php
     * <?php
     * $I->assertEquals($element->getChildrenCount(), 5);
     * ```
     *
     * Floating-point example:
     * ```php
     * <?php
     * $I->assertEquals($calculator->add(0.1, 0.2), 0.3, 'Calculator should add the two numbers correctly.', 0.01);
     * ```
     *
     * @param        $expected
     * @param        $actual
     * @param string $message
     * @param float  $delta
     * @see \Codeception\Module\Asserts::assertEquals()
     */
    public function assertEquals($expected, $actual, $message = null, $delta = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertEquals', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that two variables are not equal. If you're comparing floating-point values,
     * you can specify the optional "delta" parameter which dictates how great of a precision
     * error are you willing to tolerate in order to consider the two values not equal.
     *
     * Regular example:
     * ```php
     * <?php
     * $I->assertNotEquals($element->getChildrenCount(), 0);
     * ```
     *
     * Floating-point example:
     * ```php
     * <?php
     * $I->assertNotEquals($calculator->add(0.1, 0.2), 0.4, 'Calculator should add the two numbers correctly.', 0.01);
     * ```
     *
     * @param        $expected
     * @param        $actual
     * @param string $message
     * @param float  $delta
     * @see \Codeception\Module\Asserts::assertNotEquals()
     */
    public function assertNotEquals($expected, $actual, $message = null, $delta = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertNotEquals', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that two variables are same
     *
     * @param        $expected
     * @param        $actual
     * @param string $message
     * @see \Codeception\Module\Asserts::assertSame()
     */
    public function assertSame($expected, $actual, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertSame', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that two variables are not same
     *
     * @param        $expected
     * @param        $actual
     * @param string $message
     * @see \Codeception\Module\Asserts::assertNotSame()
     */
    public function assertNotSame($expected, $actual, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertNotSame', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that actual is greater than expected
     *
     * @param        $expected
     * @param        $actual
     * @param string $message
     * @see \Codeception\Module\Asserts::assertGreaterThan()
     */
    public function assertGreaterThan($expected, $actual, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertGreaterThan', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that actual is greater or equal than expected
     *
     * @param        $expected
     * @param        $actual
     * @param string $message
     * @see \Codeception\Module\Asserts::assertGreaterThanOrEqual()
     */
    public function assertGreaterThanOrEqual($expected, $actual, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertGreaterThanOrEqual', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that actual is less than expected
     *
     * @param        $expected
     * @param        $actual
     * @param string $message
     * @see \Codeception\Module\Asserts::assertLessThan()
     */
    public function assertLessThan($expected, $actual, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertLessThan', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that actual is less or equal than expected
     *
     * @param        $expected
     * @param        $actual
     * @param string $message
     * @see \Codeception\Module\Asserts::assertLessThanOrEqual()
     */
    public function assertLessThanOrEqual($expected, $actual, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertLessThanOrEqual', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that haystack contains needle
     *
     * @param        $needle
     * @param        $haystack
     * @param string $message
     * @see \Codeception\Module\Asserts::assertContains()
     */
    public function assertContains($needle, $haystack, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertContains', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that haystack doesn't contain needle.
     *
     * @param        $needle
     * @param        $haystack
     * @param string $message
     * @see \Codeception\Module\Asserts::assertNotContains()
     */
    public function assertNotContains($needle, $haystack, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertNotContains', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that string match with pattern
     *
     * @param string $pattern
     * @param string $string
     * @param string $message
     * @see \Codeception\Module\Asserts::assertRegExp()
     */
    public function assertRegExp($pattern, $string, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertRegExp', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that string not match with pattern
     *
     * @param string $pattern
     * @param string $string
     * @param string $message
     * @see \Codeception\Module\Asserts::assertNotRegExp()
     */
    public function assertNotRegExp($pattern, $string, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertNotRegExp', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that variable is empty.
     *
     * @param        $actual
     * @param string $message
     * @see \Codeception\Module\Asserts::assertEmpty()
     */
    public function assertEmpty($actual, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertEmpty', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that variable is not empty.
     *
     * @param        $actual
     * @param string $message
     * @see \Codeception\Module\Asserts::assertNotEmpty()
     */
    public function assertNotEmpty($actual, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertNotEmpty', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that variable is NULL
     *
     * @param        $actual
     * @param string $message
     * @see \Codeception\Module\Asserts::assertNull()
     */
    public function assertNull($actual, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertNull', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that variable is not NULL
     *
     * @param        $actual
     * @param string $message
     * @see \Codeception\Module\Asserts::assertNotNull()
     */
    public function assertNotNull($actual, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertNotNull', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that condition is positive.
     *
     * @param        $condition
     * @param string $message
     * @see \Codeception\Module\Asserts::assertTrue()
     */
    public function assertTrue($condition, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertTrue', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that condition is negative.
     *
     * @param        $condition
     * @param string $message
     * @see \Codeception\Module\Asserts::assertFalse()
     */
    public function assertFalse($condition, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertFalse', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks if file exists
     *
     * @param string $filename
     * @param string $message
     * @see \Codeception\Module\Asserts::assertFileExists()
     */
    public function assertFileExists($filename, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertFileExists', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks if file doesn't exist
     *
     * @param string $filename
     * @param string $message
     * @see \Codeception\Module\Asserts::assertFileNotExists()
     */
    public function assertFileNotExists($filename, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertFileNotExists', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * @param $expected
     * @param $actual
     * @param $description
     * @see \Codeception\Module\Asserts::assertGreaterOrEquals()
     */
    public function assertGreaterOrEquals($expected, $actual, $description = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertGreaterOrEquals', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * @param $expected
     * @param $actual
     * @param $description
     * @see \Codeception\Module\Asserts::assertLessOrEquals()
     */
    public function assertLessOrEquals($expected, $actual, $description = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertLessOrEquals', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * @param $actual
     * @param $description
     * @see \Codeception\Module\Asserts::assertIsEmpty()
     */
    public function assertIsEmpty($actual, $description = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertIsEmpty', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * @param $key
     * @param $actual
     * @param $description
     * @see \Codeception\Module\Asserts::assertArrayHasKey()
     */
    public function assertArrayHasKey($key, $actual, $description = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertArrayHasKey', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * @param $key
     * @param $actual
     * @param $description
     * @see \Codeception\Module\Asserts::assertArrayNotHasKey()
     */
    public function assertArrayNotHasKey($key, $actual, $description = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertArrayNotHasKey', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * @param $expectedCount
     * @param $actual
     * @param $description
     * @see \Codeception\Module\Asserts::assertCount()
     */
    public function assertCount($expectedCount, $actual, $description = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertCount', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * @param $class
     * @param $actual
     * @param $description
     * @see \Codeception\Module\Asserts::assertInstanceOf()
     */
    public function assertInstanceOf($class, $actual, $description = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertInstanceOf', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * @param $class
     * @param $actual
     * @param $description
     * @see \Codeception\Module\Asserts::assertNotInstanceOf()
     */
    public function assertNotInstanceOf($class, $actual, $description = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertNotInstanceOf', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * @param $type
     * @param $actual
     * @param $description
     * @see \Codeception\Module\Asserts::assertInternalType()
     */
    public function assertInternalType($type, $actual, $description = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertInternalType', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Fails the test with message.
     *
     * @param $message
     * @see \Codeception\Module\Asserts::fail()
     */
    public function fail($message) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('fail', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Handles and checks exception called inside callback function.
     * Either exception class name or exception instance should be provided.
     *
     * ```php
     * <?php
     * $I->expectException(MyException::class, function() {
     *     $this->doSomethingBad();
     * });
     *
     * $I->expectException(new MyException(), function() {
     *     $this->doSomethingBad();
     * });
     * ```
     * If you want to check message or exception code, you can pass them with exception instance:
     * ```php
     * <?php
     * // will check that exception MyException is thrown with "Don't do bad things" message
     * $I->expectException(new MyException("Don't do bad things"), function() {
     *     $this->doSomethingBad();
     * });
     * ```
     *
     * @param $exception string or \Exception
     * @param $callback
     * @see \Codeception\Module\Asserts::expectException()
     */
    public function expectException($exception, $callback) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('expectException', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Inserts record into the database.
     * If you pass the name of a database table as the first argument, this method returns an integer ID.
     * You can also pass the class name of an Eloquent model, in that case this method returns an Eloquent model.
     *
     * ``` php
     * <?php
     * $user_id = $I->haveRecord('users', array('name' => 'Davert')); // returns integer
     * $user = $I->haveRecord('App\User', array('name' => 'Davert')); // returns Eloquent model
     * ?>
     * ```
     *
     * @param string $table
     * @param array $attributes
     * @return integer|EloquentModel
     * @part orm
     * @see \Codeception\Module\Laravel5::haveRecord()
     */
    public function haveRecord($table, $attributes = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('haveRecord', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that record exists in database.
     * You can pass the name of a database table or the class name of an Eloquent model as the first argument.
     *
     * ``` php
     * <?php
     * $I->seeRecord('users', array('name' => 'davert'));
     * $I->seeRecord('App\User', array('name' => 'davert'));
     * ?>
     * ```
     *
     * @param string $table
     * @param array $attributes
     * @part orm
     * Conditional Assertion: Test won't be stopped on fail
     * @see \Codeception\Module\Laravel5::seeRecord()
     */
    public function canSeeRecord($table, $attributes = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\ConditionalAssertion('seeRecord', func_get_args()));
    }
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that record exists in database.
     * You can pass the name of a database table or the class name of an Eloquent model as the first argument.
     *
     * ``` php
     * <?php
     * $I->seeRecord('users', array('name' => 'davert'));
     * $I->seeRecord('App\User', array('name' => 'davert'));
     * ?>
     * ```
     *
     * @param string $table
     * @param array $attributes
     * @part orm
     * @see \Codeception\Module\Laravel5::seeRecord()
     */
    public function seeRecord($table, $attributes = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Assertion('seeRecord', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that record does not exist in database.
     * You can pass the name of a database table or the class name of an Eloquent model as the first argument.
     *
     * ``` php
     * <?php
     * $I->dontSeeRecord('users', array('name' => 'davert'));
     * $I->dontSeeRecord('App\User', array('name' => 'davert'));
     * ?>
     * ```
     *
     * @param string $table
     * @param array $attributes
     * @part orm
     * Conditional Assertion: Test won't be stopped on fail
     * @see \Codeception\Module\Laravel5::dontSeeRecord()
     */
    public function cantSeeRecord($table, $attributes = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\ConditionalAssertion('dontSeeRecord', func_get_args()));
    }
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that record does not exist in database.
     * You can pass the name of a database table or the class name of an Eloquent model as the first argument.
     *
     * ``` php
     * <?php
     * $I->dontSeeRecord('users', array('name' => 'davert'));
     * $I->dontSeeRecord('App\User', array('name' => 'davert'));
     * ?>
     * ```
     *
     * @param string $table
     * @param array $attributes
     * @part orm
     * @see \Codeception\Module\Laravel5::dontSeeRecord()
     */
    public function dontSeeRecord($table, $attributes = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Assertion('dontSeeRecord', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Retrieves record from database
     * If you pass the name of a database table as the first argument, this method returns an array.
     * You can also pass the class name of an Eloquent model, in that case this method returns an Eloquent model.
     *
     * ``` php
     * <?php
     * $record = $I->grabRecord('users', array('name' => 'davert')); // returns array
     * $record = $I->grabRecord('App\User', array('name' => 'davert')); // returns Eloquent model
     * ?>
     * ```
     *
     * @param string $table
     * @param array $attributes
     * @return array|EloquentModel
     * @part orm
     * @see \Codeception\Module\Laravel5::grabRecord()
     */
    public function grabRecord($table, $attributes = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('grabRecord', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that number of given records were found in database.
     * You can pass the name of a database table or the class name of an Eloquent model as the first argument.
     *
     * ``` php
     * <?php
     * $I->seeNumRecords(1, 'users', array('name' => 'davert'));
     * $I->seeNumRecords(1, 'App\User', array('name' => 'davert'));
     * ?>
     * ```
     *
     * @param integer $expectedNum
     * @param string $table
     * @param array $attributes
     * @part orm
     * Conditional Assertion: Test won't be stopped on fail
     * @see \Codeception\Module\Laravel5::seeNumRecords()
     */
    public function canSeeNumRecords($expectedNum, $table, $attributes = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\ConditionalAssertion('seeNumRecords', func_get_args()));
    }
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that number of given records were found in database.
     * You can pass the name of a database table or the class name of an Eloquent model as the first argument.
     *
     * ``` php
     * <?php
     * $I->seeNumRecords(1, 'users', array('name' => 'davert'));
     * $I->seeNumRecords(1, 'App\User', array('name' => 'davert'));
     * ?>
     * ```
     *
     * @param integer $expectedNum
     * @param string $table
     * @param array $attributes
     * @part orm
     * @see \Codeception\Module\Laravel5::seeNumRecords()
     */
    public function seeNumRecords($expectedNum, $table, $attributes = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Assertion('seeNumRecords', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Retrieves number of records from database
     * You can pass the name of a database table or the class name of an Eloquent model as the first argument.
     *
     * ``` php
     * <?php
     * $I->grabNumRecords('users', array('name' => 'davert'));
     * $I->grabNumRecords('App\User', array('name' => 'davert'));
     * ?>
     * ```
     *
     * @param string $table
     * @param array $attributes
     * @return integer
     * @part orm
     * @see \Codeception\Module\Laravel5::grabNumRecords()
     */
    public function grabNumRecords($table, $attributes = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('grabNumRecords', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Use Laravel's model factory to create a model.
     * Can only be used with Laravel 5.1 and later.
     *
     * ``` php
     * <?php
     * $I->have('App\User');
     * $I->have('App\User', ['name' => 'John Doe']);
     * $I->have('App\User', [], 'admin');
     * ?>
     * ```
     *
     * @see http://laravel.com/docs/5.1/testing#model-factories
     * @param string $model
     * @param array $attributes
     * @param string $name
     * @return mixed
     * @part orm
     * @see \Codeception\Module\Laravel5::have()
     */
    public function have($model, $attributes = null, $name = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('have', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Use Laravel's model factory to create multiple models.
     * Can only be used with Laravel 5.1 and later.
     *
     * ``` php
     * <?php
     * $I->haveMultiple('App\User', 10);
     * $I->haveMultiple('App\User', 10, ['name' => 'John Doe']);
     * $I->haveMultiple('App\User', 10, [], 'admin');
     * ?>
     * ```
     *
     * @see http://laravel.com/docs/5.1/testing#model-factories
     * @param string $model
     * @param int $times
     * @param array $attributes
     * @param string $name
     * @return mixed
     * @part orm
     * @see \Codeception\Module\Laravel5::haveMultiple()
     */
    public function haveMultiple($model, $times, $attributes = null, $name = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('haveMultiple', func_get_args()));
    }
}
