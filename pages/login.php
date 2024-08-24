<?php

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Small Library</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <header>
        <h1><a href="../index.php" id="logo" class="clickable-normal-text">SMALL LIBRARY</a></h1>
    </header>
    <main id="login-main">
        <div id="invite">
            <h1>FAÇA LOGIN PARA MAIS!</h1>
            <p>Para favoritos ou novos cadastros</p>
        </div>
        <form action="register-literature.php" action="POST" id="login-form">
            <fieldset>
                <legend>Login</legend>
                <input type="text" name="user" id="user" placeholder="Digite seu usuário"/>
                <input type="password" name="password" id="password" placeholder="Digite sua senha"/>
                <button type="submit" id="login-submit-button">Entrar</button>
            </fieldset>
        </form>
    </main>
    <?php include '../includes/footer.html' ?>
</body>

</html>