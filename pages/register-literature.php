<?php
$mysqli = new mysqli("localhost", "root", "", "bibliotecapequena");

if ($mysqli->connect_errno) {
    echo "Falha na conexão com o MySQL: ", $mysqli->connect_error;
    exit();
}
$mysqli->set_charset("utf8");

$sql_category = "select id, name from category";
$resultado_category = $mysqli->query($sql_category);

$sql_publisher = "select id, name from publisher";
$resultado_publisher = $mysqli->query($sql_publisher);

$sql_author = "select id, name from author";
$resultado_author = $mysqli->query($sql_author);

$sql_location = "select id, name from location";
$resultado_location = $mysqli->query($sql_location);

$sql_literature_type = "select id, name from literature_type";
$resultado_literature_type = $mysqli->query($sql_literature_type);

$sql_languages = "select id, name from languages";
$resultado_languages = $mysqli->query($sql_languages);

$sql_availability = "select id, state from availability";
$resultado_availability = $mysqli->query($sql_availability);

$sql_origin = "select id, name from origin";
$resultado_origin = $mysqli->query($sql_origin);

$sql_format = "select id, name from format";
$resultado_format = $mysqli->query($sql_format);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Verificações iniciais
    $type = trim($_POST['type'] ?? '');
    $isbn = trim($_POST['isbn'] ?? '');
    $title = trim($_POST['title'] ?? '');
    $literature_language1 = trim($_POST['literature_language1'] ?? '');
    $literature_language2 = trim($_POST['literature_language2'] ?? '');
    $literature_language3 = trim($_POST['literature_language3'] ?? '');
    $publication_date = trim($_POST['publication-date'] ?? '');
    $summary = trim($_POST['summary'] ?? '');
    $pages = trim($_POST['pages'] ?? '');
    $cover_image = trim($_FILES['cover-image'] ?? '');
    $edition = trim($_POST['edition'] ?? '');
    $format = trim($_POST['format'] ?? '');
    $dimensions = trim($_POST['dimensions'] ?? '');
    $keywords = trim($_POST['keywords'] ?? '');
    $availability = trim($_POST['availability'] ?? '');
    $origin = trim($_POST['origin'] ?? '');
    $location = trim($_POST['location'] ?? '');
    $author = trim($_POST['author'] ?? '');
    $publisher = trim($_POST['publisher'] ?? '');
    $category = trim($_POST['category'] ?? '');

    // Processos com cover-image
    if (isset($_FILES['cover-image']) && $_FILES['cover-image']['error']) {
        $uploadDir = 'uploads/';

        if(!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $allowedTypes = ['image/jpeg', 'image/png'];    // Tipos permitidos
        $maxFileSize = 2 * 1024 * 1024;                  // Tamanho máximo em bytes (1024 KB vezes 1024 bytes/KB) 

        if (in_array($cover_image['type'], $allowedTypes) && $cover_image['size'] <= $maxFileSize) {    // in array retorna se o tipo do arquivo está entre os permitidos
            $fileName = basename($cover_image['name']); // basename retorna a última parte do caminho (o nome do arquivo)
            $targetFile = $uploadDir + $fileName;

            // Verificar se não existe outro arquivo com o mesmo nome
            if (file_exists($targetFile)) {
                $fileName = uniqid() . '_' . $fileName;
                $targetFile = $uploadDir + $fileName;
            }

            // Mover o arquivo
            if (!move_uploaded_file($file['tmp_name'], $targetFile)) {
                echo "Erro ao mover o arquivo";
                exit;
            }
        } else {
            echo "Formato do arquivo é inválido ou é maior que 2 MB";
            exit;
        }
    }

    // Validação: Se algum campo estiver vazio, aborta
    $erros = false;
    foreach ([$type, $isbn, $title, $literature_language1, $publication_date, $summary, $pages, $cover_image, $edition, $format, $dimensions, $keywords, $availability, $origin, $location, $author, $publisher, $category] as $valor) {
        if (empty($valor)) {
            $erros = true;
            break;
        }
    }
    if ($erros) {
        echo "Preencha todos os campos obrigatórios.";
        exit;
    }

    $stmt = $mysqli->prepare("INSERT INTO literature (isbn, title, publication_date, summary, pages, cover_image, edition, format, dimensions, keywords, availability, origin, location_id, author_id, publisher_id, category_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssississsiiii", $isbn, $title, $publication_date, $summary, $pages, $cover_image, $edition, $format, $dimensions, $keywords, $availability, $origin, $location, $author, $publisher, $category);

    if ($stmt->execute()) {
        $literature_id = $mysqli->insert_id; // Pega o ID do livro recém-inserido
        echo "Livro cadastrado com sucesso! ID: ", $literature_id;

        // Inserir os idiomas na tabela intermediária
        $stmt_lang = $mysqli->prepare("INSERT INTO obra_idiomas (literature_id, language_id) VALUES (?, ?)");

        if (!empty($literature_language1)) {
            $stmt_lang->bind_param("ii", $literature_id, $literature_language1);
            $stmt_lang->execute();
        }

        if (!empty($literature_language2)) {
            $stmt_lang->bind_param("ii", $literature_id, $literature_language2);
            $stmt_lang->execute();
        }

        if (!empty($literature_language3)) {
            $stmt_lang->bind_param("ii", $literature_id, $literature_language3);
            $stmt_lang->execute();
        }

        echo "Idiomas cadastrados com sucesso!";
        $stmt_lang->close();

    } else {
        echo "Erro ao cadastrar: ", $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar literatura</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
<!--     <script>
        $('form').on('submit', function (e) {
            e.preventDefault();
        });
    </script> -->
</head>

<body>
    <header>
        <h1><a href="../index.php" id="logo" class="clickable-normal-text">SMALL LIBRARY</a></h1>
    </header>
    <main>
        <h1 id="register-title">CADASTRO DE OBRAS</h1>
        <form action="register-literature.php" method="POST" id="register-literature-form" name="register-literature" enctype="multipart/form-data" accept="image/*">
            <div class="form-columns">
                <div id="form-column-left">
                    <select name="type" id="type-select">
                        <option value="">Tipo</option>
                        <?php while ($linha = $resultado_literature_type->fetch_assoc()): ?>
                            <option value="<?= $linha['id'] ?>">
                                <?= htmlentities($linha['name'], ENT_QUOTES, "UTF-8"); ?>
                            </option>
                        <?php endwhile ?>
                    </select>
                    <input type="text" id="isbn" name="isbn" placeholder="ISBN" required>
                    <input type="text" id="title" name="title" placeholder="Título" required>
                    <select name="literature_language1" id="literature_language_select1">
                        <option value="">Idioma 1</option>
                        <?php while ($linha = $resultado_languages->fetch_assoc()): ?>
                            <option value="<?= $linha['id'] ?>">
                                <?= htmlentities($linha['name'], ENT_QUOTES, "UTF-8"); ?>
                            </option>
                            <?php
                        endwhile;
                        $resultado_languages->data_seek(0); // Resetando o ponteiro do while
                        ?>
                    </select>
                    <select name="literature_language2" id="literature_language_select2">
                        <option value="">Idioma 2</option>
                        <?php while ($linha = $resultado_languages->fetch_assoc()): ?>
                            <option value="<?= $linha['id'] ?>">
                                <?= htmlentities($linha['name'], ENT_QUOTES, "UTF-8"); ?>
                            </option>
                            <?php
                        endwhile;
                        $resultado_languages->data_seek(0); // Resetando o ponteiro do while
                        ?>
                    </select>
                    <select name="literature_language3" id="literature_language_select3">
                        <option value="">Idioma 3</option>
                        <?php while ($linha = $resultado_languages->fetch_assoc()): ?>
                            <option value="<?= $linha['id'] ?>">
                                <?= htmlentities($linha['name'], ENT_QUOTES, "UTF-8"); ?>
                            </option>
                        <?php endwhile ?>
                    </select>
                    <input type="text" id="publication_date_select" name="publication-date"
                        placeholder="Ano de publicação" required>
                    <textarea name="summary" id="summary" rows="5" cols="33" placeholder="Resumo"></textarea>
                    <input type="text" name="pages" id="pages" placeholder="Nº Páginas" required>
                    <input type="file" name="cover-image" id="cover-image" required>
                </div>
                <div id="form-column-right">
                    <input type="text" name="edition" id="edition" placeholder="Edição" required>
                    <select name="format" id="format">
                        <option value="">Formato</option>
                        <?php while ($linha = $resultado_format->fetch_assoc()): ?>
                            <option value="<?= $linha['id'] ?>">
                                <?= htmlentities($linha['name'], ENT_QUOTES, "UTF-8"); ?>
                            </option>
                        <?php endwhile ?>
                    </select>
                    <input type="text" name="dimensions" id="dimensions" placeholder="Dimensões (modelo 29x21)"
                        required>
                    <input type="text" name="keywords" id="keywords" placeholder="Palavras-chave (separe por vírgulas)"
                        required>
                    <select name="availability" id="availability">
                        <option value="">Disponibilidade</option>
                        <?php while ($linha = $resultado_availability->fetch_assoc()): ?>
                            <option value="<?= $linha['id'] ?>">
                                <?= htmlentities($linha['state'], ENT_QUOTES, "UTF-8"); ?>
                            </option>
                        <?php endwhile ?>
                    </select>
                    <select name="origin" id="origin">
                        <option value="">Origem</option>
                        <?php while ($linha = $resultado_origin->fetch_assoc()): ?>
                            <option value="<?= $linha['id'] ?>">
                                <?= htmlentities($linha['name'], ENT_QUOTES, "UTF-8"); ?>
                            </option>
                        <?php endwhile ?>
                    </select>
                    <select name="location" id="location">
                        <option value="">Localização</option>
                        <?php while ($linha = $resultado_location->fetch_assoc()): ?>
                            <option value="<?= $linha['id'] ?>">
                                <?= htmlentities($linha['name'], ENT_QUOTES, "UTF-8"); ?>
                            </option>
                        <?php endwhile ?>
                    </select>
                    <select name="author" id="author">
                        <option value="">Autor</option>
                        <?php while ($linha = $resultado_author->fetch_assoc()): ?>
                            <option value="<?= $linha['id']; ?>">
                                <?= htmlentities($linha['name'], ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endwhile ?>
                    </select>
                    <select name="publisher" id="publisher">
                        <option value="">Editora</option>
                        <?php while ($linha = $resultado_publisher->fetch_assoc()): ?>
                            <option value="<?= $linha['id']; ?>">
                                <?= htmlentities($linha['name'], ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endwhile ?>
                    </select>
                    <select name="category" id="category">
                        <option value="">Categoria</option>
                        <?php while ($linha = $resultado_category->fetch_assoc()): ?>
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