<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : // Only display if post has Featured Image ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; // End if has_post_thumbnail ?>

	<div class="post-content">
		<header class="entry-header">
			<div class="entry-date">
				<?php the_date( 'M' ); ?><br/>
				<?php the_time( 'j' ); ?>
			</div>

			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

			<?php if ( 'post' == get_post_type() ) : ?>
				<div class="entry-meta">
					<?php // excursion_posted_on(); ?>
					<span class="entry-author"><?php the_author(); ?></span> &nbsp;
					<span class="entry-comments"><?php comments_number( 'No comments yet', 'One comment', '% responses' ); ?></span>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_excerpt(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'excursion' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta">
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
				<?php
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( __( ', ', 'excursion' ) );
					if ( $categories_list && excursion_categorized_blog() ) :
				?>

				<!--
				<span class="cat-links">
					<?php printf( __( 'Posted in %1$s', 'excursion' ), $categories_list ); ?>
				</span>

				<?php endif; // End if categories ?>

				<?php
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', __( '', 'excursion' ) );
					if ( $tags_list ) :
				?>
				<span class="tags-links">
					<?php printf( __( '%1$s', 'excursion' ), $tags_list ); ?>
				</span>
				-->
				<?php endif; // End if $tags_list ?>
			<?php endif; // End if 'post' == get_post_type() ?>

			<?php edit_post_link( __( 'Edit', 'excursion' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</div><!-- .post-content -->
</article><!-- #post-## -->
