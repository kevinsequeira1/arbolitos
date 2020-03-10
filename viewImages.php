<?php include('conexion.php'); ?>

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
<form action="viewImages.php" method="POST" id="formulario" enctype="multipart/form-data">
        <select class="custom-select" name="tree" >
                        
                        <option selected>Select one Specie</option>
                        <?php 
                            
                            $query = mysqli_query ($conn,"SELECT id,especie FROM tree");
                            while($valores = mysqli_fetch_array($query)){
                            ?>
                                <option value="<?php echo $valores['id'] ?>"><?php echo $valores['especie'] ?></option>
                        <?php
                            }

                            
                        ?>
                    </select>
                    <button type="submit" href="viewImages">Search</button>
                    </form>
                    <center>
        <table border="2" class="table">
            <thead>

                <tr>
                    <th scope="col" class="font-weight-bold text-primary">id</th>
                    <th scope="col" class="font-weight-bold text-primary">title</th>
                    <th scope="col" class="font-weight-bold text-primary">images</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include('conexion.php');
                    error_reporting(0);
                    $tree= $_REQUEST['tree'];
                    $query = "select * from gallery where id_tree='$tree' ";
                    $resultado =mysqli_query($conn,$query);
                    
                    while($row = mysqli_fetch_array($resultado)){

                    ?>
                        <tr>
                            <td scope="row"><?php echo $row['id'];?></td>
                            <td scope="row"><?php echo $row['title'];?></td>
                            <td scope="row">
                                <div>

                                    <?php 
                                    
                                        print "<img src=".$row['images']." heigth='200px' width='150px'>";

                                    ?>
                                </div>
                            
                            
                            </td>


                        </tr>
                    <?php
                    }
                    ?>
            
            </tbody>
        
        
        </table>
    </center>
    
</body>
</html>
