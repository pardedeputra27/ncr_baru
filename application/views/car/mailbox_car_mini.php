<div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title" style="font-size: 25px;color:red;font-weight:bold;">CORRECTIVE ACTION REQUEST (CAR)</h3>
                                    <div class="card-tools">
                                    <h1 class="card-title"><button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button></h3> 
                                    </div>
                                </div>
                                    <?php if($this->session->flashdata('flash')):?>
                                    <div class="alert alert-success text-center" role="alert" >
                                    CAR <strong>berhasil! </strong> <?= $this->session->flashdata('flash'); ?>. <i class="fas fa-check"></i>
                                    </div>
                                    <?php endif; ?>
                                    
                                
                              <form action="" method="post">
                                <div class="card-body"> 
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-info">CAR No. </span>
                                        <input type="text" class="form-control"  name="car_no" placeholder="<?= $ncr['nc_no']; ?>" value="<?= $ncr['nc_no']; ?>" readonly>
                                        <span class="input-group-text bg-info" >Open  Date  </span>
                                        <span class="input-group-text "><?= $ncr['tgl']; ?> </span>
                                        <input type="hidden" class="form-control" name="open_date" value="<?= $ncr['tgl']; ?>">
                                    </div>
                                    <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="ref_doc_no" placeholder="Ref.Doc.No" >
                                            <input type="text" class="form-control" name="constumer" placeholder="Costumer" >
                                    </div>
                                    <div class="input-group mb-3">
                                            <select class="form-control" name="open_by_dept" >
                                                <option value="" ><b>Opened by(Dept) </b></option>
                                                <option value="1">HUMAN RESOURCES</option>
                                                <option value="2">QUALITY CONTROL</option>
                                                <option value="3">HEALTH SAFETY  ENVIRONMENT</option>
                                                <option value="4">FABRICATION</option>
                                                <option value="5">ENGINEERING</option>
                                                <option value="6">PROCUREMENT</option>
                                                <option value="7">ACCOUNTING & TREASURY</option>
                                                <option value="8">SALES / MARKETING</option>
                                                <option value="9">GENERAL</option>
                                                <option value="16">PROJECT</option>
                                                <option value="17">INFORMATION TECHNOLOGY</option>
                                                <option value="22">STORE</option>
                                                <option value="24">BUSINESS DEVELOPMENT</option>
                                                <option value="26">QUALITY ASSURANCE</option>
                                            </select>
                                            <select class="form-control" name="act_to_dept" >
                                                <option value="" ><b>Action to (Dept.)</b></option>
                                                <option value="1">HUMAN RESOURCES</option>
                                                <option value="2">QUALITY CONTROL</option>
                                                <option value="3">HEALTH SAFETY  ENVIRONMENT</option>
                                                <option value="4">FABRICATION</option>
                                                <option value="5">ENGINEERING</option>
                                                <option value="6">PROCUREMENT</option>
                                                <option value="7">ACCOUNTING & TREASURY</option>
                                                <option value="8">SALES / MARKETING</option>
                                                <option value="9">GENERAL</option>
                                                <option value="16">PROJECT</option>
                                                <option value="17">INFORMATION TECHNOLOGY</option>
                                                <option value="22">STORE</option>
                                                <option value="24">BUSINESS DEVELOPMENT</option>
                                                <option value="26">QUALITY ASSURANCE</option>
                                            </select>
                                    </div>  

                                    <div class="form-group">
                                        <label class="font-weight-bold">Section1: Source of Corrective Action</label>
                                        <div class="form-check mb-3">
                                            <?php foreach ($c_sca as $c):?> 
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="sca[]" value="<?= $c['c_sca']; ?>" >
                                                <label class="form-check-label"><?= $c['c_sca']; ?></label>
                                            </div>
                                            <?php endforeach; ?>                                         
                                        </div>
                                        <div class="form-check">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label mr-3">Audit Finding No.# </label> 
                                                <input class="form-check-input" type="text" name="sca_adt_find_no">   
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label mr-2">Other</label> 
                                                <input class="form-check-input" type="text" name="sca_other"> 
                                            </div>
                                        </div>
                                    </div> 

                                    

                                    <div class="form-group">
                                        <label class="font-weight-bold">Section 2: Description of Non Conformance</label>
                                        <div class="form-group">
                                            <span class="input-group-text">Problem</span>
                                            <textarea id="compose-textarea"class="form-control" style="height: 300px" name="problem_dnc">
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <span class="input-group-text">Object Evidence</span>
                                            <textarea id="compose-textarea1"class="form-control" style="height:50px;" name="obj_evid">
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <span class="input-group-text">Reference</span>
                                            <textarea id="compose-textarea2"class="form-control" style="height: 50px" name="ref_dnc">
                                            </textarea>
                                        </div>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="name_dnc" placeholder="Name">
                                            <input type="text" class="form-control" name="sign_dnc" placeholder="Sign">
                                            <input type="date" class="form-control" name="date_dnc" placeholder="Date">
                                        </div>  
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Section 3: Probable Cause Analysis and Immediate Correction</label>
                                        <span class="input-group-text">Caused</span>
                                        <div class="form-check">
                                            <?php foreach ($pcaic_caused as $c):?> 
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="caused[]" value="<?= $c['name_caused']; ?>">
                                                <label class="form-check-label"><?= $c['name_caused']; ?></label>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>

                                        <div class="form-group mt-3">
                                            <span class="input-group-text">Immediate Correction</span>
                                            <textarea id="compose-textarea3" class="form-control" style="height: 50px;" name="immerdiate_corr" >
                                            </textarea>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Duo Date</span>
                                            <input type="date" class="form-control" name="pcaimc_due_date">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="pcaimc_name" placeholder="Name">
                                            <input type="text" class="form-control" name="pcaimc_sign" placeholder="Sign">
                                            <input type="date" class="form-control" name="pcaimc_date" placeholder="Date">
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                        <label class="font-weight-bold">Section 4: Corrective Action Taken to Prevent Reocurance</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Duo Date</span>
                                            <input type="date" class="form-control" name="catpr_duedate">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="catpr_name" placeholder="Name">
                                            <input type="text" class="form-control" name="catpr_sign" placeholder="Sign">
                                            <input type="date" class="form-control" name="catpr_date" placeholder="Date">
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                        <label class="font-weight-bold">Section 5: Effectiveness Of Corrective Action</label>
                                        <div class="form-check mb-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="eca" value="Accept">
                                                <label class="form-check-label">Accept</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="eca" value="Rejject">
                                                <label class="form-check-label">Reject</label>  
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="eca" value="New Car Issued">
                                                <label class="form-check-label">New Car Issued</label>  
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label mr-3">CAR#: </label> 
                                                <input class="form-check-input" type="text" name="eca_car" value=""> 
                                            </div>
                                        </div>

                                        <div class="input-group ml-3">
                                            <label class="form-check-label">Management of Change Required ? </label>
                                        </div>

                                        <div class="form-check mb-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="mcr" value="yes">
                                                <label class="form-check-label">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="mcr" value="No">
                                                <label class="form-check-label">No</label>  
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label mr-3">MOC No: </label> 
                                                <input class="form-check-input" type="text" name="eca_moc_no" value=""> 
                                            </div>
                                        </div>
                                    </div>  

                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Verified BY: </span>
                                        <input type="text" class="form-control" name="verified_by" >
                                        <span class="input-group-text"> signature  </span>
                                        <input type="text" class="form-control" name="signature">
                                        <span class="input-group-text"> Date </span>
                                        <input type="date" class="form-control" name="date_car">
                                        <input type="hidden" class="form-control" name="status" value="true">
                                    </div>


                                   
                                    
                                </div>

                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary"><i class="far fa-envelope" ></i> Send</button>
                                        
                                    </div>
                                    
                                </div>
                              </form>
                                
                            </div>

                        </div>

                    </div>

                </div>
            </section>

        </div>


        
    
     
       
