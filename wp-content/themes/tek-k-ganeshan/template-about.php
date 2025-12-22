<?php
/*
Template Name: About Page (Journey)
*/
get_header(); ?>

<main class="journey-page">
<main class="journey-page">
    <!-- ===== HERO SECTION (Minimal) ===== -->
    <section class="page-header page-header--bg" style="background-image: url('<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'full') : 'https://telkganesan.com/wp-content/uploads/2022/03/005.jpg'; ?>'); align-items: center; justify-content: center; text-align: center; min-height: 40vh;">
        <div class="page-header__overlay"></div>
         <div class="page-header__content">
                <p class="kicker">Founder • Investor • Producer</p>
                <h1><?php the_title(); ?></h1>
                <p class="page-header__subtitle">Operating at the intersection of technology, media and wellness. Relentlessly execution‑focused, impact‑obsessed.
                </p>
            </div>
    </section>

    <section class="section" style="padding-top: 4rem;">
        <div class="content-wrapper">
            <div class="content-grid" style="display: grid; grid-template-columns: 1fr 340px; gap: 4rem; align-items: start;">
                
                <!-- ===== MAIN CONTENT (Left) ===== -->
                <article class="content-main">
                    <!-- Featured Image -->
                    <div style="margin-bottom: 3rem; border-radius: 12px; overflow: hidden; border: 1px solid rgba(255,255,255,0.1);">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/005.webp" alt="Tel K Ganesan" style="width: 100%; height: auto; display: block;">
                    </div>

                    <!-- Dynamic Editor Content -->
                    <div class="prose">
                        <?php if (have_posts()) : while(have_posts()) : the_post(); the_content(); endwhile; endif; ?>
                    </div>

                    <!-- Static "Vision" Content -->
                    <div class="prose" style="margin-top: 2rem;">
                        <h2 style="font-size: 2rem; margin-bottom: 1rem;">Vision. Integrity. Impact.</h2>
                        <p>Tel K. Ganesan builds at the edges of technology and culture. He founded Kyyba to deliver high‑performance solutions for enterprise clients, expanded into films & media to tell meaningful stories, and invests in wellness and community initiatives. His work is guided by a simple principle: move ideas from zero to real, then scale them with discipline.</p>

                        <h3 style="color: #fff; margin-top: 2rem;">Cross-Domain Operator</h3>
                        <p>With over 15 companies founded and a track record spanning technology services, film production, and wellness initiatives, Tel operates across multiple domains with equal expertise. His approach combines strategic vision with hands-on execution, ensuring every venture delivers measurable impact.</p>

                        <h3 style="color: #fff; margin-top: 2rem;">Global Impact</h3>
                        <p>Through Kyyba Inc., Tel has built a global technology services company serving Fortune 500 clients. Kyyba Films produces independent cinema that challenges conventions and amplifies underrepresented voices. His wellness initiatives focus on sustainable performance for leaders and teams.</p>

                        <h3 style="color: #fff; margin-top: 2rem;">Thought Leadership</h3>
                        <p>As a sought-after speaker, Tel has delivered over 100 talks and keynotes on topics ranging from AI and leadership to cross-border entrepreneurship and storytelling. His insights have reached audiences of 10M+ across conferences, podcasts, and media features.</p>
                        
                        <!-- Quote Box -->
                        <div style="border-left: 4px solid var(--accent); padding-left: 1.5rem; margin: 3rem 0; font-style: italic; color: rgba(255,255,255,0.8);">
                            <p style="font-size: 1.25rem; margin-bottom: 1rem;">"Success is not about doing one thing perfectly. It's about doing many things with purpose, discipline, and relentless focus on impact."</p>
                            <span style="font-size: 0.9rem; color: var(--accent);">— Tel K. Ganesan</span>
                        </div>

                        <!-- ===== INTRO ===== -->
                        <h3 style="color: #fff; margin-top: 3rem;">The Beginning</h3>
                        <p style="font-style: italic; color: rgba(255,255,255,0.7);">"Do you ever look at billionaires and wonder – will I achieve my dreams someday? Of course, most of you would say yes because everybody has an ambition in life that they want to achieve. So, they pursue it in every way possible."</p>
                        <p>And among all of the dreamers, one such dreamer was <strong>Tel K. Ganesan</strong>.</p>
                        <p>Call him an entrepreneur, philanthropist, movie producer, innovator, speaker, or guide; he is truly an all-rounder. Today, his dreams are a reality. But, as it is said, Rome wasn't built in a day. Like every other successful human being, Tel K. Ganesan has pursued ambition with a never quitting attitude.</p>

                        <!-- ===== SECRET FORMULA ===== -->
                        <h2 style="font-size: 2rem; margin-top: 3rem;">What Is His Secret Formula?</h2>
                        <div style="display: flex; gap: 2rem; align-items: flex-start; margin-bottom: 2rem; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 250px;">
                                <p><strong>Happiness.</strong> Ganesan believes that the most incredible formula of success is to chase happiness in life. Money, a job, or any other materialistic theory should not be the only driving force of an individual. For, time spent chasing worldly materials is time lost.</p>
                                <p>Oh no! This is not just a spiritual formula in Ganesan's life. Practicality revolves around all of his philosophies. A happy person is enthusiastic, dedicated, and positive, making them grow towards their dream and sportingly tackle failures to grip the lessons from it.</p>
                                <p>Because, believe it or not, failures are always an important part of life.</p>
                            </div>
                            <div style="width: 250px; flex-shrink: 0; border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; overflow: hidden;">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/tel-k-ganesan-profile-002-470x1024.webp" alt="Tel Ganesan Standing" style="width: 100%; height: auto;">
                            </div>
                        </div>

                        <!-- ===== JOURNEY TO SUCCESS ===== -->
                        <h2 style="font-size: 2rem; margin-top: 3rem;">The Journey To Success</h2>
                        <p>No matter what or where Ganesan has been, books have always been his companion. As already said, <em>"Knowledge is power,"</em> he never misses a chance to acquire knowledge that in turn makes him a better person, professionally and personally.</p>
                        <p>With constant hard work and steadfastness, he has taken his career from an entrepreneur to a movie producer. Tel K. Ganesan's Kyyba brand, holding up several lines of businesses, has successfully employed 700 talents who equally contribute towards a successful career.</p>
                        <p>His incredible journey has led him to become one of the successful movie producers and life coaches. Something he never dreamt of being but now is a part of his happiness.</p>
                        <p>With empowering networking and strategic strength management, his journey to success and happiness has been inspiring. Today, you know Tel K. Ganesan as:</p>

                        <!-- ===== ROLES LIST ===== -->
                        <div style="background: rgba(255,255,255,0.03); padding: 2rem; border-radius: 12px; margin: 2rem 0;">
                            <h4 style="color: var(--accent); margin-top: 0;">Entrepreneur</h4>
                            <p style="font-size: 0.95rem;">He is the founder of Kyyba, a multi-structural brand serving in the wellness, technology, media, and fashion sectors.</p>
                            
                            <h4 style="color: var(--accent); margin-top: 1.5rem;">Philanthropist</h4>
                            <p style="font-size: 0.95rem;">The desire to make the world a better place than it already is drives Ganesan to aid the needed wherever and however possible.</p>

                            <h4 style="color: var(--accent); margin-top: 1.5rem;">Mentor</h4>
                            <p style="font-size: 0.95rem;">Ganesan believes in shaping the future and nurturing it with his experiences. Thus, he coaches every talent and helps them begin a journey to success.</p>

                            <h4 style="color: var(--accent); margin-top: 1.5rem;">Film Producer</h4>
                            <p style="font-size: 0.95rem;">With an ever-growing passion for films and art, he feels proud to be contributing his bit to the creation of more films.</p>
                            
                            <h4 style="color: var(--accent); margin-top: 1.5rem;">Traveler</h4>
                            <p style="font-size: 0.95rem;">Exploring new destinations and guiding his path through life with the learnings of different places is a favorite part of his life.</p>
                        </div>

                        <!-- ===== CHEERFULNESS ===== -->
                        <h2 style="font-size: 2rem; margin-top: 3rem;">The Secret To His Cheerfulness?</h2>
                        <p>Happiness and simplicity powered with a smile make Tel K. Ganesan the limelight of a group. Apart from that, a stringent fitness routine, yoga, and kayaking are some of his powerful antidotes to maintaining a healthy, rejuvenated, and positive lifestyle.</p>

                        <h2 style="font-size: 2rem; margin-bottom: 1rem; margin-top: 3rem;">Recognition & Awards</h2>
                        <p>Tel has been recognized as Entrepreneur of the Year by Ernst & Young multiple times (2012-2014) and has been featured in Forbes, Bloomberg, TechCrunch, and Variety for his work across technology and media.</p>
                    </div>

                    <!-- Stats Row -->
                    <div class="stats-row" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; margin-top: 4rem;">
                        <div class="stat-card" style="background: rgba(255,255,255,0.03); padding: 1.5rem; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1);">
                            <h3 style="font-size: 2.5rem; color: var(--accent); margin: 0; line-height: 1;">15+</h3>
                            <p style="margin: 0.5rem 0 0; font-size: 0.9rem; opacity: 0.7;">Companies Founded</p>
                        </div>
                        <div class="stat-card" style="background: rgba(255,255,255,0.03); padding: 1.5rem; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1);">
                            <h3 style="font-size: 2.5rem; color: var(--accent); margin: 0; line-height: 1;">100+</h3>
                            <p style="margin: 0.5rem 0 0; font-size: 0.9rem; opacity: 0.7;">Talks & Keynotes</p>
                        </div>
                        <div class="stat-card" style="background: rgba(255,255,255,0.03); padding: 1.5rem; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1);">
                            <h3 style="font-size: 2.5rem; color: var(--accent); margin: 0; line-height: 1;">10M+</h3>
                            <p style="margin: 0.5rem 0 0; font-size: 0.9rem; opacity: 0.7;">Audience & Impact</p>
                        </div>
                    </div>

                    <!-- Bottom CTA -->
                    <div class="bottom-cta" style="background: rgba(16, 20, 28, 0.6); border: 1px solid rgba(255,255,255,0.1); padding: 3rem; border-radius: 16px; margin-top: 4rem; text-align: center;">
                        <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #fff;">Let's Connect</h3>
                        <p style="margin-bottom: 2rem; opacity: 0.7;">Interested in speaking engagements, partnerships, or collaborations?</p>
                        <div style="display: flex; gap: 1rem; justify-content: center;">
                            <a href="#contact" class="button button--primary" style="background: var(--accent); border: none; color: #000;">Get In Touch <i data-lucide="mail"></i></a>
                            <a href="#blog" class="button" style="background: transparent; border: 1px solid rgba(255,255,255,0.2);">Read Articles <i data-lucide="arrow-right"></i></a>
                        </div>
                    </div>

                </article>

                <!-- ===== SIDEBAR (Right) ===== -->
                <aside class="sidebar" style="position: sticky; top: 120px;">
                    
                    <!-- Quick Facts Card -->
                    <div class="widget-card" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.1); padding: 1.5rem; border-radius: 12px; margin-bottom: 2rem;">
                        <h4 style="margin-top: 0; margin-bottom: 1.5rem; font-size: 1.1rem;">Quick Facts</h4>
                        <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1rem;">
                            <li style="display: flex; gap: 10px; align-items: flex-start; font-size: 0.9rem; opacity: 0.8;">
                                <i data-lucide="briefcase" style="width: 18px; color: var(--accent); flex-shrink: 0;"></i> <span>Founder & CEO, Kyyba Inc.</span>
                            </li>
                            <li style="display: flex; gap: 10px; align-items: flex-start; font-size: 0.9rem; opacity: 0.8;">
                                <i data-lucide="film" style="width: 18px; color: var(--accent); flex-shrink: 0;"></i> <span>Producer, Kyyba Films</span>
                            </li>
                            <li style="display: flex; gap: 10px; align-items: flex-start; font-size: 0.9rem; opacity: 0.8;">
                                <i data-lucide="award" style="width: 18px; color: var(--accent); flex-shrink: 0;"></i> <span>EY Entrepreneur of the Year</span>
                            </li>
                            <li style="display: flex; gap: 10px; align-items: flex-start; font-size: 0.9rem; opacity: 0.8;">
                                <i data-lucide="mic-2" style="width: 18px; color: var(--accent); flex-shrink: 0;"></i> <span>Global Speaker</span>
                            </li>
                            <li style="display: flex; gap: 10px; align-items: flex-start; font-size: 0.9rem; opacity: 0.8;">
                                <i data-lucide="heart-pulse" style="width: 18px; color: var(--accent); flex-shrink: 0;"></i> <span>Wellness Advocate</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Featured In Card -->
                    <div class="widget-card" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.1); padding: 1.5rem; border-radius: 12px; margin-bottom: 2rem;">
                        <h4 style="margin-top: 0; margin-bottom: 1.5rem; font-size: 1.1rem;">Featured In</h4>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; align-items: center;">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/forbes-logo.png" style="width: 100%; filter: grayscale(100%) brightness(1.5);">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/bloomberg.png" style="width: 100%; filter: grayscale(100%) brightness(1.5);">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/techcrunch.png" style="width: 100%; filter: grayscale(100%) brightness(1.5);">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/variety.png" style="width: 100%; filter: grayscale(100%) brightness(1.5);">
                        </div>
                    </div>

                    <!-- Connect Card -->
                    <div class="widget-card" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.1); padding: 1.5rem; border-radius: 12px;">
                        <h4 style="margin-top: 0; margin-bottom: 1.5rem; font-size: 1.1rem;">Connect</h4>
                        <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1rem;">
                            <li><a href="#" style="display: flex; gap: 10px; align-items: center; color: #fff; text-decoration: none; font-size: 0.9rem; opacity: 0.8; transition: opacity 0.2s;"><i data-lucide="linkedin" style="width: 18px;"></i> LinkedIn</a></li>
                            <li><a href="#" style="display: flex; gap: 10px; align-items: center; color: #fff; text-decoration: none; font-size: 0.9rem; opacity: 0.8; transition: opacity 0.2s;"><i data-lucide="twitter" style="width: 18px;"></i> Twitter</a></li>
                            <li><a href="#" style="display: flex; gap: 10px; align-items: center; color: #fff; text-decoration: none; font-size: 0.9rem; opacity: 0.8; transition: opacity 0.2s;"><i data-lucide="mail" style="width: 18px;"></i> Email</a></li>
                        </ul>
                    </div>

                </aside>

            </div>
        </div>
    </section>

</main>

<style>
/* Responsive Styles for this template */
@media (max-width: 992px) {
    .content-grid {
        grid-template-columns: 1fr !important;
    }
    .stats-row {
        grid-template-columns: 1fr !important;
    }
}
</style>

<?php get_footer(); ?>

<?php get_footer(); ?>
