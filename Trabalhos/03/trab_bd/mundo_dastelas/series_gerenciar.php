<?php
require_once 'conexao.php';
session_start();
if (!isset($_SESSION['user_id'])) { header('Location: entrar.php'); exit; }

$res = $mysqli->query('SELECT id, nome, descricao, nota_publico, data_lancamento, episodios, temporadas, created_at FROM series ORDER BY id DESC');
$items = [];
if ($res) { while ($r = $res->fetch_assoc()) $items[] = $r; }
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Gerenciar Séries</title><link rel="stylesheet" href="css/crud.css"></head><body>
<h2>Gerenciar Séries</h2>
<p><a href="series_inserir.php">Inserir nova série</a></p>
<table border="1" cellpadding="6">
<tr><th>ID</th><th>Nome</th><th>Nota</th><th>Episódios</th><th>Temporadas</th><th>Ações</th></tr>
<?php foreach($items as $f): ?>
  <tr>
    <td><?php echo $f['id']; ?></td>
    <td><?php echo htmlspecialchars($f['nome']); ?></td>
    <td><?php echo htmlspecialchars($f['nota_publico']); ?></td>
    <td><?php echo htmlspecialchars($f['episodios']); ?></td>
    <td><?php echo htmlspecialchars($f['temporadas']); ?></td>
    <td>
      <a href="series_editar.php?id=<?php echo $f['id']; ?>">Editar</a> |
      <a href="series_excluir.php?id=<?php echo $f['id']; ?>" onclick="return confirm('Confirma exclusão?')">Excluir</a>
    </td>
  </tr>
<?php endforeach; ?>
</table>
<p><a href="Inicio.php">Voltar ao Início</a></p>
</body></html>
