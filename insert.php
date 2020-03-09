<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InsertImage</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    
</head>
<body background="./fonts/ac22750f1799d985742260e6c89ecb09.jpg">
    
    <form action="insertImage.php" method="POST" id="formulario" enctype="multipart/form-data">
        <div class="form-group  d-flex justify-content-center d-flex align-items-center d-flex align-items-md-end">
            <select class="custom-select" name="tree">
                
                <option selected>Open this select menu</option>
                <?php 
                    include('conexion.php');
                    $query = mysqli_query ($conn,"SELECT id,especie FROM tree");
                    while($valores = mysqli_fetch_array($query)){
                    ?>
                        <option value="<?php echo $valores['id'] ?>"><?php echo $valores['especie'] ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <div class="form-group  d-flex justify-content-center d-flex align-items-center d-flex align-items-md-end" style="position:relative; top:70px;">
            <label class="font-weight-bold text-white">Nombre = </label>
            <input  type="text" name="name" require>
        </div>
        <br>
        <div class="form-group  d-flex justify-content-center d-flex align-items-center d-flex align-items-md-end" style="position:relative; top:110px; right:-125px;">
            <label class="font-weight-bold text-white">Image =</label>
            <input  type="file" name="image" require>
        </div>
        <br>
        <div class="form-group  d-flex justify-content-center d-flex align-items-center d-flex align-items-md-end" style="position:relative; top:140px; right:-90px;">
            <input class="btn btn-primary" type="submit" value="enviar" >
        </div>
        

    </form>

</body>
</html>