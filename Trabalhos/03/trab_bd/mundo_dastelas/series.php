<?php
require_once 'conexao.php';
$res = $mysqli->query('SELECT id, nome, descricao, nota_publico, data_lancamento, episodios, temporadas, created_at FROM series ORDER BY id DESC');
$items = [];
if ($res) { while ($r = $res->fetch_assoc()) $items[] = $r; }
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Séries - Mundo das Telas</title><link rel="stylesheet" href="css/crud.css"></head>
<body>
  <h1>Séries</h1>
  <p><a href="series_inserir.php">Adicionar nova série</a> | <a href="Inicio.php">Voltar</a></p>

  <?php if (empty($items)): ?>
    <p>Nenhuma série cadastrada.</p>
  <?php else: ?>
    <table border="1" cellpadding="6">
      <tr><th>ID</th><th>Nome</th><th>Nota</th><th>Episódios</th><th>Temporadas</th><th>Ações</th></tr>
      <?php foreach($items as $it): ?>
        <tr>
          <td><?php echo $it['id']; ?></td>
          <td><?php echo htmlspecialchars($it['nome']); ?></td>
          <td><?php echo htmlspecialchars($it['nota_publico']); ?></td>
          <td><?php echo htmlspecialchars($it['episodios']); ?></td>
          <td><?php echo htmlspecialchars($it['temporadas']); ?></td>
          <td>
            <a href="series_gerenciar.php?id=<?php echo $it['id']; ?>">Ver</a> |
            <a href="series_editar.php?id=<?php echo $it['id']; ?>">Editar</a> |
            <a href="series_excluir.php?id=<?php echo $it['id']; ?>" onclick="return confirm('Confirma exclusão?')">Excluir</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  <?php endif; ?>
</body>
</html>
