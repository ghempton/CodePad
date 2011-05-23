<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php if (is_home()) {
	echo bloginfo('name');
} elseif (is_404()) {
	_e('404 Not Found','notepad-theme');
} elseif (is_category()) {
	_e('Category:','notepad-theme'); wp_title('');
} elseif (is_tag()) {
	_e('Tag:','notepad-theme'); wp_title('');
} elseif (is_search()) {
	_e('Search Results for:','notepad-theme'); echo ' ' . $s;
} elseif ( is_day() || is_month() || is_year() ) {
	_e('Archives:','notepad-theme'); wp_title('');
} else {
	echo wp_title('');
}
?></title>

<link href="<?php= get_bloginfo('stylesheet_directory') ?>/img/favicon.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />

<?php if ( is_single() || is_page() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body>
<div id="pagewrapper">
<div id="header" class="clearfix">
	<div id="logo-container">
		<h1 id="logo"><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1>
		<p class="description"><?php bloginfo('description'); ?></p>
	</div>

	<?php 
	$notepad_opts = get_option('notepad_opts');
	
	if ( !$notepad_opts['social_off'] ) include (TEMPLATEPATH . "/socialmedia.php"); ?>

	<ul id="nav">
		<li<?php if (is_home()) { echo ' class="current_home"'; }?>><a href="<?php echo get_option('home'); ?>"><?php _e('Home','notepad-theme'); ?></a></li>
		<?php wp_list_pages(array(
		    'sort_column' => 'menu_order',
		    'title_li' => '',
		    'exclude_tree' => $notepad_opts['exclude_pages'],
		    'depth' => $notepad_opts['no_dropdown'] ? 1 : 0,
		)); ?>
	</ul>
	<?php include (TEMPLATEPATH . '/searchform.php'); ?>
</div>
<!--/header -->
<div id="wrapper">
