$(function() {
    $('#side-menu').metisMenu();
});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        var topOffset = 50;
        var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });
    if (location.pathname != '/login') {
        var element = $('a[href="' + location.pathname + '"]');
        element.addClass('active');
        if (element.length) {
            if(!element.parent().parent().
                hasClass('dropdown-menu')) {
                parent_list = element.parent().parent();
                if(parent_list[0])
                    if (parent_list[0].tagName == 'UL') {
                        parent_list.removeClass('collapse');
                        parent_list.addClass('collapse in');
                        parent_list.parent().addClass('active');
                        grand_parent = parent_list.parent().parent();
                        if (grand_parent[0].tagName == 'UL') {
                            grand_parent.removeClass('collapse');
                            grand_parent.addClass('collapse in');
                            grand_parent.parent().addClass('active');
                        }
                    }
            }

        }
    }
});
