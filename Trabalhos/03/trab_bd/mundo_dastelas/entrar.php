<?php
require_once 'conexao.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if (empty($email) || empty($senha)) {
        $error = "Preencha email e senha.";
    } else {
        $stmt = $mysqli->prepare('SELECT id, nome, senha FROM usuarios WHERE email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($row = $res->fetch_assoc()) {
            if (password_verify($senha, $row['senha'])) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['nome'];
                header('Location: Inicio.php');
                exit;
            } else {
                $error = "Senha incorreta.";
            }
        } else {
            $error = "Usuário não encontrado.";
        }
    }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Entrar</title><link rel="stylesheet" href="css/login.css"></head>
<body>
<?php if (!empty($error)): ?>
  <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>
<form action="entrar.php" method="post">
  <label>Email: <input type="email" name="email" required></label><br>
  <label>Senha: <input type="password" name="senha" required></label><br>
  <button type="submit">Entrar</button>
</form>
<p><a href="inserir.php">Ainda não tem conta? Inserir</a></p>
</body>
</html>
