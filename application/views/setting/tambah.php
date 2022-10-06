<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.2.0/plugins/select2/css/select2.min.css">
<script src="<?= base_url() ?>assets/AdminLTE-3.2.0/plugins/select2/js/select2.full.min.js"></script> -->

<form method="post" id="form">
    <div class="form-group  ">
        <label>Nama:</label>
        <select class="form-control" name="nik">
            <?php foreach ($result as $user) : ?>
                <option  value="<?= $user->nik ?>"><?= $user->fullname; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Role</label>
        <input type="number" class="form-control" name="role" placeholder="Input ID Role">
    </div>
    <button id="tombol_tambah" type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
</form>
<script type="text/javascript">
    $(document).ready(function() {
        $("#tombol_tambah").click(function() {
            var form = $('#form').serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>setting/saveUser",
                data: form,
                cache: false,
                dataType:'json',
                success: function(data,textStatus,jqXHR) {
                    console.log(data);// console.log(textStatus);// console.log(jqXHR);
                    if (data.statusExits == true ){
                        alert(data.msg);
                    }else{
                        alert(data.msg)
                    }
                    $('#tampil').load("<?php echo base_url(); ?>setting/showUserPermission");
                }
            }).fail(function() {
                alert("Add data error");
            });
        });
    });
</script>


<!-- <script >
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.select2').select2();
});
</script> -->