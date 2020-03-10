<?php include('conexion.php'); ?>


<?php

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    
</head>
<body background="./fonts/ac22750f1799d985742260e6c89ecb09.jpg">
<form action="sendEdit.php" method="POST" id="formulario" enctype="multipart/form-data">

                    <center>
        <table border="2" class="table">
            <thead>

                <tr>
                    <th scope="col" class="font-weight-bold text-primary">id</th>
                    <th scope="col" class="font-weight-bold text-primary">title</th>
                    <th scope="col" class="font-weight-bold text-primary">id_tree</th>
                    <th scope="col" class="font-weight-bold text-primary">images</th>
                    <th scope="col" class="font-weight-bold text-primary">Edit</th>
                    <th scope="col" class="font-weight-bold text-primary">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include('conexion.php');
                    error_reporting(0);
                    $query = "select * from gallery";
                    $resultado =mysqli_query($conn,$query);
                    
                    while($row = mysqli_fetch_array($resultado)){

                    ?>
                        <tr>
                            <td scope="row"><?php echo $row['id'];?></td>
                            <td scope="row"><?php echo $row['title'];?></td>
                            <td scope="row"><?php echo $row['id_tree'];?></td>
                            <td scope="row">
                                <div>

                                    <?php 
                                    
                                        print "<img src=".$row['images']." heigth='200px' width='150px'>";

                                    ?>
                                </div>
                            
                            
                            </td>

                            <td scope="row">
                                <a class="btn btn-primary"  href="edit.php?edit=<?php echo $row['id']; ?>">Edit</a>
                            </td>
                            <td scope="row">
                                <a class="btn btn-primary" href="sendEdit.php?delete=<?php echo $row['id']; ?>" >Delete</a>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>
            
            </tbody>
        
        
        </table>
    </center>

    <form action="sendEdit.php" method="POST" enctype="multipart/form-data">
    <div class="form-group  d-flex justify-content-center d-flex align-items-center d-flex align-items-md-end">
            <select class="custom-select" name="tree">
                
                <option selected>Open this select menu</option>

                <option value="<?php echo $id_tree; ?>"><?php echo $id_tree; ?></option>

            </select>
        </div>
        <div class="form-group  d-flex justify-content-center d-flex align-items-center d-flex align-items-md-end" style="position:relative; top:70px;">
            <label class="font-weight-bold text-white">Nombre = </label>
            <input  type="text" name="name" value="<?php echo $name; ?>" require>
        </div>
        <br>
        <div class="form-group  d-flex justify-content-center d-flex align-items-center d-flex align-items-md-end" style="position:relative; top:110px; right:-125px;">
            <label class="font-weight-bold text-white">Image =</label>
            <input  type="file" name="image" value="<?php echo $ruta; ?>" require>
        </div>
        <br>
        

    </form>
</body>
</html>