<?php
    session_start();
    error_reporting(0);
    include('includes/dbconn.php');

    if (strlen($_SESSION['avmsaid']==0)) {
    header('location:logout.php');
    } else {
        if(isset($_POST['update'])) {
        $adminid=$_SESSION['avmsaid'];
        $AName=$_POST['adminname'];
        $mobno=$_POST['mobilenumber'];
        $email=$_POST['email'];
    
        $query=mysqli_query($con, "UPDATE tbladmin set AdminName='$AName', MobileNumber ='$mobno', Email= '$email' where ID='$adminid'");
        if ($query) {
        $msg="Profiliniz güncellendi";
    } else {
        $msg="Bir şeyler yanlış gitti";}
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Apartman Ziyaretçi Yönetim Sistemi</title>
  <!-- Ekran genişliğine duyarlı olmasını sağlamak için -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Tema stili -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. CSS/skins klasöründen bir tema seçin. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script>
    function getBuilding(val) {
        $.ajax({
        type: "POST",
        url: "autofill.php",
        data:'apartmentid='+val,
        success: function(data){
        //alert(data);
        $('#buildingno').val(data);
        }
        });
    }
    </script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php include 'includes/header.php'?>
  
    <?php include 'includes/sidebar.php'?>

  <!-- İçerik Bölümü. Sayfa içeriğini içerir -->
  <div class="content-wrapper">
    <!-- İçerik Başlığı (Sayfa başlığı) -->
    <section class="content-header">
      <h1>
        Profilim
        <!-- <small>Kontrol paneli</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
        <li class="active">Profil Yönetimi</li>
      </ol>
    </section>

    <!-- Ana içerik -->
    <section class="content">
      <!-- Küçük kutular (istatistik kutusu) -->
      
      <?php if($msg){ echo "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-info-circle'></i> Uyarı!</h4>
                $msg
                </div>";}  ?>

         <!-- Formlar -->
     
      
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Lütfen aşağıdaki bilgilerinizi güncelleyin</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          
          <?php
            $adminid=$_SESSION['avmsaid'];
            $ret=mysqli_query($con,"SELECT * from tbladmin where ID='$adminid'");
            $cnt=1;
            while ($row=mysqli_fetch_array($ret)) {

            ?>

            <div class="box-body">
              <div class="row">
                <form method="POST" class="form">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Hesap Kayıt Tarihi</label>
                    <input type="text" class="form-control" value="<?php  echo $row['AdminRegdate'];?>" readonly>
                  </div>
                  <!-- /.form-group -->

                  <div class="form-group">
                    <label>Ad Soyad</label>
                    <input type="text" class="form-control" name="adminname" id="adminname" value="<?php  echo $row['AdminName'];?>" required>
                  </div>

                  <div class="form-group">
                    <label>Kullanıcı Adı</label>
                        <input type="text" class="form-control" readonly="" value="<?php  echo $row['UserName'];?>">
                    </div>

                    
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                <div class="form-group">
                    <label>Telefon Numarası</label>
                    <input type="number" class="form-control" id="mobilenumber" name="mobilenumber" value="<?php  echo $row['MobileNumber'];?>" required>
                </div>


                <div class="form-group">
                    <label>Email Adresi</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php  echo $row['Email'];?>" required>
                </div>

                <?php } ?>
                  <!-- /.form-group -->
                  

                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
              </div>

               <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <button type="submit" class="btn btn-block btn-danger btn-lg" name="update">Değişiklikleri Yap</button>
            </div>
          </div>
          </form>
      
      <!-- /Form -->
        
    
	   <!-- Ana satır -->
      
      <!-- / Ana satır -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include 'includes/footer.php'?>

  <!-- Kontrol Paneli -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Sekmeleri oluştur -->
    
    <!-- Tab içerikleri -->
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
<!-- Bootstrap tooltip ile jQuery UI tooltip çakışmasını çöz -->
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
<!-- tarih aralığı -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- tarih seçici -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE kontrol paneli demo (Sadece demo amaçlı) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE demo amaçlı -->
<script src="dist/js/demo.js"></script>
</body>
</html>

<?php } ?>
