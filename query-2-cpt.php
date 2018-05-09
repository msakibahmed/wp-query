    <?php 

        global $post;
        $args2 = array(
            'posts_per_page'  => -1,
            'post_type'       => 'clienttestimonial',
        );
        $query2 = new WP_Query( $args2 );
        while ( $query2->have_posts() ) : $query2->the_post();
            if ( has_post_thumbnail() ) : 
                the_post_thumbnail('post-thumbnail', ['class' => 'img-circle', 'title' => 'Feature image']); 
            endif; 

            the_title();
            the_content();
        endwhile;
        wp_reset_postdata();

    ?>