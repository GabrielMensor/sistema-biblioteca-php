<?php
$mysqli = new mysqli("localhost", "root", "", "bibliotecapequena");

if ($mysqli -> connect_errno) {
    echo "Falha na conexão com o MySQL: ", $mysqli -> connect_error;
    exit();
}
$mysqli->set_charset("utf8");

$sql_category = "select id, name from category";
$resultado_category = $mysqli->query($sql_category);

$sql_publisher = "select id, name from publisher";
$resultado_publisher = $mysqli->query($sql_publisher);

$sql_author = "select id, name from author";
$resultado_author = $mysqli->query($sql_author);
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
    <header>
        <h1><a href="../index.php" id="logo" class="clickable-normal-text">SMALL LIBRARY</a></h1>
    </header>
    <main>
        <h1 id="register-title">CADASTRO DE OBRAS</h1>
        <form method="POST" id="register-literature-form" name="register-literature">
            <div class="form-columns">
                <div id="form-column-left">
                    <select name="type" id="type-select">
                        <option value="">Tipo</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                    <input type="text" id="isbn" placeholder="ISBN">
                    <input type="text" id="title" placeholder="Título">
                    <select name="literature_language" id="literature_language_select">
                        <option value="">Idioma</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                    <input type="text" id="publication_date_select" placeholder="Ano de publicação">
                    <textarea name="summary" id="summary" rows="5" cols="33" placeholder="Resumo"></textarea>
                    <input type="text" name="pages" id="pages" placeholder="Nº Páginas">
                    <input type="file" name="cover-image" id="cover-image">
                    <input type="text" name="edition" id="edition" placeholder="Edição">
                </div>
                <div id="form-column-right">
                    <select name="format" id="format">
                        <option value="">Formato</option>
                        <option value="ebook">E-book</option>
                        <option value="fisico">Físico</option>
                    </select>
                    <input type="text" name="dimensions" id="dimensions" placeholder="Dimensões (modelo 29x21)">
                    <input type="text" name="keywords" id="keywords" placeholder="Palavras-chave (separe por vírgulas)">
                    <select name="availability" id="availability">
                        <option value="">Disponibilidade</option>
                        <option value="arquivado">Arquivado</option>
                        <option value="vindoemprestimo">Vindo de empréstimo</option>
                        <option value="emprestadoalguem">Emprestado a alguém</option>
                        <option value="dado">Dado/vendido a algo/alguém</option>
                    </select>
                    <select name="origin" id="origin">
                        <option value="">Origem</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                    <select name="location" id="location">
                        <option value="">Localização</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                    <select name="author" id="author">
                        <option value="">Selecione o autor</option>
                        <?php while($linha = $resultado_author->fetch_assoc()): ?>
                            <option value="<?= $linha['id']; ?>">
                                <?= htmlentities($linha['name'], ENT_QUOTES, 'UTF-8'); ?>
                            <option>
                            <?php endwhile ?>
                    </select>
                    <select name="publisher" id="publisher">
                        <option value="">Selecione a editora</option>
                        <?php while($linha = $resultado_publisher->fetch_assoc()): ?>
                            <option value="<?= $linha['id']; ?>">
                                <?= htmlentities($linha['name'], ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                            <?php endwhile ?>
                    </select>
                    <select name="category" id="category">
                        <option value="">Selecione a categoria</option>
                        <?php while($linha = $resultado_category->fetch_assoc()): ?>
                            <option value="<?= $linha['id']; ?>">
                                <?= htmlentities($linha['name'], ENT_QUOTES, 'UTF-8'); ?>
                        </option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
            <br>
            <br>
            <button type="submit" id="register-button">Cadastrar</button>
        </form>
    </main>
    <?php include '../includes/footer.html' ?>
</body>

</html>