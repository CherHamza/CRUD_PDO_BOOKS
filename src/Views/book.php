
<table class="table">
<div class="row">
    <div class="col-md-6">
        <p>Page <?php echo $currentPage; ?> sur <?php echo $totalPages; ?> pages</p>
        <p>Nombre d'éléments maximum par page : <?php echo $perPage; ?></p>
    </div>
    <div class="col-md-6">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end">
                <?php if ($currentPage > 1) : ?>
                    <li class="page-item">
                        <a class="page-link" href="index.php?controller=Book&method=index&page=<?= $currentPage - 1  ?>" aria-label="Précédent">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li class="page-item <?php if ($i === $currentPage) echo 'active'; ?>"><a class="page-link" href="index.php?controller=Book&method=index&page=<?= $i ?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>

                <?php if ($currentPage < $totalPages) : ?>
                    <li class="page-item">
                        <a class="page-link" href="index.php?controller=Book&method=index&page=<?= $currentPage + 1  ?>" aria-label="Suivant">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</div>
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

