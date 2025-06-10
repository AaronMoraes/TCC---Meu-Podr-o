<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../models/Pedido.php';
include_once '../controllers/PedidoController.php';

$database = new Database();
$db = $database->getConnection();

$requestMethod = $_SERVER["REQUEST_METHOD"];
$mesaId = isset($_GET['mesa_id']) ? $_GET['mesa_id'] : null;

$controller = new PedidoController($db, $requestMethod, $mesaId);
$controller->processRequest();
?>
