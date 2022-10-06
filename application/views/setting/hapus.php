<form method="post" id="form">
    <p>Are you sure to delete <?php echo $result->fullname; ?> ( <?php echo $result->nik; ?> ) ? </p>
    <input type="hidden" name="nik" value="<?php echo $result->nik; ?>">
    <button id="tombol_hapus" type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Hapus</button>
</form>
<script type="text/javascript">
    $(document).ready(function() {
        $("#tombol_hapus").click(function() {
            var data = $('#form').serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>setting/deleteUserPermission",
                data: data,

                cache: false,
                success: function(data) {
                    $('#tampil').load("<?php echo base_url(); ?>setting/showUserPermission");
                }
            }).done(function() { // this is callback function
                alert(" Delete data success");
            }).fail(function() {
                alert("Add data error");
            });
        });
    });
</script>