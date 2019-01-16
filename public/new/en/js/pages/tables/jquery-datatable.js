// $(function () {
    var js_basic = $('.js-basic-example').DataTable({
        responsive: true
    });

    var js_basic_no_pagination = $('.js-basic-example-no-pagination').DataTable({
        responsive: true,
        bPaginate: false,
        searching: true
    });

    var js_basic_no_pagination_exportal = $('.js-basic-example-no-pagination-exportable').DataTable({
        bPaginate: false,
        responsive: true,
        searching: true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    //Exportable table
    var js_exportal = $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
// });
