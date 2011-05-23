<?php get_header(); ?>

	<div id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post">
			<h2 class="post-title"><?php the_title(); ?></h2>
			<?php the_content(__('More','notepad-theme')); ?>
			<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:','notepad-theme').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		</div>
		<!--/post -->

	<?php endwhile; endif; ?>
	
	<?php edit_post_link(__('Edit this entry.','notepad-theme'), '<p>', '</p>'); ?>

	<?php comments_template(); ?>

	</div>
	<!--/content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>