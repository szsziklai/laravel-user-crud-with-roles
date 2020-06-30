(function ($) {
    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function () {
        if (this.href === path) {
            $(this).addClass("active");
        }
    });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function (e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });
    $(document).ready(function () {
        $('input[name=name]').on('keyup', function () {
            var slug = create_slug($('input[name=name]').val());
            console.log(slug);
        });
    });
    create_slug = function (str) {
        var $slug = '';
        var trimmed = $.trim(str);
        $slug = trimmed.replace(/[^a-z0-9-]/gi, '_').
                replace(/_+/g, '_').
                replace(/^_|-$/g, '');
        return $slug.toLowerCase();
    }

})(window.$);