<style>
.scroll-log{
    max-height: 450px;
    overflow-y: scroll;
}
</style>
<div class="card">
    <div class="card-header random-color">
        <h1 align="center" style="color:white;" >LOG INFORMATION</h1>
    </div>
    <div class="card-body">
        <div class="timeline scroll-log">
            <?php foreach($ncr_logs as $data):?>
                <?php 
                  $formatDay =strtotime($data['date']);
                  $time = date("H:i:s", $formatDay);
                  $date = date("d M. Y", $formatDay);
                ?>
            <div class="time-label">
                <span class="random-color" style="color:white;"> <?= $date; ?></span>
            </div>
            <div>
                <i class="fas fa-envelope random-color" style="color:white;"></i>
                <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i>  <?= $time ?></span>
                    <h3 class="timeline-header"><a href="#"><?= $data['from_name']; ?> (<?= $data['from_nik']; ?>)</a></h3>         
                    <div class="timeline-body">
                         <p class="text-secondary">Sent to <a href="#"><?= $data['to_name']; ?> (<?= $data['to_nik']; ?>)</a> an email <strong>NC Number.<?= $data['nc_no']; ?></strong></h5>
                    </div>
                    <div class="timeline-footer">
                        <a href="#" class="btn btn-sm random-color" style="color:white;">Read more</a>
                    </div>
                    </div>
            </div>
            <!-- <div>
                <i class="fas fa-user random-color" style="color:white;"></i>
                <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> <?= $time; ?></span>
                    <h3 class="timeline-header no-border"><a href="#"><?= $data['to_name']; ?> (<?= $data['to_nik'];?>)</a></h3>
                    <div class="timeline-body">
                         <p class="text-secondary">Received <a href="#"><?= $data['from_name']; ?></a> email</h5>
                    </div>
                </div>
            </div> -->
            <div>
                <i class="fas fa-info bg-yellow" style="color:white"></i>
                <div class="timeline-item">
                    <?php if($data['status_ncr']=='f'){ ?>
                        <h3 class="timeline-header"><a href="#">Status Ncr</a> &nbsp;&nbsp;&nbsp;<span class="blink1 badge badge-pill badge-warning"> Open </span></h3>
                    <?php }else{ ?>
                        <span class="time"><i class="fas fa-clock"></i>  <?= $data['date_updated']?></span>
                        <h3 class="timeline-header"><a href="#">Status Ncr</a> &nbsp;&nbsp;&nbsp;<span class="badge badge-pill badge-danger"> Close </span></h3>
                    <?php }  ?>
                </div>
            </div>
            <?php endforeach; ?>
            <div>
                <i class="fas fa-clock bg-gray"></i>
            </div>
            
        </div>
    </div>
</div>

<script>

$(document).ready(function() {    
    $(".random-color").each(function(index) {
      var colorR = Math.floor((Math.random() * 256));
      var colorG = Math.floor((Math.random() * 256));
      var colorB = Math.floor((Math.random() * 256));
      $(this).css("background-color", "rgb(" + colorR + "," + colorG + "," + colorB + ")");
    });
});

</script>