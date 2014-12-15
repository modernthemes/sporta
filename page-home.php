<?php
/**
Template Name: Home Page
 *
 * @package sporta
 */

get_header(); ?>

	<div id="sequence">
		<span class="sequence-prev" alt="Previous" /><i class="fa fa-angle-left"></i></span>
		<span class="sequence-next" alt="Next" /><i class="fa fa-angle-right"></i></span>

			<ul class="sequence-canvas">
            
            	<?php query_posts( array ( 'post_type' => 'slider', 'posts_per_page' => 5 ) );
			
					while ( have_posts() ) : the_post(); ?> 
                    
                	<li>
                    <div class="slide-title"><h2><?php the_title(); ?></h2></div>
                    <button class="slider-btn" href="<?php global $post; $text = get_post_meta( $post->ID, '_sr_slider_url', true ); echo $text; ?>"><?php global $post; $text = get_post_meta( $post->ID, '_sr_slider_button', true ); echo $text; ?> <span><i class="fa fa-angle-right"></i></span></button>
                 	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); $url = $thumb['0']; ?>	
                    <div class="bg" style="background: url('<?php echo $url ?>') center center; -webkit-background-size: cover; -moz-background-size: cover; -ms-background-size: cover; -o-background-size: cover; background-size: cover;">
                	</li>
        
				<?php endwhile; // end of the loop. ?> 

			</ul><!--.sequence-canvas-->
	</div><!--#sequence-->
    
    <?php if( get_theme_mod( 'active_featured' ) == '') : ?>
    <?php if (class_exists('Woocommerce')) : ?> 

	<div class="featured-products">
		
        <div class="featured-title">
			<?php if ( get_theme_mod( 'sporta_first_title' ) ) : ?>
   				<?php echo get_theme_mod( 'sporta_first_title' ); ?>
			<?php else : ?>
			<?php endif; ?> 
 		</div> <!--.featured-title-->
  
		<div class="grid no-max">
			<ul class="products">
			<?php
				$args = array(
				'post_type' => 'product',
				'posts_per_page' => 4,
				'meta_key' => '_featured', 
				'meta_value' => 'yes'
				);
			$loop = new WP_Query( $args );
			if ( $loop->have_posts() ) {
				while ( $loop->have_posts() ) : $loop->the_post();
					woocommerce_get_template_part( 'content', 'front' );
				endwhile;
			} else {
				echo __( 'No products found' );
			}
			wp_reset_postdata();
			?>
			</ul><!--/.products-->
			</div><!--.no max-->
		</div><!--.featured-products-->
    
    <?php endif; ?>
    <?php endif; ?>
      
    <?php if( get_theme_mod( 'active_ads' ) == '') : ?> 

		<div class="featured-ads">
			<div class="grid no-max">
	
    			<?php if ( is_active_sidebar('home-first-widget') ) : ?>
    				<div class="ad">
    					<?php dynamic_sidebar('home-first-widget'); ?> 
    				</div><!--.ad-->
    			<?php endif; ?>
	
    			<?php if ( is_active_sidebar('home-second-widget') ) : ?>
    				<div class="ad">
    					<?php dynamic_sidebar('home-second-widget'); ?>
    				</div> <!--.ad-->   
    			<?php endif; ?>
    
    			<?php if ( is_active_sidebar('home-third-widget') ) : ?>
    				<div class="ad">
    					<?php dynamic_sidebar('home-third-widget'); ?> 
    				</div>  <!--.ad-->  
    			<?php endif; ?>
			
            </div><!--.no max-->
		</div><!--.featured-ads-->
    <?php endif; ?>
        
    <?php if( get_theme_mod( 'active_latest' ) == '') : ?>
    <?php if (class_exists('Woocommerce')) : ?>

		<div class="latest-products">
			<div class="latest-title"> 
	
				<?php if ( get_theme_mod( 'sporta_second_title' ) ) : ?> 
   					<?php echo get_theme_mod( 'sporta_second_title' ); ?>
				<?php else : ?>
				<?php endif; ?> 
	
    		</div> <!--.latest-title-->

		<div class="grid no-max">
	
    			<ul class="products">
					<?php
					$args = array(
					'post_type' => 'product',
					'posts_per_page' => 4
					);
					$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) {
						while ( $loop->have_posts() ) : $loop->the_post();
					woocommerce_get_template_part( 'content', 'front' );
					endwhile;
					} else {
					echo __( 'No products found' );
					}
					wp_reset_postdata();
					?>
				</ul><!--.products--> 
			</div><!--.no max-->
		</div><!--.latest-products-->
  
  <?php endif; ?>
  <?php endif; ?>
  
  <?php if( get_theme_mod( 'active_blog' ) == '') : ?>

	<div class="home-news-section">
		<div class="grid no-max">
			<div class="latest-story">
    
        		<?php
				global $post;
				$args = array( 'post_type' => 'post', 'posts_per_page' => 1 );
				$myposts = get_posts( $args );
				foreach( $myposts as $post ) :	setup_postdata($post); ?>           
                <div class="home-news-content">
    			<a href="<?php the_permalink(); ?>"><div class="plus"><i class="fa fa-plus"></i></div></a>
                <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a><h5><?php the_date(); ?></h5></div>
                <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); $url = $thumb['0']; ?>
    			<div class="latest-story-img" style="background: url('<?php echo $url?>');"></div> 
				<?php endforeach; ?>
    		
            </div><!--.latest-story-->
    
    		<div class="blog-feed">
    			
                <?php if ( get_theme_mod( 'sporta_blog_title' ) ) : ?> 
   					<?php echo get_theme_mod( 'sporta_blog_title' ); ?>
				<?php else : ?>
				<?php endif; ?> 
                  
    			<?php
				global $post;
				$args = array( 'post_type' => 'post', 'posts_per_page' => 3, 'offset' => 1 );
				$myposts = get_posts( $args );
				foreach( $myposts as $post ) :	setup_postdata($post); ?>
				<div class="home-blog-article">
                <h3><?php the_date(); ?></h3>
                <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                <a href="<?php the_permalink(); ?>"><p>Read more <i class="fa fa-caret-right"></i></p></a>
                </div>
				<?php endforeach; ?>
    			<button class="red">View All</button>     
    		 
            </div><!--.blog-feed-->
		</div><!--.no max-->
	</div><!--.home news section-->
    
    <?php endif; ?>
    
<?php get_footer(); ?>
