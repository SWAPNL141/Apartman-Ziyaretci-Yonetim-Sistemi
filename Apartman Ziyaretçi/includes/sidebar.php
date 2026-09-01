<?php
  $adminid=$_SESSION['avmsaid'];
  $ret=mysqli_query($con,"SELECT AdminName from tbladmin where ID='$adminid'");
  $row=mysqli_fetch_array($ret);
  $name=$row['AdminName']; ?>
 
 
 <!-- Sol taraf sütunu. Logo ve sidebar'ı içerir -->
 <aside class="main-sidebar">
    <!-- sidebar: stil sidebar.less dosyasındaki gibi -->
    <section class="sidebar">
      <!-- Sidebar kullanıcı paneli -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/img-ad.jpg" class="img-circle" alt="Kullanıcı Resmi">
        </div>
        <div class="pull-left info">
          <p><?php echo $name; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Çevrimiçi</a>
        </div>
      </div>
      <!-- arama formu -->
      <form action="search-result.php" method="POST" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="searchdata" id="searchdata" class="form-control" placeholder="İletişim veya İsim Girin....">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.arama formu -->
      <!-- sidebar menüsü: stil sidebar.less dosyasındaki gibi -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">ANA MENÜ</li>

        <li class="<?php if($page=='dashboard') { echo 'active'; }?>">
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Gösterge Paneli</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>


        <li class="<?php if($page=='apartment') { echo 'active'; }?>">
          <a href="manage-apartment.php">
            <i class="fa fa-building-o"></i> <span>Apartman Yönetimi</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>


        <li class="<?php if($page=='visitors') { echo 'active'; }?>">
          <a href="visitor-entry.php">
            <i class="fa fa-plus"></i> <span>Ziyaretçi Girişi</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"><?php include './counters/todays-visitor-count.php'?></small>
            </span>
          </a>
        </li>

        <li class="<?php if($page=='checkout_visitors') { echo 'active'; }?>">
          <a href="checkout_visitor.php">
            <i class="fa fa-sign-out"></i> <span>Ziyaretçi Çıkışı</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"><?php include './counters/checkout-visitor.php'?></small>
            </span>
          </a>
        </li>


        <li class="<?php if($page=='visitor-management') { echo 'active'; }?>">
          <a href="visitor-mgmt.php">
            <i class="fa fa-address-card"></i> <span>Ziyaretçi Yönetimi</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li class="<?php if($page=='reports') { echo 'active'; }?>">
          <a href="report.php">
            <i class="fa fa-file-pdf-o"></i> <span>Raporlar</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
