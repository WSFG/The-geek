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

    //admin
    $(document).on('click', 'a.k-button', function () {
        window.location.href = $(this).attr('href');
    });

    //Fix scrolling
    $('html').scrollTop(0);

    //Text input
    if ($('#text').length) {
        CKEDITOR.replace('text');
    }

    $("#image").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader(),
                input = this;

            reader.onload = function(e) {
                $(input).parent().find('img').attr('src', e.target.result);
            };

            reader.readAsDataURL(this.files[0]);
        }
    });

    // create MultiSelect from select HTML element
    var universes = $("#universes").kendoMultiSelect().data("kendoMultiSelect");
    var writers = $("#writers").kendoMultiSelect().data("kendoMultiSelect");

    //News send
    $("#news-send").on('click', function () {
        var fd = new FormData;
        fd.append("_token", CSRF_TOKEN);
        fd.append('title', $("#title").val());
        fd.append('description', $("#description").val());
        fd.append('text', $("#text").val());
        fd.append('image', $("#image").prop('files')[0]);
        fd.append('universes[]', universes.value());
        fd.append('writers[]', writers.value());
        $.ajax('admin/news/create/', {
            type: "POST",
            data: fd
        }).done(function () {
            console.log('DONE!!!!!!!');
        });
    });
    // $("#get").click(function() {
    //     alert("Attendees:\n\nRequired: " + universes.value() + "\nOptional: " + writers.value());
    // });

    //Calendar
    // $('#calendar').fullCalendar({
    //     header: {
    //         left: 'prev,next today',
    //         center: 'title',
    //         right: 'month,agendaWeek,agendaDay,listWeek'
    //     },
    //     defaultDate: '2018-03-12',
    //     navLinks: true, // can click day/week names to navigate views
    //     editable: true,
    //     eventLimit: true, // allow "more" link when too many events
    //     events: [
    //         {
    //             title: 'All Day Event',
    //             start: '2018-03-01',
    //         },
    //         {
    //             title: 'Long Event',
    //             start: '2018-03-07',
    //             end: '2018-03-10'
    //         },
    //         {
    //             id: 999,
    //             title: 'Repeating Event',
    //             start: '2018-03-09T16:00:00'
    //         },
    //         {
    //             id: 999,
    //             title: 'Repeating Event',
    //             start: '2018-03-16T16:00:00'
    //         },
    //         {
    //             title: 'Conference',
    //             start: '2018-03-11',
    //             end: '2018-03-13'
    //         },
    //         {
    //             title: 'Meeting',
    //             start: '2018-03-12T10:30:00',
    //             end: '2018-03-12T12:30:00'
    //         },
    //         {
    //             title: 'Lunch',
    //             start: '2018-03-12T12:00:00'
    //         },
    //         {
    //             title: 'Meeting',
    //             start: '2018-03-12T14:30:00'
    //         },
    //         {
    //             title: 'Happy Hour',
    //             start: '2018-03-12T17:30:00'
    //         },
    //         {
    //             title: 'Dinner',
    //             start: '2018-03-12T20:00:00'
    //         },
    //         {
    //             title: 'Birthday Party',
    //             start: '2018-03-13T07:00:00'
    //         },
    //         {
    //             title: 'Click for Google',
    //             url: 'http://google.com/',
    //             start: '2018-03-28'
    //         }
    //     ]
    // });

    //ADMIN
    // Left menu
    $('.sub-menu ul').hide();
    $(".sub-menu a").click(function () {
        $(this).parent(".sub-menu").children("ul").slideToggle("100");
        $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
    });

    //Geo Map
    google.charts.load('current', {
        'packages':['geochart'],
        'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
    });
    google.charts.setOnLoadCallback(drawRegionsMap);

    function drawRegionsMap() {
        var data = [
            ['Страна', 'Количество']
        ];
        $.ajax('/api/statistic/users/countries', {
            async: false,
            success: function (result) {
                result = JSON.parse(result);
                result.forEach(function (item) {
                    data.push([
                        item.country,
                        item.count
                    ])
                });
            }
        });
        data = google.visualization.arrayToDataTable(data);

        if ($('#user-map').length) {
            var chart = new google.visualization.GeoChart(document.getElementById('user-map'));
            chart.draw(data, {});
        }
    }
    //User count linear diagram
    var data;

    $.ajax('/api/statistic/users/count', {
        success: function (result) {
            result = JSON.parse(result);
            data = result.map(function (item) {
                var date = new Date(item.date);
                item.date = date.getDate() + "." + (date.getMonth() + 1) + "." + date.getFullYear();
                return item;
            });
        },
        async: false
    });

    var series = [
        {
            valueField: "all_count",
            name: "Всего пользователей",
            color: "#FF6600",
            point: {
                hoverStyle: { color: "#FF6600"  }
            }
        },
        {
            valueField: "active_count",
            name: "Активных пользователей",
            color: "#000",
            point: {
                hoverStyle: { color: "#000"  }
            }
        },
        {
            valueField: "verified_count",
            name: "Верифицированных пользователй",
            color: "#5B9BD5",
            point: {
                hoverStyle: { color: "#5B9BD5"  }
            }
        },
        {
            valueField: "not_active_count",
            name: "Неактивных пользователей",
            color: "#FFC000",
            point: {
                hoverStyle: { color: "#FFC000"  }
            }
        }
    ];

    var selected_series = [];

    function drawUserCount() {
        $('#user-count').html("");
        $('#user-count').dxChart({
            dataSource: data,
            title: '',
            commonSeriesSettings: {
                argumentField: "date",
                point: {
                    size: 3,
                    hoverStyle: {
                        border: { visible: false }
                    }
                }
            },
            series: selected_series,
            tooltip: {
                enabled: true,
                customizeText: function (point) {
                    return point.value;
                }
            },
            legend: {
                verticalAlignment: "bottom",
                horizontalAlignment: "center",
                itemTextPosition: "right"
            }
        });
    }

    $(".checkbox-container input").on("change", function (e) {
        if ($(e.target).is(":checked")) {
            selected_series.push(series[$(e.target).val()]);
        } else {
            selected_series = selected_series.filter(function (value, index) {
                if (value.valueField !== series[$(e.target).val()].valueField) {
                    return value;
                }
            });
        }
        drawUserCount();
    });

    $(window).on("load", function () {
        $(".checkbox-container input").each(function () {
            if ($(this).is(":checked")) {
                selected_series.push(series[$(this).val()]);
            }
        });
        drawUserCount();
    });

    $(".spincrement").spincrement({
        duration: 3000
    });
});