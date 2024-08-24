<?php 

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar literatura</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <form action="POST" id="register-literature-form" action="register-literature">
        <fieldset>
            <legend>Cadastro de Obras</legend>
            <select name="type" id="type-select">
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select>
            <input type="text" id="isbn" placeholder="ISBN">
            <input type="text" id="title" placeholder="Título">
            <select name="literature_language" id="literature_language_select">
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select>
            <input type="text" id="publication_date_select">
            <textarea name="summary" id="summary" rows="5" cols="33"></textarea>
            <input type="text" name="pages" id="pages" placeholder="Nº Páginas">
            <input type="file" name="cover-image" id="cover-image">
        </fieldset>
    </form>
</body>
</html>