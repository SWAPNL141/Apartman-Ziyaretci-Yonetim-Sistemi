<?php
  session_start();
  error_reporting(0);
  include('includes/dbconn.php');

  if (strlen($_SESSION['avmsaid']==0)) {
    header('location:logout.php');
  } else {
    if(isset($_POST['submit']))
    {

    $cvmsaid=$_SESSION['cvmsaid'];
    $apartmanno=$_POST['apartmanno'];
    $binano=$_POST['binano'];
    $apartmanstatus=$_POST['apartmanstatus'];

    $query=mysqli_query($con,"INSERT into apartment(apartment_number,building_number,apartment_status) value ('$apartmanno','$binano','$apartmanstatus')");

      if ($query) {
      $msg="Apartman Detayları Eklendi!";
    } else {
        $msg="Bir Hata Oluştu";
      }
  }
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
  <!-- Tema stil -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Tüm temaları indirmeniz yerine istediğiniz birini seçebilirsiniz. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php include 'includes/header.php'?>
  
    <?php $page='apartman'; include 'includes/sidebar.php'?>

  <!-- İçerik Wrapper. Sayfa içeriğini içerir -->
  <div class="content-wrapper">
    <!-- İçerik Başlığı (Sayfa başlığı) -->
    <section class="content-header">
      <h1>
        Apartman Detaylarını Yönet
        <!-- <small>Kontrol paneli</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Ana Sayfa</a></li>
        <li class="active">Apartman Yönetimi</li>
      </ol>
    </section>

    <!-- Ana içerik -->
    <section class="content">
      <!-- Küçük kutular (İstatistik kutuları) -->
      
      <?php if($msg){ echo "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-info-circle'></i> Uyarı!</h4>
                $msg
    </div>";}  ?>

         <!-- Formlar -->
     
      
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Aşağıdaki bilgileri doldurun</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          

            <div class="box-body">
              <div class="row">
                <form method="POST" class="">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Apartman Numarası</label>
                    <input type="text" class="form-control" name="apartmanno" required>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Apartman Durumu</label>
                    <select class="form-control select2" name="apartmanstatus" style="width: 100%;" required>
                      <option selected="">Seçin..</option>
                      <option value="Satın Alınmış">Satın Alınmış</option>
                      <option value="Boş">Boş</option>
                    </select>
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Binanın Numarası</label>
                    <select class="form-control select2" name="binano" style="width: 100%;" required>
                      <option selected="">Seçin</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                    </select>
                  </div>
                  <!-- /.form-group -->
                  

                </div>
                <!-- /.col -->
              </div>

               <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <button type="submit" class="btn btn-block btn-primary btn-lg" name="submit">Apartman Detaylarını Ekle</button>
            </div>
          </div>
          </form>
      
      <!-- /Form -->
        
    
	   <!-- Ana Satır -->
      
      <!-- / Ana Satır -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include 'includes/footer.php'?>

  <!-- Kontrol Yan Paneli -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Sekmeler oluştur -->
    
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
<!-- jQuery UI araç ipuçları ile Bootstrap ipuçları arasında çakışmayı çöz -->
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
<!-- AdminLTE dashboard demo (Sadece demo amaçlı) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE demo amaçlı -->
<script src="dist/js/demo.js"></script>
</body>
</html>

<?php } ?>
