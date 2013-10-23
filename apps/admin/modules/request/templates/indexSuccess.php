<h1>Requests List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($requests as $request): ?>
    <tr>
      <td><a href="<?php echo url_for('request/edit?id='.$request->getId()) ?>"><?php echo $request->getId() ?></a></td>
      <td><?php echo $request->getDescription() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('request/new') ?>">New</a>
