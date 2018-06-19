@extends('admin.index')
@section('content')
    <div class="content">
    <div id="example">
    <div id="grid"></div>
    <script>
        $(document).ready(function () {
            $.ajax("{{ url('/api/news') }}", {
                complete: function (data) {
                    $("#grid").kendoGrid({
                        dataSource: {
                            data: {
                                "items": data.responseJSON
                            },
                            pageSize: 20,
                            schema: {
                                data: "items"
                            }
                        },
                        height: 550,
                        sortable: true,
                        toolbar: kendo.template('<div class="k-header k-grid-toolbar"><a role="button" class="k-button k-button-icontext k-grid-add" href="{{ url("admin/news/create") }}"><span class="k-icon k-i-plus"></span>Добавить новость</a></div>'),
                        pageable: {
                            refresh: true,
                            pageSizes: true,
                            buttonCount: 5
                        },
                        filterable: {
                            extra: false,
                            operators: {
                                string: {
                                    startswith: "Начинается с",
                                    eq: "Равен",
                                    neq: "Не равен"
                                }
                            }
                        },
                        columns: [{
                            field: "title",
                            title: "Заголовок",
                            filterable: {
                                ui: titleFilter
                            }
                        }, {
                            field: "description",
                            title: "Описание",
                            filterable: {
                                ui: descriptionFilter
                            }
                        }, {
                            field: "writers",
                            title: "Автор",
                            // filterable: {
                            //     ui: writersFilter
                            // },
                            filterable: false,
                            template: function(dataItem) {
                                let names = [];

                                for (let writer of dataItem.writers) {
                                    names.push(writer.name + " " + writer.surname);
                                }

                                return names.join(', ');
                            }
                        },
                            {
                                field: 'edit',
                                title: ' ',
                                filterable: false,
                                template: '<a role="button" class="k-button k-button-icontext k-grid-edit" ' +
                                'href="{{ url("admin/news/edit") }}/#=id#">' +
                                '<span class="k-icon k-i-edit"></span>' +
                                'Редактировать</a>' +
                                ' <a role="button" onclick="$.ajax($(this).attr(\'href\'));" class="k-button k-button-icontext k-grid-delete"' +
                                'href="{{ url("admin/news/remove") }}/#=id#">' +
                                '<span class="k-icon k-i-close"></span>' +
                                'Удалить</a>'
                            }],
                        editable: "inline"
                    });
                    function titleFilter(element) {
                        element.kendoAutoComplete({
                            dataSource: 'title'
                        });
                    }

                    function descriptionFilter(element) {
                        element.kendoAutoComplete({
                            dataSource: 'desc',
                        });
                    }

                    // function writersFilter(element) {
                    //     element.kendoDropDownList({
                    //         dataSource: ,
                    //         optionLabel: "--Select Value--"
                    //     });
                    // }
                }
            });
        });
    </script>
</div>
    </div>

<style type="text/css">
    .customer-photo {
        display: inline-block;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background-size: 32px 35px;
        background-position: center center;
        vertical-align: middle;
        line-height: 32px;
        box-shadow: inset 0 0 1px #999, inset 0 0 10px rgba(0,0,0,.2);
        margin-left: 5px;
    }

    .customer-name {
        display: inline-block;
        vertical-align: middle;
        line-height: 32px;
        padding-left: 3px;
    }
</style>
    <script>
        $(".active").removeClass("active");
        $("#news, #records").addClass("active");
    </script>
@endsection