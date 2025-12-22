<?php get_header(); ?>

<main class="section" style="padding-top: 120px; min-height: 60vh;">
    <div class="prose" style="margin: 0 auto; max-width: 800px;">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title( '<h1 class="hero__title" style="margin-bottom: 1rem;">', '</h1>' ); ?>
                    </header>

                    <div class="entry-content">
                    
                        <?php the_content(); ?>
                    </div>
                </article>
                <?php
            endwhile;
        else :
            ?>
            <p>No content found.</p>
            <?php
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>
