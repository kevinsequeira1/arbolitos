<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images</title>
</head>
<body>
    <center>
        <table border="2">
            <thead>

                <tr>id</tr>
                <tr>title</tr>
                <tr>imagen</tr>

            </thead>
            <tbody>
            
                <?php
                    include('./drop/db.php');
                    $query = "select * from gallery";
                    $resultado =mysqli_query($mysqli,$query);
                    
                    while($row = mysqli_fetch_array($resultado)){

                    ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['title'];?></td>
                            <td><?php echo '<img src="'.$row['images'].'">';?></td>


                        </tr>
                    <?php
                    }
                    ?>
            
            </tbody>
        
        
        </table>
    </center>
    
</body>
</html>
