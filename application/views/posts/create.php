<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>
<?php echo form_open('posts/create'); ?>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Add Title to content">
  </div>
  <div class="form-group">
    <label>body</label>
    <!-- <div id="editor"></div> -->

    <textarea class="form-control" id="editor" name="body" placeholder="Add Body"></textarea> 
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>