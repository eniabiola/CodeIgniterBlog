<h2><?php echo $post['title']; ?></h2>
<div class="row">
		<img class="rounded float-left" src="<?php echo site_url().'assets/images/posts/'.$post['post_image']; ?>">
<p><?php echo $post['body']; ?></p>
Posted On: <?php echo $post['created_at']; ?></div>
</div>
<hr>
<a href="edit/<?php echo $post['slug']; ?>" class="btn btn-primary pull-left">Edit Post</a> &nbsp;
<?php echo form_open('/posts/delete/'.$post['id']); ?>
<input type="submit" value="delete" class="btn btn-danger">
</form>