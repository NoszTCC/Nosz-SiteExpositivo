(function ($) {
    const defaults = {
        topSpacing: 0,
        bottomSpacing: 0,
        className: "is-sticky",
        wrapperClassName: "sticky-wrapper",
        center: false,
        widthFromWrapper: true,
        responsiveWidth: false,
    };

    const $window = $(window);
    const $document = $(document);
    let stickedElements = [];
    let windowHeight = $window.height();

    function scroller() {
        const scrollTop = $window.scrollTop();
        const documentHeight = $document.height();
        const dwh = documentHeight - windowHeight;
        const extra = scrollTop > dwh ? dwh - scrollTop : 0;

        stickedElements.forEach(sticky => {
            const elementTop = sticky.stickyWrapper.offset().top;
            const offset = elementTop - sticky.topSpacing - extra;

            sticky.stickyWrapper.css("height", sticky.element.outerHeight());

            if (scrollTop <= offset) {
                resetElement(sticky);
            } else {
                updateElement(sticky, scrollTop, documentHeight, extra);
            }
        });
    }

    function resetElement(sticky) {
        if (sticky.currentTop !== null) {
            sticky.element
                .css({ width: "", position: "", top: "" })
                .parent().removeClass(sticky.className);

            sticky.element.trigger("sticky-end", [sticky]);
            sticky.currentTop = null;
        }
    }

    function updateElement(sticky, scrollTop, documentHeight, extra) {
        let newTop = calculateNewTop(sticky, scrollTop, documentHeight, extra);

        if (sticky.currentTop !== newTop) {
            const newWidth = calculateNewWidth(sticky);

            sticky.element
                .css("width", newWidth)
                .css("position", "fixed")
                .css("top", newTop);

            sticky.element.parent().addClass(sticky.className);

            if (sticky.currentTop === null) {
                sticky.element.trigger("sticky-start", [sticky]);
            } else {
                sticky.element.trigger("sticky-update", [sticky]);
            }

            handleStickyBottomEvents(sticky, newTop);

            sticky.currentTop = newTop;
        }
    }

    function calculateNewTop(sticky, scrollTop, documentHeight, extra) {
        let newTop = documentHeight - sticky.element.outerHeight() -
            sticky.topSpacing - sticky.bottomSpacing - scrollTop - extra;

        return newTop < 0 ? newTop + sticky.topSpacing : sticky.topSpacing;
    }

    function calculateNewWidth(sticky) {
        if (sticky.widthFromWrapper) {
            return sticky.stickyWrapper.width();
        } else if (sticky.responsiveWidth) {
            return $(sticky.widthFromWrapper).width();
        } else {
            return sticky.element.width();
        }
    }

    function handleStickyBottomEvents(sticky, newTop) {
        if (sticky.currentTop !== null && newTop !== sticky.topSpacing) {
            sticky.element.trigger("sticky-bottom-reached", [sticky]);
        } else if (sticky.currentTop === sticky.topSpacing && newTop < sticky.topSpacing) {
            sticky.element.trigger("sticky-bottom-unreached", [sticky]);
        }
    }

    function resizer() {
        windowHeight = $window.height();

        stickedElements.forEach(sticky => {
            if (sticky.responsiveWidth) {
                const newWidth = $(sticky.widthFromWrapper).width();
                if (newWidth != null) {
                    sticky.element.css("width", newWidth);
                }
            } else if (sticky.widthFromWrapper) {
                sticky.element.css("width", sticky.stickyWrapper.width());
            }
        });
    }

    const methods = {
        init(options) {
            const settings = $.extend({}, defaults, options);

            return this.each(function () {
                const $this = $(this);
                const wrapper = $('<div></div>')
                    .addClass(settings.wrapperClassName);

                $this.wrapAll(wrapper);

                const stickyWrapper = $this.parent();
                if (settings.center) {
                    stickyWrapper.css({
                        width: $this.outerWidth(),
                        marginLeft: "auto",
                        marginRight: "auto"
                    });
                }

                if ($this.css("float") === "right") {
                    $this.css({ float: "none" }).parent().css({ float: "right" });
                }

                stickyWrapper.css("height", $this.outerHeight());

                settings.element = $this;
                settings.stickyWrapper = stickyWrapper;
                settings.currentTop = null;

                stickedElements.push(settings);
            });
        },

        update: scroller,
        unstick() {
            return this.each(function () {
                const $this = $(this);
                const index = stickedElements.findIndex(sticky => sticky.element.get(0) === this);

                if (index !== -1) {
                    stickedElements.splice(index, 1);
                    $this.unwrap().css({
                        width: "",
                        position: "",
                        top: "",
                        float: ""
                    });
                }
            });
        }
    };

    if (window.addEventListener) {
        window.addEventListener("scroll", scroller, false);
        window.addEventListener("resize", resizer, false);
    } else if (window.attachEvent) {
        window.attachEvent("onscroll", scroller);
        window.attachEvent("onresize", resizer);
    }

    $.fn.sticky = function (method) {
        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === "object" || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error("Method " + method + " does not exist on jQuery.sticky");
        }
    };

    $.fn.unstick = function (method) {
        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === "object" || !method) {
            return methods.unstick.apply(this, arguments);
        } else {
            $.error("Method " + method + " does not exist on jQuery.sticky");
        }
    };

    $(function () {
        setTimeout(scroller, 0);
    });
})(jQuery);

$(document).ready(function () {
    $(".navbar").sticky({ topSpacing: 0 });
});
