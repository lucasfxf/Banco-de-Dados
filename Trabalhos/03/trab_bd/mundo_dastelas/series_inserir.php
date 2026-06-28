<?php
require_once 'conexao.php';
session_start();
if (!isset($_SESSION['user_id'])) { header('Location: entrar.php'); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $nota = floatval($_POST['nota'] ?? 0);
    $data_lancamento = $_POST['data_lancamento'] ?? null;
    $episodios = intval($_POST['episodios'] ?? 0);
    $temporadas = intval($_POST['temporadas'] ?? 0);

    if ($nome === '' || $descricao === '' || !$data_lancamento) {
        $error = 'Preencha todos os campos.';
    } else {
        $stmt = $mysqli->prepare('INSERT INTO series (nome, descricao, nota_publico, data_lancamento, episodios, temporadas) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('sdsiis', $nome, $descricao, $nota, $data_lancamento, $episodios, $temporadas);
        if ($stmt->execute()) {
            header('Location: series_gerenciar.php');
            exit;
        } else {
            $error = 'Erro ao inserir série.';
        }
    }
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Inserir Série</title><link rel="stylesheet" href="css/crud.css"></head><body>
<h2>Inserir Série</h2>
<?php if (!empty($error)): ?><p style="color:red;"><?php echo htmlspecialchars($error); ?></p><?php endif; ?>
<form method="post" action="series_inserir.php">
  <label>Nome: <input type="text" name="nome" required></label><br>
  <label>Descrição:<br><textarea name="descricao" rows="4" cols="50" required></textarea></label><br>
  <label>Nota do público (0-10): <input type="number" name="nota" step="0.1" min="0" max="10" required></label><br>
  <label>Data de lançamento: <input type="date" name="data_lancamento" required></label><br>
  <label>Quantidade de episódios: <input type="number" name="episodios" min="0" required></label><br>
  <label>Quantidade de temporadas: <input type="number" name="temporadas" min="0" required></label><br>
  <button type="submit">Inserir Série</button>
</form>
<p><a href="series_gerenciar.php">Voltar</a></p>
</body></html>
