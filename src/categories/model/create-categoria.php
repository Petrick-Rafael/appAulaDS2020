<?php

    include('../../banco/conexao.php');

    if (!$conexao) {
        $dados = array(
            "tipo" => "info",
            'mensagem' => 'não foi possível obter uma conexão com o banco de dados'
        );
    }else{

        $requestData = $_REQUEST;

        // $requestData = array_map('utf8_decode', $requestData);

        $requestData['ativo'] = $requestData['ativo'] == "on" ? "S" : "N";

        $requestData['data_criacao'] = date('Y-d-m H:i:s', strtotime($requestData['data_agora']));

        if (empty($requestData['nome']) || $requestData['ativo']) {
            $dados = array(
                "tipo" => "info",
                'mensagem' => 'Existem campo(s) vazio(s)'
            );
        } else{

            $sql = "INSERT INTO CATEGORIAS VALUES(NULL, '$requestData[nome]','$requestData[ativo]','$requestData[data_agora]','$requestData[data_agora]')";
            
            $resultado = mysqli_query($conexao, $sql);

            if ($resultado) {
                $dados = array(
                    "tipo" => "success",
                    'mensagem' => 'categoria cadastrada com sucesso!'
                );
            }else{
                $dados = array(
                    "tipo" => "error",
                    'mensagem' => 'não foi possível cadastrar categoria'
                );
            }
        }
        mysqli_close($conexao);
    }

    echo json_encode($dados);
?>