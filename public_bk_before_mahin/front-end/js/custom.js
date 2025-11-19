// news and events slider
$(".slider-for").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    autoplay: false,
    asNavFor: ".slider-nav",
    infinite: true,
    loop: true,
});
$(".slider-nav").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: ".slider-for",
    dots: false,

    autoplay: false,
    focusOnSelect: true,
    infinite: true,
    vertical: true,
    loop: true,
    prevArrow:
        "<button type='button' class='slick-prev'><i class='ri-arrow-up-s-line'></i></button>",
    nextArrow:
        "<button type='button' class='slick-next'><i class='ri-arrow-down-s-line'></i></button>",
});
$(".events-slider").slick({
    dots: true,

    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: true,
    loop: true,
    autoplay: true,
    prevArrow:
        "<button type='button' class='slick-prev'><i class='ri-arrow-left-s-line'></i></button>",
    nextArrow:
        "<button type='button' class='slick-next'><i class='ri-arrow-right-s-line'></i></button>",
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
    ],
});

$(".appreciations-slider").slick({
    dots: true,

    speed: 300,
    slidesToShow: 2,
    slidesToScroll: 1,
    infinite: true,
    loop: true,
    autoplay: true,
    prevArrow:
        "<button type='button' class='slick-prev'><i class='ri-arrow-left-s-line'></i></button>",
    nextArrow:
        "<button type='button' class='slick-next'><i class='ri-arrow-right-s-line'></i></button>",
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true,
            },
        },

        {
            breakpoint: 992,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
        {
            breakpoint: 575,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
        {
            breakpoint: 414,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 375,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 360,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 320,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
    ],
});
$(".clients-slider").slick({
    dots: false,

    speed: 300,
    slidesToShow: 6,
    slidesToScroll: 1,
    infinite: true,
    loop: true,
    autoplay: false,
    prevArrow:
        "<button type='button' class='slick-prev'><i class='ri-arrow-left-s-line'></i></button>",
    nextArrow:
        "<button type='button' class='slick-next'><i class='ri-arrow-right-s-line'></i></button>",
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
    ],
});
const form = document.getElementById("contact-form");
const username = document.getElementById("username");
const email = document.getElementById("email");
const subject = document.getElementById("subject");
const msg = document.getElementById("msg");

function showError(input, message) {
    console.log(input);
    const formControlParent = input.parentElement;
    formControlParent.className = "form-group show-error-msg";
    input.className = "form-control error";
    const small = formControlParent.querySelector("small");
    small.innerText = message;
}

function showSucces(input) {
    const formControlParent = input.parentElement;
    formControlParent.className = "form-control success";
}

function checkEmail(input) {
    const re =
        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(input.value.trim())) {
        showSucces(input);
    } else {
        showError(input, "Email is not invalid");
    }
}

function check(inputArr) {
    inputArr.forEach(function (input) {
        if (input.value.trim() === "") {
            showError(input, `${getFieldName(input)} is `);
        } else {
            showSucces(input);
        }
    });
}

function checkLength(input, min, max) {
    if (input.value.length < min) {
        showError(
            input,
            `${getFieldName(input)} must be at least ${min} characters`
        );
    } else if (input.value.length > max) {
        showError(
            input,
            `${getFieldName(input)} must be les than ${max} characters`
        );
    } else {
        showSucces(input);
    }
}

function getFieldName(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

form.addEventListener("submit", function (e) {
    e.preventDefault();

    check([username, email, subject, msg]);
    checkLength(username, 3, 15);

    checkEmail(email);
});

$(document).ready(function () {});
