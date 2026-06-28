<?php
require_once 'conexao.php';
session_start();
if (!isset($_SESSION['user_id'])) { header('Location: entrar.php'); exit; }
$id = intval($_GET['id'] ?? 0);
if ($id <= 0) { header('Location: series_gerenciar.php'); exit; }

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
        $stmt = $mysqli->prepare('UPDATE series SET nome = ?, descricao = ?, nota_publico = ?, data_lancamento = ?, episodios = ?, temporadas = ? WHERE id = ?');
        $stmt->bind_param('sdssiii', $nome, $descricao, $nota, $data_lancamento, $episodios, $temporadas, $id);
        if ($stmt->execute()) {
            header('Location: series_gerenciar.php');
            exit;
        } else {
            $error = 'Erro ao atualizar série.';
        }
    }
}

$stmt = $mysqli->prepare('SELECT id, nome, descricao, nota_publico, data_lancamento, episodios, temporadas FROM series WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$res = $stmt->get_result();
$item = $res->fetch_assoc();
?>
<!doctype html><html><head><meta charset="utf-8"><title>Editar Série</title><link rel="stylesheet" href="css/crud.css"></head><body>
<?php if (!$item): ?>
  <p>Série não encontrada.</p>
<?php else: ?>
  <?php if (!empty($error)) echo '<p style="color:red;">'.htmlspecialchars($error).'</p>'; ?>
  <form method="post" action="series_editar.php?id=<?php echo $id; ?>">
    <label>Nome: <input type="text" name="nome" value="<?php echo htmlspecialchars($item['nome']); ?>" required></label><br>
    <label>Descrição:<br><textarea name="descricao" rows="4" cols="50" required><?php echo htmlspecialchars($item['descricao']); ?></textarea></label><br>
    <label>Nota do público: <input type="number" name="nota" step="0.1" min="0" max="10" value="<?php echo htmlspecialchars($item['nota_publico']); ?>" required></label><br>
    <label>Data de lançamento: <input type="date" name="data_lancamento" value="<?php echo htmlspecialchars($item['data_lancamento']); ?>" required></label><br>
    <label>Quantidade de episódios: <input type="number" name="episodios" min="0" value="<?php echo htmlspecialchars($item['episodios']); ?>" required></label><br>
    <label>Quantidade de temporadas: <input type="number" name="temporadas" min="0" value="<?php echo htmlspecialchars($item['temporadas']); ?>" required></label><br>
    <button type="submit">Salvar</button>
  </form>
<?php endif; ?>
<p><a href="series_gerenciar.php">Voltar</a></p>
</body></html>
