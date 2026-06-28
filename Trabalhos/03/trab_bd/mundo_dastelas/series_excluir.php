<?php
require_once 'conexao.php';
session_start();
if (!isset($_SESSION['user_id'])) { header('Location: entrar.php'); exit; }
$id = intval($_GET['id'] ?? 0);
if ($id) {
    $stmt = $mysqli->prepare('DELETE FROM series WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
}
header('Location: series_gerenciar.php');
exit;
