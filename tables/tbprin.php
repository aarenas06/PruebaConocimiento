<div class="table-responsive">
  <table class="table table-hover table-bordered" id="tb1">
    <thead>
      <tr>
        <th scope="col">Fecha Registro</th>
        <th scope="col">Nombre</th>
        <th scope="col">Parcial 1</th>
        <th scope="col">Parcial 2</th>
        <th scope="col">Parcial 3</th>
        <th scope="col">Promedio </th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $dt) { ?>
        <tr>
          <th scope="row"><?= $dt['FechaCreacion'] ?></th>
          <td><?= $dt['NombreUser'] ?></td>
          <td><?= $dt['Prueba1'] ?></td>
          <td><?= $dt['Prueba2'] ?></td>
          <td><?= $dt['Prueba3'] ?></td>
          <td><?= $dt['Promedio'] ?></td>
          <td><button class="btn btn-danger btn-sm" onclick="Delete(<?= $dt['IdListRegistro'] ?>)"><i class="fa-solid fa-trash"></i></button></td>
        </tr>
      <?php } ?>

    </tbody>
  </table>
</div>