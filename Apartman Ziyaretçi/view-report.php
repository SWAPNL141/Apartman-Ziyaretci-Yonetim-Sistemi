<?php
  session_start();
  error_reporting(0);
  include('includes/dbconn.php');

  if (strlen($_SESSION['avmsaid']==0)) {
    header('location:logout.php');
    } else {
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Daire Ziyaretçi Yönetim Sistemi</title>
  <!-- Tarayıcıya ekran genişliğine göre duyarlı olmasını söyleyin -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Tema stili -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Temaları. Yükü azaltmak için css/skins klasöründen bir tema seçin -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php include 'includes/header.php'?>
  
    <?php $page='reports'; include 'includes/sidebar.php'?>

  <!-- İçerik Kapsayıcısı. Sayfa içeriğini içerir -->
  <div class="content-wrapper">
    <!-- İçerik Başlığı (Sayfa başlığı) -->
    <section class="content-header">
      <h1>
        Ziyaretçi Raporu
        <!-- <small>Kontrol paneli</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
        <li class="active">Rapor Oluştur</li>
      </ol>
    </section>

    <!-- Ana içerik -->
    <section class="content">
     
    <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">

            <?php
            $fdate=$_POST['fromdate'];
            $tdate=$_POST['todate'];?> 

              <h3 class="box-title">İstenen Ziyaretçi Raporu Görüntüleniyor <b><i><?php echo $fdate?> ile <?php echo $tdate?></i></b> </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Ziyaretçi Adı</th>
                  <th>İletişim</th>
                  <th>Cinsiyet</th>
                  <th>Binadan</th>
                  <th>Daire</th>
                  <th>Ziyaret Edilecek</th>
                  <th>Giriş Zamanı</th>
                  <th></th>
                </tr>
                </thead>
                <?php
                $ret=mysqli_query($con,"SELECT * from tblvisitor where date(EnterDate) between '$fdate' and '$tdate'");
                $cnt=1;
                while ($row=mysqli_fetch_array($ret)) {

                ?>
                <tbody>
                <tr>
                  <td><?php echo $cnt;?></td>

                  <td><?php  echo $row['VisitorName'];?></td>
            
                  <td><?php  echo $row['MobileNumber'];?></td>

                  <td><?php  echo $row['Gender'];?></td>

                  <td><?php  echo $row['BuildingNo'];?></td>

                  <td><?php  echo $row['Apartment'];?></td>

                  <td><?php  echo $row['WhomtoMeet'];?></td>

                  <td><?php  echo $row['EnterDate'];?></td>

                  <td><a href="action-visitor.php?editid=<?php echo $row['ID'];?>" title="Tam Detayları Görüntüle"><i class="fa fa-eye" style="color:green;"></i></a></td>
                
                </tr>
                <?php 
                $cnt=$cnt+1;
                }?>
            
                </tbody>
              
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include 'includes/footer.php'?>

  <!-- Kontrol Paneli -->
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
<!-- jQuery UI ile Bootstrap tooltip çakışmasını çöz -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

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
<!-- tarih seçici -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE Uygulaması -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE pano demosu (Sadece demo amaçlı) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE demo amaçlı -->
<script src="dist/js/demo.js"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

</body>
</html>

<?php } ?>
