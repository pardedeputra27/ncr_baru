<!-- Main content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">CORRECTIVE ACTION REQUEST (CAR)</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-1"><span class="form-control bg-secondary">CAR No. </span></div>
                                        <div class="col-5"><input type="text" class="form-control" name="car_no" placeholder="<?= $ncr['nc_no']; ?>" value="<?= $ncr['nc_no']; ?>" readonly></div>
                                        <div class="col-1"><span class="form-control bg-secondary">Open Date : </span></div>
                                        <div class="col-5"><input type="date" class="form-control" name="open_date" value="<?= date('Y-m-d') ?>" readonly></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-1"><span class="form-control bg-secondary">Ref.Doc.No </span></div>
                                        <div class="col-5"><input type="text" class="form-control" name="ref_doc_no" required></div>
                                        <div class="col-1"><span class="form-control bg-secondary">Costumer : </span></div>
                                        <div class="col-5"><input type="text" class="form-control" name="constumer" value="<?= $ncr['from_name'] ?>" readonly></div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-2"><span class="form-control bg-secondary">Open By (Dept.) :</span></div>
                                        <div class="col-4"><input type="text" class="form-control" name="open_by_dept" value="<?= strtoupper($session['department_label']) ?>" readonly></div>
                                        <div class="col-2"><span class="form-control bg-secondary">Action To (Dept.) :</span></div>
                                        <div class="col-4"><input type="text" class="form-control" name="act_to_dept" value="<?= $ncr['from_dept'] ?>" readonly></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12"><span class="form-control bg-secondary">Section 1: Source of Corrective Action :</span></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="form-check mb-3">
                                                    <?php foreach ($c_sca as $c) : ?>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="sca[]" value="<?= $c['c_sca']; ?>">
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
                                        </div>
                                    </div>
                                    <div class="row mb-2 ">
                                        <div class="col-12"><span class="form-control bg-secondary">Section 2: Description of Non Conformance</span></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <span class="input-group-text">Problem </span>
                                            <textarea id="compose-textarea" class="form-control" name="problem_dnc"></textarea>
                                            <span class="input-group-text">Object Evidence </span>
                                            <textarea id="compose-textarea1" class="form-control" name="obj_evid"></textarea>
                                            <span class="input-group-text">Reference </span>
                                            <textarea id="compose-textarea2" class="form-control" name="ref_dnc"></textarea>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="name_dnc" placeholder="Name">
                                                <input type="text" class="form-control" name="sign_dnc" placeholder="Sign">
                                                <input type="date" class="form-control" name="date_dnc" placeholder="Date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12"><span class="form-control bg-secondary">Section 3: Probable Cause Analysis and Immediate Correction</span></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <span class="input-group-text mb-2">Caused </span>
                                            <div class="form-check mb-2">
                                                <?php foreach ($pcaic_caused as $c) : ?>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="caused[]" value="<?= $c['name_caused']; ?>">
                                                        <label class="form-check-label"><?= $c['name_caused']; ?></label>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <span class="input-group-text">Immediate Correction</span>
                                            <textarea id="compose-textarea3" class="form-control" style="height: 50px;" name="immerdiate_corr"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-2">
                                            <span class="input-group-text">Duo Date :</span>
                                        </div>
                                        <div class="col-2">
                                            <input type="date" class="form-control" name="pcaimc_due_date">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="pcaimc_name" placeholder="Name">
                                                <input type="text" class="form-control" name="pcaimc_sign" placeholder="Sign">
                                                <input type="date" class="form-control" name="pcaimc_date" placeholder="Date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12"><span class="form-control bg-secondary">Section 4: Corrective Action Taken to Prevent Reocurance</span></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-2">
                                            <span class="input-group-text">Duo Date :</span>
                                        </div>
                                        <div class="col-2">
                                            <input type="date" class="form-control" name="catpr_duedate">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="catpr_name" placeholder="Name">
                                                <input type="text" class="form-control" name="catpr_sign" placeholder="Sign">
                                                <input type="date" class="form-control" name="catpr_date" placeholder="Date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12"><span class="form-control bg-secondary">Section 5: Effectiveness Of Corrective Action</span></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">

                                            <div class="form-check">
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
                                            </div>
                                        </div>
                                        <dic class="col-1">
                                            <input class="form-control" type="text" value="CAR#: " readonly>
                                        </dic>
                                        <div class="col-5">
                                            <input class="form-control" type="text" name="eca_car">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 ">
                                            <div class="form-control" style="border:0;">
                                                <label>Management of Change Required ? </label>
                                                <div class="form-check form-check-inline ml-3">
                                                    <input class="form-check-input" type="radio" name="mcr" value="yes">
                                                    <label class="form-check-label">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="mcr" value="No">
                                                    <label class="form-check-label">No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <dic class="col-1">
                                            <input class="form-control" type="text" value="MOC No: " readonly>
                                        </dic>
                                        <div class="col-5">
                                            <input class="form-control" type="text" name="eca_moc_no">
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-12">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Verified BY: </span>
                                                <input type="text" class="form-control" name="verified_by">
                                                <span class="input-group-text"> signature </span>
                                                <input type="text" class="form-control" name="signature">
                                                <span class="input-group-text"> Date </span>
                                                <input type="date" class="form-control" name="date_car">
                                                <input type="hidden" class="form-control" name="status" value="true">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                                    </div>
                                </div>

                            </div>
                            <!-- <div class="card-body">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-info">CAR No. </span>
                                    <input type="text" class="form-control" name="car_no" placeholder="<?= $ncr['nc_no']; ?>" value="<?= $ncr['nc_no']; ?>" readonly>
                                    <span class="input-group-text bg-info">Open Date </span>
                                    <input type="date" class="form-control" name="open_date" value="<?= date('Y-m-d') ?>" readonly>
                                </div> 
                                 <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="ref_doc_no">
                                    <small class="input-group-text"> <i> Costumer : </i></small>
                                    <input type="text" class="form-control" name="constumer" value="<?= $ncr['from_name'] ?>" readonly>
                                </div>
                                 <div class="input-group">
                                    <small class="form-control bg-secondary"> <i> Open By (Dept.)</i></small>
                                    <small class="form-control bg-secondary"> <i> Action To (Dept.)</i></small>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="open_by_dept" value="<?= strtoupper($session['department_label']) ?>" readonly>
                                    <input type="text" class="form-control" name="act_to_dept" value="<?= $ncr['from_dept'] ?>" readonly>
                                </div> 
                                 <div class="form-group">
                                    <label class="font-weight-bold">Section1: Source of Corrective Action</label>
                                    <div class="form-check mb-3">
                                        <?php foreach ($c_sca as $c) : ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="sca[]" value="<?= $c['c_sca']; ?>">
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
                                        <textarea id="compose-textarea" class="form-control" style="height: 300px" name="problem_dnc">
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <span class="input-group-text">Object Evidence</span>
                                        <textarea id="compose-textarea1" class="form-control" style="height:50px;" name="obj_evid">
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <span class="input-group-text">Reference</span>
                                        <textarea id="compose-textarea2" class="form-control" style="height: 50px" name="ref_dnc">
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
                                        <?php foreach ($pcaic_caused as $c) : ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="caused[]" value="<?= $c['name_caused']; ?>">
                                                <label class="form-check-label"><?= $c['name_caused']; ?></label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                    <div class="form-group mt-3">
                                        <span class="input-group-text">Immediate Correction</span>
                                        <textarea id="compose-textarea3" class="form-control" style="height: 50px;" name="immerdiate_corr">
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
                                    < <div class="input-group mb-3">
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
                                    <input type="text" class="form-control" name="verified_by">
                                    <span class="input-group-text"> signature </span>
                                    <input type="text" class="form-control" name="signature">
                                    <span class="input-group-text"> Date </span>
                                    <input type="date" class="form-control" name="date_car"> 
                                    <input type="hidden" class="form-control" name="status" value="true">
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                                </div>
                            </div> -->
                        </form>



                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
</div>
