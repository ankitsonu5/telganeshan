<?php
/*
Template Name: Standard Page
*/
get_header(); ?>

    <main>
        <!-- ===== PAGE HEADER ===== -->
        <?php
        $bg_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
        if ( ! $bg_image ) {
            // Fallback image if no featured image
            $bg_image = 'https://telkganesan.com/wp-content/uploads/2022/03/005.jpg';
        }
        ?>
        <section class="page-header page-header--bg"
            style="background-image: url('<?php echo esc_url( $bg_image ); ?>')">
            <div class="page-header__content">
                <p class="kicker">Tel K. Ganesan</p>
                <h1><?php the_title(); ?></h1>
            </div>
        </section>

        <!-- ===== PAGE CONTENT ===== -->
        <section class="section">
            <div class="content-wrapper">
                <div class="prose" style="margin: 0 auto; max-width: 800px;">
                    <?php
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                            the_content();
                        endwhile;
                    else :
                        echo '<p>No content found.</p>';
                    endif;
                    ?>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>
