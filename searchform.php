	<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
		<input type="text" value="<?php _e('Search...','notepad-theme'); ?>" name="s" id="s" onblur="if (this.value == '') {this.value = '<?php _e('Search...','notepad-theme'); ?>';}" onfocus="if (this.value == '<?php _e('Search...','notepad-theme'); ?>') {this.value = '';}" />
		<input type="hidden" id="searchsubmit" />
	</form>