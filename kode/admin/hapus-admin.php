<?php 
require 'functions/functions.php';

$id = $_GET["id"];
if (hapusAdmin($id)>0) {
    echo '<script>
            alert("Data berhasil dihapus!");
            document.location.href = "daftar-admin.php";
        </script>'; 
}
?>