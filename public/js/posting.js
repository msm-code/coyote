(function ($) {
    $.fn.prompt = function (url) {
        return this.each(function () {
            var $textarea = $(this);
            var index = -1;
            var timeId = 0;
            var $ul = $('<ul style="display: none;" class="auto-complete"></ul>');

            var getCursorPosition = function () {
                if ($textarea[0].selectionStart || $textarea[0].selectionStart == 0) {
                    return $textarea[0].selectionStart;
                }
                else if (document.selection) {
                    $textarea.focus();
                    var sel = document.selection.createRange();

                    sel.moveStart('character', -$textarea.value.length);
                    return (sel.text.length);
                }
            };

            var getUserNamePosition = function (caretPosition) {
                var i = caretPosition;
                var result = -1;

                while (i > caretPosition - 50 && i >= 0) {
                    var $val = $textarea.val()[i];

                    if ($val === ' ') {
                        break;
                    }
                    else if ($val === '@') {
                        if (i === 0 || $textarea.val()[i - 1] === ' ' || $textarea.val()[i - 1] === "\n") {
                            result = i + 1;
                            break;
                        }
                    }
                    i--;
                }

                return result;
            };

            var onSelect = function (position) {
                var length = $('li', $ul).length;

                if (length > 0) {
                    if (position >= length) {
                        position = 0;
                    }
                    else if (position < 0) {
                        position = length - 1;
                    }
                    index = position;

                    $('li', $ul).removeClass('hover');
                    $('li:eq(' + index + ')', $ul).addClass('hover');
                }
            };

            $textarea.bind('keyup click', function (e) {
                var userName = '';
                var keyCode = e.keyCode/* || window.event.keyCode*/;
                var caretPosition = getCursorPosition();

                var startIndex = getUserNamePosition(caretPosition);

                if (startIndex > -1) {
                    userName = $textarea.val().substr(startIndex, caretPosition - startIndex);
                }

                var onClick = function () {
                    var $text = $('li.hover span', $ul).text();

                    if ($text.length) {
                        if ($text.indexOf(' ') > -1 || $text.indexOf('.') > -1) {
                            $text = '{' + $text + '}';
                        }
                        $textarea.val($textarea.val().substr(0, startIndex) + $text + $textarea.val().substring(caretPosition)).trigger('change').focus();
                        var caret = startIndex + $text.length;

                        if ($textarea[0].setSelectionRange) {
                            $textarea[0].setSelectionRange(caret, caret);
                        }
                        else if ($textarea[0].createTextRange) {
                            var range = $textarea[0].createTextRange();

                            range.collapse(true);
                            range.moveEnd('character', caret);
                            range.moveStart('character', caret);
                            range.select();
                        }
                    }
                    $ul.html('').hide();
                };

                switch (keyCode) {
                    // esc
                    case 27:

                        $ul.html('').hide();
                        break;

                    // down
                    case 40:

                        onSelect(index + 1);
                        break;

                    case 38:

                        onSelect(index - 1);
                        break;

                    case 13:

                        onClick();

                        break;

                    default:

                        if (userName.length >= 2) {
                            clearTimeout(timeId);

                            timeId = setTimeout(function () {
                                $.get(url, {q: userName}, function (html) {
                                    $ul.html(html).hide();
                                    var length = $('li', $ul).length;

                                    if (length > 0) {
                                        var p = $textarea.offset();

                                        $('li', $ul)
                                            .click(onClick)
                                            .hover(
                                            function () {
                                                $('li', $ul).removeClass('hover');
                                                $(this).addClass('hover');
                                            },
                                            function () {
                                                $(this).removeClass('hover');
                                            }
                                        );

                                        $ul.css({
                                            'width': $textarea.outerWidth(),
                                            'top': $textarea.outerHeight() + p.top + 1,
                                            'left': p.left
                                        }).show();

                                        index = -1;
                                    }
                                });

                            }, 200);
                        }
                        else {
                            $ul.html('').hide();
                        }

                        break;
                }
            }).keydown(function (e) {
                var keyCode = e.keyCode;

                if ((keyCode === 40 || keyCode === 38 || keyCode === 13 || keyCode === 27) && $ul.is(':visible')) {
                    e.preventDefault();
                    return false;
                }
            });

            $ul.appendTo(document.body);

            $(document).bind('click', function (e) {
                var $target = $(e.target);

                if ($target.not($ul)) {
                    $ul.html('').hide();
                }
            });
        });
    };
})(jQuery);
(function ($) {
    "use strict";

    $.fn.autogrow = function () {
        /**
         * @see http://code.google.com/p/gaequery/source/browse/trunk/src/static/scripts/jquery.autogrow-textarea.js?r=2
         */
        return this.each(function () {
            var $this = $(this),
                minHeight = $this.height(),
                maxHeight = 300,
                lineHeight = $this.css('lineHeight'),
                currentWidth = 0,
                currentHeight = 0;

            var shadow = $('<div></div>').css(
            {
                position: 'absolute',
                top: -10000,
                left: -10000,
                width: $(this).width() - parseInt($this.css('paddingLeft')) - parseInt($this.css('paddingRight')),
                fontSize: $this.css('fontSize'),
                fontFamily: $this.css('fontFamily'),
                lineHeight: $this.css('lineHeight'),
                resize: 'none'
            }).appendTo(document.body);

            var update = function () {
                var times = function (string, number) {
                    for (var i = 0, r = ''; i < number; i++) r += string;
                    return r;
                };

                var val = this.value.replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/&/g, '&amp;')
                    .replace(/\n$/, '<br/>&nbsp;')
                    .replace(/\n/g, '<br/>')
                    .replace(/ {2,}/g, function (space) {
                        return times('&nbsp;', space.length - 1) + ' '
                    });

                shadow.html(val);

                $(this).css('height', Math.max(Math.min(shadow.height() + 17, maxHeight), minHeight));
            };

            $this.change(update).keyup(update).keydown(update);
            update.apply(this);

            $this.mousedown(function () {
                currentWidth = $this.width();
                currentHeight = $this.height();
            })
            .mouseup(function () {
                if ($this.width() != currentWidth || $this.height() != currentHeight) {
                    $this.unbind('keyup', update).unbind('keydown', update).unbind('change', update);
                }

                currentWidth = currentHeight = 0;
            });
        });
    };
})(jQuery);
(function ($) {
    "use strict";

    $.fn.fastSubmit = function () {
        return this.each(function () {
            $(this).keydown(function(e) {
                if (e.keyCode === 13) {
                    var form = $(this).closest('form');

                    if (e.ctrlKey) {
                        form.submit();
                    }
                }
            });
        });
    };
})(jQuery);
(function ($) {
    'use strict';

    $.fn.pasteImage = function () {
        return this.each(function (options) {
            var defaults = {
                url: '/User/Pm/Paste',
                onComplete: function (textarea, result) {
                    textarea.insertAtCaret('![' + result.name + '](' + result.url + ')', '', ' ');
                }
            };

            var setup = $.extend(defaults, options);
            var textarea = $(this);

            var upload = function(base64) {
                textarea.attr('readonly', 'readonly');

                var p = textarea.offset();
                var loader = $('<div id="ajax-loader"><i class="fa fa-cog fa-spin"></i></div>').css({top: p.top, left: p.left, width: textarea.outerWidth(), height: textarea.outerHeight()}).appendTo('body');

                $.post(setup.url, base64, function(result) {
                    setup.onComplete(textarea, result);
                })
                .always(function() {
                    textarea.removeAttr('readonly');
                    loader.remove();
                });
            };

            if (navigator.userAgent.indexOf("Chrome") > -1) {
                textarea[0].onpaste = function(e) {
                    var items = e.clipboardData.items;

                    if (items.length) {
                        var blob = items[0].getAsFile();
                        var fr = new FileReader();

                        fr.onload = function(e) {
                            var mime = /^data:image/g;

                            if (!mime.test(e.target.result)) {
                                return false;
                            }

                            upload(e.target.result);
                        };

                        fr.readAsDataURL(blob);
                    }
                };
            } else if (navigator.userAgent.indexOf("Firefox") > -1 && navigator.userAgent.indexOf("Trident") === -1) {
                var $placeholder = $('<div id="placeholder" contenteditable="true" style="position: absolute; left: -10000px; top: -10000px; width: 1px; height: 1px;"></div>');

                textarea.keydown(function(e) {
                    if (e.ctrlKey && !e.shiftKey && !e.altKey && e.which === 86) {
                        var top = $(window).scrollTop();
                        $placeholder.css('top', top);

                        $placeholder.focus();
                    }
                });

                $placeholder.on('paste', function(e) {
                    var $placeholder = $(this);
                    var data = (e.originalEvent || e).clipboardData.getData('text/plain');

                    if (data) {
                        if (textarea[0].selectionStart !== textarea[0].selectionEnd) {
                            textarea[0].value  = textarea[0].value.substring(0, textarea[0].selectionStart) + data + textarea[0].value.substring(textarea[0].selectionEnd, textarea[0].value.length);
                        } else {
                            textarea.insertAtCaret(data, '', '');
                        }

                        $placeholder.html('');
                    } else {
                        setTimeout(function() {
                            var image = $('img', $placeholder).get(0);
                            if (image !== undefined) {
                                data = image.src;
                                upload(data);
                            }

                            $placeholder.html('');

                        }, 60);
                    }
                })
                .appendTo('body');
            }
        });
    };
})(jQuery);
//# sourceMappingURL=posting.js.map