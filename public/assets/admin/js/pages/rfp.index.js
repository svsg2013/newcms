jQuery(function ($) {
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
            {data: 'last_name', name: 'last_name', orderable: false},
            {data: 'phone', name: 'phone', orderable: false},
            {data: 'email', name: 'email', orderable: false},
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
            let solution = row.data().solution.split(';;').map(function (value) {
                return `<span class="tag">${value}</span>`;
            }).join('');
            console.log(solution);
            template = template.replace("FULL_NAME", row.data().full_name)
                                .replace("COMPANY", row.data().company)
                                .replace("COUNTRY", row.data().country)
                                .replace("SOLUTIONS", solution)
                                .replace("REQUIREMENT_DETAIL", row.data().requirement_detail);
            // Open this row
            row.child( template ).show();
            tr.addClass('shown');
        }
    });
});