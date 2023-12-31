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
    const targetDate = new Date('2024-11-1 23:59:59');
    const currentDate = new Date();
    const timeRemaining = targetDate - currentDate;

    if (timeRemaining <= 0) {
        document.getElementById('days').textContent = '0';
        document.getElementById('hours').textContent = '0';
        document.getElementById('minutes').textContent = '0';
        document.getElementById('seconds').textContent = '0';
    } else {
        const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeRemaining % (1000 * 60) / 1000));

        document.getElementById('days').textContent = days;
        document.getElementById('hours').textContent = hours;
        document.getElementById('minutes').textContent = minutes;
        document.getElementById('seconds').textContent = seconds;
    }
}
updateCountdown();
setInterval(updateCountdown, 1000);

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