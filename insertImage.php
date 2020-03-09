<?php

    include("conexion.php");
    

    $name= $_REQUEST['name'];
    $id_tre= $_REQUEST['tree'];
    $image= $_FILES['image']['name'];
    $archivo = $_FILES['image']['tmp_name'];
    $ruta="images";

    $ruta=$ruta."/".$name;

    move_uploaded_file($archivo,$ruta);

    $sql="insert into gallery (title,images,id_tree)values('".$name."','".$ruta."','".$id_tre."')";
    $query=mysqli_query($conn,$sql);

    if($query){
        echo "Insert correct";
        echo "<br><a class='text-primary' href='./insert.php' >ok</a>";
        
    }
    else{
        echo "insert incorrect";
    }

?>