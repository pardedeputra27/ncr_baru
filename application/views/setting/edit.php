<form method="post" id="form">
    <div class="form-group">
        <label >Name</label>
        <select class="form-control" name="nik_baru" readonly>
                <option  value="<?= $result->nik ?>"><?= $result->fullname; ?></option>
        </select>
        <input type="hidden" class="form-control"  name="nik" value="<?php echo $result->nik; ?>"> <!-- ini untuk where  -->
    </div>
    <div class="form-group">
        <label >Role</label>
        <input type="number" class="form-control"  name="role" placeholder="<?php echo $result->role; ?>">
    </div>
    <button id="tombol_edit" type="button" class="btn btn-warning" data-dismiss="modal">Edit</button>
</form>
<script type="text/javascript">
    $(document).ready(function() {
        $("#tombol_edit").click(function() {
            var form = $('#form').serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>setting/editUserPermission",
                data: form,
                cache: false,
                dataType:'json',
                success: function(data,textStatus,jqXHR) {
                    console.log(data);
                    if(data.success==true){
                        alert(data.msg);     
                    }
                    $('#tampil').load("<?php echo base_url(); ?>setting/showUserPermission");
                }
            }).fail(function() {
                alert("Edited data error");
            });
        });
    });
</script>