jQuery(function ($) {
    var linkDatatable = $('meta[name=linkDatatable]').attr('content');

    var _table = $("#datatable");

    _table.DataTable({
        processing: true,
        serverSide: true,
        lengthMenu: [[10, 25, 50, 100, 200,-1], [10, 25, 100, 200, "All"]],
        pageLength: 10,
        ajax: {
            url: linkDatatable
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name', orderable: false, searchable: true},
            {data: 'employer', name: 'employer', orderable: true},
            {
                data: 'published_date',
                name: 'published_date',
                orderable: false
            },
            {data: 'expired_date', name: 'expired_date', orderable: false},
            {data: 'status', name: 'status', orderable: false},
            {data: 'is_top', name: 'is_top', orderable: true},
            {data: 'num_of_application', name: 'num_of_application', orderable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        language: {
            url: '/assets/plugins/jquery-datatable/languages/'+COMPOSER_LOCALE+'.json'
        }
    });
});