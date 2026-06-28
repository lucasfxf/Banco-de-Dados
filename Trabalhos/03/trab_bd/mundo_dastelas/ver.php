<?php
require_once 'conexao.php';
$id = intval($_GET['id'] ?? 0);
$stmt = $mysqli->prepare('SELECT id, nome, email, created_at FROM usuarios WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$res = $stmt->get_result();
$user = $res->fetch_assoc();
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Ver Usuário</title></head><body>
<?php if (!$user): ?>
  <p>Usuário não encontrado.</p>
<?php else: ?>
  <h2>Usuário #<?php echo $user['id']; ?></h2>
  <p><strong>Nome:</strong> <?php echo htmlspecialchars($user['nome']); ?></p>
  <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
  <p><strong>Criado em:</strong> <?php echo $user['created_at']; ?></p>
<?php endif; ?>
<p><a href="gerenciar.php">Voltar</a></p>
</body></html>
