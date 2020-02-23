<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>
<?php echo form_open('posts/update'); ?>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Add Title to content" value="<?php echo $post['title']; ?>">
  </div>
  <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
  <div class="form-group">
    <label>body</label>
    <textarea class="form-control"  id="editor" name="body" placeholder="Add Body"><?php echo $post['body']; ?></textarea>
  </div>
  <div class="form-group">
    <label for="category">Category</label>
    <select name="category" class="form-control">
      <?php foreach ($categories as $category): ?>
        hello
      <option value="<?php $category['id'] ?>"><?php echo $category['name'] ?></option>
    <?php endforeach; ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>