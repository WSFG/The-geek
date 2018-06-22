$(document).ready(function () {
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