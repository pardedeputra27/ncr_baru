        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title" style="font-size: 25px;color:red;font-weight:bold;">Non Conformity Report (NCR)</h3>
                                </div>
                                
                                <?php if($this->session->flashdata('flash')):?>
                                <div class="alert alert-success text-center" role="alert">
                                  NCR <strong>berhasil!</strong> <?= $this->session->flashdata('flash'); ?>. <i class="fas fa-check"></i>
                                </div>
                                <div class="alert alert-warning text-center" role="alert">
                                    NCR  Status : <strong><?= $this->session->flashdata('status'); ?></strong> . <i class="fas fa-check"></i>
                                </div>
                                <?php endif; ?>


                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="card-body">  
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-info">NC Number </span>
                                        <input type="text" class="form-control" name="nc_no" required>
                                        <span class="input-group-text">Date  </span>
                                        <span class="input-group-text bg-info"><?= date('d-m-Y'); ?></span>
                                        <input type="hidden" class="form-control" name="tgl" value="<?= date('d-m-Y'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Non Conformity :</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="origator" placeholder="Origator" required>
                                            <select class="form-control" name="not_to" required>
                                                <option value="" ><b>Select Depatment</b></option>
                                                <option value="HUMAN RESOURCES">HUMAN RESOURCES</option>
                                                <option value="QUALITY CONTROL">QUALITY CONTROL</option>
                                                <option value="HEALTH SAFETY  ENVIRONMENT">HEALTH SAFETY  ENVIRONMENT</option>
                                                <option value="FABRICATION">FABRICATION</option>
                                                <option value="ENGINEERING">ENGINEERING</option>
                                                <option value="PROCUREMENT">PROCUREMENT</option>
                                                <option value="ACCOUNTING & TREASURY">ACCOUNTING & TREASURY</option>
                                                <option value="SALES / MARKETING">SALES / MARKETING</option>
                                                <option value="GENERAL">GENERAL</option>
                                                <option value="PROJECT">PROJECT</option>
                                                <option value="INFORMATION TECHNOLOGY">INFORMATION TECHNOLOGY</option>
                                                <option value="STORE">STORE</option>
                                                <option value="BUSINESS DEVELOPMENT">BUSINESS DEVELOPMENT</option>
                                                <option value="QUALITY ASSURANCE">QUALITY ASSURANCE</option>
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="aun_rev" placeholder="Area Under Review" required>
                                            <input type="text" class="form-control" name="funct" placeholder="Function" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="ref_doc" placeholder="Ref. Document" required>
                                            <input type="text" class="form-control" name="company" placeholder="Company" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <select class="form-control" name="project" required>
  											<option value="" ><b> Select Project</b></option>
  											<option value="All Project">All Project</option>
  											<option value="abcgdg">A176</option>
  											<option value="asdas">A175</option>
  											<option value="sadsad">A174</option>
  										</select>
                                            <input type="text" class="form-control" name="client" placeholder="Client To" required>
                                        </div>
                                        <div class="form-group mt-3">
                                            <span class="input-group-text">Nonconformance Details : </span>
                                            <textarea id="compose-textarea"class="form-control"  name="ncf_details">
                                            </textarea>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">NC Origator</span>
                                            <input type="text" class="form-control" name="nco_name" placeholder="Name"required>
                                            <input type="text" class="form-control" name="nco_designation" placeholder="Designation">
                                            <input type="date" class="form-control" name="nco_date" placeholder="Notified Date" required>
                                            <input type="text" class="form-control" name="nco_signature" placeholder="Signature" required>
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
                                                <p class="help-block">Max. 5MB</p>
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
                                            <input type="text" class="form-control"  placeholder="Designation" name="ver_design">
                                            <input type="date" class="form-control" name="ver_date">
                                            <input type="text" class="form-control"  placeholder="Signature" name="ver_signature">
                                            <input type="hidden" class="form-control" name="status_ncr" value="false">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="submit" name="submit" class="btn btn-primary" ><i class="far fa-envelope" ></i> Send</button>
                                        
                                    </div>
                                    
                                </div>
                            </form>
                            

                            </div>

                        </div>

                    </div>

                </div>
            </section>



        </div>
