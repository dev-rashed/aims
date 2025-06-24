import "bootstrap";
window.onload = () => {
    // Select2 multiple data element initialization
    const select2 = $("select.select2-select");
    $.each(select2, function (indexInArray, element) {
        $(element).select2({
            placeholder: $(element).data("placeholder"),
        });
    });

    const backTop = document.querySelector(".back-top");

    // Scroll top
    const scrollToTop = () => {
        const navbar = document.querySelector(".navbar");

        if (
            document.body.scrollTop > 20 ||
            document.documentElement.scrollTop > 20
        ) {
            navbar.classList.add("scrolling");
        } else {
            navbar.classList.remove("scrolling");
        }
    };

    // Back to top
    const backToTop = () => {
        if (
            document.body.scrollTop > 150 ||
            document.documentElement.scrollTop > 150
        ) {
            backTop.style.opacity = "1";
        } else {
            backTop.style.opacity = "0";
        }
    };

    if (location.pathname == "/") {
        window.onscroll = () => {
            scrollToTop();
            backToTop();
        };
    } else {
        window.onscroll = () => backToTop();
    }

    $(document).on("click", ".humbarger-icon", function () {
        const expand = $(this).attr("aria-expanded");
        if (expand === "true") {
            $(this).html(`
            <svg width="26" height="26" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.292893 0.292893C0.683417 -0.0976311 1.31658 -0.0976311 1.70711 0.292893L7 5.58579L12.2929 0.292893C12.6834 -0.0976311 13.3166 -0.0976311 13.7071 0.292893C14.0976 0.683417 14.0976 1.31658 13.7071 1.70711L8.41421 7L13.7071 12.2929C14.0976 12.6834 14.0976 13.3166 13.7071 13.7071C13.3166 14.0976 12.6834 14.0976 12.2929 13.7071L7 8.41421L1.70711 13.7071C1.31658 14.0976 0.683417 14.0976 0.292893 13.7071C-0.0976311 13.3166 -0.0976311 12.6834 0.292893 12.2929L5.58579 7L0.292893 1.70711C-0.0976311 1.31658 -0.0976311 0.683417 0.292893 0.292893Z" fill="#fff"/>
            </svg>
            `);
        } else {
            $(this).html(`
            <svg width="24" height="24" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 1C0 0.447715 0.447715 0 1 0H15C15.5523 0 16 0.447715 16 1C16 1.55228 15.5523 2 15 2H1C0.447715 2 0 1.55228 0 1ZM0 6C0 5.44772 0.447715 5 1 5H15C15.5523 5 16 5.44772 16 6C16 6.55228 15.5523 7 15 7H1C0.447715 7 0 6.55228 0 6ZM0 11C0 10.4477 0.447715 10 1 10H15C15.5523 10 16 10.4477 16 11C16 11.5523 15.5523 12 15 12H1C0.447715 12 0 11.5523 0 11Z" fill="#fff"/>
            </svg>
            `);
        }
    });

    backTop.addEventListener("click", () => {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    });

    // niceselect initialize
    const selectizes = document.querySelectorAll("select.selectize");
    selectizes.forEach((selectize) => NiceSelect.bind(selectize));

    // Directory page filtering
    try {
        const filterBtn = document.querySelector("#filter");
        const filterCloseBtn = document.querySelector(".filter-close");
        const filtering = document.querySelector(".filters-area");

        filterBtn.addEventListener(
            "click",
            () => (filtering.style.display = "block")
        );
        filterCloseBtn.addEventListener(
            "click",
            () => (filtering.style.display = "none")
        );
    } catch (error) {
        console.log(error);
    }

    // Define owl carowsel
    const defineOwlCarowsel = (element, dots = false) => {
        return $(element).owlCarousel({
            loop: true,
            margin: 24,
            nav: false,
            dots: dots,
            animateOut: "slideOutDown",
            animateIn: "flipInX",
            autoplay: false,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                },
                576: {
                    items: 2,
                },
                992: {
                    items: 3,
                },
                1200: {
                    items: 4,
                },
            },
        });
    };

    // Add click event owl carousel next && previews button
    const defineCarouselButton = (element, carousel) => {
        $(`${element} #carousel-prev`).click(() =>
            carousel.trigger("prev.owl.carousel")
        );
        $(`${element} #carousel-next`).click(() =>
            carousel.trigger("next.owl.carousel")
        );
    };

    const course = defineOwlCarowsel(".course-section .owl-carousel");
    const counsellor = defineOwlCarowsel(".counsellor-section .owl-carousel");
    const article = defineOwlCarowsel(".article-section .owl-carousel");

    defineCarouselButton(".course-section", course);
    defineCarouselButton(".counsellor-section", counsellor);
    defineCarouselButton(".article-section", article);

    const teamCarousel = $(".team-section .owl-carousel").owlCarousel({
        loop: true,
        items: 1,
        nav: false,
        dots: false,
        autoplay: false,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
    });

    const service = $(".service-section .owl-carousel").owlCarousel({
        loop: true,
        items: 1,
        nav: false,
        dots: false,
        autoplay: false,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
    });
    defineCarouselButton(".service-section", service);

    const teamCarousels = $(".team-slider").owlCarousel({
        dotsContainer: ".team-slider-thumb",
        nav: false,
        loop: true,
        items: 1,
        animateIn: "fadeIn",
        animateOut: "fadeOut",
    });

    $(".team-slider-thumb .thumb").click(function () {
        teamCarousels.trigger("to.owl.carousel", [
            $(this).parent().index(),
            300,
        ]);
    });

    // Define event owl carousel
    const event = $(".event-section .owl-carousel").owlCarousel({
        loop: true,
        margin: 24,
        nav: false,
        dots: false,
        animateOut: "slideOutDown",
        animateIn: "flipInX",
        autoplay: false,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            992: {
                items: 3,
            },
        },
    });
    defineCarouselButton(".event-section", event);

    // Define testimonial owl carousel
    const testimonial = $(".testimonial-section .owl-carousel").owlCarousel({
        loop: true,
        margin: 24,
        nav: false,
        animateOut: "slideOutDown",
        animateIn: "flipInX",
        autoplay: false,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
            },
            992: {
                items: 2,
            },
        },
    });
    defineCarouselButton(".testimonial-section", testimonial);

    // Define testimonial owl carousel
    const featureBlogDection = $(
        ".feature-blog-section .owl-carousel"
    ).owlCarousel({
        loop: true,
        margin: 24,
        nav: false,
        animateOut: "slideOutDown",
        animateIn: "flipInX",
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
            },
        },
    });
    defineCarouselButton(".feature-blog-section", featureBlogDection);

    $(document).on("click", "#passwordShowHide", function () {
        $(".auth-section #passwordShowHide").removeClass("d-none");
        $(this).addClass("d-none");

        const type = $(this).siblings("#passwordShowHide").data("type");

        $(this).siblings("input").attr("type", type);
    });

    $(document).on("click", "#advisor-item-btn", function () {
        const type = $(this).data("type");

        if (type == "prev") {
            service.trigger("prev.owl.carousel");
        } else {
            service.trigger("next.owl.carousel");
        }

        const key = $(".owl-item.active .advisor-item").data("key");

        const first_name = $(`.owl-item .advisor-item[data-key="${key - 1}"]`)
            .first()
            .find("h3")
            .text();
        const second_name = $(`.owl-item .advisor-item[data-key="${key + 1}"]`)
            .first()
            .find("h3")
            .text();

        $(`#advisor-item-btn[data-type="prev"]`).siblings("p").text(first_name);
        $(`#advisor-item-btn[data-type="next"]`)
            .siblings("p")
            .text(second_name);

        if (first_name == "") {
            $(`#advisor-item-btn[data-type="prev"]`).addClass("disabled");
        } else {
            $(`#advisor-item-btn[data-type="prev"]`).removeClass("disabled");
        }

        if (second_name == "") {
            $(`#advisor-item-btn[data-type="next"]`).addClass("disabled");
        } else {
            $(`#advisor-item-btn[data-type="next"]`).removeClass("disabled");
        }
    });

    $(document).on("click", "#team-carousel-btn", function () {
        const type = $(this).data("type");

        if (type == "prev") {
            teamCarousel.trigger("prev.owl.carousel");
        } else {
            teamCarousel.trigger("next.owl.carousel");
        }

        const team = $(".owl-item.active .item").data("team");
        console.log(team);
    });
};
