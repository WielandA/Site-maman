<?php 
/*
Template Name: Page-des-liens
*/

get_header(); ?>
<?php get_sidebar(); ?>

<div id="main">
	<nav id="int">
		<?php if (function_exists('qts_language_menu') ) qts_language_menu('text'); ?>
	</nav>
	
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<section id="content" <?php post_class('page'); ?>>
			<header id="content-header">
				<h1><?php the_title(); ?></h1>
			
				<?php
				  $taxonomy = 'link_category';
				  //$args = array('hide_empty' => false);
				  $terms = get_terms( $taxonomy, $args );
				  
				  if ($terms) {
				  	echo '<nav id="content-sub-nav">';
				  
				    foreach($terms as $term) {
				    	$link_category_id = $term->term_id;
				    	$link_category_name = $term->name;
				    
				    	echo '<a href="#linkcat-'.$link_category_id.'">'.$link_category_name.'</a>';
				    }
				    
				    echo '</nav>';
				  }
				?>
			</header>
			
			<div id="bookmarks-body">
				<ul id="bookmarks-list">
				<?php 
					$bookmarks_options = array();
				
					wp_list_bookmarks($bookmarks_options); 
				?>
				</ul>
			</div>	

		</section> <!--#content .post-->
		
		<div id="totoplink">
			<a href="#content-header" id="totop"><i class="top-arrow"></i></a>
		</div>

	<?php endwhile; ?>
	
	
</div> <!--#main-->

<?php get_footer(); ?>
