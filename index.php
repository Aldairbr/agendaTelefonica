<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda Telefonica</title>
    <link rel="stylesheet" href="estilo/estilo.css">
   
<!-- COMEÇA PHP -->
    <?php 

    $hostname = "localhost";
    $bd = "agenda_telefonica";
    $usuario = "root";
    $senha = "";    //SENHA DO SERVIDOR NOTEBOOK 5

    $con = mysqli_connect($hostname, $usuario, $senha, $bd);
    $parametro = filter_input(INPUT_GET, "parametro");
   

    if(!$parametro){
        $dados = mysqli_query($con, "select * from contato order by nome");

    }else{
        $dados = mysqli_query($con, "select * from contato where nome like '%$parametro%' order by nome"); 
   
    }
    $linha = mysqli_fetch_array($dados);
    $total = mysqli_num_rows($dados);
    ?>
<!-- TERMINA PHP -->

</head>
<body>
    <div id="conteudo">

        <h1>Agenda Telefônica</h1>
        <p>
            <form action="<?php echo $_SERVER['PHP_SELF']?>">
                <input type="text" name="parametro">
                <input type="submit" value="Buscar">
            </form>
        </p>
        <p>
            <a href="paginanovocontato.html">Adicionar Novo Contato</a>
        </p>
        <table border="1">
            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>Telefone</td>
            </tr>
<!-- COMEÇA PHP -->
            <?php
                if($total){ 
                    do{
   
            ?>
            <form action="paginaalterar.php" method="GET">
             <tr>
                 
                <td><?php echo $linha['id']?></td>
                <td><?php echo $linha['nome']?></td>
                <td><?php echo $linha['telefone']?></td>
                <td><a href="<?php echo "paginaalterar.php?id=" . $linha['id'] . "&nome=" . $linha['nome'] . "&telefone=" . $linha['telefone'] ?>">Alterar</a></td> 
            </tr>
            </form>
            <?php
                }while($linha = mysqli_fetch_array($dados));
                mysqli_free_result($dados);
            }
            mysqli_close($con);
            ?>
<!-- TERMINA PHP -->
        </table>
    </div>
</body>
</html>