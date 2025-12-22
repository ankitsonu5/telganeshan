<?php get_header(); ?>

<main id="main-content" class="site-main" style="background-color: var(--bg);">

<?php
while ( have_posts() ) :
    the_post();
    // Get the video URL from the custom field
    $video_url = get_post_meta( get_the_ID(), '_video_url', true );
    
    // Use the helper function (now in functions.php) to get the embed URL
    $embed_url = '';
    if ( function_exists('tek_get_video_embed_url') ) {
        $embed_url = tek_get_video_embed_url( $video_url );
    }
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <!-- Video Viewer Section (Dark Background) -->
        <div style="background: #050505; padding: 6rem 0 4rem; border-bottom: 1px solid var(--border);">
            <div class="content-wrapper">
                
                <!-- Title -->
                <header class="entry-header text-center mb-5">
                    <?php 
                    $categories = get_the_terms( get_the_ID(), 'video_category' );
                    if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
                        echo '<p class="kicker" style="margin-bottom: 1rem;">' . esc_html( $categories[0]->name ) . '</p>';
                    }
                    ?>
                    <h3 class="entry-title"><?php the_title(); ?></h3>
                </header>

                <!-- Video Player -->
                <div class="video-container" style="max-width: 1000px; margin: 0 auto; box-shadow: 0 20px 50px rgba(0,0,0,0.5); border-radius: 16px; overflow: hidden; background: #000;">
                     <?php if ( $embed_url ) : ?>
                        <?php if ( preg_match('/\.(mp4|webm|ogg)$/i', $embed_url) ) : ?>
                            <!-- Native HTML5 Video -->
                            <video src="<?php echo esc_url( $embed_url ); ?>" controls autoplay style="width: 100%; display: block; max-height: 80vh;"></video>
                        <?php else : ?>
                            <!-- Iframe (YouTube/Vimeo) -->
                            <div style="position: relative; padding-bottom: 56.25%; height: 0;">
                                <iframe src="<?php echo esc_url( $embed_url ); ?>" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        <?php endif; ?>
                    <?php else : ?>
                        <!-- Fallback / Error Message -->
                        <div style="padding: 4rem; text-align: center; color: var(--muted);">
                            <i data-lucide="video-off" style="width: 48px; height: 48px; display: block; margin: 0 auto 1rem; opacity: 0.5;"></i>
                            <p>Video not found or invalid URL URL: <?php echo esc_html($video_url); ?></p>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>

        <!-- Description & Context -->
        <div class="section">
            <div class="content-wrapper" style="max-width: 800px;">
                <div class="entry-content prose">
                    <?php the_content(); ?>
                </div>
                
                <div class="cta-section" style="margin-top: 4rem; padding-top: 2rem; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center;">
                    <a href="<?php echo home_url('/videos'); ?>" class="button button--ghost"><i data-lucide="arrow-left"></i> Back to Gallery</a>
                    
                    <!-- Share (Placeholder) -->
                    <div style="display: flex; gap: 10px;">
                        <span style="color: var(--muted); font-size: 0.9rem; align-self: center;">Share:</span>
                        <a href="#" class="button button--sm button--ghost" aria-label="Share on LinkedIn"><i data-lucide="linkedin"></i></a>
                        <a href="#" class="button button--sm button--ghost" aria-label="Share on Twitter"><i data-lucide="twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </article>

<?php endwhile; // End of the loop. ?>

</main>

<?php get_footer(); ?>
