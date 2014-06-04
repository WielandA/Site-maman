<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="main">
	<nav id="int">
		<?php if (function_exists('qts_language_menu') ) qts_language_menu('text'); ?>
	</nav>
	
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<section id="content" <?php post_class('page'); ?>>
			<header id="content-header">
				<h1><?php the_title(); ?></h1>
			</header>
			
			<div id="content-body">
				<?php the_content(); ?>
			</div> <!-- #content-body -->

		</section> <!--#content .post-->
		
		<div id="totoplink">
			<a href="#main" id="totop" title=""><i class="top-arrow"></i></a>
		</div>

	<?php endwhile; ?>
	
</div> <!--#main-->

<?php get_footer(); ?>
