 $(document).ready(function(){
$(".btn-edit").click(function(){
    $(".wap_edit_address").slideToggle("slow");
  });

$(".check_bill").click(function(){
    $(".wap_bill").slideToggle("slow");
  });
     $(".vnt-acount .aTitle").click(function(){
        if(! $(this).parents(".vnt-acount").hasClass("active")){
            $(this).parents(".vnt-acount").addClass("active");
        }else{
            $(this).parents(".vnt-acount").removeClass("active");
        }
    });
    // scrolltop
    $('#bttop').click(function (){
        $("html,body").animate({
            scrollTop: 0

        }, 1000);
        return false;
    });
      $(".vnt-banner").slick({
          dots: true,
          speed: 2000,
          fade: true,
          arrows: false,
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true
        });
  $(".vnt-banner").addClass("active");



     });

$(document).ready(function () {
    var getmenu =$('.get_menu').html();
    $('.set_menu').append(getmenu);
    $(".mmMenu ul li").each(function () {
        var countsize = $(this).find("ul li").size();
        if (countsize > 0) {
            $(this).find("a:first").wrap("<div class='m-sub'></div>");
            $(this).find(".m-sub:first").append("<div class='button-submenu'></div>")
        }
    });
    $(".mmMenu ul li ul").css({'display': 'none'});
    $(".mmMenu ul li .button-submenu").click(function () {
        if (!$(this).hasClass("show")) {
            $(this).parent().parent().find("ul:first").stop().slideToggle(700);
            $(this).addClass("show");
            $(this).parent().parent().siblings().each(function () {
                if ($(this).find(".m-sub:first").find(".button-submenu").hasClass("show")) {
                    $(this).find("ul:first").stop().slideToggle(700);
                    $(this).find(".m-sub:first").find(".button-submenu").removeClass("show");
                }
            });
        } else {
            $(this).parent().parent().find("ul:first").stop().slideToggle(700);
            $(this).removeClass("show");
        }
    });
    $(".menu_mobile .icon_menu").click(function (event) {
        if (!$(this).parents(".menu_mobile").hasClass("showmenu")) {
            $(this).parent().find(".divmm").addClass('show');
            $('.menu_mobile').addClass("showmenu");
            $('html').addClass("openmenu");
            $('body').css({});
        } else {
            $(this).parents(".menu_mobile").find(".divmm").removeClass('show');
            $(this).parents('.menu_mobile').removeClass("showmenu");
            $('html').removeClass("openmenu");
        }
    });
    $(".menu_mobile .divmm .divmmbg , .menu_mobile .divmm .mmContent .close-mmenu").click(function (event) {
        $(this).parents(".menu_mobile").find(".divmm").removeClass('show');
        setTimeout(function () {
            $('.menu_mobile').removeClass("showmenu");
            $('html').removeClass("openmenu");
        }, 500);
    });
    $(window).resize(function () {
        if ($(window).innerWidth() > 1199) {
            $(".menu_mobile").find(".divmm").removeClass('show');
            $('.menu_mobile').removeClass("showmenu");
            $('html').removeClass("openmenu");
        }
    });

$(document).ready(function () { !
    function (e) {
        "use strict";
        "function" == typeof define && define.amd ? define(["jquery"], e) : "object" == typeof module && module.exports ? module.exports = e(require("jquery")) : e(window.jQuery)
    } (function (u) {
        "use strict";
        var h, p;
        u.fn.ratingLocales = {},
        u.fn.ratingThemes = {},
        h = {
            NAMESPACE: ".rating",
            DEFAULT_MIN: 0,
            DEFAULT_MAX: 5,
            DEFAULT_STEP: .5,
            isEmpty: function (e, t) {
                return null == e || 0 === e.length || t && "" === u.trim(e)
            },
            getCss: function (e, t) {
                return e ? " " + t: ""
            },
            addCss: function (e, t) {
                e.removeClass(t).addClass(t)
            },
            getDecimalPlaces: function (e) {
                var t = ("" + e).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                return t ? Math.max(0, (t[1] ? t[1].length: 0) - (t[2] ? +t[2] : 0)) : 0
            },
            applyPrecision: function (e, t) {
                return parseFloat(e.toFixed(t))
            },
            handler: function (e, t, i, a, n) {
                var r = n ? t: t.split(" ").join(h.NAMESPACE + " ") + h.NAMESPACE;
                a || e.off(r),
                e.on(r, i)
            }
        },
        (p = function (e, t) {
            this.$element = u(e),
            this._init(t)
        }).prototype = {
            constructor: p,
            _parseAttr: function (e, t) {
                var i, a, n, r, s = this.$element,
                o = s.attr("type");
                if ("range" === o || "number" === o) {
                    switch (a = t[e] || s.data(e) || s.attr(e), e) {
                    case "min":
                        n = h.DEFAULT_MIN;
                        break;
                    case "max":
                        n = h.DEFAULT_MAX;
                        break;
                    default:
                        n = h.DEFAULT_STEP
                    }
                    i = h.isEmpty(a) ? n: a,
                    r = parseFloat(i)
                } else r = parseFloat(t[e]);
                return isNaN(r) ? n: r
            },
            _parseValue: function (e) {
                var t = parseFloat(e);
                return isNaN(t) && (t = this.clearValue),
                !this.zeroAsNull || 0 !== t && "0" !== t ? t: null
            },
            _setDefault: function (e, t) {
                h.isEmpty(this[e]) && (this[e] = t)
            },
            _initSlider: function (e) {
                var t = this,
                i = t.$element.val();
                t.initialValue = h.isEmpty(i) ? 0 : i,
                t._setDefault("min", t._parseAttr("min", e)),
                t._setDefault("max", t._parseAttr("max", e)),
                t._setDefault("step", t._parseAttr("step", e)),
                (isNaN(t.min) || h.isEmpty(t.min)) && (t.min = h.DEFAULT_MIN),
                (isNaN(t.max) || h.isEmpty(t.max)) && (t.max = h.DEFAULT_MAX),
                (isNaN(t.step) || h.isEmpty(t.step) || 0 === t.step) && (t.step = h.DEFAULT_STEP),
                t.diff = t.max - t.min
            },
            _initHighlight: function (e) {
                var t, i = this,
                a = i._getCaption();
                e = e || i.$element.val(),
                t = i.getWidthFromValue(e) + "%",
                i.$filledStars.width(t),
                i.cache = {
                    caption: a,
                    width: t,
                    val: e
                }
            },
            _getContainerCss: function () {
                var e = this;
                return "rating-container" + h.getCss(e.theme, "theme-" + e.theme) + h.getCss(e.rtl, "rating-rtl") + h.getCss(e.size, "rating-" + e.size) + h.getCss(e.animate, "rating-animate") + h.getCss(e.disabled || e.readonly, "rating-disabled") + h.getCss(e.containerClass, e.containerClass)
            },
            _checkDisabled: function () {
                var e = this,
                t = e.$element,
                i = e.options;
                e.disabled = void 0 === i.disabled ? t.attr("disabled") || !1 : i.disabled,
                e.readonly = void 0 === i.readonly ? t.attr("readonly") || !1 : i.readonly,
                e.inactive = e.disabled || e.readonly,
                t.attr({
                    disabled: e.disabled,
                    readonly: e.readonly
                })
            },
            _addContent: function (e, t) {
                var i = this.$container,
                a = "clear" === e;
                return this.rtl ? a ? i.append(t) : i.prepend(t) : a ? i.prepend(t) : i.append(t)
            },
            _generateRating: function () {
                var e, t, i = this,
                a = i.$element,
                n = i.$container = u(document.createElement("div")).insertBefore(a);
                h.addCss(n, i._getContainerCss()),
                i.$rating = e = u(document.createElement("div")).attr("class", "rating-stars").appendTo(n).append(i._getStars("empty")).append(i._getStars("filled")),
                i.$emptyStars = e.find(".empty-stars"),
                i.$filledStars = e.find(".filled-stars"),
                i._renderCaption(),
                i._renderClear(),
                i._initHighlight(),
                n.append(a),
                i.rtl && (t = Math.max(i.$emptyStars.outerWidth(), i.$filledStars.outerWidth()), i.$emptyStars.width(t)),
                a.appendTo(e)
            },
            _getCaption: function () {
                return this.$caption && this.$caption.length ? this.$caption.html() : this.defaultCaption
            },
            _setCaption: function (e) {
                this.$caption && this.$caption.length && this.$caption.html(e)
            },
            _renderCaption: function () {
                var e, t = this,
                i = t.$element.val(),
                a = t.captionElement ? u(t.captionElement) : "";
                if (t.showCaption) {
                    if (e = t.fetchCaption(i), a && a.length) return h.addCss(a, "caption"),
                    a.html(e),
                    void(t.$caption = a);
                    t._addContent("caption", '<div class="caption">' + e + "</div>"),
                    t.$caption = t.$container.find(".caption")
                }
            },
            _renderClear: function () {
                var e, t = this,
                i = t.clearElement ? u(t.clearElement) : "";
                if (t.showClear) {
                    if (e = t._getClearClass(), i.length) return h.addCss(i, e),
                    i.attr({
                        title: t.clearButtonTitle
                    }).html(t.clearButton),
                    void(t.$clear = i);
                    t._addContent("clear", '<div class="' + e + '" title="' + t.clearButtonTitle + '">' + t.clearButton + "</div>"),
                    t.$clear = t.$container.find("." + t.clearButtonBaseClass)
                }
            },
            _getClearClass: function () {
                return this.clearButtonBaseClass + " " + (this.inactive ? "": this.clearButtonActiveClass)
            },
            _init: function (e) {
                var t, i = this,
                a = i.$element.addClass("rating-input");
                return i.options = e,
                u.each(e, function (e, t) {
                    i[e] = t
                }),
                !i.rtl && "rtl" !== a.attr("dir") || (i.rtl = !0, a.attr("dir", "rtl")),
                i.starClickeds = !1,
                i.clearClickeds = !1,
                i._initSlider(e),
                i._checkDisabled(),
                i.displayOnly && (i.inactive = !0, i.showClear = !1, i.showCaption = !1),
                i._generateRating(),
                i._initEvents(),
                i._listen(),
                t = i._parseValue(a.val()),
                a.val(t),
                a.removeClass("rating-loading")
            },
            _initEvents: function () {
                var d = this;
                d.events = {
                    _getTouchPosition: function (e) {
                        return (h.isEmpty(e.pageX) ? e.originalEvent.touches[0].pageX: e.pageX) - d.$rating.offset().left
                    },
                    _listenClick: function (e, t) {
                        return e.stopPropagation(),
                        e.preventDefault(),
                        !0 !== e.handled && (t(e), void(e.handled = !0))
                    },
                    _noMouseAction: function (e) {
                        return ! d.hoverEnabled || d.inactive || e && e.isDefaultPrevented()
                    },
                    initTouch: function (e) {
                        var t, i, a, n, r, s, o, l, c = d.clearValue || 0;
                        ("ontouchstart" in window || window.DocumentTouch && document instanceof window.DocumentTouch) && !d.inactive && (t = e.originalEvent, i = h.isEmpty(t.touches) ? t.changedTouches: t.touches, a = d.events._getTouchPosition(i[0]), "touchend" === e.type ? (d._setStars(a), l = [d.$element.val(), d._getCaption()], d.$element.trigger("change").trigger("rating.change", l), d.starClicked = !0) : (r = (n = d.calculate(a)).val <= c ? d.fetchCaption(c) : n.caption, s = d.getWidthFromValue(c), o = n.val <= c ? s + "%": n.width, d._setCaption(r), d.$filledStars.css("width", o)))
                    },
                    starClicks: function (e) {
                        var t, i;
                        d.events._listenClick(e, function (e) {
                            return ! d.inactive && (t = d.events._getTouchPosition(e), d._setStars(t), i = [d.$element.val(), d._getCaption()], d.$element.trigger("change").trigger("rating.change", i), void(d.starClicked = !0))
                        })
                    },
                    clearClick: function (e) {
                        d.events._listenClick(e, function () {
                            d.inactive || (d.clear(), d.clearClicked = !0)
                        })
                    },
                    starMouseMove: function (e) {
                        var t, i;
                        d.events._noMouseAction(e) || (d.starClicked = !1, t = d.events._getTouchPosition(e), i = d.calculate(t), d.$element.trigger("rating.hover", [i.val, i.caption, "stars"]))
                    },
                    starMouseLeave: function (e) {
                        d.events._noMouseAction(e) || d.starClicked || (d.cache, d.$element.trigger("rating.hoverleave", ["stars"]))
                    },
                    clearMouseMove: function (e) {
                        var t, i; ! d.events._noMouseAction(e) && d.hoverOnClear && (d.clearClicked = !1, t = '<span class="' + d.clearCaptionClass + '">' + d.clearCaption + "</span>", i = d.clearValue, d.getWidthFromValue(i), d.$element.trigger("rating.hover", [i, t, "clear"]))
                    },
                    clearMouseLeave: function (e) {
                        d.events._noMouseAction(e) || d.clearClicked || !d.hoverOnClear || (d.cache, d.$element.trigger("rating.hoverleave", ["clear"]))
                    },
                    resetForm: function (e) {
                        e && e.isDefaultPrevented() || d.inactive || d.reset()
                    }
                }
            },
            _listen: function () {
                var e = this,
                t = e.$element,
                i = t.closest("form"),
                a = e.$rating,
                n = e.$clear,
                r = e.events;
                return h.handler(a, "touchstart touchmove touchend", u.proxy(r.initTouch, e)),
                h.handler(a, "click touchstart", u.proxy(r.starClick, e)),
                h.handler(a, "mousemove", u.proxy(r.starMouseMove, e)),
                h.handler(a, "mouseleave", u.proxy(r.starMouseLeave, e)),
                e.showClear && n.length && (h.handler(n, "click touchstart", u.proxy(r.clearClick, e)), h.handler(n, "mousemove", u.proxy(r.clearMouseMove, e)), h.handler(n, "mouseleave", u.proxy(r.clearMouseLeave, e))),
                i.length && h.handler(i, "reset", u.proxy(r.resetForm, e), !0),
                t
            },
            _getStars: function (e) {
                for (var t = '<span class="' + e + '-stars">', i = 1; i <= this.stars; i++) t += '<span class="star">' + this[e + "Star"] + "</span>";
                return t + "</span>"
            },
            _setStars: function (e) {
                var t = this,
                i = arguments.length ? t.calculate(e) : t.calculate(),
                a = t.$element,
                n = t._parseValue(i.val);
                return a.val(n),
                t.$filledStars.css("width", i.width),
                t._setCaption(i.caption),
                t.cache = i,
                a
            },
            showStars: function (e) {
                var t = this._parseValue(e);
                return this.$element.val(t),
                this._setStars()
            },
            calculate: function (e) {
                var t = this,
                i = h.isEmpty(t.$element.val()) ? 0 : t.$element.val(),
                a = arguments.length ? t.getValueFromPosition(e) : i,
                n = t.fetchCaption(a),
                r = t.getWidthFromValue(a);
                return {
                    caption: n,
                    width: r += "%",
                    val: a
                }
            },
            getValueFromPosition: function (e) {
                var t, i = this,
                a = h.getDecimalPlaces(i.step),
                n = i.$rating.width(),
                r = i.diff * e / (n * i.step);
                return r = i.rtl ? Math.floor(r) : Math.ceil(r),
                t = h.applyPrecision(parseFloat(i.min + r * i.step), a),
                t = Math.max(Math.min(t, i.max), i.min),
                i.rtl ? i.max - t: t
            },
            getWidthFromValue: function (e) {
                var t, i, a = this.min,
                n = this.max,
                r = this.$emptyStars;
                return ! e || e <= a || a === n ? 0 : (t = (i = r.outerWidth()) ? r.width() / i: 1, n <= e ? 100 : (e - a) * t * 100 / (n - a))
            },
            fetchCaption: function (e) {
                var t, i, a, n = this,
                r = parseFloat(e) || n.clearValue,
                s = n.starCaptions,
                o = n.starCaptionClasses;
                return r && r !== n.clearValue && (r = h.applyPrecision(r, h.getDecimalPlaces(n.step))),
                a = "function" == typeof o ? o(r) : o[r],
                i = "function" == typeof s ? s(r) : s[r],
                t = h.isEmpty(i) ? n.defaultCaption.replace(/\{rating}/g, r) : i,
                '<span class="' + (h.isEmpty(a) ? n.clearCaptionClass: a) + '">' + (r === n.clearValue ? n.clearCaption: t) + "</span>"
            },
            destroy: function () {
                var e = this.$element;
                return h.isEmpty(this.$container) || this.$container.before(e).remove(),
                u.removeData(e.get(0)),
                e.off("rating").removeClass("rating rating-input")
            },
            create: function (e) {
                var t = e || this.options || {};
                return this.destroy().rating(t)
            },
            clear: function () {
                var e = this,
                t = '<span class="' + e.clearCaptionClass + '">' + e.clearCaption + "</span>";
                return e.inactive || e._setCaption(t),
                e.showStars(e.clearValue).trigger("change").trigger("rating.clear")
            },
            reset: function () {
                return this.showStars(this.initialValue).trigger("rating.reset")
            },
            update: function (e) {
                return arguments.length ? this.showStars(e) : this.$element
            },
            refresh: function (e) {
                var t = this.$element;
                return e ? this.destroy().rating(u.extend(!0, this.options, e)).trigger("rating.refresh") : t
            }
        },
        u.fn.rating = function (l) {
            var c = Array.apply(null, arguments),
            d = [];
            switch (c.shift(), this.each(function () {
                var e, t = u(this),
                i = t.data("rating"),
                a = "object" == typeof l && l,
                n = a.theme || t.data("theme"),
                r = a.language || t.data("language") || "en",
                s = {},
                o = {};
                i || (n && (s = u.fn.ratingThemes[n] || {}), "en" === r || h.isEmpty(u.fn.ratingLocales[r]) || (o = u.fn.ratingLocales[r]), e = u.extend(!0, {},
                u.fn.rating.defaults, s, u.fn.ratingLocales.en, o, a, t.data()), i = new p(this, e), t.data("rating", i)),
                "string" == typeof l && d.push(i[l].apply(i, c))
            }), d.length) {
            case 0:
                return this;
            case 1:
                return void 0 === d[0] ? this: d[0];
            default:
                return d
            }
        },
        u.fn.rating.defaults = {
            theme: "",
            language: "en",
            stars: 5,
            filledStar: '<i class="bi bi-star-fill"></i>',
            emptyStar: '<i class="bi bi-star"></i>',
            containerClass: "",
            size: "md",
            animate: !0,
            displayOnly: !1,
            rtl: !1,
            showClear: !0,
            showCaption: !0,
            starCaptionClasses: {.5 : "label label-danger",
                1 : "label label-danger",
                1.5 : "label label-warning",
                2 : "label label-warning",
                2.5 : "label label-info",
                3 : "label label-info",
                3.5 : "label label-primary",
                4 : "label label-primary",
                4.5 : "label label-success",
                5 : "label label-success"
            },
            clearButton: '<i class="glyphicon glyphicon-minus-sign"></i>',
            clearButtonBaseClass: "clear-rating",
            clearButtonActiveClass: "clear-rating-active",
            clearCaptionClass: "label label-default",
            clearValue: null,
            captionElement: null,
            clearElement: null,
            hoverEnabled: !0,
            hoverChangeCaption: !0,
            hoverChangeStars: !0,
            hoverOnClear: !0,
            zeroAsNull: !0
        },
        u.fn.ratingLocales.en = {
            defaultCaption: "{rating} Stars",
            starCaptions: {.5 : "Half Star",
                1 : "One Star",
                1.5 : "One & Half Star",
                2 : "Two Stars",
                2.5 : "Two & Half Stars",
                3 : "Three Stars",
                3.5 : "Three & Half Stars",
                4 : "Four Stars",
                4.5 : "Four & Half Stars",
                5 : "Five Stars"
            },
            clearButtonTitle: "Clear",
            clearCaption: "Not Rated"
        },
        u.fn.rating.Constructor = p,
        u(document).ready(function () {
            var e = u("input.rating");
            e.length && e.removeClass("rating-loading").addClass("rating-loading").rating()
        })
    })
})


});

