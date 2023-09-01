
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Type</th>
      <!--<th scope="col">Image</th> -->
      <th scope="col">Description</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody>
  <?php
foreach($books as $book)
{?>
    <tr>
       
    <th scope="row">  <?php echo $book->getId() ?>  </th>
    <td> <?php echo $book->getTitle() ?></td>
    <td><?php echo $book->getAuthor() ?></td>
    <td><?php echo $book->getType() ?></td>
    <!--<td><?php //echo $book->getImage() ?></td>-->
    <td><?php echo $book->getDescription() ?></td>
    <td>
        <a href='index.php?controller=Book&method=edit&id=<?php echo $book->getId() ?>' class="btn btn-warning">Modfier</a>
        <a href='index.php?controller=Book&method=delete&id=<?php echo $book->getId() ?>' class="btn btn-danger">Supprimer</a>
    </td>

  </tr>
    
<?php
}
?>
  </tbody>
</table>

