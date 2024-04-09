<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calculadora Notas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;1,700&family=Kanit:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="assets/icon.png" rel="icon" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jszip@3.1.3/dist/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script>
</head>
<style>
    .title {
        font-family: 'Kanit', sans-serif;
    }

    .card {
        margin-top: 5vh;
    }

    /* Estilos para los botones de DataTables */
    .dt-buttons .buttons-excel,
    .dt-buttons .buttons-pdf,
    .dt-buttons .buttons-print {
        background-color: #CBD5E1;
        /* Cambia el color de fondo */
        color: black;
        /* Cambia el color del texto */
        border: 1px solid #4CAF50;
        /* Añade un borde */
        border-radius: 5px;
        /* Añade esquinas redondeadas */
        margin-right: 5px;
        /* Agrega un espacio entre los botones */
        cursor: pointer;
        /* Cambia el cursor al pasar el ratón sobre los botones */
    }

    /* Estilos para el texto dentro de los botones */
    .dt-buttons .buttons-excel span,
    .dt-buttons .buttons-pdf span,
    .dt-buttons .buttons-print span {
        padding: 5px 10px;
        /* Ajusta el relleno del texto dentro de los botones */

    }
</style>

<body style="background-image:url('assets/background.png');background-attachment: fixed;" cz-shortcut-listen="true">

    <div class="container">
        <div class="card" style="box-shadow: 2px 2px 2px gray;">
            <div class="card-body">
                <center>
                    <h2 class="title">Bienvenido a tu Calculadora Personal </h2> <br>
                </center>
                <h5 class="title"><b>Instructivo:</b> Esta calculadora te ayudará a calcular el promedio de tus notas. Simplemente llena los 3 espacios con tus respectivas notas y el sistema te proporcionará tu promedio automáticamente.</h5>
                <h5 class="title">
                    <b>Notas:</b>
                    <br>
                    a) No ingreses números o caracteres especiales en el campo de Nombre.
                    <br>
                    b) Las notas deben estar comprendidas entre 1.0 y 5.0.
                    <br>
                    c) Todos los campos son obligatorios.
                </h5>
                <center><button class="btn btn-warning btn-sm title" data-bs-toggle="modal" data-bs-target="#InsertNuevo">Empezar Calculo</button></center>

                <br>
                <hr>
                <h5 class="title">Tus Notas</h5>
                <div class="tbPrin" id="tbPrin"></div>
                <h5 class="title">
                    Diego Alexander Arenas Mosquera <br>
                    diegoaarenas06@gmail.com
                </h5>
            </div>
        </div>

    </div>
    <!-- Modal Insert-->
    <div class="modal fade" id="InsertNuevo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Calcula tu nota Promedio</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4  col-md-12 col-sm-12">
                            <label for="nombre" class="form-label title">Nombres:</label>
                        </div>
                        <div class="col-lg-8  col-md-12 col-sm-12">
                            <input type="text" class="form-control form-control-sm" name="nombre" id="nombre">
                        </div>
                        <div class="col-lg-4  col-md-12 col-sm-12">
                            <label for="Parcial1" class="form-label title">Parcial 1:</label>
                        </div>
                        <div class="col-lg-8  col-md-12 col-sm-12">
                            <input type="number" class="form-control form-control-sm" name="Parcial1" id="Parcial1">
                        </div>
                        <div class="col-lg-4  col-md-12 col-sm-12">
                            <label for="Parcial2" class="form-label title">Parcial 2:</label>
                        </div>
                        <div class="col-lg-8  col-md-12 col-sm-12">
                            <input type="number" class="form-control form-control-sm" name="Parcial2" id="Parcial2">
                        </div>
                        <div class="col-lg-4  col-md-12 col-sm-12">
                            <label for="Parcial3" class="form-label title">Parcial 3:</label>
                        </div>
                        <div class="col-lg-8  col-md-12 col-sm-12">
                            <input type="number" class="form-control form-control-sm" name="Parcial3" id="Parcial3">
                        </div>
                        <div class="d-flex justify-content-between" style="margin-top: 10px;">
                            <div><button class="btn btn-warning btn-sm" id="Calcular" onclick="Validar()">Calcular</button></div>
                            <div>
                                <h6 style="margin-top: 10px;" class="title">Tu nota es : <span id="NotaFinal"></span></h6>
                            </div>

                        </div>
                    </div>
                    <br>
                    <center>
                        <button class="btn btn-warning btn-sm title" onclick="InsertData()">Registrar</button>
                    </center>
                </div>

            </div>
        </div>
    </div>
</body>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>

<script>
    $(document).ready(function() {
        $('input[type="number"]').on('input', function() {
            var valor = parseFloat($(this).val());
            if (isNaN(valor) || valor < 1.0 || valor > 5.0) {
                $(this).val('');
                alert('El valor debe ser un número válido entre 1.0 y 5.0');
            }
        });
    });
</script>

</html>