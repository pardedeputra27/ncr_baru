<button type="button" class="tambah btn btn-primary" data-toggle="modal" data-target="#myModal">
  Tambah
</button>
    <hr>
<table class="table table-bordered" id="tblUserPermission">
    <thead>
        <tr>
            <th style="width:2%;text-align:center">No</th>
            <th>NIK</th>
            <th>Name</th>
            <th>Departement</th>
            <th style="text-align:center;">Action1</th>
            <th style="text-align:center;">Action2</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($result as $item)  {
        ?>
            
            <tr>
                <td style="width:2%;text-align:center"><?php echo $no++; ?></td>
                <td><?php echo $item->nik; ?></td>
                <td><?php echo $item->fullname; ?></td>
                <td><?php echo $item->dept_label; ?></td>
                <td style="text-align:center;"> <button type="button" nik="<?php echo $item->nik; ?>" class="edit btn btn-sm btn-outline-warning">Edit</button></td>
                <td style="text-align:center;"> <button type="button" nik="<?php echo $item->nik; ?>" class="hapus btn btn-sm btn-outline-danger">Hapus</button></td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="judul"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="tampil_modal">
                    <!-- Data akan di tampilkan disini-->
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
            </div>

        </div>
    </div>
</div>


<!-- 
 catatan
document.getElementById('contents'); //returns a HTML DOM Object
var contents = $('#contents');  //returns a jQuery Object 

Di jQuery, untuk mendapatkan hasil yang sama dengan document.getElementById, 
Anda dapat mengakses Objek jQuery dan mendapatkan elemen pertama di objek 
(Ingat objek JavaScript bertindak mirip dengan array asosiatif).

var contents = $('#contents')[0]; //returns a HTML DOM Object 
-->

<script>
$(document).ready(function(){

$('.tambah').click(function(){
$.ajax({
    url: '<?php echo base_url(); ?>setting/formAddUser',
    success:function(data){
        $('#myModal').modal("show");
        $('#tampil_modal').html(data);
        $('#judul')[0].innerHTML='Add User';

    }
});
});

$('.edit').click(function(){

    var nik = $(this).attr("nik");
    $.ajax({
        url: '<?php echo base_url(); ?>setting/formEditUser',
        method: 'post',
        data: {nik:nik},
        success:function(data){
            $('#myModal').modal("show");
            $('#tampil_modal').html(data);
          $('#judul')[0].innerHTML='Edit Data';  
        }
    });
});

$('.hapus').click(function(){

    var nik = $(this).attr("nik");
    $.ajax({
        url: '<?php echo base_url(); ?>setting/formDeleteUser',
        method: 'post',
        data: {nik:nik},
        success:function(data){
            $('#myModal').modal("show");
            $('#tampil_modal').html(data);
          $('#judul')[0].innerHTML='Delete Data';
        }
    });
    });
});
</script>

<script>
    $(document).ready(function () {
        $('#tblUserPermission').DataTable({
        dom: 'lBfrtip',responsive: true, lengthChange:false, autoWidth: false ,
        scrollY: "400",
        lengthMenu: [
                  [10, 20, 50,100, -1],
                  ['10 rows', '20 rows', '50 rows', '100 rows','all']
              ],
        oLanguage: {sSearch:'Search :'},language: {searchPlaceholder: 'Silahkan Cari... '},
        columnDefs: [{
                    targets: [0,4,5],
                    sortable: false
                    }],
        order: [],
        buttons: [  
            'pageLength',
            {extend:    'copyHtml5',    text:'<i class="fa fa-file"> Copy</i>',         titleAttr: 'Copy'},
            {extend:    'excelHtml5',   text:'<i class="fa fa-file-excel"> Excel</i>',  titleAttr: 'Excel'},
            {extend:    'pdfHtml5',     text:'<i class="fa fa-file-pdf"> PDF</i>',      titleAttr: 'PDF'}     
        ]
        
    });
    });
</script>
