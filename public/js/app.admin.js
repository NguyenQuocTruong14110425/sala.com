function toggleMenu() {
    document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
    $('.btn-menu').removeClass("changed-icon");
    $('.left-sidebar').removeClass("changed-menu");
}
// amimation show active parent menu left side
$("#btn-menu").click(function() {
    $('.topnav').removeClass("responsive");
    $('.btn-menu').toggleClass("changed-icon");
    $('.left-sidebar').toggleClass("changed-menu");
    // $("html, body").animate({ scrollTop: 0 }, 600);
    return false;

});

// amimation show active sub menu left side
$(".left-sidebar .menu-left>ul>li").click(function() {
    var a = $(this);
    $('.left-sidebar .menu-left>ul>li.active').not(this).removeClass('active');
    $('.left-sidebar .menu-left>ul>li.icon-down').not(this).removeClass('icon-down');
    $(a[0]).addClass('icon-down');
    $(a[0]).addClass('active');
    var b = a[0].children[1];
    var c = '.left-sidebar .menu-left>ul>li>ul>li'
    $('.left-sidebar .menu-left>ul>li>ul').not(b).hide();
    var c = $(b).filter(function() { return !!$(this).css('display','block'); });
    if(c)
    {
        return false;
    }
    else
    {
        $(a[0]).toggleClass('icon-down');
        $(b).toggle(function() {
            $(this).show;
        })
    }
});
$(".left-sidebar .menu-left>ul>li>a").click(function() {
    var a = $(this);
    var b = a.parent();
    var c = b[0].children[1];
    $(c).toggle(function() {
        $(this).show;
    })
})
$(".left-sidebar .menu-left>ul>li>ul>li").click(function() {
    var a = $(this);
    var b = a[0].children[0];
    var c = a.parent();
    $('.left-sidebar .menu-left>ul>li>ul>li>a.active').not(b).removeClass('active');
    $(b).addClass('active');
});
// scoll btn-menu with windown height
$(window).scroll(function() {
    $(".left-sidebar").css({
        "margin-top": ($(window).scrollTop()) + "px"
    });
});
//
$('a[toggle-tab]').click(function() {
    var a = $(this);
    var c = $(a).attr('toggle-tab')
    var d = 'ul[child-tab="' + c + '"]';
    $('ul[child-tab]').not($(d)).hide();
    $(d).toggle(function() {
        $(this).show;
    })
});
/********************
 Tag input
 *******************/
