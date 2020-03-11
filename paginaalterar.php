<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda telefonica /Alterar</title>
    <link rel="stylesheet" href="estilo/estilo.css">
    <?php
    $id = $_GET['id'];
    $nome = $_GET['nome'];
    $telefone = $_GET['telefone'];
    ?>
</head>
<body>
    <div id="conteudo">
        <h1>Alterar Contato</h1>
        <p>
            <form action="alterar.php" method="GET">
                <input type="hidden" name="id" value="<?php echo $id ?>">
            Nome: <input type="text" name="nome" value="<?php echo $nome ?>"></br>
            Telefone: <input type="text" name="telefone" value="<?php echo $telefone ?>"></br>
                <input type="submit" value="Alterar">
            </form>
        </p>

    </div>
</body>
</html>