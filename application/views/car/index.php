
 
     <!-- Main content -->
     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>DATA CAR</h1>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <!-- <button type="button" class="btn btn-tool" data-card-widget="remove"> <i class="fas fa-times"></i></button> -->
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <?php if($this->session->flashdata('flash')):?>
                            <div class="alert alert-success text-center" role="alert">
                                NCR <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?> 
                            </div>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('status')):?>
                            <div class="alert alert-warning text-center" role="alert">
                                NCR <strong>Status!</strong> <?= $this->session->flashdata('status'); ?> <i class="fas fa-check"></i>
                            </div>
                    <?php endif; ?>
            
                    <table id="tableCAR" class="table table-bordered table-striped text-info">
                        <thead>
                            <tr>
                                <th width="2%">No </th>
                                <th>NC Number </th>
                                <th>Date</th>
                                <th>Action</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            <?php foreach ($ncr as $n):?> 
                                <tr>
                                <td><center><?= $no++; ?></center></td>
                                <td><?= $n['nc_no']; ?></td>
                                <td><?= $n['tgl']; ?></td>
                                <td> 
                                    <?php if($n['status_ncr']=='f') : ?>
                                    <p><a href="<?= BaseURL; ?>entry_data_car/tambah/<?= $n['id_ncr'];?>">Visit</a></p>
                                    <?php endif;  ?>
                                    <?php if($n['status_ncr']=='t'): ?>
                                    <p style="color:gray;">Visit</p>
                                    <?php endif; ?>
                                    
                                </td>
                                <td> 
                                    <?php if($n['status_ncr']=='f') : ?>
                                    <span class="blink1 badge badge-pill badge-warning"> Open </span>
                                    <?php endif;  ?>
                                    <?php if($n['status_ncr']=='t'): ?>
                                    <span class="badge badge-pill badge-danger">Close</span>
                                    <?php endif; ?>
                                </td> 
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
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
    $('#tableCAR').DataTable( {
        dom: 'Bfrtip',responsive: true, lengthChange: false, autoWidth: false ,
        buttons: [
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-file"> Copy</i>',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel"> Excel</i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf"> PDF</i>',
                titleAttr: 'PDF'
            }
        ]
       
    } );
} );
</script>
