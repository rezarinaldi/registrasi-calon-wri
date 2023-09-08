<?php 
    require 'src/functions/functions.php';
    $iddivisi;
    $hardskilljoss="";
    $softskilljoss="";
    $status = "Dalam proses";

        $nim = $_POST["nim"];
        $nama = $_POST["nama"];
        $nowa = $_POST["nowa"];
        $programstudi = $_POST["programstudi"];
        $kelas = $_POST["kelas"];
        $asalsekolah = $_POST["asalsekolah"];
        $halperoleh = $_POST["halperoleh"];
        $kontribusi = $_POST["kontribusi"];
        $karya =$_POST["karya"];
        $sosmed = $_POST["sosmed"];
        $namadivisi = $_POST["namadivisi"];

    //NAMADIVISI KONVERT
    switch ($namadivisi) {
        case 'Android Engineering':
            $iddivisi = 1;
            break;
        case 'Web Development':
            $iddivisi = 2;
            break;
        case 'IoT Development':
            $iddivisi = 3;
        break;
        case 'UI/UX Designer':
            $iddivisi = 4;
        break;
        case 'Game Development':
            $iddivisi = 5;
        break;
    }

    //cek isi hardskill
    if (isset($_POST["hardskill"])) {
        $hardskill = $_POST["hardskill"];
        $val = "";
        foreach ($hardskill as $key) {
            $hardskilljoss .= $key.", ";
        }        
    }else{
        
    }
    
    //cek softskill
    if (isset($_POST["softskill"])) {
        $softskill = $_POST["softskill"];
        foreach ($softskill as $key) {
            $softskilljoss .= $key.", ";
        }        
    }else{
        
    }
  
    
    mysqli_query($conn,"INSERT INTO pendaftar VALUES 
       ('','$nim','$nama','$nowa','$programstudi','$kelas',
            '$asalsekolah','$halperoleh','$kontribusi',
            '$hardskilljoss','$softskilljoss','$karya','$sosmed',
            '$status','$iddivisi')
       ");

    if (mysqli_affected_rows($conn)>0) {
        echo '<script>
                alert("Data berhasil terkirim. Silahkan tunggu informasi selanjutnya via wa");
                document.location.href = "index.html";
            </script>'; 
        }else{
            echo '<script>
                    alert("Data gagal update!");
                    document.location.href = "index.html";
            </script>';
    }













?>