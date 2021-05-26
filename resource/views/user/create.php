<!DOCTYPE html>
<html lang="es">
<head>
    <title>Zinobe</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style type="text/css">
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            background: #02475e !important;
        }

        .user_card {
            height: 550px;
            width: 350px;
            margin-top: auto;
            margin-bottom: auto;
            background: #687980;
            position: relative;
            display: flex;
            justify-content: center;
            flex-direction: column;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 5px;

        }

        .brand_logo_container {
            position: absolute;
            height: 170px;
            width: 170px;
            top: -75px;
            border-radius: 50%;
            background: #60a3bc;
            padding: 10px;
            text-align: center;
        }

        .brand_logo {
            height: 150px;
            width: 150px;
            border-radius: 50%;
            border: 2px solid white;
        }

        .form_container {
            margin-top: 100px;
        }

        .login_btn {
            width: 100%;
            background: #ee6215 !important;
            color: white !important;
        }

        .login_btn:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }

        .login_container {
            padding: 0 2rem;
        }

        .input-group-text {
            background: #ee6215 !important;
            color: white !important;
            border: 0 !important;
            border-radius: 0.25rem 0 0 0.25rem !important;
        }

        .input_user,
        .input_pass:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }

        .custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
            background-color: #ffffc7 !important;
        }
    </style>
</head>
<body>
<div class="container h-100">
    <?php if (isset($errors)) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error ! </strong><br>
            <?php
            foreach ($errors as $error) {
                echo json_encode($error, JSON_PRETTY_PRINT) . '<br>';
            }
            ?>
        </div>
    <?php } ?>
    <div class="d-flex justify-content-center h-100">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="https://ferialaboral.uniandes.edu.co/templates/yootheme/cache/ZINOBE-ac22f70d.png"
                         class="brand_logo" alt="Logo">
                </div>
            </div>
            <div class="d-flex justify-content-center form_container">
                <form method="POST" action='/register'>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="name" id="name" class="form-control input_user"
                               placeholder="Nombre" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                        </div>
                        <input type="text" name="document" id="document" class="form-control input_user"
                               placeholder="Documento" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
                        </div>
                        <input type="text" name="email" id="email" class="form-control input_user" value=""
                               placeholder="Correo" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                        </div>
                        <select class="form-control input_user" name="country">
                            <?php
                            foreach ($countries as $country)
                                echo '<option value="' . $country['name'] . '">' . $country['name'] . '</option>';
                            ?>

                        </select>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" id="password" class="form-control input_pass" value=""
                               placeholder="Contraseña" required>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="confirm_password" id="confirm_password"
                               class="form-control input_pass" value=""
                               placeholder="Confirmar contraseña" required>
                    </div>
                    <div class="d-flex justify-content-center mt-1 login_container">
                        <button type="submit" name="button" class="btn login_btn">Registrarse</button>
                    </div>
                    <div class="mt-4">
                        <div class="d-flex justify-content-center links">¿ Ya tienes cuenta ? <a href="users"
                                                                                                 class="btn btn-info btn-sm ml-2">Ingresar</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</body>
</html>
