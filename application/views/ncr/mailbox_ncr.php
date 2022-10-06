        
     <!-- Main content -->
     <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <!-- <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"> <i class="fas fa-times"></i></button>
                    </div>
                </div> -->
                <!-- /.card-header -->
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 25px;color:green;font-weight:bold;"> <i>NON CONFORMITY REPORT </i></h3>
                </div>
                
          
               
                 
                
                <div class="card-body">


                    <form action="tambah" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="input-group">
                                <p><a href="#" class="text-danger"><?= form_error('nc_no'); ?></a></p>
                            </div>  
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-info">NC Number </span>
                                <input type="text" class="form-control" name="nc_no" id="nc_no" required>
                                <span class="input-group-text bg-info">&nbsp;&nbsp;&nbsp; Date &nbsp;&nbsp;&nbsp; </span>
                                <input type="date" class="form-control" name="tgl" value="<?=date('Y-m-d')?>" readonly >
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="search_employee" placeholder="Search name employee....." >
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Non Conformity :</label>
                                <div class="input-group">
                                    <small class="text-secondary">Origator :</small>
                                </div>
                                
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="origator" value="<?=$name; ?>" readonly>
                                    <input type="text" class="form-control" name="not_to" placeholder="Notified TO"   id="not_to" readonly >
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="aun_rev" placeholder="Area Under Review" required>
                                    <input type="text" class="form-control" name="funct" placeholder="Function" required>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="ref_doc" placeholder="Ref. Document" required>
                                    <input type="text" class="form-control" name="company"  value="Citra Tubindo Engineering"   readonly >
                                </div>
                                <div class="input-group mb-3">
                                    <select class="form-control" name="project" required>
                                    <option value="" ><b> Select Project</b></option>
                                    <option value="All Project">All Project</option>
                                    <option value="A178">A176</option>
                                    <option value="A175">A175</option>
                                    <option value="A174">A174</option>
                                </select>
                                    <input type="text" class="form-control" name="client" placeholder="Client To" id="client" readonly >
                                    <input type="hidden" class="form-control" name="client_dept_id" id="client_dept_id">
                                    <input type="hidden" class="form-control" name="client_nik" id="client_nik">
                                </div>
                                <div class="form-group mt-3">
                                    <span class="input-group-text">Nonconformance Details : </span>
                                    <textarea id="compose-textarea"class="form-control"  name="ncf_details">
                                    </textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">NC Origator</span>
                                    <input type="text" class="form-control" name="nco_name"        value="<?=$name ?>" readonly>
                                    <input type="text" class="form-control" name="nco_designation" placeholder="Designation" >
                                    <input type="date" class="form-control" name="nco_date"        placeholder="Notified Date" >
                                    <input type="text" class="form-control" name="nco_signature"   placeholder="Signature">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Handling:</label>
                                <div class="form-group mt-3">
                                    <span class="input-group-text">Root Cause Analysis</span>
                                </div>
                                <div class="form-check">
                                    <?php foreach ($rca as $c ):?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="rca[]" value="<?= $c['c_rca']; ?> " >
                                        <label class="form-check-label"><?= $c['c_rca']; ?></label>
                                    </div>
                                    <?php endforeach; ?>
                                </div>

                                <div class="form-group mt-3">
                                    <span class="input-group-text">Disposition</span>
                                    <small class="form-text text-info">
                                    (i.e. immediate action)
                                    </small>
                                </div>
                                <div class="form-check">
                                    <?php foreach ($disposition as $c ):?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="disposition[]" value="<?= $c['c_disposition']; ?>">
                                        <label class="form-check-label"><?= $c['c_disposition']; ?></label>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="form-group mt-3">
                                    <span class="input-group-text">Corrective Action : </span>
                                    <small class="form-text text-info">
                                    (i.e. action taken to eliminate cause and prevent its recurrence)
                                    </small>
                                    <textarea  id="compose-textarea1"class="form-control"  name="corr_act">
                                    </textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">NC Receipt </span>
                                    <input type="text" class="form-control" name="ncr_name" placeholder="Name">
                                    <input type="text" class="form-control" name="ncr_designation" placeholder="Designation">
                                    <input type="date" class="form-control" name="ncr_rec_date" placeholder="Receipt Date">
                                    <input type="text" class="form-control" name="ncr_signature" placeholder="Signature">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="font-weight-bold">Veryfication and Conclusion</label>
                                <div class="form-group mt-3">
                                    <span class="input-group-text">Follow-up and close-out details : </span>
                                    <textarea  id="compose-textarea2"class="form-control"  name="fu_and_co_details">
                                    </textarea>
                                </div>
                                <div class="form-group mt-3">
                                    <span class="input-group-text">Satisfactory Action</span>
                                </div>
                                <div class="form-check">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="stf_action" value="Yes" >
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="stf_action" value="No">
                                        <label class="form-check-label">No</label>  
                                    </div> 
                                </div> 
                                <div class="form-group mt-3">
                                    <span class="input-group-text">Another verification requested</span>
                                </div>
                                <div class="form-check">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="a_v_req" value="yes">
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="a_v_req" value="no">
                                        <label class="form-check-label">No</label>  
                                    </div> 
                                </div> 
                                <div class="form-group mt-3">
                                    <span class="input-group-text">Details (if new verification) : </span>
                                    <textarea  id="compose-textarea3"class="form-control" name="details_if_ver">
                                    </textarea>
                                </div>
                                <div class="form-group mt-2">
                    
                                        <i class="fas fa-paperclip"></i> Attachment Document
                                        <div class="mt-2"><input type="file" name="a_doc"></div>
                                        <p class="help-block">Max. 2MB</p>
                                </div>
                                <div class="form-group mt-3">
                                    <span class="input-group-text">Probability of recurrence </span>
                                </div>
                                <div class="form-check">
                                    <div class="form-check form-check-inline" >
                                        <input class="form-check-input" type="radio" name="pro_o_rec"  value="Low" >
                                        <label class="form-check-label">Low</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pro_o_rec" value="Medium">
                                        <label class="form-check-label">Medium</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pro_o_rec" value="High">
                                        <label class="form-check-label">High</label>  
                                    </div> 
                                </div> 
                                <div class="input-group mb-3 mt-3">
                                    <input type="text" class="form-control"  placeholder="Name" name="ver_name">
                                    <input type="text" class="form-control"  placeholder="Designation" name="cer_design">
                                    <input type="date" class="form-control" name="ver_date">
                                    <input type="text" class="form-control"  placeholder="Signature" name="ver_signature">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="float-right">
                                <button type="submit" name="submit" class="btn btn-primary" ><i class="far fa-envelope" > </i> Send</button>
                                
                            </div>
                            
                        </div>
                    </form>
                            
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


<script type='text/javascript'>
    $(document).ready(function(){
     // Initialize 
    $( "#search_employee" ).autocomplete({
        source: function( request, response ) {
        // Fetch data
        $.ajax({
            url: "<?=base_url()?>autocomplete/userList",
            type: 'post',
            dataType: "json",
            data: {
            search: request.term
            },
            success: function( data ) {
            response( data );
            }
        });
        },
        select: function (event, ui) {
        // Set selection
        $('#search_employee').val(ui.item.label); // display the selected text
        $('#client').val(ui.item.label); // display the selected text
        $('#client_dept_id').val(ui.item.dept_id);
        $('#client_nik').val(ui.item.nik);

        $('#not_to').val(ui.item.dept_label);
        return false;
        }
    });

    });
</script>


       

       