<?php

$hostname = "localhost";
$bd = "agenda_telefonica";
$usuario = "root";
$senha = "";    //SENHA DO SERVIDOR NOTEBOOK 5
$con = mysqli_connect($hostname, $usuario, $senha, $bd);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}else{

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];

    $SQL = "INSERT INTO contato (nome, telefone) VALUES ('$nome', '$telefone')";
    $resultado = mysqli_query($con, $SQL);

    if($resultado){
        header("location: index.php");
    }else{
        echo "erro!!";
    }
}

mysqli_close($con);



?>