<?php
	get_header();
	 the_post()
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<article id="post-<?php the_ID(); ?>" class="hentry">

				<header class="entry-header">
					<h1 class="entry-title">Data Dump</h1>
				</header><!-- .entry-header -->

				<div class="entry-content">

					<?php
					echo '<ul>';

						foreach($wp_query->post as $key => $value) :

							echo '<li><strong>' . $key . ':</strong> ' . $value . '</li>'; 

						endforeach;

					echo '</ul>';
					?>

				</div>

			</article>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php
	get_footer();
?>