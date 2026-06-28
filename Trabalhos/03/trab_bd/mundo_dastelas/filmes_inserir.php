<?php
require_once 'conexao.php';
session_start();
if (!isset($_SESSION['user_id'])) { header('Location: entrar.php'); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $nota = floatval($_POST['nota'] ?? 0);
    $data_lancamento = $_POST['data_lancamento'] ?? null;

    if ($nome === '' || $descricao === '' || !$data_lancamento) {
        $error = 'Preencha todos os campos.';
    } else {
        $stmt = $mysqli->prepare('INSERT INTO filmes (nome, descricao, nota_publico, data_lancamento) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('sdss', $nome, $descricao, $nota, $data_lancamento);
        if ($stmt->execute()) {
            header('Location: filmes_gerenciar.php');
            exit;
        } else {
            $error = 'Erro ao inserir filme.';
        }
    }
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Inserir Filme</title><link rel="stylesheet" href="css/crud.css"></head><body>
<h2>Inserir Filme</h2>
<?php if (!empty($error)): ?><p style="color:red;"><?php echo htmlspecialchars($error); ?></p><?php endif; ?>
<form method="post" action="filmes_inserir.php">
  <label>Nome: <input type="text" name="nome" required></label><br>
  <label>Descrição:<br><textarea name="descricao" rows="4" cols="50" required></textarea></label><br>
  <label>Nota do público (0-10): <input type="number" name="nota" step="0.1" min="0" max="10" required></label><br>
  <label>Data de lançamento: <input type="date" name="data_lancamento" required></label><br>
  <button type="submit">Inserir Filme</button>
</form>
<p><a href="filmes_gerenciar.php">Voltar</a></p>
</body></html>
