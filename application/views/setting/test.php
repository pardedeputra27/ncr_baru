
<link rel="stylesheet" href="<?=base_url();?>assets/AdminLTE-3.2.0/dist/css/adminlte.min.css">
<script src="<?=base_url()?>assets/autocomplete/jquery-3.5.1.js"></script>
<script src="<?=base_url();?>assets/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- datatable -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ajaxStart(function() {
    $("#ajax-wait").css({
        left: ($(window).width() - 32) / 2 + "px", // 32 = lebar gambar
        top: ($(window).height() - 32) / 2 + "px", // 32 = tinggi gambar
        display: "block"
    })
}).ajaxComplete(function() {
    $("#ajax-wait").fadeOut();
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url(); ?>setting/showUserPermission",
        cache: false,
        success: function(data) {
            $("#tampil").html(data);
        }
    });

});
</script>
<body>
    <div class='container'>
        <h2 align="center">APLIKASI CRUD AJAX DI CODEIGNITER</h2>
        <div id="tampil">
            <!-- Data tampil disini -->
        </div>
        <div align="center">
            <div id='ajax-wait'>
                <img alt='loading...' src="<?= base_url() ;?>images/loading.png" />
            </div>
        </div>  
</div>
