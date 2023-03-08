<?php
require 'koneksi.php';
require 'ControllerUser.php';
// Created
if (isset($_POST['simpan'])){
    $notulen = $_POST['notulen'];
    $notulensi = $_POST['notulensi'];
    $file = $_POST['file'];
    $eksetensi_diperbolehkan = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG');
    $namafile = $_FILES['file']['name'];
    $x = explode('.', $namafile);
    $eksetensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $file_temp = $_FILES['file']['tmp_name'];
    $generatename = uniqid(); 
    $namafile = $generatename;
    $namafile = $generatename.".".$eksetensi;

    // if (in_array($eksetensi, $eksetensi_diperbolehkan) === true){
    //     if($ukuran < 200000){
    //     move_uploaded_file($file_temp, 'file/'. $namafile);
    //     $insert = mysqli_query($koneksi, "INSERT INTO tagenda (notulen,notulensi,file) 
    //     VALUES ('$notulen','$notulensi','$namafile') ");
    //     }else{
    //      echo "<script>alert('Ukuran File Lebih Dari 2 MB')</script>";
    //     }
    //  }else {
    //       echo "<script>alert('Ekstensi File Tidak Diperbolehkan (PNG, JPG)')</script>";
    //  }


    $insert = mysqli_query($koneksi, "INSERT INTO tagenda (notulen,notulensi,file) 
    VALUES ('$notulen','$notulensi','$file') ");
        if($insert){
            echo "<script type='text/javascript'>
             document.location='../agenda.php'</script>";
           }else{
               //header('Location: kategori_buku.php');   
           }
}

//Read
function tampildata($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows=[];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

// Update
if (isset($_POST['ubah'])){
    $id = $_POST['id'];
    $notulen = $_POST['notulen'];
    $notulensi = $_POST['notulensi'];
    $waktu = date('Y-m-d  H:i:s');
    $status_user =  $_POST['status_user'];
    $update = mysqli_query($koneksi, "UPDATE tagenda 
    SET notulen='$notulen', notulensi='$notulensi', update_at='$waktu',status_user='$status_user' WHERE id='$id'");
            if($update){
                $_SESSION["ubah"] = 'Data Berhasil DiUpdate';
               }else{
                  // header('Location: kategori_buku.php');   
               }
}

//Delete Temporary
if (isset($_POST['hapus'])){
    $id = $_POST['id'];
    $status_user = '0';
    $waktu = date('Y-m-d  H:i:s');
    $delete = mysqli_query($koneksi, "DELETE FROM tagenda WHERE
    id='$id'");
}

//Delete Permanentn
if (isset($_POST['hapuspermanent'])){
    $id = $_POST['id'];
    $delete = mysqli_query($koneksi, "DELETE FROM tagenda WHERE
    id='$id'");
    if($delete){
        $_SESSION["hapus"] = 'Data Berhasil DiHapus';
       }else{
           //header('Location: kategori_buku.php');   
        }
    }

?>