<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
</head>
<body>
    <h2>Hola, bienvenid@ a Prismad!</h2>
    <p>Por favor confirma tu correo electrónico haciendo clic en el enlace a continuación... tu contraseña por defecto es: password , ¡suerte!"</p>

    <a href="{{ url('register/verify/'.$confirmation_code) }}">
        Confirmar correo
    </a>
</body>
</html>