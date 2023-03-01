<?php
require '../controller/koneksi.php';
if(function_exists($_GET['function'])){
    $_GET['function']();
}

function get_user(){
    global $koneksi;
    $query = $koneksi->query("SELECT * FROM tuser");  //PHP versi 6
    //$query = mysqli_query($koneksi, "SELECT * FROM"); //PHP versi dibawah 5
    while($row=mysqli_fetch_object($query)){
        $data[] = $row;
    };
    $respons = array(
        'status'=>1,
        'message'=>'Success',
        'data'=>$data
    );
    header('Content-Type:application/json');
    echo json_encode($respons);
}
function add_user(){
    global $koneksi;
    $check = array('namalengkap'=>'', 'username'=>'');
    $match = count(array_intersect_key($_POST, $check));
    if($match == count($check)){
        $result = mysqli_query($koneksi, "INSERT INTO tuser SET 
        namalengkap='$_POST[namalengkap]',
        username='$_POST[username]'");
        if($result){
            $respons=array(
                'status'=>1,
                'message'=>'Insert Success'
            );
            //header('location: view_kategoribuku.php');
        }else{
            $respons=array(
                'status'=>0,
                'message'=>'Insert Failed'
            );
        }
    }else{
        $respons=array(
            'status'=>0,
            'message'=>'Wrong Parameter'
        );
    }
    header('Content-Type:application/json');
    echo json_encode($respons);
}