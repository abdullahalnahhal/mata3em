// $(function () {
    langs = {
        "sProcessing":   "جارٍ التحميل...",
        "sLengthMenu":   "أظهر _MENU_ مدخلات",
        "sZeroRecords":  "لم يعثر على أية سجلات",
        "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
        "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجل",
        "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
        "sInfoPostFix":  "",
        "sSearch":       "ابحث:",
        "sUrl":          "",
        "oPaginate": {
            "sFirst":    "الأول",
            "sPrevious": "السابق",
            "sNext":     "التالي",
            "sLast":     "الأخير"
        }
    }
    var js_basic =  $('.js-basic-example').DataTable({
        responsive: true,
        language: langs,
    });

    var js_basic_no_pagination = $('.js-basic-example-no-pagination').DataTable({
        responsive: true,
        bPaginate: false,
        searching: true,
        language: langs,
    });

    var js_basic_no_pagination_exportal = $('.js-basic-example-no-pagination-exportable').DataTable({
        bPaginate: false,
        responsive: true,
        searching: true,
        language: langs,
        dom: 'Bfrtip',
        buttons: [
          {
            extend: 'print',
            text:'<i class="fas fa-print"></i> Print',
            className:'btn bg-indigo waves-effect',
            exportOptions: {
              columns: ':not(.noVis)'

            }
          },
          {
            extend: 'excelHtml5',
            text:'<i class="fas fa-file-excel"></i> Excel',
            className:'btn bg-indigo waves-effect',
            exportOptions: {
              columns: ':not(.noVis)'
            }
          }
        ],
    });

    //Exportable table
    var js_exportal = $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        language: langs,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
// });
