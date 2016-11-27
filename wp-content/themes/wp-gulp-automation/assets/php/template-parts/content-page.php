<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wvfrm
 */

?>


<div class="page-basic__article">
	<article>
		<section>
			<div class="page-basic__article-content">
				<div class="date">
					<?php wvfrm_posted_on(); ?>
				</div>

				<?php
				the_content( sprintf(
				/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'wvfrm' ),
						array( 'span' => array( 'class' => array() ) )
					)
				) );
				?>

			</div>
		</section>
	</article>
</div>