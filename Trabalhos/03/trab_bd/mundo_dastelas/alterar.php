<?php
require_once 'conexao.php';
session_start();
$id = intval($_GET['id'] ?? 0);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    if ($nome && $email) {
        $stmt = $mysqli->prepare('UPDATE usuarios SET nome = ?, email = ? WHERE id = ?');
        $stmt->bind_param('ssi', $nome, $email, $id);
        $stmt->execute();
        header('Location: gerenciar.php');
        exit;
    } else {
        $error = 'Preencha todos os campos.';
    }
}
$stmt = $mysqli->prepare('SELECT id, nome, email FROM usuarios WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$res = $stmt->get_result();
$user = $res->fetch_assoc();
?>
<!doctype html><html><head><meta charset="utf-8"><title>Alterar Usuário</title></head><body>
<?php if (!$user): ?>
  <p>Usuário não encontrado.</p>
<?php else: ?>
  <?php if (!empty($error)) echo '<p style="color:red;">'.htmlspecialchars($error).'</p>'; ?>
  <form method="post" action="alterar.php?id=<?php echo $id; ?>">
    <label>Nome: <input type="text" name="nome" value="<?php echo htmlspecialchars($user['nome']); ?>" required></label><br>
    <label>Email: <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required></label><br>
    <button type="submit">Salvar</button>
  </form>
<?php endif; ?>
<p><a href="gerenciar.php">Voltar</a></p>
</body></html>
