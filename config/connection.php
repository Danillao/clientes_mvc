<?php
session_start();

require_once __DIR__ . "/config.php";

date_default_timezone_set('America/Sao_Paulo');

define("BASE_URL", "http://localhost:8000/clientes_mvc/");

global $pdo;

try {
    $pdo = new PDO("mysql:dbname=$banco;host=$host;charset=utf8", "$usuario", "$senha");
} catch (PDOException $e) {
    echo "Erro ao conectar com o banco de dados! " . $e->getMessage();
}
