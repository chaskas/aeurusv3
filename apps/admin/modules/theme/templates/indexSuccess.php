<h1>Themes List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Description</th>
      <th>Image</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($themes as $theme): ?>
    <tr>
      <td><a href="<?php echo url_for('theme/edit?id='.$theme->getId()) ?>"><?php echo $theme->getId() ?></a></td>
      <td><?php echo $theme->getName() ?></td>
      <td><?php echo $theme->getDescription() ?></td>
      <td><?php echo $theme->getImage() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('theme/new') ?>">New</a>
