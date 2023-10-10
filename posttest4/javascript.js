// get ticket button -- php
const showButton = document.getElementById("show");
const closeButton = document.getElementById("close");
const ticket = document.getElementById("ticket");

showButton.addEventListener("click", () => {
    ticket.classList.add("active");
});

closeButton.addEventListener('click', () => {
    ticket.classList.remove("active");
});


// toggle light&dark mode
const checkbox = document.getElementById("checkbox");
checkbox.addEventListener("change", function () {
    if (checkbox.checked) {
        document.body.classList.add("light");
    } else {
        document.body.classList.remove("light");
    }
});

// countdown
function updateCountdown() {
    var compareDate = new Date();
    compareDate.setDate(compareDate.getDate() + 30);

    var timer = setInterval(function () {
        var now = new Date();
        var difference = compareDate - now;

        if (difference <= 0) {
            clearInterval(timer);
            difference = 0;
        }

        var seconds = Math.floor((difference / 1000) % 60);
        var minutes = Math.floor((difference / 1000 / 60) % 60);
        var hours = Math.floor((difference / (1000 * 60 * 60)) % 24);
        var days = Math.floor(difference / (1000 * 60 * 60 * 24));

        document.getElementById("days").textContent = days;
        document.getElementById("hours").textContent = hours;
        document.getElementById("minutes").textContent = minutes;
        document.getElementById("seconds").textContent = seconds;
    }, 1000);
}
updateCountdown();

// smooth scroll
function smoothScrollingTo(target) {
    $('html, body').animate({ scrollTop: $(target).offset().top }, 500);
}

$('a[href^="#"]').on('click', function (event) {
    event.preventDefault();
    smoothScrollingTo(this.hash);
});

$(document).ready(function () {
    smoothScrollingTo(location.hash);
});