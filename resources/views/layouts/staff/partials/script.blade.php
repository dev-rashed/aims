<!-- Bootstrap JS -->
<script src="{{ asset('build/assets/staff') }}/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="{{ asset('build/assets/staff') }}/js/jquery.min.js"></script>
<script src="{{ asset('build/assets/staff') }}/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{ asset('build/assets/staff') }}/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="{{ asset('build/assets/staff') }}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="{{ asset('build/assets/staff') }}/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="{{ asset('build/assets/staff') }}/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{ asset('build/assets/staff') }}/plugins/chartjs/js/Chart.min.js"></script>
<script src="{{ asset('build/assets/staff') }}/plugins/chartjs/js/Chart.extension.js"></script>
<script src="{{ asset('build/assets/staff') }}/plugins/notifications/js/lobibox.min.js"></script>
<script src="{{ asset('build/assets/staff') }}/plugins/notifications/js/notifications.min.js"></script>
<script src="{{ asset('build/assets/staff') }}/plugins/sweetalerts/sweetalert2.min.js"></script>
<script src="{{ asset('build/assets/staff') }}/plugins/select2/js/select2.min.js"></script>

@if (request()->is('staff/dashboard'))
<script src="{{ asset('build/assets/staff') }}/js/index.js"></script>
@endif

<script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_API_KEY') }}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

{{-- <script src="{{ asset('build/assets/staff') }}/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('build/assets/staff') }}/plugins/datatable/js/dataTables.bootstrap5.min.js"></script> --}}

<script src="{{ asset('build/assets/staff') }}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{ asset('build/assets/staff') }}/plugins/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="{{ asset('build/assets/staff') }}/plugins/datatables-responsive/datatables.responsive.js"></script>
<script src="{{ asset('build/assets/staff') }}/plugins/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
{{-- <script src="{{ asset('build/assets/staff') }}/plugins/datatables-checkboxes-jquery/datatables.checkboxes.js"></script> --}}

<script>
    let dtDom = `<'row'<'col-sm-5 col-md-3 mb-3'l><'col-sm-7 col-md-5 text-center mb-3'B><'col-12 col-md-4 text-center text-md-end'f>rt> <'row'<'col-sm-12'tr>><'row'<'col-sm-4'i><'col-sm-8'p>>`;
    $.extend(true, $.fn.dataTable.defaults, {
        ordering: true,
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        oLanguage: {
            sSearchPlaceholder: "Search..."
        },
        language: {
            zeroRecords: "Nothing found - sorry",
            // info: "Showing page _PAGE_ of _PAGES_",
            infoEmpty: "No records available",
            infoFiltered: "(filtered from _MAX_ total records)"
        },
        lengthMenu: [
            [10, 25, 50, 100, 150, 200, 300, 400, 500, -1],
            [10, 25, 50, 100, 150, 200, 300, 400, 500, "All"]
        ],
        pageLength: 10,
        dom: dtDom,
        buttons: [
            'copy', 'excel', 'pdfHtml5', 'csv', 'print' //, 'colvis'
        ],
        order: [[0, 'desc']],
    });

    tinymce.init({
        selector: '.text-editor'
    });

    // plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
    // toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
    // toolbar_mode: 'floating',
    // tinycomments_mode: 'embedded',
    // tinycomments_author: 'Author name',

    $('.single-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        allowClear: Boolean($(this).data('allow-clear')),
    });

    $('.multiple-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: 'Select data',
        allowClear: Boolean($(this).data('allow-clear')),
    });

</script>

@stack('js')

<!--app JS-->

@vite(['resources/assets/staff/js/app.js', 'resources/assets/staff/js/main.js'])
