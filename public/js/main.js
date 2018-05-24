$(document).ready(function () {
    $(".time").text(new Date().toLocaleString('ru', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    }));
});