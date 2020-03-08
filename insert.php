<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InsertImage</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script>

        $(function(){ 

            $("input[name='file']").on($("change", function(){

                var formData = new FormData($("#  formulario")[0]);
                var ruta = "insertImage.php";
                $.ajax({
                    url: ruta,
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: functiom(datos)
                    {
                        $("#respuesta").html(datos);

                    }
                });
            });

        });

    </script>
</head>
<body>
    
        <form method="POST" id="formulario" enctype="multipart/form-data">

            Subir imagen: <input type="file" name="file">

        </form>
        <div id="respuesta">

        </div>
</body>
</html>