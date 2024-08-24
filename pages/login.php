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
        <form action="login.php" action="POST" id="login-form">
            <fieldset>
                <legend>Login</legend>
                <label for="user">Usuário</label>
                <input type="text" name="user" id="user" placeholder="Digite seu usuário">

                <label for="password">Senha</label>
                <input type="text" name="password" id="password" placeholder="Digite sua senha">
            </fieldset>
        </form>
    </main>
    <?php include '../includes/footer.html' ?>
</body>

</html>