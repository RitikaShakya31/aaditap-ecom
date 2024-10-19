<script src="<?= base_url() ?>assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/metismenu/metisMenu.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/node-waves/waves.min.js"></script>

<script src="<?= base_url() ?>assets/admin/libs/apexcharts/apexcharts.min.js"></script>

<script src="<?= base_url() ?>assets/admin/js/pages/dashboard.init.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/select2/js/select2.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/spectrum-colorpicker2/spectrum.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>

<script src="<?= base_url() ?>assets/admin/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/%40chenfengyuan/datepicker/datepicker.min.js"></script>

<script src="<?= base_url() ?>assets/admin/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/%40chenfengyuan/datepicker/datepicker.min.js"></script>

<script src="<?= base_url() ?>assets/admin/js/pages/form-advanced.init.js"></script>
<script src="<?= base_url() ?>assets/admin/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/40.0.0/ckeditor.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
       document.querySelectorAll('.editor').forEach(editorElement => {
    ClassicEditor
        .create(editorElement)
        .then(editor => {
            console.log('Editor initialized:', editor);
        })
        .catch(error => {
            console.error('There was a problem initializing the editor.', error);
        });
});

    </script>

<script>
    $('#datatable').DataTable({
        "scrollX": true,
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'copy', 'csv', 'pdf', 'print'
        ]
    });


    // $(function() {
    //     $('#example2').DataTable({

    //         'paging': true,
    //         'lengthChange': true,
    //         'searching': true,
    //         'ordering': false,
    //         'info': true,
    //         'autoWidth': false,
    //         'responsive': false,
    //         dom: 'Bfrtip',
    //         buttons: [
    //             'copy', 'csv', 'excel',

    //         ],
    //         buttons: [{
    //             extend: 'csv',
    //             exportOptions: {
    //                 columns: [0, 1, 2, 3, 4, 5, 6]
    //             }
    //         }, {
    //             extend: 'excel',
    //             exportOptions: {
    //                 columns: [0, 1, 2, 3, 4, 5, 6]
    //             }
    //         }]
    //     });
    // });
</script>