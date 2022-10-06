
<!-- Main content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data NCR</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-outline-info"> <a href="<?= base_url(); ?>entry_data_ncr/tambah"><i class="fas fa-plus"></i><span class="text-danger"> Add NCR </span></a> <i class="nav-icon fas fa-edit"></i></button>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <!-- <button type="button" class="btn btn-tool" data-card-widget="remove"> <i class="fas fa-times"></i></button> -->
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if ($this->session->flashdata('flash')) : ?>
                                <div class="alert alert-success text-center" role="alert">
                                    NCR <strong>berhasil!</strong> <?= $this->session->flashdata('flash'); ?>. <i class="fas fa-check"></i>
                                </div>
                                <div class="alert alert-warning text-center" role="alert">
                                    NCR Status : <strong> OPEN </strong> . <i class="fas fa-check"></i>
                                </div>
                            <?php endif; ?>
                            <table id="tableSSNcr" class="table table-bordered table-striped text-info">
                                <thead>
                                    <tr>
                                        <th style="width:2%;"> </th>
                                        <th>NC Number</th>
                                        <th>Origator</th>
                                        <th>Date</th>
                                        <th>Download</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-3">
                     <div id="tampil-logs">
                    

                     </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


</div>
<!-- /.content-wrapper -->
<script>

$(document).ready(function() {
    $('#tableSSNcr').DataTable({
        dom: 'lBfrtip',responsive: true, lengthChange:false, autoWidth: false ,
        scrollY: "500",
        lengthMenu: [
                  [10, 25, 50,100, -1],
                  ['10 rows', '25 rows', '50 rows', '100 rows','all']
              ],
        oLanguage: {sSearch:'Search :'},language: {searchPlaceholder: 'NC or Origator... '},
        columnDefs: [{
                    targets: [0,4,5],
                    sortable: false
                    }],
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            //panggil method ajax list dengan ajax
            "url": '<?= base_url(); ?>server_side/ajax_list_ncr',
            "type": "POST"
            
        },
        buttons: [  
            'pageLength',
            {extend:    'copyHtml5',    text:'<i class="fa fa-file"> Copy</i>',         titleAttr: 'Copy'},
            {extend:    'excelHtml5',   text:'<i class="fa fa-file-excel"> Excel</i>',  titleAttr: 'Excel'},
            {extend:    'pdfHtml5',     text:'<i class="fa fa-file-pdf"> PDF</i>',      titleAttr: 'PDF'}     
        ]
        
    });
    
    $('#myInputTextField').keyup(function(){
            costumsearch.search($(this).val()).draw() ;

   });

});
</script>


<script>
$(document).ready(function() {
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url(); ?>entry_data_ncr/showLogs",
        cache: false,
        success: function(data) {
            $("#tampil-logs").html(data);
        }
    });

});
</script>