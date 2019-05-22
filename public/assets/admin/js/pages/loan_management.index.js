jQuery(function ($) {

    $('.button-show-input-export').click(function () {
        $('.show-hide-export').toggle(300);
    });

    $('#export_date_from').datepicker({
        autoclose: true,
        container: '#export_date_from-container'
    }).on("change", function () {
        changeUrlExport(this.value, $('#export_date_to').val());
    });

    $('#export_date_to').datepicker({
        autoclose: true,
        container: '#export_date_to-container'
    }).on("change", function () {
        changeUrlExport($('#export_date_from').val(), this.value);
    });

    // Change url export excel
    const url_old = $('.excel-export').attr('href');

    function changeUrlExport(from, to) {
        var url_new = url_old + '?from=' + from + '&to=' + to;
        $('.excel-export').attr('href', url_new);
    }

    var linkDatatable = $('meta[name=linkDatatable]').attr('content');

    var _table = $("#datatable");

    var _submit_search = $('.submit-search');

    var _submit_reset = $('.submit-reset');

    var name = $('#name');
    var email = $('#email');
    var phone = $('#phone');
    var status = $('#status');
    var date_from = $('#date_from');
    var date_to = $('#date_to');

    var _datatable = _table.DataTable({
        processing: true,
        serverSide: true,
        lengthMenu: [[10, 25, 50, 100, 200,-1], [10, 25, 100, 200, "All"]],
        pageLength: 10,
        ajax: {
            url: linkDatatable,
            data: function (d) {
                d.name = name.val();
                d.email = email.val();
                d.phone = phone.val();
                d.status = status.val();
                d.date_from = date_from.val();
                d.date_to = date_to.val();
            }
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name', orderable: false},
            {data: 'email', name: 'email', orderable: false},
            {data: 'phone', name: 'phone', orderable: false},
            {data: 'date', name: 'date', orderable: false},
            {data: 'time', name: 'time', orderable: false},
            {data: 'phone_status', name: 'phone_status', orderable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'status_phone_accept', name: 'status_phone_accept', orderable: false, visible: false},
            {data: 'status_phone_except', name: 'status_phone_except', orderable: false, visible: false}
        ],
        language: {
            url: '/assets/plugins/jquery-datatable/languages/'+COMPOSER_LOCALE+'.json'
        },
        dom: '<"toolbar">frtip',
        fnInitComplete: function () {
            var accept = _datatable.row(0).data() === undefined ? 0 : _datatable.row(0).data().status_phone_accept;
            var except = _datatable.row(0).data() === undefined ? 0 : _datatable.row(0).data().status_phone_except;
            $('div.toolbar').html('Xác nhận: ' + accept + ' | Từ chối: ' + except);
        },
        drawCallback: function (settings) {
            var accept = _datatable.row(0).data() === undefined ? 0 : _datatable.row(0).data().status_phone_accept;
            var except = _datatable.row(0).data() === undefined ? 0 : _datatable.row(0).data().status_phone_except;
            $('div.toolbar').html('Xác nhận: ' + accept + ' | Từ chối: ' + except);
        }
    });
    
    $('.search-loan-management').click(function () {
        $('.show-hide-search').toggle(300);
    });

    $('#date_from').datepicker({
        autoclose: true,
        container: '#date_from-container'
    });

    $('#date_to').datepicker({
        autoclose: true,
        container: '#date_to-container'
    });

    _submit_search.click(function (e) {
        _datatable.draw();
        
        e.preventDefault();
    });

    _submit_reset.click(function (e) {
        name.val('');
        email.val('');
        phone.val('');
        status.val(null).trigger("change");
        date_from.val('');
        date_to.val('');
        _datatable.draw();
        e.preventDefault();
    });
});