<div id="sidebar">
	<div id="sidebar-content">
  	<header id="sidebar-header">
	<hgroup>
		<a href="<?php echo home_url(); ?>" title=""> 
			<h1>Mich&egrave;le Coupez</h1>
			<h2><?php bloginfo('name'); ?></h2>
		</a>
	</hgroup>
  	</header>
  	<nav id="main-nav">
  		<?php
  		   wp_nav_menu( array('menu'=>'main-nav', 'walker'=>new Main_Nav_Walker()) ); 
  		?>
  	</nav>
  	<footer>
		<p>&copy; 2012-2014 &middot; Mich&egrave;le Coupez</p>
  	</footer>
  	</div> <!-- #sidebar-header -->
</div> <!-- #sidebar -->