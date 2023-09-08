<?php 
require 'functions/functions.php';

$id = $_GET["id"];
if (hapusPendaftar($id)>0) {
    echo '<script>
            alert("Data berhasil dihapus!");
            document.location.href = "daftar-calon-web.php";
        </script>'; 
}
?>