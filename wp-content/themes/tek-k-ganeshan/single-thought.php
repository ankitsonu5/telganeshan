<?php get_header(); ?>

<main>
    <?php while ( have_posts() ) : the_post(); ?>
    
    <!-- ===== PAGE HEADER ===== -->
    <section class="page-header page-header--bg"
        style="background-image: url('<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'full') : get_template_directory_uri() . '/img/002-1.jpg'; ?>')">
        <div class="page-header__content">
            <?php
            // Updated to fetch 'thought_category'
            $terms = get_the_terms( get_the_ID(), 'thought_category' );
            $cat_text = '';
            if (!empty($terms) && !is_wp_error($terms)) {
                $cat_text = esc_html($terms[0]->name);
                if (count($terms) > 1) {
                    $cat_text .= ' • ' . esc_html($terms[1]->name);
                }
            }
            ?>
            <p class="kicker"><?php echo $cat_text ? $cat_text : 'Thought'; ?></p>
            <h1 style="font-size: clamp(2rem, 4vw, 3rem);"><?php the_title(); ?></h1>
            <div
                style="display:flex;gap:1.5rem;justify-content:center;margin-top:1.5rem;color:var(--muted);font-size:0.95rem">
                <span><i data-lucide="calendar" style="width:16px;vertical-align:text-bottom"></i> <?php echo get_the_date('M d, Y'); ?></span>
                <span><i data-lucide="clock" style="width:16px;vertical-align:text-bottom"></i> 5 min read</span>
            </div>
        </div>
    </section>

    <!-- ===== ARTICLE CONTENT ===== -->
    <section class="section">
        <div class="content-wrapper">
            <div class="content-grid">
                <!-- Main Content -->
                <article class="content-main prose">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full'); ?>
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/005.jpg" alt="Article Hero Image" />
                    <?php endif; ?>

                    <?php 
                    // Display thought categories as badges
                    $thought_terms = get_the_terms( get_the_ID(), 'thought_category' );
                    if ($thought_terms && !is_wp_error($thought_terms)) :
                    ?>
                        <div style="display: flex; gap: 0.5rem; margin: 1.5rem 0; flex-wrap: wrap;">
                            <?php foreach($thought_terms as $term) : ?>
                                <a href="<?php echo esc_url(get_term_link($term)); ?>" 
                                   style="padding: 0.4rem 0.8rem; border-radius: 6px; background: var(--accent); color: #000; font-size: 0.85rem; font-weight: 600; text-decoration: none; display: inline-block;">
                                    <?php echo esc_html($term->name); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>

                    <div class="cta-section" style="margin-top: 4rem;">
                        <h3>Share this thought</h3>
                        <div class="cta-row">
                            <a href="#" class="button button--ghost"><i data-lucide="linkedin"></i> LinkedIn</a>
                            <a href="#" class="button button--ghost"><i data-lucide="twitter"></i> Twitter</a>
                            <a href="#" class="button button--ghost"><i data-lucide="facebook"></i> Facebook</a>
                        </div>
                    </div>
                </article>

                <!-- Sidebar -->
                <aside class="sidebar">
                    <div class="card">
                        <h4>About the Author</h4>
                        <div style="display:flex; gap:1rem; align-items:center; margin-bottom:1rem;">
                            <!-- Hardcoded Author Image from design -->
                            <img src="<?php echo get_template_directory_uri(); ?>/img/profile.jpeg"
                                alt="Tel K. Ganesan"
                                style="width:60px; height:60px; border-radius:50%; object-fit:cover;">
                            <div>
                                <strong style="display:block">Tel K. Ganesan</strong>
                                <span style="font-size:0.85rem; opacity:0.7">Founder & Investor</span>
                            </div>
                        </div>
                        <p style="font-size:0.9rem; margin-bottom:1rem;">Tel writes about the intersection of
                            technology, humanity, and leadership.</p>
                        <a href="<?php echo home_url('/about'); ?>" class="button button--sm button--ghost w100">More about Tel</a>
                    </div>

                    <div class="card">
                        <h4>Related Articles</h4>
                        <div style="display:flex; flex-direction:column; gap:1rem;">
                            <?php
                            $related_args = array(
                                'post_type'      => 'thought', // Fetch related thoughts specifically
                                'posts_per_page' => 2,
                                'post__not_in'   => array(get_the_ID()),
                                'orderby'        => 'rand'
                            );
                            $related_query = new WP_Query($related_args);
                            if ($related_query->have_posts()) :
                                while ($related_query->have_posts()) : $related_query->the_post();
                                    $rel_terms = get_the_terms( get_the_ID(), 'thought_category' );
                                    $rel_cat_name = (!empty($rel_terms) && !is_wp_error($rel_terms)) ? $rel_terms[0]->name : 'Thought';
                            ?>
                                <a href="<?php the_permalink(); ?>" style="text-decoration:none; color:var(--text);">
                                    <div style="font-size:0.8rem; color:var(--accent); margin-bottom:0.2rem;"><?php echo esc_html($rel_cat_name); ?></div>
                                    <h5 style="margin:0; font-size:0.95rem; line-height:1.4;"><?php the_title(); ?></h5>
                                </a>
                                <hr style="border:0; border-top:1px dashed var(--border); width:100%; margin:0;">
                            <?php 
                                endwhile;
                                wp_reset_postdata();
                            else:
                                echo '<p style="opacity:0.6; font-size:0.9rem;">No related thoughts yet.</p>';
                            endif;
                            ?>
                        </div>
                    </div>

                    <div class="card">
                        <h4>Tags</h4>
                        <div style="display:flex; flex-wrap:wrap; gap:0.5rem;">
                            <?php
                            // Fetch standard tags if enabled, OR thought categories if "Tags" implies categories in this context
                            // The user said "tags thought se aaygi". Usually this means the taxonomy associated with thoughts.
                            // I will fetch all terms from 'thought_category' to show as a cloud, or just the current post's terms.
                            // Standard sidebar behavior often shows a cloud of all tags.
                            // Let's stick to the current post's terms for now, which acts as tags.
                            
                            $all_terms = get_the_terms( get_the_ID(), 'thought_category' );
                            
                            if ($all_terms && !is_wp_error($all_terms)) {
                                foreach($all_terms as $term) {
                                    echo '<a href="' . esc_url(get_term_link($term)) . '" style="padding:0.3rem 0.6rem; border-radius:4px; background:rgba(255,255,255,0.05); font-size:0.8rem; color: var(--text); text-decoration: none;">' . esc_html($term->name) . '</a>';
                                }
                            } else {
                                echo '<span style="opacity:0.6; font-size:0.9rem;">No tags.</span>';
                            }
                            ?>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
