<?php
/*
Template Name: Award Detail
*/
get_header(); ?>

    <main>
        <!-- ===== PAGE HEADER ===== -->
        <section class="page-header page-header--bg"
            style="background-image: url('https://telkganesan.com/wp-content/uploads/2022/03/006.jpg')">
            <div class="page-header__content">
                <p class="kicker">Award Details</p>
                <h1><?php the_title(); ?></h1>
                <p class="page-header__subtitle">Recognized for leadership and innovation.</p>
            </div>
        </section>

        <!-- ===== CONTENT ===== -->
        <section class="section">
            <div class="content-wrapper">
                <div class="content-grid">
                    <!-- Main Content -->
                    <article class="content-main prose">
                        <div class="award-hero"
                            style="text-align:center; padding: 2rem; background: var(--card); border-radius: var(--radius); margin-bottom: 2rem; border: 1px solid var(--border);">
                             <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', array('style' => 'border:none; margin-bottom: 0;')); ?>
                             <?php else: ?>
                                <img src="https://telkganesan.com/wp-content/uploads/2022/03/006.jpg" alt="Award Image"
                                style="max-width: 400px; width: 100%; height: auto; border:none; margin-bottom: 0;">
                             <?php endif; ?>
                        </div>

                         <?php 
                            if ( have_posts() ) : 
                                while ( have_posts() ) : the_post();
                                    the_content();
                                endwhile;
                            else: 
                            ?>
                            <!-- Fallback Content -->
                            <h2>About the Award</h2>
                            <p>The **Entrepreneur Of The Year** program, founded by Ernst & Young (EY), is one of the most
                                prestigious business awards programs in the country. It recognizes entrepreneurs who
                                demonstrate excellence and extraordinary success in such areas as innovation, financial
                                performance, and personal commitment to their businesses and communities.</p>

                            <p>Tel K. Ganesan was recognized as a finalist for this esteemed award in the Michigan and
                                Northwest Ohio region. This recognition highlights his pivotal role in driving Kyyba Inc. to
                                become a major player in the global technology services industry.</p>

                            <blockquote class="quote">
                                <p>"Being recognized by EY is a testament not just to my work, but to the incredible team at
                                    Kyyba. It validates our vision of using technology to create real value."</p>
                                <cite>— Tel K. Ganesan</cite>
                            </blockquote>

                            <h3>Significance</h3>
                            <p>This award acknowledges leaders who build and sustain dynamic, growing businesses. For Tel,
                                this was a milestone that underscored Kyyba's rapid growth and its commitment to diversity,
                                innovation, and community engagement in the Detroit metro area and beyond.</p>
                         <?php endif; ?>

                        <div class="cta-section">
                            <h3>Media Inquiries</h3>
                            <p>For press details regarding this award or to interview Tel K. Ganesan.</p>
                            <a href="#contact" class="button button--primary">Contact Press Team</a>
                        </div>
                    </article>

                    <!-- Sidebar -->
                    <aside class="sidebar">
                        <div class="card">
                            <h4>Award Facts</h4>
                            <ul class="fact-list">
                                <li><i data-lucide="building-2"></i> Organization: <strong>Ernst & Young</strong></li>
                                <li><i data-lucide="calendar"></i> Year: <strong>2012–2014</strong></li>
                                <li><i data-lucide="map-pin"></i> Region: <strong>Michigan & NW Ohio</strong></li>
                                <li><i data-lucide="tag"></i> Category: <strong>Technology Services</strong></li>
                            </ul>
                        </div>

                        <div class="card">
                            <h4>Other Awards</h4>
                            <div class="sidebar-socials">
                                <a href="#" class="social-link"><i data-lucide="trending-up"></i> Fast 50
                                    Company</a>
                                <a href="#" class="social-link"><i data-lucide="star"></i> Leader of
                                    Leaders</a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>
