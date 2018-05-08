<?php
	if ( have_posts() ) :

		if ( is_home() && ! is_front_page() ) :
			?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
			<?php
		endif;

		/* Start the Loop */
		while ( have_posts() ) :
			the_post();
			?>
			<?php the_permalink(); ?>
			<?php the_title(); ?>
			<?php the_date(); ?>
			<?php the_author(); ?>
			<?php comments_popup_link('No comments', 'One comment', '% comments', 'no', 'Comments off');  ?>
			<?php echo the_post_thumbnail_url(); ?>
			<?php the_post_thumbnail_url( 'full' );  ?>
			<?php
		endwhile;

		global $wp_query;
	        $big = 999999999; // need an unlikely integer
	        echo paginate_links( array(
	        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	        'format' => '?paged=%#%',
	        'current' => max( 1, get_query_var('paged') ),
	        'total' => $wp_query->max_num_pages,
	        'prev_text'          => __('<i class="icofont icofont-long-arrow-left"></i>','heroapp'),
	        'next_text'          => __('<i class="icofont icofont-long-arrow-right"></i>','heroapp'),
	        'type'               => 'list',
	    ) );

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
?>