<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="main">
	<nav id="int">
		<?php if (function_exists('qts_language_menu') ) qts_language_menu('text'); ?>
	</nav>


	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<section id="content"<?php //the_ID(); post_class('post'); ?>>

			<header id="content-header">
				<h1><?php the_title(); ?></h1>
				<time><i class="icon-calendar"></i><?php 
					the_date('j F Y');
				?></time>
			</header>
			
			<div id="content-body">
				<?php the_content(); ?>
			</div>
			
		</section><!-- #content -->
	<?php endwhile; /* end loop */ ?>
	
</div> <!--#main-->

<?php get_footer(); ?>