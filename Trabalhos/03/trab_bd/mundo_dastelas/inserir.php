<?php
require_once 'conexao.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';
    $confirmar = $_POST['confirmar_senha'] ?? '';

    if ($senha !== $confirmar) {
        $error = "As senhas não conferem.";
    } elseif (empty($nome) || empty($email) || empty($senha)) {
        $error = "Preencha todos os campos.";
    } else {
        // checar se email já existe
        $stmt = $mysqli->prepare('SELECT id FROM usuarios WHERE email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $error = "Email já cadastrado.";
        } else {
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
            $ins = $mysqli->prepare('INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)');
            $ins->bind_param('sss', $nome, $email, $senha_hash);
            if ($ins->execute()) {
                $_SESSION['user_id'] = $ins->insert_id;
                $_SESSION['user_name'] = $nome;
                header('Location: Inicio.php');
                exit;
            } else {
                $error = "Erro ao inserir no banco.";
            }
        }
    }
}
?>
<?php include 'conexao.php'; ?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Inserir (Cadastro)</title><link rel="stylesheet" href="css/cadastro.css"></head>
<body>
<?php if (!empty($error)): ?>
  <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>


<form action="inserir.php" method="post">
  <label>Nome: <input type="text" name="nome" required></label><br>
  <label>Email: <input type="email" name="email" required></label><br>
  <label>Senha: <input type="password" name="senha" required></label><br>
  <label>Confirmar senha: <input type="password" name="confirmar_senha" required></label><br>
  <button type="submit">Inserir</button>
</form>

<p><a href="entrar.php">Já tem conta? Entrar</a></p>
</body>
</html>
