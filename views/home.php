<div class="row g-4 align-items-center">
  <div class="col-sm-6 col-md-8">
    <h1>Sistema de Clientes </h1>
  </div>
  <div class="col-6 col-md-4"><a href="<?= BASE_URL; ?>users/create" class="btn btn-dark mt-5">Adicionar <i class='bx bx-plus'></i></a></div>
</div>

<table class="table table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">NOME</th>
      <th scope="col">E-MAIL</th>
      <th scope="col">TELEFONE</th>
      <th scope="col">AÇÕES</th>
    </tr>
  </thead>
  <tbody>
    <? foreach ($list as $item) : ?>
      <tr>
        <td><?= $item['name'] ?></td>
        <td><?= $item['email'] ?></td>
        <td id="phone"><?= $item['phone'] ?></td>
        <td width="250">
          <a href="<?= BASE_URL; ?>users/edit/<?= $item['id'] ?>" class="btn btn-primary">Editar <i class='bx bxs-edit'></i></a>
          <a href="<?= BASE_URL; ?>users/destroy/<?= $item['id'] ?>" class="btn btn-danger">Deletar <i class='bx bxs-trash'></i></a>
        </td>
      </tr>
    <? endforeach; ?>

  </tbody>
</table>