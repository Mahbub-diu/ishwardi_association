(function ($) {
    $(document).ready(function () {
        // code goes here

        $("[data-background]").each(function () {
            $(this).css({
                "background-image":
                    "url(" + $(this).attr("data-background") + ")",
                "background-size": "cover",
                "background-position": "center center",
                "background-repeat": "no-repeat",
            });
        });

        // home slider start here

        var swiper = new Swiper(".home-slider", {
            effect: "fade",
            speed: 2000,
            loop: true,
            autoplay: {
                delay: 5000,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        $(".swiper-video").on("loadeddata", function () {
            var duration = this.duration;

            var autoplayDelay = Math.round(duration * 1000);

            $(this)
                .closest(".video-slide")
                .attr("data-swiper-autoplay", autoplayDelay);

            console.log("Video Duration: " + duration + " seconds");
        });
        // home slider ends here
    });
})(jQuery);
