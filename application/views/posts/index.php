<?= $title ?>

<?php foreach($posts as $post) : ?>
	<h2><?php echo $post['title']; ?></h2>
	<div class="row">
		<div class="col-md-3">
			<img src="<?php echo site_url() . 'assets/images/posts/'. $post['post_image']; ?>">
		</div>
		<div class="col-md-9">
			<small>Posted on </small><?php echo $post['created_at'] ?><br> In <strong> <?php echo $post['name']; ?> </strong> category

			<p><?php echo word_limiter($post['body'], 60) ?><p>
			<a href="<?php echo site_url('/posts/'.$post['slug']); ?>">Read More</a>
		</div>
	</div>
<?php endforeach ?>