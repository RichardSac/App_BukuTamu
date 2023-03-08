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
    $check = array('fullname'=>'', 'username'=>'','password'=>'','status_user'=>'','role'=>'');
    $match = count(array_intersect_key($_POST, $check));
    if($match == count($check)){
        $result = mysqli_query($koneksi, "INSERT INTO tuser SET 
        fullname='$_POST[fullname]',
        username='$_POST[username]',
        password='$_POST[password]',
        status_user='$_POST[status_user]',
        role='$_POST[role]'");
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

function update_users(){
    global $koneksi;
    if(!empty($_GET["id"])){
        $id = $_GET["id"];
    }
    $query = $koneksi->query("SELECT*FROM tuser ");
    $check = array('fullname'=>'', 'username'=>'','password'=>'','status'=>'','role'=>'');
    $match = count(array_intersect_key($_POST, $check));
    if($match == count($check)){
        $result = mysqli_query($koneksi, "UPDATE tuser SET 
        fullname='$_POST[fullname]',
        username='$_POST[username]',
        password='$_POST[password]',
        status='$_POST[status]',
        role='$_POST[role]'
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

function delete_users(){
    global $koneksi;
    $id = $_GET['id'];
    $query = "DELETE FROM tuser WHERE id=".$id;
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