/* Tree()
* ======
* Converts a nested list into a multilevel
* tree view menu.
*
* @Usage: $('.my-menu').tree(options)
*         or add [data-widget="tree"] to the ul element
*         Pass any option as data-option="value"
*/
+function ($) {
    'use strict'

    var DataKey = 'lte.tree'

    var Default = {
        animationSpeed: 100,
        accordion     : false,
        followLink    : false,
        trigger       : '.treeview a'
    }

    var Selector = {
        tree        : '.tree',
        treeview    : '.treeview',
        treeviewMenu: '.treeview-menu',
        open        : '.menu-open, .active',
        li          : 'li',
        data        : '[data-widget="tree"]',
        active      : '.active'
    }

    var ClassName = {
        open: 'menu-open',
        tree: 'tree'
    }

    var Event = {
        collapsed: 'collapsed.tree',
        expanded : 'expanded.tree'
    }

    // Tree Class Definition
    // =====================
    var Tree = function (element, options) {
        this.element = element
        this.options = options

        $(this.element).addClass(ClassName.tree)

        $(Selector.treeview + Selector.active, this.element).addClass(ClassName.open)

        this._setUpListeners()
    }

    Tree.prototype.toggle = function (link, event) {
        var treeviewMenu = link.next(Selector.treeviewMenu)
        var parentLi     = link.parent()
        var isOpen       = parentLi.hasClass(ClassName.open)

        if (!parentLi.is(Selector.treeview)) {
            return
        }

        if (!this.options.followLink || link.attr('href') === '#') {
            event.preventDefault()
        }

        if (isOpen) {
            this.collapse(treeviewMenu, parentLi)
        } else {
            this.expand(treeviewMenu, parentLi)
        }
    }

    Tree.prototype.expand = function (tree, parent) {
        var expandedEvent = $.Event(Event.expanded)

        if (this.options.accordion) {
            var openMenuLi = parent.siblings(Selector.open)
            var openTree   = openMenuLi.children(Selector.treeviewMenu)
            this.collapse(openTree, openMenuLi)
        }

        parent.addClass(ClassName.open)
        tree.slideDown(this.options.animationSpeed, function () {
            $(this.element).trigger(expandedEvent)
        }.bind(this))
    }

    Tree.prototype.collapse = function (tree, parentLi) {
        var collapsedEvent = $.Event(Event.collapsed)

        tree.find(Selector.open).removeClass(ClassName.open)
        parentLi.removeClass(ClassName.open)
        tree.slideUp(this.options.animationSpeed, function () {
            tree.find(Selector.open + ' > ' + Selector.treeview).slideUp()
            $(this.element).trigger(collapsedEvent)
        }.bind(this))
    }

    // Private

    Tree.prototype._setUpListeners = function () {
        var that = this

        $(this.element).on('click', this.options.trigger, function (event) {
            that.toggle($(this), event)
        })
    }

    // Plugin Definition
    // =================
    function Plugin(option) {
        return this.each(function () {
            var $this = $(this)
            var data  = $this.data(DataKey)
            console.log(DataKey)

            if (!data) {
                var options = $.extend({}, Default, $this.data(), typeof option == 'object' && option)
                $this.data(DataKey, new Tree($this, options))
            }
        })
    }

    var old = $.fn.tree

    $.fn.tree             = Plugin
    $.fn.tree.Constructor = Tree

    // No Conflict Mode
    // ================
    $.fn.tree.noConflict = function () {
        $.fn.tree = old
        return this
    }

    // Tree Data API
    // =============
    $(window).on('load', function () {
        $(Selector.data).each(function () {
            Plugin.call($(this))
        })
    })


    var sidebar = $('#sidebar');
    var tree =  $('<ul id="" class="sidebar-menu tree" data-widget="tree" id="tree"></ul>');

    var title = $('<li class="header">MAIN NAVIGATION</li>');

    var record = $('<span class="pull-right-container">\n' +
        '              <span class="label label-primary pull-right">4</span>\n' +
        '            </span>');

    var parent =  $('<li class="active treeview menu-open">\n' +
        '          <a href="#">\n' +
        '            <i class="fa fa-dashboard"></i> <span>Dashboard</span>\n' +
        '            <span class="pull-right-container">\n' +
        '              <i class="fa fa-angle-left pull-right"></i>\n'+
        '            </span>\n' +
        '          </a>\n' +
        '        </li>');

    var child =  $('<ul class="treeview-menu"></ul>');

    var childItem = $('<li><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>' +
        '<li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>');


    child.append(childItem);

    parent.append(child);

    tree.append(title);
    tree.append(parent);
    sidebar.append(tree);
}(jQuery)

