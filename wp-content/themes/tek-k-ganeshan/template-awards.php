<?php
/*
Template Name: Awards Listing
*/
get_header(); ?>

<main class="awards-page" style="background: #0f1115; color: #fff;">
    <!-- ===== PAGE HEADER ===== -->
    <section class="page-header page-header--bg"
        style="background-image: url('https://telkganesan.com/wp-content/uploads/2022/03/006.jpg'); margin-bottom: 0;">
        <div class="page-header__overlay"></div>
        <div class="page-header__content">
            <h1 style="font-size: 3.5rem; color: #fff; margin: 0;">Awards</h1>
            <p class="page-header__subtitle" style="color: rgba(255,255,255,0.8); margin-top: 1rem;">Celebrating Excellence & Impact</p>
        </div>
    </section>



    <?php
    // Helper function to render award section
    function render_award_section($title, $category_slug) {
        $args = array(
            'post_type' => 'award',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'award_category',
                    'field' => 'slug',
                    'terms' => $category_slug,
                ),
            ),
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) : ?>
            <section class="section" style="padding: 4rem 0; border-bottom: 1px solid rgba(255,255,255,0.1);">
                <div class="content-wrapper">
                    <h2 class="section-title text-center" style="color: #fff; margin-bottom: 3rem;"><?php echo esc_html($title); ?></h2>
                    <div class="awards-grid">
                        <?php while ($query->have_posts()) : $query->the_post(); 
                            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                            if (!$image_url) {
                                // Default placeholder if no image
                                $image_url = 'https://placehold.co/600x800/1a1a1a/fff?text=' . urlencode(get_the_title());
                            }
                        ?>
                            <a href="<?php the_permalink(); ?>" class="award-item">
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>">
                                <div class="award-overlay">
                                    <h5><?php the_title(); ?></h5>
                                    <?php if (has_excerpt()) : ?>
                                        <p><?php echo get_the_excerpt(); ?></p>
                                    <?php else : ?>
                                        <!-- Optional: Truncate content if no excerpt -->
                                         <p><?php echo wp_trim_words(get_the_content(), 15); ?></p>
                                    <?php endif; ?>
                                </div>
                            </a>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>
        <?php endif;
    }

    // Render the 3 sections dynamically
    // Note: User needs to create these categories with these slugs in the backend
    render_award_section('Awards and Honors', 'awards-and-honors');
    render_award_section('Kyyba Awards', 'kyyba-awards');
    render_award_section('Corporate Awards', 'corporate-awards');
    ?>

</main>

<style>
/* Scoped Styles for Awards Page */
.awards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 2rem;
}

.award-item {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    aspect-ratio: 3/4; /* Vertical Portrait Card */
    background: #1a1a1a;
    box-shadow: 0 4px 20px rgba(0,0,0,0.3);
    transition: transform 0.4s ease;
    cursor: pointer;
    display: block; /* Important for anchor */
    text-decoration: none; /* Remove underline */
}

.award-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.5);
}

.award-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.6s ease;
}

.award-item:hover img {
    transform: scale(1.1);
}

.award-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 2rem 1.5rem;
    background: linear-gradient(to top, rgba(0,0,0,0.95) 0%, rgba(0,0,0,0.7) 50%, transparent 100%);
    color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    transform: translateY(10px);
    transition: transform 0.4s;
}

.award-item:hover .award-overlay {
    transform: translateY(0);
}

.award-item h5 {
    color: #fff;
    font-size: 1.5rem;
    margin: 0 0 0.5rem 0;
    font-weight: 700;
    line-height: 1.2;
    text-shadow: 0 2px 4px rgba(0,0,0,0.5);
}

.award-item p {
    font-size: 0.95rem;
    color: rgba(255,255,255,0.8);
    margin: 0;
    line-height: 1.4;
    opacity: 0;
    transform: translateY(10px);
    transition: opacity 0.4s 0.1s, transform 0.4s 0.1s;
    height: 0; 
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}

/* Show details on hover similar to reference where title is main focus */
.award-item:hover p {
    opacity: 1;
    transform: translateY(0);
    height: auto;
    margin-top: 0.5rem;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
}
</style>

</main>

<style>
/* Scoped Styles for Awards Page */
.awards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 2rem;
}

.award-item {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    aspect-ratio: 3/4; /* Vertical Portrait Card */
    background: #1a1a1a;
    box-shadow: 0 4px 20px rgba(0,0,0,0.3);
    transition: transform 0.4s ease;
    cursor: pointer;
    display: block; /* Important for anchor */
    text-decoration: none; /* Remove underline */
}

.award-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.5);
}

.award-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.6s ease;
}

.award-item:hover img {
    transform: scale(1.1);
}

.award-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 2rem 1.5rem;
    background: linear-gradient(to top, rgba(0,0,0,0.95) 0%, rgba(0,0,0,0.7) 50%, transparent 100%);
    color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    transform: translateY(10px);
    transition: transform 0.4s;
}

.award-item:hover .award-overlay {
    transform: translateY(0);
}

.award-item h5 {
    color: #fff;
    font-size: 1.5rem;
    margin: 0 0 0.5rem 0;
    font-weight: 700;
    line-height: 1.2;
    text-shadow: 0 2px 4px rgba(0,0,0,0.5);
}

.award-item p {
    font-size: 0.95rem;
    color: rgba(255,255,255,0.8);
    margin: 0;
    line-height: 1.4;
    opacity: 0;
    transform: translateY(10px);
    transition: opacity 0.4s 0.1s, transform 0.4s 0.1s;
    height: 0; 
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}

/* Show details on hover similar to reference where title is main focus */
.award-item:hover p {
    opacity: 1;
    transform: translateY(0);
    height: auto;
    margin-top: 0.5rem;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
}
</style>

<?php get_footer(); ?>
