<?php
/*
Template Name: Videos (Gallery)
*/
get_header(); 
?>

<!-- Overwrite styles locally for immediate preview if needed, or rely on style.css (v1.56) -->
<main class="videos-page" style="background-color: #141414;">

    <!-- 1. HERO SECTION (Full Width, Impactful) -->
    <?php 
    // Query Latest Feature Video
    $hero_video_args = array(
        'post_type' => 'video',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC',
        // Optional: Filter by specific 'featured' category if it exists
        // 'tax_query' => array( array( 'taxonomy' => 'video_category', 'field' => 'slug', 'terms' => 'featured' ) )
    );
    $hero_query = new WP_Query($hero_video_args);
    
    if ($hero_query->have_posts()) :
        while ($hero_query->have_posts()) : $hero_query->the_post();
            $hero_video_url = get_post_meta(get_the_ID(), '_video_url', true);
            $hero_bg_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
            
            // Try to get thumbnail from video if no featured image
            if (!$hero_bg_image) {
                $hero_bg_image = tek_get_video_thumbnail($hero_video_url);
            }
            
            // Fallback image
            if (!$hero_bg_image) $hero_bg_image = 'https://telkganesan.com/wp-content/uploads/2022/03/005.jpg';
    ?>
    <section class="video-hero-featured">
        <div class="video-hero-bg">
            <img src="<?php echo esc_url($hero_bg_image); ?>" alt="<?php the_title(); ?>">
        </div>
        <div class="video-hero-content">
            <div class="hero-type-tag">
                  Feature
            </div>
            <h1><?php the_title(); ?></h1>
            <div class="video-hero-desc">
                <?php echo get_the_excerpt(); ?>
            </div>
            <div class="hero-actions">
                <?php $embed_url = tek_get_video_embed_url($hero_video_url); ?>
                <button onclick="openHeroVideo('<?php echo esc_js($embed_url); ?>')" class="btn-play">
                   <i data-lucide="play" style="fill: black; margin-right: 8px; width: 24px;"></i> Play
                </button>
                <a href="<?php the_permalink(); ?>" class="btn-more">
                   <i data-lucide="info" style="margin-right: 8px; width: 24px;"></i> More Info
                </a>
            </div>
        </div>
    </section>
    <?php 
        endwhile;
        wp_reset_postdata();
    endif; 
    ?>

    <!-- 2. CATEGORY CAROUSELS (Netflix Style Rows) -->
    <div style="margin-top: -100px; position: relative; z-index: 10;">
        
        <?php
        // Define Categories to show rows for
        // 1. Always show Latest
        $categories_to_show = array(
            'latest' => 'Latest Releases',
        );

        // 2. Fetch Dynamic Categories from 'video_category' taxonomy
        $all_video_cats = get_terms( array(
            'taxonomy' => 'video_category',
            'hide_empty' => true,
        ) );

        if ( ! empty( $all_video_cats ) && ! is_wp_error( $all_video_cats ) ) {
            foreach ( $all_video_cats as $term ) {
                $categories_to_show[ $term->slug ] = $term->name;
            }
        }

        foreach ($categories_to_show as $slug => $title) :
            
            // Custom args based on category
            $args = array(
                'post_type' => 'video',
                'posts_per_page' => 10, // Max items in carousel
                'orderby' => 'date',
                'order' => 'DESC',
            );

            // Add taxonomy query if not 'latest'
            if ($slug !== 'latest') {
                 $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'video_category',
                        'field' => 'slug',
                        'terms' => $slug
                    )
                );
            } else {
                // For Latest, maybe skip the hero video?
                $args['offset'] = 1; 
            }

            $cat_query = new WP_Query($args);

            if ($cat_query->have_posts()) :
        ?>
        <div class="video-category-row">
            <h3 class="row-title"><?php echo esc_html($title); ?></h3>
            
            <!-- Swiper Container -->
            <div class="swiper video-carousel-swiper">
                <div class="swiper-wrapper">
                    <?php while ($cat_query->have_posts()) : $cat_query->the_post(); 
                          $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                          if (!$thumb_url) {
                              $video_url = get_post_meta(get_the_ID(), '_video_url', true);
                              $thumb_url = tek_get_video_thumbnail($video_url);
                          }
                          if (!$thumb_url) $thumb_url = 'https://telkganesan.com/wp-content/uploads/2022/03/005.jpg'; // Fallback
                    ?>
                    <div class="swiper-slide">
                        <div class="video-card-netflix" onclick="window.location.href='<?php the_permalink(); ?>'">
                            <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title(); ?>" loading="lazy">
                            <div class="card-overlay">
                                <h4 class="card-title-mini"><?php the_title(); ?></h4>
                                <div style="display:flex; align-items:center; gap:5px; margin-top:5px;">
                                    <span style="background: white; color: black; border-radius: 50%; padding: 4px;"><i data-lucide="play" style="width: 10px; height: 10px; fill: black; display: block;"></i></span>
                                    <span style="font-size: 0.7rem; color: #ccc;"><?php echo get_the_date('Y'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
                <!-- Nav Buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <?php 
            endif;
        endforeach; 
        ?>
        
    </div>

    <!-- Video Modal -->
    <dialog id="videoModal" class="video-modal">
      <div class="video-modal-content">
        <button class="video-modal-close" onclick="document.getElementById('videoModal').close()">&times;</button>
        <div class="video-embed-container" id="videoModalContainer">
            <!-- Video iframe/tag will be injected here -->
        </div>
      </div>
    </dialog>

<?php get_footer(); ?>
