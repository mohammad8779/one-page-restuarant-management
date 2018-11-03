<?php
	get_header();
	the_post();
	the_content();

	echo "</hr>";
    echo get_transient('res_count');
	
	get_footer();
?>