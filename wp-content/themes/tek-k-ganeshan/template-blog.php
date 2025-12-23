<?php
/*
Template Name: Blog Listing
*/
get_header(); ?>

    <main>
        <!-- ===== PAGE HEADER ===== -->
        <section class="page-header page-header--bg"
            style="background-image: url('<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'full') : 'https://telkganesan.com/wp-content/uploads/2022/03/001-1.jpg'; ?>')">
            <div class="page-header__content">
                <p class="kicker">Insights & Thought Leadership</p>
                <h1>Articles & Blog</h1>
                <p class="page-header__subtitle">Perspectives on entrepreneurship, technology, media, and building
                    meaningful ventures.</p>
            </div>
        </section>

        <!-- ===== BLOG LISTING ===== -->
        <section class="section">
            <div class="content-wrapper">
                <!-- Filter/Category Bar -->
                <div class="filter-bar">
                    <button class="filter-btn active" data-category="all">All Articles</button>
                    <?php
                    // Get all categories dynamically
                    $categories = get_categories(array(
                        'orderby' => 'name',
                        'order'   => 'ASC',
                        'hide_empty' => true, // Only show categories with posts
                    ));
                    
                    foreach ($categories as $category) :
                        // Skip 'Uncategorized' if you want
                        if ($category->slug === 'uncategorized') continue;
                    ?>
                        <button class="filter-btn" data-category="<?php echo esc_attr($category->slug); ?>">
                            <?php echo esc_html($category->name); ?>
                        </button>
                    <?php endforeach; ?>
                </div>

                <!-- Blog Grid -->
                <div class="blog-grid">
                    <?php
                    // Custom Query to fetch recent posts
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 9,
                    );
                    $the_query = new WP_Query( $args );

                    if ( $the_query->have_posts() ) :
                        while ( $the_query->have_posts() ) : $the_query->the_post();
                            // Categories for display
                            $categories = get_the_category();
                            $cat_name = !empty($categories) ? $categories[0]->name : 'Uncategorized';
                            $cat_slug = !empty($categories) ? $categories[0]->slug : 'uncategorized';
                    ?>
                        <article class="blog-card" data-category="<?php echo esc_attr($cat_slug); ?>">
                            <div class="blog-card__image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php else: ?>
                                    <img src="https://telkganesan.com/wp-content/uploads/2022/03/005.jpg" alt="<?php the_title(); ?>" />
                                <?php endif; ?>
                                <span class="blog-card__category"><?php echo esc_html($cat_name); ?></span>
                            </div>
                            <div class="blog-card__content">
                                <div class="blog-card__meta">
                                    <span><i data-lucide="calendar"></i> <?php echo get_the_date(); ?></span>
                                    <!-- Reading time placeholder - could be calculated -->
                                    <span><i data-lucide="clock"></i> 5 min read</span>
                                </div>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div style="opacity: 0.85; margin-bottom: 1rem;">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="link">Read More <i data-lucide="arrow-right"></i></a>
                            </div>
                        </article>
                    <?php 
                        endwhile;
                        wp_reset_postdata();
                    else : 
                    ?>
                        <!-- Fallback static posts if no WP posts exist yet -->
                        <p>No posts found. Please add some posts in the WordPress admin.</p>
                    <?php endif; ?>
                </div>

                <!-- Pagination -->
                <div class="pagination">
                   <?php
                   // Default WP Pagination doesn't exactly match custom HTML structure easily without custom function
                   // For now, using standard links or keeping the visual placeholder if no real pagination logic needed immediately
                   echo paginate_links( array(
                       'prev_text' => '<i data-lucide="chevron-left"></i> Previous',
                       'next_text' => 'Next <i data-lucide="chevron-right"></i>',
                   )); 
                   ?>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>
