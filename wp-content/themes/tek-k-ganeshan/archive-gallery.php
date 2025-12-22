<?php
get_header(); ?>

    <main>
        <!-- ===== PAGE HEADER ===== -->
        <section class="page-header page-header--bg"
            style="background-image: url('https://telkganesan.com/wp-content/uploads/2022/03/005.jpg')">
            <div class="page-header__content">
                <p class="kicker">Moments & Events</p>
                <h1>Gallery</h1>
            </div>
        </section>

        <!-- ===== ALBUMS GRID (Categories) ===== -->
        <section class="section">
            <div class="content-wrapper">
                
                <?php
                // Get all albums
                $albums = get_terms( array(
                    'taxonomy' => 'gallery_album',
                    'hide_empty' => true,
                ) );

                if ( ! empty( $albums ) && ! is_wp_error( $albums ) ) : ?>
                    <div class="gallery" style="grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem;">
                        <?php
                        foreach ( $albums as $album ) :
                            // Get the first post in this album to use as cover image
                            $args = array(
                                'post_type' => 'gallery',
                                'posts_per_page' => 1,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'gallery_album',
                                        'field' => 'term_id',
                                        'terms' => $album->term_id,
                                    ),
                                ),
                            );
                            $cover_query = new WP_Query( $args );
                            $cover_image = 'https://telkganesan.com/wp-content/uploads/2022/03/005.jpg'; // Default fallback
                            
                            if ( $cover_query->have_posts() ) {
                                while ( $cover_query->have_posts() ) {
                                    $cover_query->the_post();
                                    if ( has_post_thumbnail() ) {
                                        $cover_image = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                                    }
                                }
                                wp_reset_postdata();
                            }
                            ?>
                            <a href="<?php echo esc_url( get_term_link( $album ) ); ?>" class="album-card" style="text-decoration: none; display: block; group">
                                <div style="position: relative; border-radius: 12px; overflow: hidden; aspect-ratio: 4/3; margin-bottom: 1rem; border: 1px solid var(--border);">
                                    <img src="<?php echo esc_url($cover_image); ?>" alt="<?php echo esc_attr($album->name); ?>" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" class="album-cover">
                                    <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); display: flex; align-items: flex-end; padding: 1.5rem;">
                                        <div>
                                            <h3 style="margin: 0; font-size: 1.25rem; color: #fff;"><?php echo esc_html($album->name); ?></h3>
                                            <span style="font-size: 0.9rem; color: rgba(255,255,255,0.7);"><?php echo $album->count; ?> Photos</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <?php
                        endforeach;
                        ?>
                    </div>

                <?php else : ?>
                    <div style="text-align: center; padding: 4rem 0;">
                        <i data-lucide="image" style="width: 48px; height: 48px; opacity: 0.5; margin-bottom: 1rem;"></i>
                        <p>No albums found. Create an album in the dashboard to get started.</p>
                    </div>
                <?php endif; ?>

            </div>
        </section>
    </main>

<?php get_footer(); ?>
