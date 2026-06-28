<?php
require_once 'conexao.php';
$id = intval($_GET['id'] ?? 0);
$stmt = $mysqli->prepare('SELECT id, nome, descricao, nota_publico, data_lancamento, created_at FROM filmes WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$res = $stmt->get_result();
$f = $res->fetch_assoc();
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Ver Filme</title><link rel="stylesheet" href="css/crud.css"></head>
<body>
  <?php if (!$f): ?>
    <p>Filme não encontrado.</p>
  <?php else: ?>
    <h1><?php echo htmlspecialchars($f['nome']); ?></h1>
    <p><strong>Descrição:</strong><br><?php echo nl2br(htmlspecialchars($f['descricao'])); ?></p>
    <p><strong>Nota do público:</strong> <?php echo htmlspecialchars($f['nota_publico']); ?></p>
    <p><strong>Data de lançamento:</strong> <?php echo htmlspecialchars($f['data_lancamento']); ?></p>
    <p><strong>Criado em:</strong> <?php echo $f['created_at']; ?></p>
  <?php endif; ?>
  <p><a href="filmes.php">Voltar</a></p>
</body>
</html>
