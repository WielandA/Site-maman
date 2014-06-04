<?php get_header(); ?>
<?php get_sidebar(); ?>

<style type="text/css">
	#main-nav .sub-menu{
		display: block !important;
	}
</style>

<div id="main">
	<nav id="int">
		<?php if (function_exists('qts_language_menu') ) qts_language_menu('text'); ?>
	</nav>
	
	<section id="content">
		<header id="content-header">
			<h1><?php echo get_the_title(46); ?> &middot; <?php single_cat_title(); ?></h1>
			<?php
				// $cat is a global variable containing the current category ID - just what we need
			
				$argsArr = array('orderby' => 'ID', 'child_of' => $cat, "hide_empty" => 0);
				$childCategories = get_categories($argsArr);
			?>
			<nav id="content-sub-nav">
				<ul>
				<?php
					foreach($childCategories as $childCategory){
						$catName = $childCategory->name;
						$niceName = strtolower(preg_replace('/\s/', '-', $catName));
						echo '<li><a href="#'.$niceName.'">'.$catName.'</a></li>';
					}
				?>			
				</ul>
			</nav>
				
		</header>
	</section>
	
	<div id="totoplink">
		<a href="#content-header" id="totop"><i class="top-arrow"></i></a>
	</div>
	
</div> <!--#main-->

<?php get_footer(); ?>