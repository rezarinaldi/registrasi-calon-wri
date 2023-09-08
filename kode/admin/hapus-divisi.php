<?php 
require 'functions/functions.php';

$id = $_GET["id"];
if (hapusDivisi($id)>0) {
    echo '<script>
            alert("Data berhasil dihapus!");
            document.location.href = "daftar-divisi.php";
        </script>'; 
}
?>