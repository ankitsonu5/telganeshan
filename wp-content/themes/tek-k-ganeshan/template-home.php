<?php
/*
Template Name: Home Page Layout
*/
get_header(); ?>

    <!-- ===== HERO ===== -->
    <!-- ===== HERO SLIDER ===== -->
    <section class="hero-slider swiper">
      <div class="swiper-wrapper">

        <?php
        // Query Hero Slides
        $hero_args = array(
          'post_type'      => 'hero_slide',
          'posts_per_page' => 5,
          'orderby'        => 'menu_order',
          'order'          => 'ASC',
        );
        $hero_query = new WP_Query( $hero_args );

        if ( $hero_query->have_posts() ) :
          while ( $hero_query->have_posts() ) : $hero_query->the_post();
            $slide_id = get_the_ID();
            $video_url = get_post_meta( $slide_id, '_hero_video_url', true );
            $kicker = get_post_meta( $slide_id, '_hero_kicker', true );
            $subtitle = get_post_meta( $slide_id, '_hero_subtitle', true );
            $btn_text = get_post_meta( $slide_id, '_hero_btn_text', true );
            $btn_url = get_post_meta( $slide_id, '_hero_btn_url', true );
            $btn2_text = get_post_meta( $slide_id, '_hero_btn2_text', true ); // New
            $btn2_url = get_post_meta( $slide_id, '_hero_btn2_url', true );   // New
            $thumbnail_url = get_the_post_thumbnail_url( $slide_id, 'full' );
            
            // Check if Video Slide
            if ( ! empty( $video_url ) ) : ?>
              <!-- Slide: Video Background -->
              <div class="swiper-slide hero-slide hero-slide--video">
                <div class="video-bg">
                  <video autoplay muted loop playsinline poster="<?php echo esc_url( $thumbnail_url ); ?>">
                    <source src="<?php echo esc_url( $video_url ); ?>" type="video/mp4">
                  </video>
                  <div class="video-overlay"></div>
                </div>
                <div class="hero__grid">
                  <div class="hero__text center-text">
                    <?php if ( $kicker ) : ?>
                      <p class="kicker"><?php echo esc_html( $kicker ); ?></p>
                    <?php endif; ?>
                    
                    <h1 class="hero__title"><?php the_title(); ?></h1>
                    
                    <?php if ( $subtitle ) : ?>
                      <p class="hero__subtitle" style="margin-left:auto; margin-right:auto;">
                        <?php echo wp_kses_post( $subtitle ); ?>
                      </p>
                    <?php endif; ?>
                    
                    <?php 
                    $has_btn1 = !empty($btn_text) && !empty($btn_url);
                    $has_btn2 = !empty($btn2_text) && !empty($btn2_url);
                    
                    if ( $has_btn1 || $has_btn2 ) : ?>
                      <div class="hero__cta justify-center">
                        <?php if ( $has_btn1 ) : ?>
                            <a href="<?php echo esc_url( $btn_url ); ?>" class="button button--primary">
                            <?php echo esc_html( $btn_text ); ?> <i data-lucide="play-circle"></i>
                            </a>
                        <?php endif; ?>

                        <?php if ( $has_btn2 ) : ?>
                            <a href="<?php echo esc_url( $btn2_url ); ?>" class="button button--ghost" style="margin-left: 10px; color: #fff; border-color: rgba(255,255,255,0.6);">
                            <?php echo esc_html( $btn2_text ); ?> <i data-lucide="arrow-right"></i>
                            </a>
                        <?php endif; ?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

            <?php else : ?>
              <!-- Slide: Standard Image (Fullscreen) -->
              <div class="swiper-slide hero-slide hero-slide--image">
                <div class="image-bg">
                   <?php if ( $thumbnail_url ) : ?>
                    <img src="<?php echo esc_url( $thumbnail_url ); ?>" alt="<?php the_title_attribute(); ?>" class="fullscreen-img" />
                   <?php endif; ?>
                   <div class="video-overlay" style="background: rgba(11, 14, 20, 0.65);"></div>
                </div>
                
                <div class="hero__grid">
                  <div class="hero__text center-text">
                    <?php if ( $kicker ) : ?>
                      <p class="kicker"><?php echo esc_html( $kicker ); ?></p>
                    <?php endif; ?>

                    <h1 class="hero__title"><?php the_title(); ?></h1>

                    <?php if ( $subtitle ) : ?>
                      <p class="hero__subtitle" style="margin-left:auto; margin-right:auto;">
                        <?php echo wp_kses_post( $subtitle ); ?>
                      </p>
                    <?php endif; ?>

                    <?php 
                    $has_btn1 = !empty($btn_text) && !empty($btn_url);
                    $has_btn2 = !empty($btn2_text) && !empty($btn2_url);

                    if ( $has_btn1 || $has_btn2 ) : ?>
                      <div class="hero__cta justify-center">
                        <?php if ( $has_btn1 ) : ?>
                            <a href="<?php echo esc_url( $btn_url ); ?>" class="button button--primary">
                            <?php echo esc_html( $btn_text ); ?> <i data-lucide="play-circle"></i>
                            </a>
                        <?php endif; ?>

                        <?php if ( $has_btn2 ) : ?>
                            <a href="<?php echo esc_url( $btn2_url ); ?>" class="button button--ghost" style="margin-left: 10px; color: #fff; border-color: rgba(255,255,255,0.6);">
                            <?php echo esc_html( $btn2_text ); ?> <i data-lucide="arrow-right"></i>
                            </a>
                         <?php else: ?>
                            <!-- Debug Image Slide: Btn2 missing. Text: '<?php echo esc_attr($btn2_text); ?>', URL: '<?php echo esc_attr($btn2_url); ?>' -->
                        <?php endif; ?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endif;
          endwhile;
          wp_reset_postdata();
        else : ?>
          <!-- Fallback if no slides found (Optional: Keep original static content or show nothing) -->
           <div class="swiper-slide hero-slide">
             <div class="hero__grid">
               <div class="hero__text"><h1 class="hero__title">Welcome</h1></div>
             </div>
           </div>
        <?php endif; ?>

      </div>
      <!-- Pagination -->
      <div class="swiper-pagination"></div>

      <!-- Navigation -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </section>

    <!-- ===== CRED STRIP ===== -->
    <section class="creds">
      <img src="<?php echo get_template_directory_uri(); ?>/img/forbes-logo.png" alt="forbes" />
      <img src="<?php echo get_template_directory_uri(); ?>/img/bloomberg.png" alt="bloomberg" />
      <img src="<?php echo get_template_directory_uri(); ?>/img/techcrunch.png" alt="Article feature" />
      <img src="<?php echo get_template_directory_uri(); ?>/img/variety.png" alt="Brand" />
      <img src="<?php echo get_template_directory_uri(); ?>/img/ey.png" alt="Stage" />
    </section>

    <!-- ===== ABOUT ===== -->
    <section class="section" id="about">
      <header class="section__head">
        <p class="kicker">Founder • Operator • Producer</p>
        <h2>About Tel K. Ganesan</h2>
      </header>
      <div class="cols cols--2">
        <div class="prose">
          <p style="line-height: 30px;">Tel K. Ganesan builds at the edges of technology and culture. He founded Kyyba
            to deliver high‑performance
            solutions for enterprise clients, expanded into <em>films & media</em> to tell meaningful stories, and
            invests in
            wellness and community initiatives. His work is guided by a simple principle: move ideas from zero to real,
            then scale them with discipline.</p>
          <ul class="ticklist">
            <li>Cross‑domain operator across software, media & wellness.</li>
            <li>Active mentor & ecosystem builder across US–India corridors.</li>
            <li>Producer of independent films and cultural projects.</li>
          </ul>
          <div class="cta-row" style="margin-top: 25px;">
            <a href="#media" class="button">Media Kit <i data-lucide="newspaper"></i></a>
            <a href="#contact" class="button button--primary">Invite to Speak <i data-lucide="mic-2"></i></a>
          </div>
        </div>
        <div class="stats">
          <div class="stats">
          <div class="stat">
            <div class="stat__num">15+</div>
            <div class="stat__label">Companies Founded</div>
          </div>
          <div class="stat">
            <div class="stat__num">100+</div>
            <div class="stat__label">Talks & Keynotes</div>
          </div>
          <div class="stat">
            <div class="stat__num">10M+</div>
            <div class="stat__label">Audience & Impact</div>
          </div>
        </div>
        </div>
      </div>
    </section>

    <!-- ===== VENTURES ===== -->
    <section class="section" id="ventures">
      <header class="section__head">
        <p class="kicker">Operating Companies & Initiatives</p>
        <h2 style="margin-bottom: 20px;">Ventures & Leadership</h2>
      </header>
      <div class="grid grid--3">
        <a class="card" href="#" target="_blank" style="color:#fff;text-decoration: none;">
          <div class="icon"><i data-lucide="building-2"></i></div>
          <h3>Kyyba, Inc.</h3>
          <p>Global technology services & staffing delivering at scale.</p>
          <span class="link">Explore <i data-lucide="chevron-right"></i></span>
        </a>
        <a class="card" href="#" target="_blank" style="color:#fff;text-decoration: none;">
          <div class="icon"><i data-lucide="clapperboard"></i></div>
          <h3>Kyyba Films</h3>
          <p>Independent films that champion underrepresented voices.</p>
          <span class="link">Explore <i data-lucide="chevron-right"></i></span>
        </a>
        <a class="card" href="#" target="_blank" style="color:#fff;text-decoration: none;">
          <div class="icon"><i data-lucide="heart-pulse"></i></div>
          <h3>Kyyba Wellness</h3>
          <p>Programs for leaders and teams to perform sustainably.</p>
          <span class="link">Explore <i data-lucide="chevron-right"></i></span>
        </a>
      </div>
    </section>

    <!-- ===== AWARDS ===== -->
    <section class="section" id="awards">
      <header class="section__head">
        <p class="kicker">Recognition & Milestones</p>
        <h2 style="margin-bottom: 20px;">Most Notable Award</h2>
      </header>

      <!-- Highlighted single award (with image) -->
      <article class="award-highlight">
        <div class="award-highlight__media">
          <!-- EY logo from Wikimedia Commons (raster thumb of vector) -->
          <img src="<?php echo get_template_directory_uri(); ?>/img/award.jpg" alt="EY — Ernst &amp; Young" loading="lazy"
            style="height: 200px !important;width: 470px !important;max-height: 200px !important;" />
        </div>
        <div class="award-highlight__body">
          <h3>Entrepreneur Of The Year — Ernst &amp; Young</h3>
          <p style="line-height: 25px;;">Recognized across multiple years in the Michigan &amp; Northwest Ohio region
            for entrepreneurship and leadership.
            A benchmark program honoring founders driving innovation and growth.</p>
          <div class="award-meta">
            <span class="badge"><i data-lucide="calendar"></i> 2012–2014</span>
            <a class="button button--ghost" target="_blank" rel="noopener" href="https://telkganesan.com/articles/">
              See press mentions <i data-lucide="arrow-right"></i>
            </a>
          </div>
        </div>
      </article>

      <p class="note">Full list available in the Awards archive.</p>
    </section>

    <!-- ===== MEDIA ===== -->
    <section class="section" id="media">
      <header class="section__head">
        <p class="kicker">Press • Podcasts • Features</p>
        <h2 style="margin-bottom: 20px;">In the Media</h2>
      </header>
      <div class="grid grid--2">
        <article class="press">
          <div class="press__meta">MITechNews</div>
          <h3>Tech Entrepreneur Turns Movie Producer</h3>
          <p>Interview and feature on the hometown premiere of “18½”.</p>
          <a class="link" target="_blank" rel="noopener"
            href="https://mitechnews.com/mitechtv/tech-entrepreneur-turns-movie-producer-with-latest-film-18-12-minutes/">Read
            / Watch <i data-lucide="chevron-right"></i></a>
        </article>
        <article class="press">
          <div class="press__meta">PR Newswire</div>
          <h3>The Future Looks Bright for Tel Ganesan</h3>
          <p>Coverage on Kyyba Films and Cohorts Entertainment.</p>
          <a class="link" target="_blank" rel="noopener"
            href="https://www.prnewswire.com/news-releases/the-future-looks-bright-for-kyybas-tel-ganesan-and-cohorts-entertainments-ray-jackson-301553706.html">Read
            Feature <i data-lucide="chevron-right"></i></a>
        </article>

        <!-- Video block -->
        <article class="video">
          <div class="video__thumb">
            <img src="https://telkganesan.com/wp-content/uploads/2022/03/005.jpg" alt="Showreel" />
            <button class="video__play" data-open="videoModal" aria-label="Play video"><i
                data-lucide="play"></i></button>
          </div>
          <div class="video__body">
            <div class="press__meta">Showreel</div>
            <h3>Watch: Selected Moments</h3>
            <p>Speaking, media and events in one quick reel.</p>
          </div>
        </article>

        <article class="press">
          <div class="press__meta">Smart Business</div>
          <h3>Profile: President &amp; CEO, Kyyba Inc.</h3>
          <p>On building resilient teams and scaling through adversity.</p>
          <a class="link" target="_blank" rel="noopener"
            href="https://sbnonline.com/article/tel-k-ganesan-president-and-ceo-kyyba-inc/">Read Profile <i
              data-lucide="chevron-right"></i></a>
        </article>
      </div>
    </section>

    <!-- Video Modal -->
    <dialog id="videoModal" class="modal modal--video">
      <div class="modal__card">
        <div class="modal__header">
          <strong>Showreel</strong>
          <button class="button button--ghost" data-close aria-label="Close video"><i data-lucide="x"></i></button>
        </div>
        <div class="modal__body">
          <div class="responsive-16x9">
            <!-- If you have a direct video, replace the iframe below. -->
            <iframe src="https://telkganesan.com/videos/" title="Showreel" loading="lazy"></iframe>
          </div>
        </div>
      </div>
    </dialog>

    <!-- ===== SPEAKING ===== -->
    <section class="section" id="speaking">
      <header class="section__head">
        <p class="kicker">Keynotes • Fireside Chats • Panels</p>
        <h2 style="margin-bottom: 20px;">Speaking</h2>
      </header>
      <div class="cols cols--2">
        <div class="card">
          <h3>Keynote Topics</h3>
          <ul class="ticklist" style="margin-bottom: 20px;">
            <li>Leadership in the Age of AI — practical playbooks for founders & operators.</li>
            <li>From Tech to Film — creative risk‑taking, storytelling and brand.</li>
            <li>Cross‑Border Entrepreneurship — US–India corridors and global teams.</li>
          </ul>
          <a href="#contact" class="button button--primary">Request Availability <i data-lucide="calendar"></i></a>
        </div>
        <div class="stack">
          <div class="smcard" style="margin-bottom: 20px;"><span class="smcard__icon"><i
                data-lucide="calendar"></i></span>Upcoming: Tech Leadership Summit</div>
          <div class="smcard" style="margin-bottom: 20px;"><span class="smcard__icon"><i
                data-lucide="mic-2"></i></span>Podcast: The Founder’s Path</div>
          <div class="smcard"><span class="smcard__icon"><i data-lucide="book-open"></i></span>Workshop: Storytelling
            for CEOs</div>
        </div>
      </div>
    </section>

    <!-- ===== JOURNEY ===== -->
    <section class="section" id="journey">
      <header class="section__head">
        <p class="kicker">Milestones & Highlights</p>
        <h2 style="margin-bottom: 20px;">Journey</h2>
      </header>
      <div class="grid grid--4">
        <div class="timeline">
          <div class="timeline__head">
            <img src="https://telkganesan.com/wp-content/uploads/2022/03/005.jpg" alt="" />
            <div><strong>2025</strong><span>New wellness & media initiatives</span></div>
          </div>
          <p>Expanding programs that help leaders perform and tell better stories.</p>
        </div>
        <div class="timeline">
          <div class="timeline__head">
            <img src="https://telkganesan.com/wp-content/uploads/2022/03/001.jpg" alt="" />
            <div><strong>2023</strong><span>Award‑winning indie feature</span></div>
          </div>
          <p>Produced an independent film recognized at festivals globally.</p>
        </div>
        <div class="timeline">
          <div class="timeline__head">
            <img src="https://telkganesan.com/wp-content/uploads/2022/03/001-1.jpg" alt="" />
            <div><strong>2015</strong><span>Global delivery footprint</span></div>
          </div>
          <p>Scaled Kyyba’s delivery and partnerships internationally.</p>
        </div>
        <div class="timeline">
          <div class="timeline__head">
            <img src="https://telkganesan.com/wp-content/uploads/2022/03/006.jpg" alt="" />
            <div><strong>2005</strong><span>Founded Kyyba, Inc.</span></div>
          </div>
          <p>Began as a determined founder; grew into a multi‑disciplinary platform.</p>
        </div>
      </div>
    </section>

    <!-- ===== ARTICLES (from /articles) ===== -->
    <section class="section" id="blog">
      <header class="section__head">
        <p class="kicker">From the Desk of Tel</p>
        <h2 style="margin-bottom: 20px;">Articles & Features</h2>
      </header>
      <div class="grid grid--3">
        <a class="post" target="_blank" rel="noopener"
          href="https://mitechnews.com/mitechtv/tech-entrepreneur-turns-movie-producer-with-latest-film-18-12-minutes/">
          <div class="post__media">
            <img src="https://telkganesan.com/wp-content/uploads/2022/03/005.jpg" alt="MITechNews feature" />
          </div>
          <div class="post__body">
            <div class="post__meta">MITechNews • Feature</div>
            <h3>Tech Entrepreneur Turns Movie Producer</h3>
            <span class="link">Open <i data-lucide="chevron-right"></i></span>
          </div>
        </a>

        <a class="post" target="_blank" rel="noopener"
          href="https://www.prnewswire.com/news-releases/the-future-looks-bright-for-kyybas-tel-ganesan-and-cohorts-entertainments-ray-jackson-301553706.html">
          <div class="post__media">
            <img src="https://telkganesan.com/wp-content/uploads/2022/03/001.jpg" alt="PR Newswire" />
          </div>
          <div class="post__body">
            <div class="post__meta">PR Newswire • Press</div>
            <h3>The Future Looks Bright for Tel Ganesan</h3>
            <span class="link">Open <i data-lucide="chevron-right"></i></span>
          </div>
        </a>

        <a class="post" target="_blank" rel="noopener"
          href="https://sbnonline.com/article/tel-k-ganesan-president-and-ceo-kyyba-inc/">
          <div class="post__media">
            <img src="https://telkganesan.com/wp-content/uploads/2022/03/004.jpg" alt="Smart Business profile" />
          </div>
          <div class="post__body">
            <div class="post__meta">Smart Business • Profile</div>
            <h3>President &amp; CEO, Kyyba Inc.</h3>
            <span class="link">Open <i data-lucide="chevron-right"></i></span>
          </div>
        </a>
      </div>
      <div class="cta-row mt-1">
        <a class="button button--ghost" target="_blank" rel="noopener" href="https://telkganesan.com/articles/">
          See all articles <i data-lucide="arrow-right"></i>
        </a>
      </div>
    </section>

    <!-- ===== GALLERY (from /photos) ===== -->
    <section class="section" id="gallery">
      <header class="section__head">
        <p class="kicker">Moments & Events</p>
        <h2 style="margin-bottom: 20px;">Gallery</h2>
      </header>
      <div class="gallery">
        <!-- Pulled from https://telkganesan.com/photos/ -->
        <img src="https://telkganesan.com/wp-content/uploads/2022/03/001-1.jpg" alt="Gallery item">
        <img src="https://telkganesan.com/wp-content/uploads/2022/03/002-1.jpg" alt="Gallery item">
        <img src="https://telkganesan.com/wp-content/uploads/2022/03/003-1.jpg" alt="Gallery item">
        <img src="https://telkganesan.com/wp-content/uploads/2022/03/004-1.jpg" alt="Gallery item">
        <img src="https://telkganesan.com/wp-content/uploads/2022/03/005-1.jpg" alt="Gallery item">
        <img src="https://telkganesan.com/wp-content/uploads/2022/03/006.jpg" alt="Gallery item">
      </div>
      <div class="cta-row mt-1">
        <a class="button button--ghost" target="_blank" rel="noopener" href="https://telkganesan.com/photos/">
          See all photos <i data-lucide="arrow-right"></i>
        </a>
      </div>
    </section>

    <!-- ===== CONTACT (creative form) ===== -->
    <section class="section" id="contact">
      <header class="section__head">
        <p class="kicker">Let’s build something meaningful</p>
        <h2 style="margin-bottom: 20px;">Contact / Booking</h2>
      </header>

      <div class="contact">
        <!-- Left: Fancy form -->
        <form id="inquiryForm" class="form card">
          <div class="progress">
            <div class="progress__bar" id="progressBar" style="width: 0%"></div>
          </div>

          <div class="form__row">
            <label class="field">
              <span style="margin-bottom: 5px;">Name*</span>
              <input type="text" name="name" required placeholder="Your full name" />
            </label>
            <label class="field">
              <span>Email*</span>
              <input type="email" name="email" required placeholder="name@company.com" />
            </label>
          </div>

          <div class="form__row">
            <label class="field" style="margin-top: 15px;">
              <span>Company</span>
              <input type="text" name="company" placeholder="Organization" />
            </label>
            <label class="field" style="margin-top: 15px;">
              <span>Preferred date</span>
              <input type="date" name="date" />
            </label>
          </div>

          <label class="field" style="margin-top: 15px;">
            <span>Inquiry type*</span>
            <div class="chips" id="chips">
              <button type="button" data-value="Keynote">Keynote</button>
              <button type="button" data-value="Podcast">Podcast</button>
              <button type="button" data-value="Partnership">Partnership</button>
              <button type="button" data-value="Investment">Investment</button>
              <button type="button" data-value="Press">Press</button>
              <button type="button" data-value="Other">Other</button>
            </div>
            <input type="hidden" name="type" id="typeInput" required />
          </label>

          <label class="field" style="margin-top: 15px;">
            <span>Budget (estimate)</span>
            <input type="range" name="budget" min="0" max="100" value="40" />
            <div class="range__labels">
              <span>Starter</span><span>Standard</span><span>Premium</span>
            </div>
          </label>

          <label class="field" style="margin-top: 25px;">
            <span>Message*</span>
            <textarea name="message" rows="5" placeholder="Tell us about your event or opportunity…"
              required></textarea>
          </label>

          <label class="field" style="margin-top: 20px;">
            <span>Attach brief (optional)</span>
            <input type="file" name="file" />
          </label>

          <label class="check" style="margin-top: 15px;">
            <input type="checkbox" name="consent" checked />
            <span>You agree to be contacted about this inquiry.</span>
          </label>

          <div class="form__actions" style="margin-top: 15px;">
            <button class="button button--primary" type="submit">Send Inquiry <i data-lucide="send"></i></button>
            <span class="muted" id="formStatus" role="status"></span>
          </div>
        </form>

        <!-- Right: Office card -->
        <div class="card">
          <h3>Head Office</h3>
          <p style="line-height: 20px;">Kyyba, Inc.<br />28230 Orchard Lake Rd, Suite 100<br />Farmington Hills, MI
            48334, USA</p>
          <div class="list">
            <a href="tel:+18445559282" style="color: #fff;text-decoration: none;"><i data-lucide="phone"></i> (844)
              Kyyba‑4‑U</a>
            <a href="mailto:tel@kyyba.com" style="color: #fff;text-decoration: none;"><i data-lucide="mail"></i>
              tel@kyyba.com</a>
            <a href="https://maps.google.com?q=28230+Orchard+Lake+Rd+Farmington+Hills"
              style="color: #fff;text-decoration: none;" target="_blank" rel="noopener">
              <i data-lucide="map-pin"></i> View on Google Maps</a>
          </div>
          <hr />
          <h4>Connect</h4>
          <div class="socials">
            <a href="#" aria-label="LinkedIn"><i data-lucide="linkedin"></i></a>
            <a href="#" aria-label="Twitter"><i data-lucide="twitter"></i></a>
            <a href="#" aria-label="Globe"><i data-lucide="globe"></i></a>
          </div>
        </div>
      </div>
    </section>

<?php get_footer(); ?>
