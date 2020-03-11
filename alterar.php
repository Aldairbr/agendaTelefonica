<?php
include("conexao.php");

$codigo = $_GET['cod_produto'];
$nome = $_GET['nome_produto'];
$descricao = $_GET['Descricao_produto'];
$valor = $_GET['valor_produto'];

$arquivo_alvo = "imagens/" . basename($_FILES["arquivoParaUpload"]["name"]);
move_uploaded_file($_FILES["arquivoParaUpload"]["tmp_name"], $arquivo_alvo);

    $SQL = "UPDATE produto SET nome_produto = '$nome' , descricao_produto = '$descricao', 
    valor_produto = '$valor', imagem_produto = '$arquivo_alvo' WHERE codigo_produto = '$codigo'";

    $resultado = mysqli_query($conn, $SQL) OR die("Connection failed: " . mysqli_connect_error());

    if($resultado){
        header("location: hamburgueres.php");
    }

mysqli_close($con);
?>