$(function() {
    $('input, select').on('change', function(event) {
        var $element = $(event.target),
            $container = $element.closest('.example');

        if (!$element.data('tagsinput'))
            return;

        var val = $element.val();
        if (val === null)
            val = "null";
        $('code', $('pre.val', $container)).html( ($.isArray(val) ? JSON.stringify(val) : "\"" + val.replace('"', '\\"') + "\"") );
        $('code', $('pre.items', $container)).html(JSON.stringify($element.tagsinput('items')));
    }).trigger('change');
});
/*! ========================================================================
* Bootstrap Toggle: bootstrap-toggle.js v2.2.0
* http://www.bootstraptoggle.com
* ========================================================================
* Copyright 2014 Min Hur, The New York Times Company
* Licensed under MIT
* ======================================================================== */
+ function(a) {
    "use strict";

    function b(b) {
        return this.each(function() {
            var d = a(this),
                e = d.data("bs.toggle"),
                f = "object" == typeof b && b;
            e || d.data("bs.toggle", e = new c(this, f)), "string" == typeof b && e[b] && e[b]()
        })
    }
    var c = function(b, c) {
        this.$element = a(b), this.options = a.extend({}, this.defaults(), c), this.render()
    };
    c.VERSION = "2.2.0", c.DEFAULTS = {
        on: "<span class='addon-on'></span>",
        off: "<span class='addon-off'></span>",
        onstyle: "addon",
        offstyle: "addon-default",
        size: "normal",
        style: "",
        width: null,
        height: null
    }, c.prototype.defaults = function() {
        return {
            on: this.$element.attr("data-on") || c.DEFAULTS.on,
            off: this.$element.attr("data-off") || c.DEFAULTS.off,
            onstyle: this.$element.attr("data-onstyle") || c.DEFAULTS.onstyle,
            offstyle: this.$element.attr("data-offstyle") || c.DEFAULTS.offstyle,
            size: this.$element.attr("data-size") || c.DEFAULTS.size,
            style: this.$element.attr("data-style") || c.DEFAULTS.style,
            width: this.$element.attr("data-width") || c.DEFAULTS.width,
            height: this.$element.attr("data-height") || c.DEFAULTS.height
        }
    }, c.prototype.render = function() {
        this._onstyle = "btn-" + this.options.onstyle, this._offstyle = "btn-" + this.options.offstyle;
        var b = "large" === this.options.size ? "btn-lg" : "small" === this.options.size ? "btn-sm" : "mini" === this.options.size ? "btn-xs" : "",
            c = a('<label class="btn">').html(this.options.on).addClass(this._onstyle + " " + b),
            d = a('<label class="btn">').html(this.options.off).addClass(this._offstyle + " " + b + " active"),
            e = a('<span class="toggle-handle btn btn-default">').addClass(b),
            f = a('<div class="toggle-group">').append(c, d, e),
            g = a('<div class="toggle btn" data-toggle="toggle">').addClass(this.$element.prop("checked") ? this._onstyle : this._offstyle + " off").addClass(b).addClass(this.options.style);
        this.$element.wrap(g), a.extend(this, {
            $toggle: this.$element.parent(),
            $toggleOn: c,
            $toggleOff: d,
            $toggleGroup: f
        }), this.$toggle.append(f);
        var h = this.options.width || Math.max(c.outerWidth(), d.outerWidth()) + e.outerWidth() / 2,
            i = this.options.height || Math.max(c.outerHeight(), d.outerHeight());
        c.addClass("toggle-on"), d.addClass("toggle-off"), this.$toggle.css({
            width: h,
            height: i
        }), this.options.height && (c.css("line-height", c.height() + "px"), d.css("line-height", d.height() + "px")), this.update(!0), this.trigger(!0)
    }, c.prototype.toggle = function() {
        this.$element.prop("checked") ? this.off() : this.on()
    }, c.prototype.on = function(a) {
        return this.$element.prop("disabled") ? !1 : (this.$toggle.removeClass(this._offstyle + " off").addClass(this._onstyle), this.$element.prop("checked", !0), void(a || this.trigger()))
    }, c.prototype.off = function(a) {
        return this.$element.prop("disabled") ? !1 : (this.$toggle.removeClass(this._onstyle).addClass(this._offstyle + " off"), this.$element.prop("checked", !1), void(a || this.trigger()))
    }, c.prototype.enable = function() {
        this.$toggle.removeAttr("disabled"), this.$element.prop("disabled", !1)
    }, c.prototype.disable = function() {
        this.$toggle.attr("disabled", "disabled"), this.$element.prop("disabled", !0)
    }, c.prototype.update = function(a) {
        this.$element.prop("disabled") ? this.disable() : this.enable(), this.$element.prop("checked") ? this.on(a) : this.off(a)
    }, c.prototype.trigger = function(b) {
        this.$element.off("change.bs.toggle"), b || this.$element.change(), this.$element.on("change.bs.toggle", a.proxy(function() {
            this.update()
        }, this))
    }, c.prototype.destroy = function() {
        this.$element.off("change.bs.toggle"), this.$toggleGroup.remove(), this.$element.removeData("bs.toggle"), this.$element.unwrap()
    };
    var d = a.fn.bootstrapToggle;
    a.fn.bootstrapToggle = b, a.fn.bootstrapToggle.Constructor = c, a.fn.toggle.noConflict = function() {
        return a.fn.bootstrapToggle = d, this
    }, a(function() {
        a("input[type=checkbox][data-toggle^=toggle]").bootstrapToggle()
    }), a(document).on("click.bs.toggle", "div[data-toggle^=toggle]", function(b) {
        var c = a(this).find("input[type=checkbox]");
        c.bootstrapToggle("toggle"), b.preventDefault()
    })
}(jQuery);
//# sourceMappingURL=bootstrap-toggle.min.js.map