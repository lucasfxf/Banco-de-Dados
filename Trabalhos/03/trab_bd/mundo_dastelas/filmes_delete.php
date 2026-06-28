<?php
require_once 'conexao.php';
$id = intval($_GET['id'] ?? 0);
if ($id) {
    $stmt = $mysqli->prepare('DELETE FROM filmes WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
}
header('Location: filmes.php');
exit;
