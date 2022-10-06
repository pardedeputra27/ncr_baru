<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="icon" href="<?= base_url(); ?>images/favicon.ico"> -->
  <title><?= $judul; ?> </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url();?>assets/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url();?>assets/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>assets/AdminLTE-3.2.0/dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url() ;?>assets/AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="<?= base_url() ;?>assets/autocomplete/jquery-ui.css">
   <!-- library jquery-3.5.1 -->
  <script src="<?=base_url()?>assets/autocomplete/jquery-3.5.1.js"></script>

  <style type="text/css">
          *  { margin: 0;padding: 0;text-indent: 0;}
          h1 {
              font-family: Arial, sans-serif;
              font-style: normal;
              font-weight: bold;
              text-decoration: none;
              font-size: 14pt;   
          }
          p  {
              font-family: Arial, sans-serif;
              font-style: normal;
              font-weight: normal;
              text-decoration: none;
              font-size: 10pt;
              margin: 0pt;
          }
      
          @keyframes blink{
          0%{color:white}
          50%{color:black}
          100%{color:white}
          }
          @-webkit-keyframes blink{
          0%{color:white}
          50%{color:black}
          100%{color:white}
          }
          .blink1{
          -webkit-animation:blink 3s linear infinite;
          -moz-animation:blink 3s linear infinite;
          animation:blink 3s linear infinite
          }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?=base_url();?>" class="nav-link">Home</a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="<?= base_url() ;?>" class="brand-link" >
        <span style="background-color:snow ;"><img src="<?= base_url() ;?>/assets/AdminLTE-3.2.0/dist/img/logo_cte_center.jpg" alt="CTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"></span>
        <span class="brand-text font-weight-light">CTE</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url() ;?>images/user.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?=$this->session->userdata(SessionApp)['Name'];?></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="<?=base_url();?>entry_data_ncr/" class="nav-link"> <i class="far fa-envelope"></i>&nbsp;&nbsp; NCR</a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url();?>entry_data_car/" class="nav-link"><i class="far fa-envelope"></i>&nbsp;&nbsp; CAR</a>
                </li>
                <li class="nav-item " style="margin-top:20px">
                    <a href="<?=base_url();?>setting/" class="nav-link"><i class="fas fa-cog"></i>&nbsp;&nbsp; Setting </a>
                </li>
            </ul>
        </nav>

    </div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
                  <?= $contents; ?>

  <!-- /.content-wrapper -->
  <footer class="main-footer text-center">  
      <strong>Copyright &copy; 2022 <a href="#">Putra Pardede</a>.</strong> Citra Tubindo Engineering
  </footer>


</div>
<!-- ./wrapper -->

<!-- jQuery -->

<script src="<?=base_url();?>assets/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url();?>assets/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- summernote -->
<script src="<?= base_url() ;?>assets/AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.js"></script>
<!-- sweet alert -->
<script src="<?= base_url() ;?>assets/AdminLTE-3.2.0/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url();?>assets/AdminLTE-3.2.0/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>assets/AdminLTE-3.2.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url();?>assets/AdminLTE-3.2.0/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url();?>assets/AdminLTE-3.2.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url();?>assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url();?>assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url();?>assets/AdminLTE-3.2.0/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url();?>assets/AdminLTE-3.2.0/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url();?>assets/AdminLTE-3.2.0/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url();?>assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url();?>assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url();?>assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url();?>assets/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
<!-- jQuery UI -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<!-- Page specific script -->

<!-- Membuat alert tertutup sendiri -->

<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 3000);
</script>
<script>
     $(function () {
    //Add text editor
    $('#compose-textarea').summernote({height:120});
    $('#compose-textarea1').summernote({height:120});
    $('#compose-textarea2').summernote({height:120});
    $('#compose-textarea3').summernote({height:120});
    $('#compose-textarea4').summernote({height:120});
    $('#hide').summernote({airMode: true});
    $('#hide1').summernote({airMode: true});
    $('#hide2').summernote({airMode: true});
    $('#hide3').summernote({airMode: true});
    $('#hide4').summernote({airMode: true});
  });
  
</script>
</body>
</html>
