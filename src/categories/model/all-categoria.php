<?php

    include('../../banco/conexao.php');

    if($conexao){

        $sql = "SELECT idcategoria, nome FROM  categorias WHERE ativo like 'S' ";
        $resultado = mysqli_query($conexao, $sql);

        if($resultado && mysqli_num_rows($resultado) > 0){

        while($linha = mysqli_fetch_assoc($resultado)){

            $dadosCategoria[] = array_map('utf8_encode', $linha);

        } 
            $dados = array(
                "tipo" =>"success",
                "mensagem" => "Dados: ",
                "dados" => $dadosCategoria
            );

        } else{
            $dados = array(
                "tipo" => "info",
                "mensagem" => "Não possível localizar a categoria.",
                "dados" => array()
            );
        }

        mysqli_close($conexao);

    } else{
        $dados = array(
            "tipo" => "error",
            "mensagem" => "Não possível conectar ao banco de dados",
            "dados" => array()
        );
    }   
    echo json_encode($dados);