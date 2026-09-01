<?php
    session_start();
    error_reporting(0);
    include('includes/dbconn.php');
    error_reporting(0);
    if (strlen($_SESSION['avmsaid']==0)) {
        header('location:logout.php');
    } else { 
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Apartman Ziyaretçi Yönetim Sistemi</title>
  <!-- Tarayıcının ekran genişliğine duyarlı olmasını sağla -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Tema stili -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skinleri. Tümünü indirmek yerine, css/skins klasöründen bir skin seçin. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php include 'includes/header.php'?>
  
    <?php $page='dashboard'; include 'includes/sidebar.php'?>

  <!-- İçerik Sarıcı. Sayfa içeriğini içerir -->
  <div class="content-wrapper">
    <!-- İçerik Başlığı (Sayfa başlığı) -->
    <section class="content-header">
      <h1>
        Kontrol Paneli
        <!-- <small>Kontrol paneli</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Ana Sayfa</a></li>
        <li class="active">Kontrol Paneli</li>
      </ol>
    </section>

    <!-- Ana içerik -->
    <section class="content">
      <!-- Küçük kutular (İstatistik kutusu) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- küçük kutu -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?php include 'counters/total-visitor-count.php'?></h3>

              <p>Toplam Apartman Ziyaretçisi</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="visitor-mgmt.php" class="small-box-footer">Daha Fazla Bilgi <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- küçük kutu -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php include 'counters/todays-visitor-count.php'?></h3>

              <p>Bugünkü Ziyaretçiler</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-contacts"></i>
            </div>
            <a href="visitor-mgmt.php" class="small-box-footer">Daha Fazla Bilgi <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- küçük kutu -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php include 'counters/occ-apartment.php'?></h3>

              <p>Dolu Apartmanlar</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="manage-apartment.php" class="small-box-footer">Daha Fazla Bilgi <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- küçük kutu -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php include 'counters/av-apartment.php'?></h3>

              <p>Boş Apartmanlar</p>
            </div>
            <div class="icon">
              <i class="ion ion-home"></i>
            </div>
            <a href="manage-apartment.php" class="small-box-footer">Daha Fazla Bilgi <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      
	  
      <!-- Ana satır -->
      
      <!-- / Ana satır -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Naseeb Bajracharya tarafından geliştirilmiştir -->
  
  <?php include 'includes/footer.php'?>

  <!-- Kontrol Kenar Çubuğu -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Sekmeleri oluştur -->
    
    <!-- Sekme içerikleri -->
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
<!-- Naseeb Bajracharya tarafından geliştirilmiştir -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js grafikleri -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Grafik -->
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
<!-- AdminLTE kontrol paneli demo (Sadece demo amaçlıdır) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE demo amaçlı -->
<script src="dist/js/demo.js"></script>
</body>
</html>

<?php } ?>