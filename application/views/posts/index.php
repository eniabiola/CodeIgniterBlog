<?= $title ?>

<?php foreach($posts as $post) : ?>
	<h2><?php echo $post['title']; ?></h2>
	<small>Posted on </small><?php echo $post['created_at'] ?><br> In <strong> <?php echo $post['name']; ?> </strong> category

	<p><?php echo word_limiter($post['body'], 60) ?><p>
	<a href="<?php echo site_url('/posts/'.$post['slug']); ?>">Read More</a>
<?php endforeach ?>