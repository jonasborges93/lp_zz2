<?php

$secretPassword = '123';

if (isset($_POST['submit'])) {
    $passwordTyped = $_POST['formSecretPassword'];

    // VERIFICANDO SE AS SENHAS SÃO IGUAIS
    if ($passwordTyped === $secretPassword) {
        include_once('config.php');

        $result = $conexao->query('SELECT * FROM formulario_contato');
    } else {
        echo '<script>alert("Senha digitada está incorreta! Atualize a página e tente novamente."); </script>';
    }
}

?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/styles.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap"
        rel="stylesheet" />

    <title>Administração LP ZZ2 - Jonas Borges</title>
</head>

<body>
    <?php if (isset($result) && $result->num_rows <= 0) : ?>
        <section class="sectionResultNF">
            <div class="container">
                <div class="sectionResultNF__content">
                    <img src="./assets/images/icon_pag.png" alt="Logomarca zz2" class="sectionResultNF__image">
                    <h3 class="sectionResultNF__title">ooops!</h3>
                    <p class="sectionResultNF__text">Nenhum dado foi encontrado no banco de dados!</p>
                    <a href="./index.php" class="sectionResultNF__button button">Voltar para homepage!</a>
                </div>
            </div>
        </section>
    <?php elseif (isset($result) && $result->num_rows > 0) : ?>
        <section class="sectionResult">
            <div class="container">
                <div class="sectionResult__content">
                    <div class="sectionResult__top">
                        <img src="./assets/images/icon_pag.png" alt="Logomarca zz2" class="sectionResult__image">
                        <h2 class="sectionResult__title">Veja os envios do seu site!</h2>
                        <p class="sectionResult__text">Analise os dados dos usuários que realizaram o envio do formulário</p>
                    </div>
                    <ul class="sectionResult__list">
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <li class="sectionResult__item">
                                <div class="sectionResult__group">
                                    <p class="sectionResult__label">Data de Envio:</p>
                                    <p class="sectionResult__text"><?php echo $row["sentDate"]; ?></p>
                                </div>
                                <div class="sectionResult__group">
                                    <p class="sectionResult__label">Nome:</p>
                                    <p class="sectionResult__text"><?php echo $row["name"]; ?></p>
                                </div>
                                <div class="sectionResult__group">
                                    <p class="sectionResult__label">E-mail:</p>
                                    <p class="sectionResult__text"><?php echo $row["email"]; ?></p>
                                </div>
                                <div class="sectionResult__group">
                                    <p class="sectionResult__label">Telefone:</p>
                                    <p class="sectionResult__text"><?php echo $row["phone"]; ?></p>
                                </div>
                                <div class="sectionResult__group">
                                    <p class="sectionResult__label">Mensagem:</p>
                                    <p class="sectionResult__text"><?php echo $row["message"]; ?></p>
                                </div>
                            </li>
                        <?php endwhile ?>
                    </ul>

                </div>
            </div>
        </section>


    <?php else : ?>
        <section class="sectionSecret">
            <div class="container">
                <div class="sectionSecret__content">
                    <form accept="administracao.php" method="POST" class="formSecret" id="formSecret">
                        <div class="formSecret__info">
                            <h3 class="formSecret__title">Acesso Restrito</h3>
                            <p class="formSecret__text">Digite abaixo a senha secreta para ver os envios do formulário</p>
                        </div>
                        <div class="formSecret__content">
                            <div class="form__group">
                                <input type="password" class="formSecret__input" name="formSecretPassword" id="formSecretPassword" />
                                <span class="form__error">Aqui vai a mensagem de erro...</span>
                            </div>
                            <button class="formSecret__button button" type="submit" name="submit">Acessar os envios</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    <?php endif ?>

    <?php require_once('footer.php') ?>

    <script src="./assets/scripts-adm.js"></script>
</body>

</html>