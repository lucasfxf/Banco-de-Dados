<?php
require_once 'conexao.php';
session_start();
if (!isset($_SESSION['user_id'])) { header('Location: entrar.php'); exit; }

$res = $mysqli->query('SELECT id, nome, descricao, nota_publico, data_lancamento, created_at FROM filmes ORDER BY id DESC');
$filmes = [];
if ($res) { while ($r = $res->fetch_assoc()) $filmes[] = $r; }
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Gerenciar Filmes</title><link rel="stylesheet" href="css/crud.css"></head><body>
<h2>Gerenciar Filmes</h2>
<p><a href="filmes_inserir.php">Inserir novo filme</a></p>
<table border="1" cellpadding="6">
<tr><th>ID</th><th>Nome</th><th>Nota</th><th>Data Lançamento</th><th>Ações</th></tr>
<?php foreach($filmes as $f): ?>
  <tr>
    <td><?php echo $f['id']; ?></td>
    <td><?php echo htmlspecialchars($f['nome']); ?></td>
    <td><?php echo htmlspecialchars($f['nota_publico']); ?></td>
    <td><?php echo htmlspecialchars($f['data_lancamento']); ?></td>
    <td>
      <a href="filmes_editar.php?id=<?php echo $f['id']; ?>">Editar</a> |
      <a href="filmes_excluir.php?id=<?php echo $f['id']; ?>" onclick="return confirm('Confirma exclusão?')">Excluir</a>
    </td>
  </tr>
<?php endforeach; ?>
</table>
<p><a href="Inicio.php">Voltar ao Início</a></p>
</body></html>
