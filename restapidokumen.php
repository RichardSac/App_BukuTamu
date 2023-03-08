<?php
require '../controller/koneksi.php';
if(function_exists($_GET['function'])){
    $_GET['function']();
}

function get_dokumen(){
    global $koneksi;
    $query = $koneksi->query("SELECT * FROM tdokumen");
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

function add_dokumen(){
    global $koneksi;
    $check = array('id'=>'', 'idtamu_buku'=>'','namafile'=>'','status_user'=>'');
    $match = count(array_intersect_key($_POST, $check));
    if($match == count($check)){
        $result = mysqli_query($koneksi, "INSERT INTO tdokumen SET 
        iddokumen='$_POST[iddokumen]',
        idbukutamu='$_POST[idbukutamu]',
        namafile='$_POST[namafile]',
        status_user='$_POST[status_user]'");
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

function update_dokumen(){
    global $koneksi;
    if(!empty($_GET["id"])){
        $id= $_GET["id"];
    }
    $query = $koneksi->query("SELECT*FROM tdokumen");
    $check = array('id'=>'','idbuku_tamu'=>'','namafile'=>'','status_user'=>'');
    $match = count(array_intersect_key($_POST, $check));
    if($match == count($check)){
        $result = mysqli_query($koneksi, "UPDATE tdokumen SET 
         id='$_POST[id]',
        idbuku_tamu='$_POST[idbuku_tamu]',
        namafile='$_POST[namafile]',
        status_user='$_POST[status_user]
        WHERE id=$id");
        if($result){
            $respons=array(
                'status'=>1,
                'message'=>'Update Success',
            );
        }else{
            $respons=array(
                'status'=>0,
                'message'=>'Update Failed'
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

function delete_dokumen(){
    global $koneksi;
    $id = $_GET['id'];
    $query = "DELETE FROM tdokumen WHERE id =".$id;
    if(mysqli_query($koneksi,$query)){
        $respons=array(
            'status'=>1,
            'message'=>'Delete Success'
        );
    }else{
        $respons=array(
            'status'=>0,
            'message'=>'Delete Failed'
        );
    }
    header('Content-Type:application/json');
    echo json_encode($respons);
}

?>