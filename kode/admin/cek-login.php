<?php
session_start();
include "functions/koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($conn, "Select * from user where username = '$username' AND password = '$password'");
$data = mysqli_fetch_array($query);
$jml = mysqli_num_rows($query);
?>
<?php if ($jml > 0) :
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['nama'] = $data['nama'];
    header('location: dashboard.php');
    ?>
<?php else : ?>
    <script>
        alert('Username atau password salah!');
        document.location.href = 'index.php';
    </script>
<?php endif ?>