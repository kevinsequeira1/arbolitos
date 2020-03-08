<?php

    include("conexion.php");
    

    $name= $_REQUEST['name'];
    $image= $_FILES['image']['name'];
    $archivo = $_FILES['image']['tmp_name'];
    $ruta="images";

    $ruta=$ruta."/".$name;

    move_uploaded_file($archivo,$ruta);

    $sql="insert into gallery (title,images)values('".$name."','".$ruta."')";
    $query=mysqli_query($conn,$sql);

    if($query){
        echo "Insert correct";
    }
    else{
        echo "insert incorrect";
    }

?>