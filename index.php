<?php

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página inicial da Small Library, o gerenciador da biblioteca" />  <!-- o texto de descrição que aparece em letras pequenas, embaixo do título nos buscadores -->
    <title>Documento</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>
    <header>
        <h1><a href="#" id="logo" class="clickable-normal-text">SMALL LIBRARY</a></h1>
        <nav>
            <ul>
                <li><a href="#" class="clickable-normal-text normal-li">Livros</a></li>
                <li><a href="#" class="clickable-normal-text normal-li">Sobre</a></li>
                <li><a href="#" class="clickable-normal-text" id="login">Fazer Login</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div id="banner">
            BANNER
        </div>
        <div id="container">
            <h2>ADICIONADOS RECENTEMENTE</h2>
            <div id="add-last" class="horizontal-scroll">
                <div class="book-element">
                    <img src="./assets/img/capa1.jpeg" alt="Capa do livro Coelho" class="books-images" />
                    <div class="book-text-home">
                        <h3>Quincas Borba</h3>
                        <h4>Machado de Assis</h4>
                        <p class="description-book">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti voluptatem, sequi nam excepturi qui aspernatur? Numquam molestias neque sit necessitatibus et. Officia, beatae modi distinctio ipsam quidem odit. Consequuntur, obcaecati.
                        </p>
                        <p>Online</p>
                    </div>
                </div>
                <!-- segundo elemento da primeira linha de scroll -->
                <div class="book-element">
                    <img src="./assets/img/capa1.jpeg" alt="Capa do livro Coelho" class="books-images" />
                    <div class="book-text-home">
                        <h3>Quincas Borba</h3>
                        <h4>Machado de Assis</h4>
                        <p class="description-book">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab eos sint neque ipsum, totam nostrum saepe, nihil perspiciatis provident pariatur doloribus quo optio qui cumque accusantium minus atque expedita sunt.
                        </p>
                        <p>Online</p>
                    </div>
                </div>
                <div class="book-element">
                    <img src="./assets/img/capa1.jpeg" alt="Capa do livro Coelho" class="books-images" />
                    <div class="book-text-home">
                        <h3>Quincas Borba</h3>
                        <h4>Machado de Assis</h4>
                        <p class="description-book">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, architecto ducimus minima illo delectus, tempora in aut eos dolorum, eum corrupti obcaecati omnis modi quia quae corporis iusto. Excepturi, nobis?
                        </p>
                        <p>Online</p>
                    </div>
                </div>
            </div>
            <h2>EXPLORE MAIS EXEMPLARES</h2>
            <div id="see-more" class="horizontal-scroll">
            <div class="book-element">
                    <img src="./assets/img/capa2.jpeg" alt="Capa do livro Duolingo" class="books-images" />
                    <div class="book-text-home">
                        <h3>Diário de um Banana - Dias de Cão</h3>
                        <h4>Jeff Kinney</h4>
                        <p class="description-book">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed veritatis consequuntur commodi laudantium similique ducimus officia quos ratione aliquam, minima, possimus qui maxime vitae voluptatibus laborum sequi asperiores quam atque!
                        </p>
                        <p>Online</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
<!--    <footer>

    </footer> -->
</body>
</html>