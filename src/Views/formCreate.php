<main class="container">
<form action="index.php?controller=Book&method=create" method="POST">
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
    <div id="title" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="author" class="form-label">Author</label>
    <input type="text" class="form-control" id="author" name="author">
  </div>
  <div class="mb-3">
    <label for="type" class="form-label">Type</label>
    <input type="text" class="form-control" id="type" name="type">
  </div>
  <div class="form-floating">
    <textarea class="form-control" name="description" id="description" style="height: 100px"></textarea>
    <label for="description">Description</label>
  </div>

  <button type="submit" name="create" class="btn btn-primary">Create</button>
</form>
</main>
