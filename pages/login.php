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
        <div id="login-invite">
            <h1 id="login-title">FAÇA LOGIN PARA MAIS!</h1>
            <p id="login-subtitle">Para favoritos ou novos cadastros</p>
            <img src="../assets/img/lendo-login.png"/>
            </div>
        <form action="register-literature.php" action="POST" id="login-form">
            <fieldset>
                <input type="text" name="user" id="user" placeholder="Digite seu usuário" class="form-input"/>
                <input type="password" name="password" id="password" class="form-input" placeholder="Digite sua senha"/>
                <button type="submit" id="login-submit-button">Entrar</button>
            </fieldset>
        </form>
    </main>
</body>
</html>