<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package sporta
 */
?>

	</section><!-- #content --> 

	<footer id="colophon" class="site-footer" role="contentinfo">
    	<div class="grid grid-pad">
        
        	<div class="col-1-4">
    			<?php if ( is_active_sidebar('footer_column_1') ) : ?>
    				<?php dynamic_sidebar('footer_column_1'); ?>    
    			<?php endif; ?>
    		</div><!-- col-1-4 -->
    	
        	<div class="col-1-4">
    			<?php if ( is_active_sidebar('footer_column_2') ) : ?>
    				<?php dynamic_sidebar('footer_column_2'); ?>    
    			<?php endif; ?> 
    		</div><!-- col-1-4 -->
    	
       		<div class="col-1-4">
    			<?php if ( is_active_sidebar('footer_column_3') ) : ?>
    				<?php dynamic_sidebar('footer_column_3'); ?>    
    			<?php endif; ?>
    		</div><!-- col-1-4 -->
    	
        	<div class="col-1-4">
    			<?php if ( is_active_sidebar('footer_column_4') ) : ?>
    				<?php dynamic_sidebar('footer_column_4'); ?>  
    			<?php endif; ?>
    		</div> <!-- col-1-4 -->
        
        </div>
    	
        <div class="grid grid-pad">
			<div class="site-info col-1-1">
			
				<?php if ( get_theme_mod( 'sporta_footerid' ) ) : ?>
        			<?php echo get_theme_mod( 'sporta_footerid' ); ?>  
				<?php else : ?>  
    				<?php	printf( __( 'Theme: %1$s by %2$s', 'sporta' ), 'sporta', '<a href="http://modernthemes.net" rel="designer">modernthemes.net</a>' ); ?> 
				<?php endif; ?> 
		
        	</div><!-- .site-info -->
        </div><!-- grid -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?> 

</body>
</html>
