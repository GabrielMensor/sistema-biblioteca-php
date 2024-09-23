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
    <form method="POST" id="register-literature-form" name="register-literature">
        <fieldset>
            <legend>Cadastro de Obras</legend>
            <div id="form-column-right">
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
                <input type="text" name="edition" id="edition">
                
            </div>
            <div id="form-column-left">
            <select name="format" id="format">
                    <option value="">Selecione o formato</option>
                    <option value="ebook">E-book</option>
                    <option value="fisico">Físico</option>
                </select>
                <input type="text" name="dimensions" id="dimensions">
                <input type="text" name="keywords" id="keywords" placeholder="Palavras-chave (separe por vírgulas)">
                <select name="availability" id="availability">
                    <option value="">Selecione a disponibilidade</option>
                    <option value="arquivado">Arquivado</option>
                    <option value="vindoemprestimo">Vindo de empréstimo</option>
                    <option value="emprestadoalguem">Emprestado a alguém</option>
                    <option value="dado">Dado/vendido a algo/alguém</option>
                </select>
                <select name="origin" id="origin">
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
                <select name="location" id="location">
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
                <select name="author" id="author">
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
                <select name="publisher" id="publisher">
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
                <select name="category" id="category">
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </div>
        </fieldset>
    </form>
</body>
</html>