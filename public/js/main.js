//Calendar
window.calendarCreate = function (events) {
    var date = new Date();
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listWeek'
        },
        defaultDate: date.getFullYear() + '-' + date.getMonth() + '-' + date.getDate(),
        navLinks: true,
        editable: true,
        eventLimit: false,
        events: events
    });
};

$(document).ready(function () {
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    /*Date in header*/
    $(".time").text(new Date().toLocaleString('ru', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    }));

    /*Modal window*/
    $(".modal").each( function(){
        $(this).wrap('<div class="overlay"></div>')
    });

    $(".open-modal").on('click', function(e){
        e.preventDefault();
        e.stopImmediatePropagation;

        $(document).find(".modal").each( function(){
            $(this).removeClass("open");
        });
        $(document).find(".overlay").each( function(){
            $(this).removeClass("open");
        });
        setTimeout( function(){
            $(document).removeClass("open");
        }, 350);

        var $this = $(this),
            modal = $($this).data("modal");

        $(modal).parents(".overlay").addClass("open");
        setTimeout( function(){
            $(modal).addClass("open");
        }, 350);

        $(document).on('click', function(e){
            var target = $(e.target);

            if ($(target).hasClass("overlay")){
                $(target).find(".modal").each( function(){
                    $(this).removeClass("open");
                });
                setTimeout( function(){
                    $(target).removeClass("open");
                }, 350);
            }
        });
    });

    $(".close-modal").on('click', function(e){
        e.preventDefault();
        e.stopImmediatePropagation;

        var $this = $(this),
            modal = $($this).data("modal");

        $(modal).removeClass("open");
        setTimeout( function(){
            $(modal).parents(".overlay").removeClass("open");
        }, 350);
    });

    //Send comment button
    $(".send-news-comment").on('click', function (e) {
        e.preventDefault();
        if ($("#comment_text").val() === "") {
            $("#comment_text").focus();
        } else {
            $.ajax('news/add-comment', {
                type: "POST",
                data: {
                    "_token": CSRF_TOKEN,
                    "news_id": $('#news_id').val(),
                    "user_id": $('#user_id').val(),
                    "text": $("#comment_text").val()
                }
            }).done(function (data) {
                data = JSON.parse(data);
                $("comment_text").val("");
                $("#comment-form").before("<div class=\"comment\">" +
                    "            <a href=\"" + data.url + "\">" +
                    "                <img class=\"header-user-photo\" src=\"" + data.img + "\" alt=\"\">" +
                    "            </a>" +
                    "            <div class=\"comment-user-info\">" +
                    "                <h5>" +
                    "                    <a href=\"" + data.url + "\">" +
                    "                        " + data.name +
                    "                    </a>" +
                    "                </h5>" +
                    "                <p>" + data.text + "</p>" +
                    "            </div>" +
                    "        </div>" +
                    "<hr/>")
            });
        }
    });

    //User page menu
    $(".profile-user-menu .profile-user-menu-item").on("click", function () {
        $(".profile-user-content-container").css("display", "none");
        $("#" + $(this).data("id")).css("display", "block");
    });

    //Register form
    var current_fs, next_fs, previous_fs;
    var left, opacity, scale;
    var animating;
    $(".next").click(function() {
        if (animating) return false;
        animating = true;
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        next_fs.show();
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now, mx) {
                scale = 1 - (1 - now) * 0.2;
                left = (now * 50) + "%";
                opacity = 1 - now;
                current_fs.css({
                    'transform': 'scale(' + scale + ')',
                    'position': 'absolute'
                });
                next_fs.css({
                    'left': left,
                    'opacity': opacity
                });
            },
            duration: 800,
            complete: function() {
                current_fs.hide();
                animating = false;
            },
            easing: 'easeInOutBack'
        });
    });
    $(".previous").click(function() {
        if (animating) return false;
        animating = true;
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        previous_fs.show();
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now, mx) {
                scale = 0.8 + (1 - now) * 0.2;
                left = ((1 - now) * 50) + "%";
                opacity = 1 - now;
                current_fs.css({
                    'left': left
                });
                previous_fs.css({
                    'transform': 'scale(' + scale + ')',
                    'opacity': opacity
                });
            },
            duration: 800,
            complete: function() {
                current_fs.hide();
                animating = false;
            },
            easing: 'easeInOutBack'
        });
    });
    $(".submit").click(function() {
        // return false;
    });

    //Search
    $("#search-send").on('click', function () {
        $(this).parent().submit();
    });
});