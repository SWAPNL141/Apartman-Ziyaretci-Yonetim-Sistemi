<?php
  session_start();
  error_reporting(0);
  include('includes/dbconn.php');

  if (strlen($_SESSION['avmsaid']==0)) {
    header('location:logout.php');
    } else {

    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Daire Ziyaretçi Yönetim Sistemi</title>
  <!-- Tarayıcının ekran genişliğine uyumlu olmasını sağlamak için -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Tema stil -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skinler. Yalnızca ihtiyacınız olanı indirerek yükleme işlemini hızlandırın. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php include 'includes/header.php'?>
  
    <?php $page='reports'; include 'includes/sidebar.php'?>

  <!-- İçerik Sarmalayıcı. Sayfa içeriğini barındırır -->
  <div class="content-wrapper">
    <!-- İçerik Başlığı (Sayfa başlığı) -->
    <section class="content-header">
      <h1>
        Raporları Görüntüle
        <!-- <small>Kontrol paneli</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
        <li class="active">Ziyaretçi Raporları</li>
      </ol>
    </section>

    <!-- Ana içerik -->
    <section class="content">

        <?php if($msg){ echo "<div class='alert alert-success alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-info-circle'></i> Uyarı!</h4>
                    $msg
        </div>";}  ?>
     
       <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Başlangıç ve bitiş tarihlerini seçiniz</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          
          <div class="box-body">
            <div class="row">
              <form name="reports" method="POST" action="view-report.php" enctype="multipart/form-data">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Başlangıç</label>
                        <input type="date" class="form-control" name="fromdate" id="fromdate" value="" required="">
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Bitiş</label>
                        <input type="date" class="form-control" name="todate" id="todate" value="" required="">
                      </div>
                    </div>
                    <!-- /.col -->
            </div>

            <div class="box-footer">
              <button type="submit" class="btn btn-block btn-primary btn-lg" name="submit">Raporları Oluştur</button>
            </div>
          
          </form>
        </div>
                
      </div> <!-- /row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include 'includes/footer.php'?>

  <!-- Kontrol Yan Menüsü -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <div class="tab-content">
      <!-- Ana sekme içeriği -->
      <div class="tab-pane" id="control-sidebar-home-tab">
      </div>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- jQuery UI tooltip ile Bootstrap tooltip arasındaki çakışmayı çöz -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Morris.js grafikler -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE Uygulaması -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE kontrol paneli demo amaçlı -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE demo amaçlı -->
<script src="dist/js/demo.js"></script>

</body>
</html>
