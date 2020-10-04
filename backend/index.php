<?php

//Dependências
require './Classes/Usuario.php';

use Classes\Usuario;

/* API RESTFul em PHP puro */

//Informa para o cliente que será retornado JSON
header('Content-type: application/json');
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400');
header('Access-Control-Allow-Methods: *');

//Captura os parâmetros
$param = filter_input_array(INPUT_GET, FILTER_DEFAULT);

//Captura o método de requisição
$method = $_SERVER ['REQUEST_METHOD'];

//Captura os dados enviados no body
$body = file_get_contents('php://input');

if ($method == "GET") {

    if (isset($param ['codusu'])) {
        //Retorno 1 usuário
    } else {

        $usu = new Usuario();
        $resultado = $usu->listar();
        $usuarios = [];

        foreach ($resultado as $usuario) {
            unset($usuario[0]);
            unset($usuario[1]);
            unset($usuario[2]);
            unset($usuario[3]);
            unset($usuario[4]);
            unset($usuario['senha']);
            $usuarios [] = $usuario;
        }

        echo json_encode($usuarios);
    }
} else if ($method == "POST") {
    
    $usuario = json_decode($body);
    $usu = new Usuario();    
    $usu->inserir($usuario->nome, $usuario->email, $usuario->login, $usuario->senha);
    echo json_encode($usuario);
    
} else if ($method == "PUT") {

    $usuario = json_decode($body);
    $usu = new Usuario();    
    $usu->alterar($usuario->cod, $usuario->nome, $usuario->email, $usuario->login, $usuario->senha);

    echo json_encode($usuario);


} else if ($method == "DELETE") {

    $obj = json_decode($body);

    $usu = new Usuario();    
    $usu->deletar($obj->cod);

    echo json_encode($cod);
}
?>