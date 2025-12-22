<?php
/*
Template Name: Contact Us
*/
get_header(); ?>

<main class="contact-page">
    <!-- ===== PAGE HEADER ===== -->
    <section class="page-header page-header--bg"
        style="background-image: url('<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'full') : 'https://telkganesan.com/wp-content/uploads/2022/03/001-1.jpg'; ?>')">
        <div class="page-header__overlay"></div>
        <div class="page-header__content">
            <p class="kicker">Connect with Tel</p>
            <h1>Get In Touch</h1>
            <p class="page-header__subtitle">For speaking engagements, media inquiries, investment opportunities, or just to say hello.</p>
        </div>
    </section>

    <!-- ===== CONTACT CONTENT ===== -->
    <section class="section" style="padding-top: 4rem; padding-bottom: 4rem;">
        <div class="contact">
            
            <!-- Contact Form -->
            <div class="form-card">
                <h2 style="margin-top: 0; margin-bottom: 1rem;">Send a Message</h2>
                <p style="margin-bottom: 2rem; opacity: 0.7;">Fill out the form below and we'll get back to you as soon as possible.</p>
                
                <form action="#" method="post">
                    <div class="form__row">
                        <label class="field">
                            <span>First Name</span>
                            <input type="text" name="first-name" placeholder="Jane" required>
                        </label>
                        <label class="field">
                            <span>Last Name</span>
                            <input type="text" name="last-name" placeholder="Doe" required>
                        </label>
                    </div>
                    
                    <div class="field" style="margin-top: 1rem;">
                        <span>Email Address</span>
                        <input type="email" name="email" placeholder="jane@example.com" required>
                    </div>

                    <div class="field" style="margin-top: 1rem;">
                        <span>Subject</span>
                        <select name="subject">
                            <option value="General Inquiry">General Inquiry</option>
                            <option value="Speaking Engagement">Speaking Engagement</option>
                            <option value="Media/Press">Media / Press</option>
                            <option value="Investment">Investment Opportunity</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    
                    <div class="field" style="margin-top: 1rem;">
                        <span>Message</span>
                        <textarea name="message" rows="5" placeholder="How can we help you?" required style="resize: vertical;"></textarea>
                    </div>

                    <button type="submit" class="button button--primary" style="margin-top: 1.5rem; width: 100%; justify-content: center;">
                        Send Message <i data-lucide="send" style="width: 18px;"></i>
                    </button>
                </form>
            </div>

            <!-- Contact Info Sidebar -->
            <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                
                <!-- Email Card -->
                <div class="contact-info-card">
                    <div class="icon"><i data-lucide="mail"></i></div>
                    <div>
                        <h3 style="font-size: 1.1rem;">Email Us</h3>
                        <p style="font-size: 0.95rem; margin-bottom: 0.5rem;">For general inquiries</p>
                        <a href="mailto:tel@kyyba.com" class="link">tel@kyyba.com</a>
                    </div>
                </div>

                <!-- Office Card -->
                <div class="contact-info-card">
                    <div class="icon"><i data-lucide="map-pin"></i></div>
                    <div>
                        <h3 style="font-size: 1.1rem;">Office</h3>
                        <p style="font-size: 0.95rem; margin-bottom: 0.5rem;">Kyyba Inc.</p>
                        <p style="margin: 0; opacity: 0.8; font-size: 0.9rem;">28230 Orchard Lake Rd #130<br>Farmington Hills, MI 48334<br>United States</p>
                    </div>
                </div>

                <!-- Media Details -->
                <div class="contact-info-card">
                    <div class="icon"><i data-lucide="mic-2"></i></div>
                    <div>
                        <h3 style="font-size: 1.1rem;">Media Inquiries</h3>
                        <p style="font-size: 0.95rem; margin-bottom: 0.5rem;">For interviews and press kits</p>
                        <a href="mailto:media@telkganesan.com" class="link">media@telkganesan.com</a>
                    </div>
                </div>

                <!-- Socials -->
                <div class="contact-info-card" style="flex-direction: column; gap: 1rem;">
                    <h3 style="font-size: 1.1rem; margin-bottom: 0; width: 100%;">Follow Tel Layout</h3>
                    <div style="display: flex; gap: 0.8rem; flex-wrap: wrap;">
                        <a href="#" class="button button--ghost button--sm"><i data-lucide="linkedin"></i> LinkedIn</a>
                        <a href="#" class="button button--ghost button--sm"><i data-lucide="twitter"></i> Twitter</a>
                        <a href="#" class="button button--ghost button--sm"><i data-lucide="facebook"></i> Facebook</a>
                        <a href="#" class="button button--ghost button--sm"><i data-lucide="instagram"></i> Instagram</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Map Section (Optional) -->
    <section class="section" style="padding-bottom: 4rem;">
        <div class="card" style="padding: 0.5rem; overflow: hidden;">
            <div style="width: 100%; height: 400px; background: #222; border-radius: 12px; overflow: hidden; position: relative;">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2938.650892036733!2d-83.37688168453767!3d42.51268397917688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8824bba750849ed7%3A0xe5a363229b3f367e!2s28230%20Orchard%20Lake%20Rd%20%23130%2C%20Farmington%20Hills%2C%20MI%2048334%2C%20USA!5e0!3m2!1sen!2sin!4v1647849182374!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
