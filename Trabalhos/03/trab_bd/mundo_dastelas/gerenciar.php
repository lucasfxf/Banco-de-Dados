<?php
require_once 'conexao.php';
session_start();

// if (!isset($_SESSION['user_id'])) { header('Location: entrar.php'); exit; }

$result = $mysqli->query('SELECT id, nome, email, created_at FROM usuarios ORDER BY id DESC');
$users = [];
if ($result) {
    while ($row = $result->fetch_assoc()) $users[] = $row;
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Gerenciar Logins</title><link rel="stylesheet" href="css/crud.css"></head>
<body>
<h2>Gerenciar Logins (Ver | Alterar | Excluir)</h2>
<p><a href="inserir.php">Inserir novo</a></p>
<table border="1" cellpadding="6">
  <tr><th>ID</th><th>Nome</th><th>Email</th><th>Criado</th><th>Ações</th></tr>
  <?php foreach($users as $u): ?>
    <tr>
      <td><?php echo $u['id']; ?></td>
      <td><?php echo htmlspecialchars($u['nome']); ?></td>
      <td><?php echo htmlspecialchars($u['email']); ?></td>
      <td><?php echo $u['created_at']; ?></td>
      <td>
        <a href="ver.php?id=<?php echo $u['id']; ?>">Ver</a> |
        <a href="alterar.php?id=<?php echo $u['id']; ?>">Alterar</a> |
        <a href="excluir.php?id=<?php echo $u['id']; ?>" onclick="return confirm('Confirma exclusão?');">Excluir</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
</body>
</html>
