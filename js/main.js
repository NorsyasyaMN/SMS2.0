(function ($) {
    "use strict";

    var btn = document.getElementById('btnAdd');

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();

    // Get the current page URL
    var currentPage = window.location.href;
    // Get all navigation links
    var navLinks = document.querySelectorAll('.navbar-nav .nav-item');
    // Iterate over each navigation link
    navLinks.forEach(function (link) {
        var href = link.querySelector('.nav-link').getAttribute('href');

        // Check if the current URL matches the href of the link
        if (currentPage.includes(href)) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });


    // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });


    // Progress Bar
    $('.pg-bar').waypoint(function () {
        $('.progress .progress-bar').each(function () {
            $(this).css("width", $(this).attr("aria-valuenow") + '%');
        });
    }, { offset: '80%' });


    // Calender
    $('#calender').datetimepicker({
        inline: true,
        format: 'L'
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 1,
        dots: true,
        loop: true,
        nav: false
    });

    // btn.onclick = function () {
    //     var tb = document.getElementById('option'), val = tb.value;
    //     if (val.length) {
    //         var sel = document.getElementById('sel');
    //         var opt = document.createElement('option');
    //         opt.value = val;
    //         opt.innerHTML = val;
    //         sel.appendChild(opt);
    //         tb.value = '';
    //     }
    // };




})(jQuery);

