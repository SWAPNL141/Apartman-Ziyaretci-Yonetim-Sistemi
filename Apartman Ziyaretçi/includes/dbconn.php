<?php
    $con=mysqli_connect("localhost", "root", "", "apartment-visitor-nb");
    if(mysqli_connect_errno()){
        echo "DB Bağlantı başarısız.".mysqli_connect_error();
    }
  ?>