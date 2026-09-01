<?php
    session_start();
    error_reporting(0); // Hata raporlamayı kapat
    include('includes/dbconn.php'); // Veritabanı bağlantı dosyasını dahil et

    if (strlen($_SESSION['avmsaid'] == 0)) { // Eğer oturum açılmamışsa
        header('location:logout.php'); // Kullanıcıyı çıkış sayfasına yönlendir
    } else {
        if (isset($_POST['submit'])) { // Eğer form submit edilmişse

        $eid = $_GET['editid']; // URL'den 'editid' parametresini al
        $remark = $_POST['remark']; // Formdan gelen yorum verisini al
        $query = mysqli_query($con, "UPDATE tblvisitor SET remark='$remark' WHERE ID='$eid'"); // Yorum verisini güncelle

        // Sorgu başarılıysa, mesaj gönder
        if ($query) {
            $msg = "Ziyaretçinin Yorumları Güncellendi.";
        } else {
            $msg = "Bir hata oluştu. Lütfen tekrar deneyin"; // Hata durumunda mesaj göster
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Apartment Visitor Management System</title>
  <!-- Tarayıcının ekran genişliğine duyarlı olmasını sağlamak -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Tema stili -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skin. Bir skin seçmek yerine hepsini indirmemek için bu klasör kullanılabilir -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script>
    function getBuilding(val) {
        $.ajax({
        type: "POST",
        url: "autofill.php",
        data: 'apartmentid=' + val,
        success: function(data) {
            $('#buildingno').val(data); // Gelen veriyi 'buildingno' input'una yerleştir
        }
        });
    }
    </script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php include 'includes/header.php'?> <!-- Başlık kısmını dahil et -->
  
    <?php $page='visitor-management'; include 'includes/sidebar.php'?> <!-- Menü kısmını dahil et -->

  <!-- İçerik Kısmı -->
  <div class="content-wrapper">
    <!-- İçerik Başlığı -->
    <section class="content-header">
      <h1>
        Ziyaretçi Giriş Formu
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Ana Sayfa</a></li>
        <li class="active">Apartman Yönetimi</li>
      </ol>
    </section>

    <!-- Ana içerik -->
    <section class="content">
      
      <?php if ($msg) { echo "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-info-circle'></i> Uyarı!</h4>
                $msg
    </div>";}  ?>

      <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Lütfen aşağıdaki bilgileri doldurun</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>

          <?php
            $eid = $_GET['editid']; // URL'den 'editid' parametresini al
            $ret = mysqli_query($con, "SELECT * from tblvisitor where ID='$eid'"); // Ziyaretçi bilgilerini veritabanından al
            $cnt = 1;
            while ($row = mysqli_fetch_array($ret)) {
          ?>

            <div class="box-body">
              <div class="row">
                <form method="POST" class="">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Ziyaretçinin Adı</label>
                    <input type="text" class="form-control" name="visname" id="visname" value="<?php  echo $row['VisitorName'];?>" readonly>
                  </div>

                  <div class="form-group">
                    <label>Ziyaretçinin Adresi</label>
                    <input type="text" class="form-control" name="address" id="address" value="<?php  echo $row['Address'];?>" readonly>
                  </div>

                  <div class="form-group">
                        <label>Apartman Numarası</label>
                        <input type="text" name="apartmentno" class="form-control" value="<?php  echo $row['Apartment'];?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Kimle Görüşecek</label>
                        <input type="text" class="form-control" name="whomtomeet" id="whomtomeet" value="<?php  echo $row['WhomtoMeet'];?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Ziyaretçinin Giriş Tarihi ve Saati</label>
                        <input type="text" class="form-control" name="reason" id="reason" value="<?php  echo $row['EnterDate'];?>" readonly>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ziyaretçinin Telefon Numarası</label>
                        <input type="number" class="form-control" name="mobilenumber" id="mobilenumber" value="<?php  echo $row['MobileNumber'];?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Cinsiyet</label>
                        <input type="text" class="form-control" name="gender" value="<?php  echo $row['Gender'];?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Binanın Numarası</label>
                        <input type="text" class="form-control" name="buildingno" id="buildingno" value="<?php  echo $row['BuildingNo'];?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Neden</label>
                        <input type="text" class="form-control" name="reason" id="reason" value="<?php  echo $row['Reason'];?>" readonly>
                    </div>

                </div>

                <?php if ($row['remark'] == "") { ?>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Yorumlar (izinli)</label>
                        <textarea type="text" class="form-control" name="remark" id="remark" rows="4" required="true"></textarea>
                    </div>
                </div>

                <div class="box-footer">
                <button type="submit" class="btn btn-block btn-danger btn-lg" name="submit">Ziyaretçiyi Çıkış Yaptır</button>
                </div>
                <?php } else { ?>

                    <div class="col-md-12">
                    <div class="form-group">
                        <label>Yorumlar (izinli)</label>
                        <input type="text" class="form-control" name="remark" id="remark" readonly value="<?php echo $row['remark'];?>">
                    </div>
                </div>

                <?php } } ?>
              </div>
            </div>
          </div>
          </form>
      </div>

    </section>
  </div>
  
  <?php include 'includes/footer.php'?>

  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <div class="tab-content">
      <div class="tab-pane" id="control-sidebar-home-tab">
      </div>
    </div>
  </aside>

  <div class="control-sidebar-bg"></div>
</div>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/demo.js"></script>
</body>
</html>

<?php } ?>
