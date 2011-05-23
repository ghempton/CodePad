<?php get_header(); ?>

	<div id="content">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

		<div class="post">
			<h2 class="post-title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<p class="post-date"><?php the_time(__('M d','notepad-theme')) ?></p>
			<p class="post-data"><span class="postauthor"><?php the_author_link(); ?></span><span class="postcategory"><?php the_category(', ') ?></span> <?php the_tags( '<span class="posttag">', ', ', '</span>'); ?> <span class="postcomment"><?php comments_popup_link(__('No Comments','notepad-theme'), __('1 Comment','notepad-theme'), __('% Comments','notepad-theme')); ?></span><?php edit_post_link(__('[Edit]','notepad-theme')); ?></p>
			<div class="post-content"><?php the_content(__('More','notepad-theme')); ?></div>
		</div>
		<!--/post -->

		<?php endwhile; ?>

		<p class="post-nav"> <span class="previous"><?php next_posts_link(__('Older Entries','notepad-theme')) ?></span> <span class="next"><?php previous_posts_link(__('Newer Entries','notepad-theme')) ?></span> </p>

	<?php else : ?>

		<h2><?php _e('Not Found','notepad-theme'); ?></h2>
		<p><?php _e('Sorry, but you are looking for something that isn\'t here','notepad-theme');?>.</p>

	<?php endif; ?>

	</div>
	<!--/content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>