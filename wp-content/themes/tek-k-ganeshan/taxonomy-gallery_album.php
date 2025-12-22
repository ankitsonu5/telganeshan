<?php
get_header(); 
$term = get_queried_object();
?>

    <main>
        <!-- ===== PAGE HEADER ===== -->
        <section class="page-header page-header--bg"
            style="background-image: url('https://telkganesan.com/wp-content/uploads/2022/03/005.jpg')">
            <div class="page-header__content">
                <a href="<?php echo get_post_type_archive_link('gallery'); ?>" class="back-link" style="color: rgba(255,255,255,0.7); text-decoration: none; display: inline-flex; align-items: center; margin-bottom: 1rem; font-size: 0.9rem;">
                    <i data-lucide="arrow-left" style="width: 16px; margin-right: 5px;"></i> Back to Albums
                </a>
                <p class="kicker">Album</p>
                <h1><?php echo esc_html($term->name); ?></h1>
                <?php if ( ! empty( $term->description ) ) : ?>
                    <p class="page-header__subtitle"><?php echo esc_html($term->description); ?></p>
                <?php endif; ?>
            </div>
        </section>

        <!-- ===== ALBUM PHOTOS GRID ===== -->
        <section class="section">
            <div class="content-wrapper">
                
                <?php 
                // Custom query modifications for Album view
                global $query_string;
                query_posts( $query_string . '&posts_per_page=12&order=ASC' );
                
                if ( have_posts() ) : ?>
                    <div class="gallery" style="grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));">
                        <?php
                        while ( have_posts() ) : the_post();
                            $full_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                            $thumb_image_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                            ?>
                            <a href="<?php echo esc_url($full_image_url); ?>" class="gallery-item-link" aria-label="View photo">
                                <img src="<?php echo esc_url($thumb_image_url); ?>" alt="<?php the_title(); ?>" loading="lazy" style="height: 250px; width: 100%; object-fit: cover; border-radius: 8px;">
                            </a>
                            <?php
                        endwhile;
                        ?>
                    </div>

                    <div class="pagination" style="margin-top: 3rem; text-align: center;">
                        <?php
                        the_posts_pagination( array(
                            'mid_size'  => 2,
                            'prev_text' => '<i data-lucide="chevron-left"></i>',
                            'next_text' => '<i data-lucide="chevron-right"></i>',
                        ) );
                        ?>
                    </div>

                <?php else : ?>
                    <p style="text-align: center;">No photos found in this album.</p>
                <?php endif; ?>

            </div>
        </section>
    </main>

<?php get_footer(); ?>
