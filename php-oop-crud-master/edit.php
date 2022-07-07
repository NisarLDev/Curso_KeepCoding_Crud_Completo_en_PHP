<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>PHP OOP CRUD TUTORIAL</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <h1 class="text-center">PHP OOP CRUD TUTORIAL - EDIT usuario</h1>
          <hr style="height: 1px;color: black;background-color: black;">
        </div>
      </div>
      <div class="row">
        <div class="col-md-5 mx-auto">
          <?php

              include 'model.php';
              $model = new Model();
              $id = $_REQUEST['id'];
              $row = $model->edit($id);

              if (isset($_POST['update'])) {
                if (isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['email']) && isset($_POST['telefono']) && isset($_POST['contraseña'])) {
                  if (!empty($_POST['nombre']) && isset($_POST['apellidos']) && !empty($_POST['email']) && !empty($_POST['telefono']) && !empty($_POST['contraseña']) ) {
                    
                    $data['id'] = $id;
                    $data['nombre'] = $_POST['nombre'];
                    $data['apellidos'] = $_POST['apellidos'];
                    $data['telefono'] = $_POST['telefono'];
                    $data['email'] = $_POST['email'];
                    $data['contraseña'] = $_POST['contraseña'];

                    $update = $model->update($data);

                    if($update){
                      echo "<script>alert('usuario actualización exitosa');</script>";
                      echo "<script>window.location.href = 'usuarios.php';</script>";
                    }else{
                      echo "<script>alert('usuario actualización fallida');</script>";
                      echo "<script>window.location.href = 'usuarios.php';</script>";
                    }

                  }else{
                    echo "<script>alert('empty');</script>";
                    header("Location: edit.php?id=$id");
                  }
                }
              }

          ?>
          <form action="" method="post">
            <div class="form-group">
              <label for="">Nombres</label>
              <input type="text" name="nombres" value="<?php echo $row['nombres']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Apellidos</label>
              <input type="text" name="apellidos" value="<?php echo $row['apellidos']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Telefono</label>
              <input type="text" name="telefono" value="<?php echo $row['telefono']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Contraseña</label>
              <input type="text" name="contraseña" value="<?php echo $row['contraseña']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <button type="submit" name="update" class="btn btn-primary">Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js" integrity="sha512-8cU710tp3iH9RniUh6fq5zJsGnjLzOWLWdZqBMLtqaoZUA6AWIE34lwMB3ipUNiTBP5jEZKY95SfbNnQ8cCKvA==" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>