jQuery(function ($) {
    $('#filter-phone-status').select2({
        width: '100%'
    });
    $('#filter-status').select2({
        width: '100%'
    });
    $('#filter-partner').select2({
        width: '100%'
    });
    $('#export_date_from').datepicker({
        autoclose: true,
        container: '#export_date_from-container'
    });

    $('#export_date_to').datepicker({
        autoclose: true,
        container: '#export_date_to-container'
    });

    $('#filter-date-created-start').datepicker({
        autoclose: true,
        container: '#filter-date-created-start-container'
    });

    $('#filter-date-created-end').datepicker({
        autoclose: true,
        container: '#filter-date-created-end-container'
    });

    var linkDatatable = $('meta[name=linkDatatable]').attr('content');

    var _table = $("#datatable");

    var tblApi = _table.DataTable({
        processing: true,
        serverSide: true,
        lengthMenu: [[10, 25, 50, 100, 200,-1], [10, 25, 100, 200, "All"]],
        pageLength: 10,
        ajax: {
            url: linkDatatable,
            data: function(globalData) {
                return $.extend( {}, globalData, {
                    partner_code: $('#filter-partner').val(),
                    full_name: $('#filter-full-name').val(),
                    phone_number: $('#filter-phone-number').val(),
                    email: $('#filter-email').val(),
                    phone_status: $('#filter-phone-status').val(),
                    status: $('#filter-status').val(),
                    date_created_start: $('#filter-date-created-start').val(),
                    date_created_end: $('#filter-date-created-end').val(),
                } );
            }
        },
        order: [],
        dom: '<"toolbar">frtip',
        columns: [
            {
                render: function(data, type, row, meta) {
                    return meta.row + 1;
                },
                orderable: false,
                searchable: false
            },
            {data: 'fullname', name: 'fullname', orderable: false},
            {data: 'email', name: 'email', orderable: false},
            {data: 'phonenumber', name: 'phonenumber', orderable: false},
            {data: 'date', name: 'created_at', orderable: false},
            {data: 'time', name: 'created_at', orderable: false},
            {data: 'phone_status', name: 'phone_status', orderable: false},
            {data: 'partner_code', name: 'partner_code', orderable: false},
            {data: 'aff_sid', name: 'aff_sid', orderable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        language: {
            url: '/assets/plugins/jquery-datatable/languages/'+COMPOSER_LOCALE+'.json'
        },
        drawCallback: function (settings) {
            var accept = tblApi.row(0).data() === undefined ? 0 : tblApi.row(0).data().status_phone_accept;
            var except = tblApi.row(0).data() === undefined ? 0 : tblApi.row(0).data().status_phone_except;
            $('div.toolbar').html('Xác nhận: ' + accept + ' | Từ chối: ' + except);
        }
    });

    $('body').on('click', '.btn-toggle-filter', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $('#form-export').stop().hide();
        $('#form-filter').stop().toggle(500);
    });
    $('body').on('click', '.btn-toggle-export', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $('#form-filter').stop().hide();
        $('#form-export').stop().toggle(500);
    });

    $('#form-filter form').on('submit', function(e) {
        e.preventDefault();
        $(':focus', this).blur();
        tblApi.ajax.reload();
    });

    // override
    $(document).on('submit', 'form', function() {
        $(':submit', this).prop('disabled', false);
    });
});