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
			
			<?php
			$eventsArgs = array("category" => "events");
			$eventPosts = get_posts($eventsArgs);
			$pageMeta = get_post_meta($post->ID);
			$errorText = $pageMeta["System_no_events"][0];
			
			if ( !empty($eventPosts) ){
				function dashify($text){
					$newText = strtolower(preg_replace('/\s/', '-', $text));
					return $newText;
				}
				
				$ongoingText = $pageMeta["System_ongoing_events"][0];
				$upcomingText = $pageMeta["System_upcoming_events"][0];
				$pastText = $pageMeta["System_past_events"][0];
			?>
			
				<nav id="content-sub-nav">
					<ul>
						<li><a href="#<?php _e(dashify($ongoingText)); ?>"><?php _e($ongoingText); ?></a></li>
						<li><a href="#<?php _e(dashify($upcomingText)); ?>"><?php _e($upcomingText); ?></a></li>
						<li><a href="#<?php _e(dashify($pastText)); ?>"><?php _e($pastText); ?></a></li>			
					</ul>
				</nav>
			</header>
			
			<div id="content-body">
			
			<?php
				$ongoingEvents = array();
				$upcomingEvents = array();
				$pastEvents = array();
				
				foreach($eventPosts as $post){
					$eventMeta = get_post_meta($post->ID);
					
					$startDateUNIX = strtotime($eventMeta["Activite_debut"][0]);
					$endDateUNIX = strtotime($eventMeta["Activite_fin"][0]);
					
					if (time() < $startDateUNIX){
						$upcomingEvents[] = $post;
					} elseif ($endDateUNIX < time()){
						$pastEvents[] = $post;
					} else {
						$ongoingEvents[] = $post;
					}
				}
				
				$pastEvents = array_reverse($pastEvents);
				
				function echoEvents($eventsDateText, $eventsArray, $errorText){
			?>
					<h2 id="<?php _e(dashify($eventsDateText)); ?>"><?php _e($eventsDateText); ?></h2>
				<?php
					if (!empty($eventsArray)){
						foreach($eventsArray as $eKey => $eValue){
							$eventMeta = get_post_meta($eValue->ID);
				?>
							<article class="event">
							<time><?php 
								echo $eventMeta["Activite_debut"][0];
								if ($eventMeta["Activite_fin"][0] != $eventMeta["Activite_debut"][0]){
									echo " - ".$eventMeta["Activite_fin"][0];
								}
							?></time>
							<h3><a href="<?php echo get_permalink($eValue->ID); ?>"><?php _e($eValue->post_title); ?></a></h3>
							<p><?php _e($eventMeta["Activite_location"][0]); ?><p>
							</article>
				<?php
						} // end foreach loop
					} else { // if no upcoming events
						_e($errorText);
					}
				}
				
				echoEvents($ongoingText, $ongoingEvents, $errorText);
				echoEvents($upcomingText, $upcomingEvents, $errorText);
				echoEvents($pastText, $pastEvents, $errorText);
			?>			
			</div> <!-- end #content-body -->
			
			<?php
			} else { // if no events are found
			?>
			
			</header>
			<div id="content-body">
			<?php
				_e($errorText);
			?>
			</div> <!-- end #content-body -->
					
			<?php
			} // end if-else
			?>

		</section> <!--#content .post-->
		
		<div id="totoplink">
			<a href="#main" id="totop" title=""><i class="top-arrow"></i></a>
		</div>

	<?php endwhile; ?>
	
</div> <!--#main-->

<?php get_footer(); ?>
