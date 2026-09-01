<?php
    session_start();
    error_reporting(0);
    include('includes/dbconn.php');

    if (strlen($_SESSION['avmsaid']==0)) {
    header('location:logout.php');
    } else{
        if(isset($_POST['submit'])){

    $cvmsaid=$_SESSION['cvmsaid'];
    $visname=$_POST['visname'];
    $contactnumber=$_POST['mobilenumber'];
    $address=$_POST['address'];
    $gender=$_POST['gender'];
    $apartmentno=$_POST['apartmentno'];
    $buildingno=$_POST['buildingno'];
    $whomtomeet=$_POST['whomtomeet'];
    $reason=$_POST['reason'];

    $query=mysqli_query($con,"INSERT into tblvisitor(VisitorName, MobileNumber, Address, Gender, Apartment, BuildingNo, WhomtoMeet, Reason) value('$visname','$contactnumber','$address','$gender','$apartmentno', '$buildingno', '$whomtomeet', '$reason')");

    if ($query){
        $msg="Ziyaretçi giriş bilgileri eklendi";
    } else {
        $msg="Bir şeyler ters gitti";}
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
  <!-- Tema stili -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Temaları. Yalnızca css/skins klasöründen bir tema seçin, tümünü indirmemek için -->
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
  
    <?php $page='visitors'; include 'includes/sidebar.php'?>

  <!-- İçerik Kısmı -->
  <div class="content-wrapper">
    <!-- Sayfa Başlığı -->
    <section class="content-header">
      <h1>
        Ziyaretçi Kayıt Formu
        <!-- <small>Kontrol paneli</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Ana Sayfa</a></li>
        <li class="active">Ziyaretçi Kaydı</li>
      </ol>
    </section>

    <!-- Ana içerik -->
    <section class="content">
      <!-- Küçük kutular (istatistik kutuları) -->
      
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
                    <label>Ziyaretçinin Tam Adı</label>
                    <input type="text" class="form-control" name="visname" id="visname" required>
                  </div>
                  <!-- /.form-group -->

                  <div class="form-group">
                    <label>Ziyaretçinin Adresi</label>
                    <input type="text" class="form-control" name="address" id="address" required>
                  </div>

                  <div class="form-group">
                    <label>Apartman Numarası</label>
                        <select class="form-control select2" name="apartmentno" onChange="getBuilding(this.value);" style="width: 100%;" required>
                        <option selected="">Seçin....</option>
                        <?php $query=mysqli_query($con,"SELECT * from apartment");
                            while($row=mysqli_fetch_array($query)){?>    
                        <option value="<?php echo $row['apartment_number'];?>"><?php echo $row['apartment_number'];?></option>
                        <?php } ?> 
                        </select>
                    </div>

                    <div class="form-group">
                    <label>Kimle görüşmek istersiniz?</label>
                    <input type="text" class="form-control" name="whomtomeet" id="whomtomeet" required>
                </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                <div class="form-group">
                    <label>Ziyaretçinin İletişim Numarası</label>
                    <input type="number" class="form-control" name="mobilenumber" id="mobilenumber" required>
                </div>

                <div class="form-group">
                    <label>Cinsiyet</label>
                    <select class="form-control select2" name="gender" style="width: 100%;" required>
                      <option selected="">Seçin</option>
                      <option value="Male">Erkek</option>
                      <option value="Female">Kadın</option>
                      <option value="Others">Diğer</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Binanın Numarası</label>
                    <input type="text" class="form-control" name="buildingno" id="buildingno" readonly>
                </div>

                <div class="form-group">
                    <label>Görüşme Sebebi</label>
                    <input type="text" class="form-control" name="reason" id="reason" required>
                </div>
                  <!-- /.form-group -->
                  

                </div>
                <!-- /.col -->
              </div>

               <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <button type="submit" class="btn btn-block btn-primary btn-lg" name="submit">Ziyaretçi Bilgilerini Gönder</button>
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

  <!-- Kontrol Yan Paneli -->
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
<!-- jQuery UI ile Bootstrap tooltip çatışmasını çöz -->
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
<!-- jQuery Knob Grafiği -->
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
<!-- AdminLTE dashboard demosu (sadece demo amaçlı) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE demo amaçlı -->
<script src="dist/js/demo.js"></script>
</body>
</html>

<?php } ?>
