<?php
/**
 * @package sporta
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
		
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

			<?php if ( 'post' == get_post_type() ) : ?>
		
        	<div class="entry-meta">
				<?php sporta_posted_on(); ?>
			</div><!-- .entry-meta -->
		
			<?php endif; ?>
		
        </header><!-- .entry-header -->

		<div class="entry-content">
    
    		<?php the_post_thumbnail(); ?>
            
            <?php
				if ( 'option2' == sporta_sanitize_index_content( get_theme_mod( 'sporta_post_content' ) ) ) :
				the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'sporta' ) );
				else :
				the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'sporta' ) );
				endif;
			?> 

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'sporta' ),
					'after'  => '</div>',
				) );
			?>
        
		</div><!-- .entry-content -->
	
    	<a href="<?php the_permalink(); ?>"><button>Read More</button></a>
	
	</article><!-- #post-## -->
