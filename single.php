<?php get_header(); ?>

	<div id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post">
			<h2 class="post-title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<p class="post-date"><?php the_time(__('M d','notepad-theme')); ?></p>
			<p class="post-data"><span class="postauthor"><?php the_author_link(); ?></span><span class="postcategory"><?php the_category(', ') ?></span> <?php the_tags( '<span class="posttag">', ', ', '</span>'); ?> <span class="postcomment"><?php comments_popup_link(__('No Comments','notepad-theme'), __('1 Comment','notepad-theme'), __('% Comments','notepad-theme')); ?></span><?php edit_post_link(__('[Edit]','notepad-theme')); ?></p>
			<div class="post-content"><?php the_content(__('More','notepad-theme')); ?></div>
			<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:','notepad-theme').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		</div>
		<!--/post -->

		<p class="post-nav"> <span class="previous"><?php previous_post_link('%link') ?></span> <span class="next"><?php next_post_link('%link') ?></span></p>			

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

	<?php endif; ?>


	</div>
	<!--/content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>


		

