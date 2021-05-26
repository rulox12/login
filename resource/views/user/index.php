<!DOCTYPE html>
<html>

<head>
    <title>Zinobe</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div>
    <header class="mb-auto">
        <?php if(isset($message)) { ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Error ! </strong> <?php echo $message ?>.
            </div>
        <?php } ?>
        <nav class="navbar navbar-light bg-light">
            <form class="form-inline" method="POST" action='search'>
                <input class="form-control mr-sm-2" id="search" name="search" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
            <a class="btn btn-outline-danger my-2 my-sm-0" href="logout">Salir</a>
        </nav>
    </header>
    <main>
        <table class="table m-2">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Documento</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <th scope="row"><?php echo $user->id ?></th>
                    <td><?php echo $user->name ?></td>
                    <td><?php echo $user->email ?></td>
                    <td><?php echo $user->document ?></td>
                    <td><?php echo $user->country ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </main>
    <footer class="mt-auto text-white-50">

    </footer>
</div>
<script>
    $(".alert").delay(3000).slideUp(200, function() {
        $(this).alert('close');
    });
</script>
</body>
</html>
