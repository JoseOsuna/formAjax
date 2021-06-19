<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Jose Osuna</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.25/datatables.min.css" />

</head>

<body>

    <div class="container">

        <div class="my-5">
            <div id="monitor">

            </div>
        </div>
        <form class="my-5" name="formComentarios" id="formComentarios">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputname">Nombre</label>
                    <input required type="text" class="form-control" id="inputname" name="name">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputlastName">Apellido</label>
                    <input required type="text" class="form-control" id="inputlastName" name="lastname">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail">Email</label>
                    <input required type="email" class="form-control" id="inputEmail" name="email">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputphone">Telefono</label>
                    <input type="text" class="form-control" id="inputphone" name="phone">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="comentario">Comentarios</label>
                    <textarea class="form-control" id="comentario" name="comentario"></textarea>
                </div>
            </div>

            <button type="submit" id="btn_enviar" class="btn btn-primary">Enviar</button>
        </form>

        <div class="my-5">
            <div id="table_data">

                <table id="data" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Comentario</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Comentario</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>

    </div>


    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- bootstrap scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


    <!-- datatable script  -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.25/datatables.min.js"></script>


    <script>
        var table_datatable;

        $(document).ready(function() {

            table_datatable = $('#data').DataTable({
                "ajax": 'src/get_data.php'
            });

            $("#formComentarios").submit(function(event) {
                event.preventDefault();

                var data = $('#formComentarios').serialize()

                console.log(data);

                $.ajax({
                    type: "POST",
                    url: 'src/insert_data.php',
                    data: $('#formComentarios').serialize(),
                    beforeSend: function() {
                        $('#btn_enviar').html("loading...");
                        $("#btn_enviar").attr("disabled", true);
                    },
                    success: function(datos) {
                        console.log(datos);

                        let html = "<div class='alert alert-success' role='alert'>" + datos + "</div>";
                        $('#monitor').html(html);
                        $("#btn_enviar").attr("disabled", false);
                        $('#btn_enviar').html("Enviar");
                        table_datatable.ajax.reload();
                        document.forms["formComentarios"].reset();
                    }
                });
            });
        });
    </script>
</body>

</html>