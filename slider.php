<?php
/* Template Name: Slider */

get_header(); ?>

	<div class="hfeed content">

		<?php hybrid_before_content(); // Before content hook ?>

		<?php
			$wp_query = new WP_Query();
			$wp_query->query( array( 'posts_per_page' => get_option( 'posts_per_page' ), 'paged' => $paged ) );
			$more = 0;
		?>
		
		<div id="slider1" class="sliderwrapper">

		<?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

			<div id="post-<?php the_ID(); ?>" class="contentdiv <?php hybrid_entry_class(); ?>">
			
				<?php $image = get_the_image( array( 'custom_key' => array( 'Home Slide', 'home-slide' ), 'default_size' => 'large',  'height' => '240', 'image_class' => 'home-slide', 'width' => '400', 'echo' => false ) ); ?>

				<?php if ( $image ) : ?>
				<div class="home-slide-content">
				<?php endif; ?>
				
				<?php hybrid_before_entry(); // Before entry hook ?>
				
					<div class="entry-content entry">
						<?php the_excerpt(); ?>
						<?php wp_link_pages( array( 'before' => '<p class="pages">' . __('Pages:', 'hybrid'), 'after' => '</p>' ) ); ?>
					</div><!-- .entry-content -->
	
				<?php hybrid_after_entry(); // After entry hook ?>
				
				<?php if ( $image ) : ?>
				</div>
				
				<div class="home-slide-image">
				<?php echo $image; ?>
				</div>
				<?php endif; ?>	
					
			</div><!-- .hentry .post -->

			<?php endwhile; ?>
			
			<div id="paginate-slider1" class="pagination">
			
				<a href="#" class="prev">Previous</a><a href="#" class="next">Next</a>
				
			</div>
			
			<script type="text/javascript">
			
			featuredcontentslider.init({
				id: "slider1",  //id of main slider DIV
				contentsource: ["inline", ""],  //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
				toc: "markup",  //Valid values: "#increment", "markup", ["label1", "label2", etc]
				nextprev: ["Previous", "Next"],  //labels for "prev" and "next" links. Set to "" to hide.
				revealtype: "click", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
				enablefade: [true, 0.05],  //[true/false, fadedegree]
				autorotate: [true, 3000],  //[true/false, pausetime]
				onChange: function(previndex, curindex){  //event handler fired whenever script changes slide
					//previndex holds index of last slide viewed b4 current (1=1st slide, 2nd=2nd etc)
					//curindex holds index of currently shown slide (1=1st slide, 2nd=2nd etc)
				}
			})
			
			</script>
			
			<?php hybrid_after_page(); // After page hook ?>

		<?php else: ?>

			<p class="no-data">
				<?php _e('Sorry, no posts matched your criteria.', 'hybrid'); ?>
			</p><!-- .no-data -->

		<?php endif; ?>
		
		</div>

		<?php hybrid_after_content(); // After content hook ?>

	</div><!-- .content .hfeed -->

<?php get_footer(); ?>