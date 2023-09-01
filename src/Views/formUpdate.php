<main class="container">
    <form action="index.php?controller=Book&method=edit&id=<?php echo $book->getId() ?>" method="POST">
        <input value="<?php echo $book->getId() ?>" type="hidden" class="form-control" id="id" name="id">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input value="<?php echo $book->getTitle() ?>" type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input value="<?php echo $book->getAuthor() ?>" type="text" class="form-control" id="author" name="author">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input value="<?php echo $book->getType() ?>" type="text" class="form-control" id="Type" name="type">
        </div>
        <div class="form-floating">
            <textarea class="form-control" name="description" id="description" style="height: 100px"><?php echo $book->getDescription() ?></textarea>
            <label for="description">Description</label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </form>
</main>
