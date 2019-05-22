jQuery(function ($) {
    var linkDatatable = $('meta[name=linkDatatable]').attr('content');

    var _table = $("#datatable");

    var datatable = _table.DataTable({
        processing: true,
        serverSide: true,
        pageLength: 10,
        ajax: {
            url: linkDatatable,
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'email', name: 'email', orderable: false},
            {data: 'active', name: 'active', orderable: false},
            {data: 'type', name: 'type', orderable: false, searchable: true},
            {data: 'created_at', name: 'created_at', orderable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        language: {
            url: '/assets/plugins/jquery-datatable/languages/'+COMPOSER_LOCALE+'.json'
        }
    });

    $(document).on('click', '.active-subscribe', function () {
        let id = $(this).attr('data-id');
        let val = $(this).is(":checked") ? 1 : 0;

        $.post(URL_UPDATE_ACTIVE_SUBSCRIBE, { val : val, id : id }, function (data) {});
    });

    const url_old = $('.subcriber-export').attr('href');
    $('.subcriber-type').change(function(){
        var url_new = url_old + '?type=' + $(this).val();
        $('.subcriber-export').attr('href', url_new);
    });

});