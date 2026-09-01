<header class="main-header">
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- sidebar için mini logo 50x50 piksel -->
      <span class="logo-mini"><b>A</b>VM</span>
      <!-- düzenli logo ve mobil cihazlar için -->
      <span class="logo-lg"><b>Apartman</b> Ziyaretçi Yönetim Sistemi</span>
    </a>
    <!-- Header Navbar: stil header.less dosyasındaki gibi -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar açma butonu-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Gezinmeyi aç/kapat</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          
        <?php
        $adminid=$_SESSION['avmsaid'];
        $ret=mysqli_query($con,"SELECT AdminName from tbladmin where ID='$adminid'");
        $row=mysqli_fetch_array($ret);
        $name=$row['AdminName']; ?>  

          <!-- Kullanıcı Hesabı: stil dropdown.less dosyasındaki gibi -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/img-ad.jpg" class="user-image" alt="Kullanıcı Resmi">
              <span class="hidden-xs"><?php echo $name; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- Kullanıcı resmi -->
              <li class="user-header">
                <img src="dist/img/img-ad.jpg" class="img-circle" alt="Kullanıcı Resmi">

                <p>
                <?php echo $name; ?> - Web Geliştirici
                  <small>Mart 2021'den beri Üye</small>
                </p>

              </li>
              <!-- Menü Gövdesi -->
              
              <!-- Menü Altı-->
              <li class="user-footer">

                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profil</a>   
                  <a href="change-password.php" class="btn btn-default btn-flat">Şifreyi Değiştir</a>   
                </div>


                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat"><i class="fa fa-power-off" style="color:red;"></i></a>
                </div>

              </li>
            </ul>
          </li>
          <!-- Kontrol Sidebar Açma Butonu -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
</header>
