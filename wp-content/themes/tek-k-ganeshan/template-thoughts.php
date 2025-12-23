<?php
/*
Template Name: Collection of Thoughts
*/
get_header(); ?>

    <main>
        <!-- ===== PAGE HEADER ===== -->
        <section class="page-header page-header--bg"
            style="background-image: url('<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'full') : 'https://telkganesan.com/wp-content/uploads/2022/03/001.jpg'; ?>')">
            <div class="page-header__overlay"></div>
            <div class="page-header__content">
                <p class="kicker">Tel's Perspective</p>
                <h1>Collection of Thoughts</h1>
                <p class="page-header__subtitle">Reflections on life, leadership, and the journey of constant evolution. A space for ideas to breathe.</p>
            </div>
        </section>

        <!-- ===== BLOG LISTING ===== -->
        <section class="section">
            <div class="content-wrapper">
                <!-- Filter/Category Bar -->
                <div class="filter-bar">
                    <button class="filter-btn active" data-category="all">All Thoughts</button>
                    <?php
                    // Get all thought categories dynamically
                    $thought_categories = get_terms(array(
                        'taxonomy' => 'thought_category',
                        'orderby' => 'name',
                        'order'   => 'ASC',
                        'hide_empty' => true, // Only show categories with posts
                    ));
                    
                    if (!empty($thought_categories) && !is_wp_error($thought_categories)) :
                        foreach ($thought_categories as $category) :
                    ?>
                        <button class="filter-btn" data-category="<?php echo esc_attr($category->slug); ?>">
                            <?php echo esc_html($category->name); ?>
                        </button>
                    <?php 
                        endforeach;
                    endif;
                    ?>
                </div>

                <!-- Blog Grid -->
                <div class="blog-grid" style="grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));">
                    <?php
                    // Custom Query to fetch recent posts
                    // If you want to filter by a specific category 'thoughts', add 'category_name' => 'thoughts'
                    $args = array(
                        'post_type' => 'thought', // Updated to new CPT
                        'posts_per_page' => 12,
                        'paged' => get_query_var('paged') ? get_query_var('paged') : 1
                    );
                    $the_query = new WP_Query( $args );

                    if ( $the_query->have_posts() ) :
                        while ( $the_query->have_posts() ) : $the_query->the_post();
                            // Get Thought Category
                            $terms = get_the_terms( get_the_ID(), 'thought_category' );
                            $cat_name = !empty($terms) && !is_wp_error($terms) ? $terms[0]->name : 'Thought';
                    ?>
                        <article class="blog-card post">
                            <a href="<?php the_permalink(); ?>" class="post__media">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium_large'); ?>
                                <?php else: ?>
                                    <!-- Fallback image -->
                                    <img src="https://telkganesan.com/wp-content/uploads/2022/03/005.jpg" alt="<?php the_title(); ?>" />
                                <?php endif; ?>
                            </a>
                            <div class="post__body">
                                <div class="post__meta" style="margin-bottom: 0.5rem; display: flex; justify-content: space-between;">
                                    <span class="blog-card__category" style="color: var(--accent);"><?php echo esc_html($cat_name); ?></span>
                                    <span><?php echo get_the_date(); ?></span>
                                </div>
                                <h3 class="post__title" style="font-size: 1.25rem; margin-bottom: 0.7rem;">
                                    <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: inherit;"><?php the_title(); ?></a>
                                </h3>
                                <div style="opacity: 0.8; font-size: 0.95rem; line-height: 1.6; margin-bottom: 1rem;">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="link">Read Thought <i data-lucide="arrow-right" style="width: 16px;"></i></a>
                            </div>
                        </article>
                    <?php 
                        endwhile;
                        wp_reset_postdata();
                    else : 
                    ?>
                        <div style="grid-column: 1 / -1; text-align: center; padding: 4rem;">
                            <h3 style="opacity: 0.5;">No thoughts shared yet.</h3>
                            <p>Check back soon for updates.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Pagination -->
                <div class="pagination" style="margin-top: 3rem; display: flex; justify-content: center; gap: 0.5rem;">
                   <?php
                   echo paginate_links( array(
                       'total' => $the_query->max_num_pages,
                       'prev_text' => '<span class="button button--ghost"><i data-lucide="chevron-left"></i> Previous</span>',
                       'next_text' => '<span class="button button--ghost">Next <i data-lucide="chevron-right"></i></span>',
                       'type' => 'list',
                   )); 
                   ?>
                </div>
            </div>
        </section>
    </main>

    <style>
        /* Add some specific styles for this page if needed locally, though style.css handles most */
        ul.page-numbers {
            display: flex;
            list-style: none;
            padding: 0;
            gap: 0.5rem;
        }
        ul.page-numbers li a, ul.page-numbers li span {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 1rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            color: var(--text);
            text-decoration: none;
            transition: 0.2s;
        }
        ul.page-numbers li span.current, ul.page-numbers li a:hover {
            background: var(--accent);
            color: black;
            border-color: var(--accent);
        }
    </style>

<?php get_footer(); ?>
