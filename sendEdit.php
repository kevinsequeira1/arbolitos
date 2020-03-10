<?php

    include("conexion.php");
    
    session_start();

    $name = '';
    $id_tree = 0;
    $ruta =''; 
    $update

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $mysqli=mysqli_query($conn,"DELETE FROM gallery where id='$id' ");

        $_SESSION['message'] = "Record has been delete!";
        $_SESSION['msg_type'] = "danger";

        header("location:edit.php");
        
    }





    if(isset($_GET['edit'])){

        $id = $_GET['edit'];
        $result=mysqli_query($conn,"SELECT * FROM gallery where id='".$id."' ");

        if(count($result)==1){
            $row = $result->fetch_array();
            $name =$row['title'];
            $id_tree = $row['id_tree'];
            $image= $_FILES['image']['name'];
            $archivo = $_FILES['image']['tmp_name'];
            $ruta="images";
        
            $ruta=$ruta."/".$name;
        
            move_uploaded_file($archivo,$ruta);
            $ruta = $row['images'];
        }

        //$_SESSION['message'] = "Record has been delete!";
        //$_SESSION['msg_type'] = "danger";

        header("location:edit.php");
        
    }

?>



 
    