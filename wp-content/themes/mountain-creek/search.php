<?php get_header(); ?>      
      <div id="container">                   
            <div id="content">
                  <div class="col-two"> 
                   <div class="post-wrap rounds">
	                              <div class="postcat rounds">
	  				<h2 class="breadcrumb"><?php _e("Search Result for","mountaincreek");?> <?php the_search_query(); ?></h2> 
	  				</div></div>                                                                                 
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $blogurl = get_template_directory_uri(); ?>
	                        <div class="post-wrap rounds">
	                              <div class="post rounds">
	                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	                                    <p class="meta-common"><?php the_time('M - d Y') ?></p><div style="clear:both"></div>
	                                    <div class="post-data">
	                                    <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>                  
								    <?php the_excerpt(); ?>                       
								     <div style="clear:both"></div>
	                                    </div>
	                                  <div class="tags"><?php the_tags(); ?></div>     
	                              </div>
	                        </div><!-- end of post-wrap div -->
                       <?php endwhile; ?>
				       <span  style="float:right;">
					   <?php global $wp_query;
					  $big = 999999999; 
					  echo paginate_links( array(
					  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					  'format' => '?paged=%#%',
					  'current' => max( 1, get_query_var('paged') ),
					  'total' => $wp_query->max_num_pages
					  ) );?>
				</span>				
				<?php else: ?>   				
				 <div class="post-wrap rounds">	                              
	            <div class="post rounds">
	            	<p><?php _e('Sorry, no posts matched your criteria.','mountaincreek'); ?></p> 
	            	  </div>
				</div>   
				    <?php endif; ?>                            
                  </div><!-- end of col-two -->                  
                  <div class="col-one">
                 <?php get_sidebar(); ?> 
                  </div>
            </div><!--end of content div-->    
         
      </div><!--end of container div-->
<?php get_footer(); ?>