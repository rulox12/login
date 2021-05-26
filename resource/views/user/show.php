<!DOCTYPE html>
<html lang="es">
<head>
    <title>Zinobe</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


</head>
<body>
<div class="container h-100">
    <?php if(isset($message)) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Error ! </strong> <?php echo $message ?>.
        </div>
    <?php } ?>
    <div class="card">
        <h5 class="card-header">Usuario</h5>
        <div class="card-body">
            <?php if (is_a($user, \App\Models\User::class)) { ?>
                <h5 class="card-title">Nombre: <?php echo $user->name ?></h5>
                <ul class="list-group">
                    <li class="list-group-item">Correo: <?php echo $user->email ?></li>
                    <li class="list-group-item">Documento: <?php echo $user->document ?></li>
                    <li class="list-group-item">Pais: <?php echo $user->country ?></li>
                </ul>
            <?php } ?>
            <?php if (is_array($user) && !is_a($user, \App\Models\User::class)) { ?>
                <h5 class="card-title">Nombre: <?php echo $user['primer_nombre'] ?></h5>
                <ul class="list-group">
                    <li class="list-group-item">Correo: <?php echo $user['correo'] . $user['apellido'] ?></li>
                    <li class="list-group-item">Documento: <?php echo $user['cedula'] ?></li>
                    <li class="list-group-item">Pais: <?php echo $user['pais'] ?></li>
                    <li class="list-group-item">Telefono: <?php echo $user['telefono'] ?></li>
                    <li class="list-group-item">Pais: <?php echo $user['pais'] ?></li>
                    <li class="list-group-item">Departamento: <?php echo $user['departamento'] ?></li>
                    <li class="list-group-item">Fecha de nacimiento: <?php echo $user['fecha_nacimiento'] ?></li>
                </ul>
            <?php } ?>
            <a href="users" class="btn btn-primary my-2">Regresar</a>
        </div>
    </div>
</div>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(".alert").delay(3000).slideUp(200, function() {
        $(this).alert('close');
    });
</script>
</body>
</html>
