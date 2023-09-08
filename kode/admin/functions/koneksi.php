<?php
    $conn = mysqli_connect("localhost", "root", "", "register-wri");
    if (mysqli_connect_errno()) {
        echo "<script>
          alert('Gagal koneksi ke database!');
          document.location.href = 'index.php';
          </script>
          ";
    }
?>