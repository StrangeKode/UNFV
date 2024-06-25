<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-wrap">
        <div class="login-html">
            <div class="university-info">
                <img src="img/unfv03.png" alt="Logo de la Universidad">
            </div>
            <form action="auth.php" method="POST" class="login-form">
                <div class="sign-in-htm">
                    <div class="group">
                        <label for="user" class="label">Nombre de Usuario</label>
                        <input id="user" name="user" type="text" class="input" required>
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Contraseña</label>
                        <input id="pass" name="pass" type="password" class="input" data-type="password" required>
                    </div>
                    
                    <div class="group">
                        <input type="submit" class="button" value="Acceder">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="#forgot">¿Has olvidado la contraseña?</a>
                    </div>

                    <?php 
                    session_start();
                    if (isset($_SESSION['error_message'])): ?>
                        <div class="foot-lnk">
                            <p style="color: red;"><?php echo $_SESSION['error_message']; ?></p>
                        </div>
                        <?php 
                        unset($_SESSION['error_message']);
                    endif; ?>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
