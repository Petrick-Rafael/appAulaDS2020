<?php

include('../../banco/conexao.php');

if(!$conexao){
    $dados = array(
        'tipo' => 'info',
        'mensagem' => 'Conexão inalcançada'
    );
} else{

    $requestData = $_REQUEST; 
    function formatar($string) {

        // matriz de entrada
        $what = array('ã','à','á','â','ê','ë','è','é','ì','í','õ','ò','ó','ô','ù','ú','À','Á','É','Í','Ó','Ú','ñ','Ñ','ç','Ç');
    
        // matriz de saída
        $by   = array('a','a','a','a','e','e','e','e','i','i','o','o','o','o','u','u','A','A','E','I','O','U','n','n','c','C');
    
        // devolver a string
        return str_replace($what, $by, $string);
    }
    $nome = formatar($requestData['nome']);

    if(empty($requestData['nome']) || empty($requestData['ativo']) ){
        $dados = array(
            'tipo' => 'info',
            'mensagem' => 'Existe(m) campo(s) obrigatório(s) vazio(s).'
        );
    } else {
        $requestData['ativo'] = $requestData['ativo'] == "on" ? "S" : "N";

        $date = date_create_from_format('d/m/Y H:i:s', $requestData['dataagora']);
        $requestData['dataagora'] = date_format($date, 'Y-m-d H:i:s');

        $sqlComando = "INSERT INTO categorias (nome, ativo, data_criacao, data_modificacao)
         VALUES ('$nome', '$requestData[ativo]', '$requestData[dataagora]', '$requestData[dataagora]')";

         $resultado = mysqli_query($conexao, $sqlComando);

         if($resultado){
            $dados = array(
                'tipo' => 'success',
                'mensagem' => 'Categoria criada com sucesso.'
            );
         } else{
            $dados = array(
                'tipo' => 'error',
                'mensagem' => 'Não foi possível criar a categoria.'.mysqli_error($conexao)
            );
         }
    }

    mysqli_close($conexao);
}

echo json_encode($dados, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);