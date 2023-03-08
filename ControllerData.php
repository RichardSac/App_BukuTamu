<?php
require 'koneksi.php';
require 'ControllerUser.php';
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
?>