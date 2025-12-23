<?php
/*
Template Name: Ventures
*/
get_header(); ?>

<main class="ventures-page" style="background-color: #000; color: #fff;">

    <!-- ===== PAGE HEADER ===== -->
    <section class="page-header page-header--bg" style="background-image: url('https://telkganesan.com/wp-content/uploads/2022/03/005.jpg');">
        <div class="page-header__overlay"></div>
        <div class="page-header__content">
            <p class="kicker">Portfolio</p>
            <h1>Ventures</h1>
            <p class="page-header__subtitle">Building specialized companies to solve global challenges.</p>
        </div>
    </section>

    <!-- ===== MAIN CONTENT ===== -->
    <section class="section" style="padding: 80px 0;">
        <div class="container">
            
            <div class="row" style="row-gap: 60px;">
                
                <?php
                // Query ventures from custom post type
                $ventures_query = new WP_Query(array(
                    'post_type' => 'venture',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'ASC'
                ));

                if ($ventures_query->have_posts()) :
                    while ($ventures_query->have_posts()) : $ventures_query->the_post();
                        // Get custom field for website URL
                        $website_url = get_post_meta(get_the_ID(), 'website_url', true);
                ?>
                
                <!-- Venture: <?php the_title(); ?> -->
                <div class="col-md-6">
                    <div class="venture-card">
                        <div class="venture-image-wrapper">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', array('class' => 'venture-img')); ?>
                            <?php else : ?>
                                <img src="https://placehold.co/600x350/1a1a1a/fff?text=<?php echo urlencode(get_the_title()); ?>" alt="<?php the_title(); ?>" class="venture-img">
                            <?php endif; ?>
                        </div>
                        <div class="venture-content">
                            <?php if ($website_url) : ?>
                                <a href="<?php echo esc_url($website_url); ?>" target="_blank" class="venture-btn">
                                    <?php echo esc_html(parse_url($website_url, PHP_URL_HOST)); ?>
                                </a>
                            <?php endif; ?>
                            <h3><?php the_title(); ?></h3>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>

                <?php 
                    endwhile;
                    wp_reset_postdata();
                else : 
                ?>
                    <div class="col-12">
                        <p style="text-align: center; padding: 3rem 0;">No ventures found. Please add ventures from the WordPress admin.</p>
                    </div>
                <?php endif; ?>

            </div>

        </div>
    </section>

</main>

<?php get_footer(); ?>
