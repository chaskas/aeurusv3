<h1>Comments List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Request</th>
      <th>Theme</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($comments as $comment): ?>
    <tr>
      <td><a href="<?php echo url_for('comment/edit?id='.$comment->getId()) ?>"><?php echo $comment->getId() ?></a></td>
      <td><?php echo $comment->getRequestId() ?></td>
      <td><?php echo $comment->getThemeId() ?></td>
      <td><?php echo $comment->getDescription() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('comment/new') ?>">New</a>
