<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <div class="container">
    <div class="my-5">
      <div class="card">
        <?php

        if (isset($_POST['submit'])) {
          $resultado = [
            'error' => false,
            'mensaje' => 'El articulos ' . $_POST['nombre'] . ' ha sido agregado con éxito'
          ];
          $config = include '../config/database.php';

          try {
            $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
            $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

            $articulo = array(
              "nombre"   => $_POST['nombre'],
              "categoria" => $_POST['categoria'],
              "likes"    => $_POST['likes'],
              "autor"     => $_POST['autor'],
            );

            $consultaSQL = "INSERT INTO articulos (nombre, categoria, likes, autor)";
            $consultaSQL .= "values (:" . implode(", :", array_keys($articulo)) . ")";

            $sentencia = $conexion->prepare($consultaSQL);
            $sentencia->execute($articulo);
          } catch (PDOException $error) {
            $resultado['error'] = true;
            $resultado['mensaje'] = $error->getMessage();
          }
        }
        ?>
        <?php
        if (isset($resultado)) {
        ?>
          <div class="mx-3 my-3 alert alert-<?= $resultado['error'] ? 'danger' : 'success' ?>" role="alert">
            <?= $resultado['mensaje'] ?>
          </div>
        <?php
        }
        ?>
        <div class="card-body">
          <h2 class="card-title">Crea un articulo</h2>
          <hr>

          <form class="row g-3 my-3" method="post">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label" for="nombre">Nombre</label>
              <div class="col-sm-10">
                <input type="text" name="nombre" id="nombre" class="form-control">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label" for="autor">Autor</label>
              <div class="col-sm-10">
                <input type="text" name="autor" id="autor" class="form-control">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label" for="categoria">Categoria</label>
              <div class="col-sm-10">
                <input type="categoria" name="categoria" id="categoria" class="form-control">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label" for="likes">Likes</label>
              <div class="col-sm-10">
                <input type="number" name="likes" id="likes" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class=" text-end">
                <input type="submit" name="submit" value="Enviar" class="btn btn-lg btn-primary mb-3">
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>