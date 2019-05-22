jQuery(function ($) {
    var linkDatatable = $('meta[name=linkDatatable]').attr('content');

    var _table = $("#datatable");

    _table.DataTable({
        processing: true,
        serverSide: true,
        lengthMenu: [[10, 25, 50, 100, 200,-1], [10, 25, 100, 200, "All"]],
        pageLength: 10,
        ajax: {
            url: linkDatatable,
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'loan_job_id', name: 'loan_job_id', orderable: false},
            {data: 'loan_income_type', name: 'loan_income_type', orderable: false},
            {data: 'interest_rate', name: 'interest_rate', orderable: false},
            {data: 'min_money', name: 'min_money', orderable: false},
            {data: 'max_money', name: 'max_money', orderable: false},
            {data: 'template_id', name: 'template_id', orderable: false},
            {data: 'partner_id', name: 'partner_id', orderable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        language: {
            url: '/assets/plugins/jquery-datatable/languages/'+COMPOSER_LOCALE+'.json'
        }
    });
});