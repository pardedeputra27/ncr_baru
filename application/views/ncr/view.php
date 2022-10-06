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
                     
                                
                                <div class="card-body">
                                    
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-info">NC Number </span>
                                        <input type="text" class="form-control" name="nc_no" placeholder="<?= $ncr['nc_no']; ?>" value="<?= $ncr['nc_no']; ?>" readonly>
                                        <span class="input-group-text">Date  </span>
                                        <span class="input-group-text bg-info"><?= $ncr['tgl']; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Non Conformity :</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="origator" placeholder="Origator : <?= $ncr['origator']; ?>" readonly>
                                            <input type="text" class="form-control" name="not_to" placeholder="Departmen : <?= $ncr['not_to']; ?>" readonly>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="aun_rev" placeholder="Area Under Review : <?= $ncr['aun_rev']; ?>" readonly>
                                            <input type="text" class="form-control" name="funct" placeholder="Function : <?= $ncr['funct']; ?>" readonly >
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="ref_doc" placeholder="Ref. Document : <?= $ncr['ref_doc']; ?>" readonly>
                                            <input type="text" class="form-control" name="company" placeholder="Company: <?= $ncr['company']; ?>" readonly>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="project" placeholder="Project :<?= $ncr['project']; ?> " readonly>
                                            <input type="text" class="form-control" name="client" placeholder="Client To : <?= $ncr['client']; ?>" readonly>
                                        </div>
                                        <div class="form-group mt-3">
                                            <span class="input-group-text">Nonconformance Details : </span>
                                            <textarea id="compose-textarea"class="form-control" style="height: 300px" name="ncf_details">
                                            <?= $ncr['ncf_details']; ?>
                                            </textarea>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">NC Origator</span>
                                            <input type="text" class="form-control" name="nco_name" placeholder="Nama <?= $ncr['nco_name']; ?>"readonly >
                                            <input type="text" class="form-control" name="nco_designation" placeholder="Designation <?= $ncr['nco_designation']; ?>"readonly>
                                            <input type="text" class="form-control" name="nco_date" placeholder="Date : <?= $ncr['nco_date']; ?>" readonly >
                                            <input type="text" class="form-control" name="nco_signature" placeholder="Signature : <?= $ncr['nco_signature']; ?>" readonly >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Handling:</label>
                                        <div class="form-group mt-3">
                                            <span class="input-group-text">Root Cause Analysis</span>
                                        </div>
                                        <div class="form-check">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rca" value="" checked>
                                                <label class="form-check-label"><?= $ncr['rca']; ?></label>
                                            </div>
                                        </div>

                                        <div class="form-group mt-3">
                                            <span class="input-group-text">Disposition</span>
                                            <small class="form-text text-info">
                                            (i.e. immediate action)
                                            </small>
                                        </div>
                                        <div class="form-check">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="disposition" value="Correction" checked>
                                                <label class="form-check-label"><?= $ncr['disposition']; ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">
                                            <span class="input-group-text">Corrective Action : </span>
                                            <small class="form-text text-info">
                                            (i.e. action taken to eliminate cause and prevent its recurrence)
                                            </small>
                                            <textarea  id="compose-textarea1"class="form-control" style="height: 150px;" name="corr_act"><?= $ncr['corr_act']; ?>
                                            </textarea>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">NC Receipt </span>
                                            <input type="text" class="form-control" name="ncr_name" placeholder="Name : <?= $ncr['ncr_name']; ?>" readonly>
                                            <input type="text" class="form-control" name="ncr_designation" placeholder="Designation : <?= $ncr['ncr_designation']; ?>" readonly>
                                            <input type="text" class="form-control" name="ncr_rec_date" placeholder="Receipt Date : <?= $ncr['ncr_rec_date']; ?>" readonly>
                                            <input type="text" class="form-control" name="ncr_signature" placeholder="Signature : <?= $ncr['ncr_signature']; ?>" readonly>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="font-weight-bold">Veryfication and Conclusion</label>
                                        <div class="form-group mt-3">
                                            <span class="input-group-text">Follow-up and close-out details : </span>
                                            <textarea  id="compose-textarea2"class="form-control" style="height: 150px;" name="fu_and_co_details">
                                            <?= $ncr['fu_and_co_details']; ?>
                                            </textarea>
                                        </div>
                                        <div class="form-group mt-3">
                                            <span class="input-group-text">Satisfactory Action</span>
                                        </div>
                                        <div class="form-check">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="stf_action" value="" checked>
                                                <label class="form-check-label"><?= $ncr['stf_action']; ?></label>
                                            </div>
                                        </div> 
                                        <div class="form-group mt-3">
                                            <span class="input-group-text">Another verification requested</span>
                                        </div>
                                        <div class="form-check">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="a_v_req" value="" checked>
                                                <label class="form-check-label"><?= $ncr['a_v_req']; ?></label>
                                            </div>
                                          
                                        </div> 
                                        <div class="form-group mt-3">
                                            <span class="input-group-text">Details (if new verification) : </span>
                                            <textarea  id="compose-textarea3"class="form-control" style="height: 150px;" name="details_if_ver">
                                            <?= $ncr['details_if_ver']; ?>
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="btn btn-default btn-file">
                                                <i class="fas fa-paperclip"></i> Download Attachment
                                                <input type="file" name="a_doc">
                                            </div>
                                            <a href="<?= BaseURL;?>entry_data_ncr/downloadNcr/<?= $ncr['id_ncr'];?>"><p class="help-block"><?= $ncr['a_doc']; ?></p></a>

                                        </div>
                                        <div class="form-group mt-3">
                                            <span class="input-group-text">Probability of recurrence </span>
                                        </div>
                                        <div class="form-check">
                                            <div class="form-check form-check-inline" >
                                                <input class="form-check-input" type="radio" name="pro_o_rec"  value="" checked>
                                                <label class="form-check-label"><?= $ncr['pro_o_rec']; ?></label>
                                            </div>
                                         
                                        </div> 
                                        <div class="input-group mb-3 mt-3">
                                            <input type="text" class="form-control"  placeholder="Name : <?= $ncr['ver_name']; ?>" name="ver_name" readonly >
                                            <input type="text" class="form-control"  placeholder="Designation : <?= $ncr['ver_design']; ?>" name="ver_design" readonly>
                                            <input type="text" class="form-control"  placeholder="Date : <?= $ncr['ver_date']; ?>" name="ver_date" readonly>
                                            <input type="text" class="form-control"  placeholder="Signature : <?= $ncr['ver_signature']; ?>" name="ver_signature" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary" onclick="read()" ><i class="far fa-envelope" ></i> Send</button>
                                        
                                    </div>
                                    
                                </div>
                        
                            

                            </div>

                        </div>

                    </div>

                </div>
            </section>

        </div>

       