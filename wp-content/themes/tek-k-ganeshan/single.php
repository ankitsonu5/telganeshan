<?php get_header(); ?>

<main>
    <?php while ( have_posts() ) : the_post(); ?>
    
    <!-- ===== PAGE HEADER ===== -->
    <section class="page-header page-header--bg"
        style="background-image: url('<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'full') : get_template_directory_uri() . '/img/002-1.jpg'; ?>')">
        <div class="page-header__content">
            <?php
            $categories = get_the_category();
            $cat_text = '';
            if (!empty($categories)) {
                $cat_text = esc_html($categories[0]->name);
                if (count($categories) > 1) {
                    $cat_text .= ' • ' . esc_html($categories[1]->name);
                }
            }
            ?>
            <p class="kicker"><?php echo $cat_text ? $cat_text : 'Insights'; ?></p>
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

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>

                    <div class="cta-section" style="margin-top: 4rem;">
                        <h3>Share this article</h3>
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
                                'posts_per_page' => 2,
                                'post__not_in'   => array(get_the_ID()),
                                'orderby'        => 'rand'
                            );
                            $related_query = new WP_Query($related_args);
                            if ($related_query->have_posts()) :
                                while ($related_query->have_posts()) : $related_query->the_post();
                                    $rel_cats = get_the_category();
                                    $rel_cat_name = !empty($rel_cats) ? $rel_cats[0]->name : 'Blog';
                            ?>
                                <a href="<?php the_permalink(); ?>" style="text-decoration:none; color:var(--text);">
                                    <div style="font-size:0.8rem; color:var(--accent); margin-bottom:0.2rem;"><?php echo esc_html($rel_cat_name); ?></div>
                                    <h5 style="margin:0; font-size:0.95rem; line-height:1.4;"><?php the_title(); ?></h5>
                                </a>
                                <hr style="border:0; border-top:1px dashed var(--border); width:100%; margin:0;">
                            <?php 
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                    </div>

                    <div class="card">
                        <h4>Tags</h4>
                        <div style="display:flex; flex-wrap:wrap; gap:0.5rem;">
                            <?php
                            $tags = get_the_tags();
                            if ($tags) {
                                foreach($tags as $tag) {
                                    echo '<span style="padding:0.3rem 0.6rem; border-radius:4px; background:rgba(255,255,255,0.05); font-size:0.8rem;">' . esc_html($tag->name) . '</span>';
                                }
                            } else {
                                echo '<span style="padding:0.3rem 0.6rem; border-radius:4px; background:rgba(255,255,255,0.05); font-size:0.8rem;">Entrepreneurship</span>';
                                echo '<span style="padding:0.3rem 0.6rem; border-radius:4px; background:rgba(255,255,255,0.05); font-size:0.8rem;">Technology</span>';
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
