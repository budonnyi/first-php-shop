$(document).ready(function ($) {

    //DC-accordion
    $('#accordion').dcAccordion({
        // eventType: 'click',
        // disableLink: false,
        // speed: 400,
        eventType       : 'hover',
        hoverDelay      : 200,
        menuClose       : true,
        autoClose       : true,
        autoExpand      : false,
        speed           : 400,
        saveState       : false,
        disableLink     : false,
    });

    // OWL carousel
    var owl = $('#owl-carousel');
    $("#owl-pictures").owlCarousel({
        loop: true,
        autoplay: true,
        smartSpeed: 1500,
        items: 4,
        itemsDesktop: [1199,3],
        itemsDesktopSmall: [979,3],
        pagination: false,
    });

    //R-Slider
    $("#rslides").responsiveSlides({
        random: true,
        pause: true,
        autoPlay: true,
        speed: 3900,
    });

    // FACEBOOK PIXEL CODE
    !function (f, b, e, v, n, t, s) {
        if (f.fbq)return;
        n = f.fbq = function () {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window,
        document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '858755760889272');
    fbq('track', 'PageView');

    // GOOGLE SCRIPT
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-72812778-1', 'auto');
    ga('send', 'pageview');

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    // Yandex.Metrika counter
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter44315272 = new Ya.Metrika({
                    id:44315272,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");


});
