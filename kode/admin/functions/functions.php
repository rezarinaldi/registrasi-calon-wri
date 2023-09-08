<?php
   
   $conn = mysqli_connect("localhost", "root", "", "register-wri");
    
    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambahAdmin($data){
         global $conn;

        $nama = $data["nama"];
        $username = stripslashes($data["username"]);
        $password = md5($data["password"]);
        $password2 = md5($data["password2"]);
        //cek username

        $cek = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");
        if (mysqli_fetch_assoc($cek)) {
            echo '<script>
                    alert("Username sudah terdaftar. Pilih username lain!");
                </script>'; 
            return false;  
        }

        // cek password
        if ($password !== $password2 ) {
            echo '<script>
                    alert("Password tidak cocok!"); 
                </script>'; 
            return false;    
        }

        //tambahkan data baru ke databases    
        mysqli_query($conn,"INSERT INTO user VALUES ('','$nama','$username','$password')");
        return mysqli_affected_rows($conn);       
    }
    
    function updateAdmin($data){
        global $conn;

        $id = $data["id"];
        $nama = $data["nama"];
        $username = stripslashes($data["username"]);
        $password = md5($data["password"]);
        $password2 = md5($data["password2"]);

        // cek password
        if ($password !== $password2 || $password2 !== $password) {
            echo '<script>
                    alert("Password tidak cocok!");
                </script>'; 
            return false;    
        }

        //tambahkan data baru ke databases    
        mysqli_query($conn,
            "UPDATE user SET 
                nama = '$nama',
                username = '$username',
                password = '$password'
            WHERE iduser = $id
            ");
        return mysqli_affected_rows($conn);    
    }

    function hapusAdmin($id){
        global $conn;
        mysqli_query($conn,"DELETE FROM user WHERE iduser = $id");
        return mysqli_affected_rows($conn);
    }

    //divisi

    function tambahDivisi($data){
        global $conn;

       $nama = $data["nama-divisi"];

       //cek divisi
       $cek = mysqli_query($conn,"SELECT * FROM divisi WHERE namadivisi = '$nama'");
       if (mysqli_fetch_assoc($cek)) {
           echo '<script>
                   alert("Divisi sudah ada!");
               </script>'; 
           return false;  
       }

       //tambahkan data baru ke databases    
       mysqli_query($conn,"INSERT INTO divisi VALUES ('','$nama')");
       return mysqli_affected_rows($conn);       
   }
   
   function updateDivisi($data){
    global $conn;

    $id = $data["id"];
    $divisi = $data["nama"];

    //tambahkan data baru ke databases    
    mysqli_query($conn,
        "UPDATE divisi SET 
            namadivisi = '$divisi'
        WHERE iddivisi = $id
        ");
    return mysqli_affected_rows($conn);    
    }

    function hapusDivisi($id){
        global $conn;
        mysqli_query($conn,"DELETE FROM divisi WHERE iddivisi = $id");
        return mysqli_affected_rows($conn);
    }
    
    function jumlahDivisi($jenis){
        global $conn;
        $jumlah = count(query("SELECT idpendaftar from pendaftar 
                 INNER JOIN divisi 
                 ON pendaftar.iddivisi = divisi.iddivisi
                 WHERE divisi.iddivisi = '$jenis' "));
        return $jumlah;         
    }
    
    function cariDivisi($keyword){
        $query = "SELECT * FROM divisi WHERE
                    namadivisi LIKE '%$keyword%'
                ";
        return query($query);        
    }
    
    function cariAdmin($keyword){
        $query = "SELECT * FROM user WHERE
                    username LIKE '%$keyword%'OR
                    nama LIKE '%$keyword%'
                ";
        return query($query); 
    }

    //pendaftar divisi
    function cekStatus($status){
        if ($status === "Dalam proses") {
            echo '<span class="badge badge-secondary">'.$status.'</span>';
        }else if ($status === "Tidak direkomendasikan") {
            echo '<span class="badge badge-danger">'.$status.'</span>';
        }else {
            echo '<span class="badge badge-success">'.$status.'</span>'; 
        }
    }

    function updateStatusRekom($data){
        global $conn;
    
        $id = $data["id"];
        //tambahkan data baru ke databases    
        mysqli_query($conn,
            "UPDATE pendaftar SET 
                status = 'Direkomendasikan'
            WHERE idpendaftar = $id
            ");
        return mysqli_affected_rows($conn);    
    }
        
    function updateStatusTidakRekom($data){
        global $conn;
    
        $id = $data["id"];
         //tambahkan data baru ke databases    
        mysqli_query($conn,
            "UPDATE pendaftar SET 
                status = 'Tidak direkomendasikan'
            WHERE idpendaftar = $id
            ");
        return mysqli_affected_rows($conn);    
   }    

   function cariPendaftar($keyword){
    $query = "SELECT * FROM pendaftar 
    LEFT JOIN divisi ON pendaftar.iddivisi = divisi.iddivisi
                WHERE divisi.iddivisi = '2' AND
                nama LIKE '%$keyword%'
            ";
    return query($query);
   }

   function cariPendaftarGame($keyword){
    $query = "SELECT * FROM pendaftar 
    LEFT JOIN divisi ON pendaftar.iddivisi = divisi.iddivisi
                WHERE divisi.iddivisi = '5' AND
                nama LIKE '%$keyword%'
            ";
    return query($query);
   }

   function cariPendaftarUI($keyword){
    $query = "SELECT * FROM pendaftar 
    LEFT JOIN divisi ON pendaftar.iddivisi = divisi.iddivisi
                WHERE divisi.iddivisi = '4' AND
                nama LIKE '%$keyword%'
            ";
    return query($query);
   }

   function cariPendaftarAndroid($keyword){
    $query = "SELECT * FROM pendaftar 
    LEFT JOIN divisi ON pendaftar.iddivisi = divisi.iddivisi
                WHERE divisi.ididivisi = '1' AND
                nama LIKE '%$keyword%'
            ";
    return query($query);
   }

   function cariPendaftarIoT($keyword){
    $query = "SELECT * FROM pendaftar 
    LEFT JOIN divisi ON pendaftar.iddivisi = divisi.iddivisi
                WHERE divisi.iddivisi = '3' AND
                nama LIKE '%$keyword%'
            ";
    return query($query);
   }


    function hapusPendaftar($id){
        global $conn;
        mysqli_query($conn,"DELETE FROM pendaftar WHERE idpendaftar = $id");
        return mysqli_affected_rows($conn);
    }




?>