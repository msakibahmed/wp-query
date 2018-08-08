<?php

$q = new WP_Query( array(
							'posts_per_page'=>3,
                            'post_type'=>'course', //Post type
                            'paged' => get_query_var('paged') ? get_query_var('paged') : 1) 
                        ); 

while ($q -> have_posts()) : $q -> the_post(); ?>
	<div class="col-xs-12 file">
		<a href="<?php the_permalink(); ?>" class="file-title" target="_blank">
		<i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo get_the_title(); ?>
		</a>
		<div class="file-description"><?php the_content(); ?></div>
	</div>
	<?php
endwhile;



$big = 999999999; // need an unlikely integer
$links  =  paginate_links( array(
    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'total' => $q->max_num_pages,
    "type"      => "list",
) );

echo $links;

wp_reset_postdata();