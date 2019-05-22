jQuery(function ($) {

    $('#department').select2({
        placeholder: "Position",
    }).on("change", function() {
        changeUrlExport($('#date_from').val(), $('#date_to').val(), $('#department').val());
    });

    $('.search-career-application').click(function () {
        $('.show-hide-search').toggle(300);
    });
    
    $('#date_from').datepicker({
        autoclose: true,
        container: '#date_from-container'
    }).on("change", function () {
        changeUrlExport(this.value, $('#date_to').val(), $('#department').val());
    });

    $('#date_to').datepicker({
        autoclose: true,
        container: '#date_to-container'
    }).on("change", function () {
        changeUrlExport($('#date_from').val(), this.value, $('#department').val());
    });
    
    var linkDatatable = $('meta[name=linkDatatable]').attr('content');

    var _table = $("#datatable");

    var datatable = _table.DataTable({
        processing: true,
        serverSide: true,
        lengthMenu: [[10, 25, 50, 100, 200,-1], [10, 25, 100, 200, "All"]],
        pageLength: 10,
        ajax: {
            url: linkDatatable,
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name', orderable: false},
            {data: 'position', name: 'position', orderable: false},
            {data: 'phone', name: 'phone', orderable: false},
            {data: 'created_at', name: 'created_at', orderable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        language: {
            url: '/assets/plugins/jquery-datatable/languages/'+COMPOSER_LOCALE+'.json'
        }
    });

    // Add event listener for opening and closing details
    $('#datatable tbody').on('click', '.btn-detail', function () {
        var template = $("#details-template").html();

        var tr = $(this).closest('tr');
        var row = datatable.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            template = template
                .replace('APPLY_EMAIL', row.data().email)
                .replace('APPLY_BIRTHDAY', row.data().birthday)
                .replace('APPLY_GENDER', row.data().gender)
                .replace('APPLY_CCCD', row.data().cccd)
                .replace('APPLY_ADDRESS', row.data().address)
                .replace('APPLY_REFERENCE', row.data().reference)
                .replace('APPLY_LATEST_WORK', row.data().latest_work )
                .replace('APPLY_LATEST_POSITION', row.data().latest_position )
                .replace('APPLY_IMAGE', row.data().image)
                .replace('APPLY_ATTACH_FILE', row.data().attach_file);
            // Open this row
            row.child( template ).show();
            tr.addClass('shown');
        }
    });

    // Change url export excel
    const url_old = $('.application-export').attr('href');

    function changeUrlExport(from, to, department)
    {
        var url_new = url_old + '?from=' + from + '&to=' + to + '&department=' + department;
        $('.application-export').attr('href', url_new);
    }
    
});