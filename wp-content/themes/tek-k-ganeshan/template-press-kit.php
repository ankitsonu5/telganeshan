<?php
/*
Template Name: Press Kit
*/
get_header(); 
?>

<main class="press-kit-page">

    <!-- 1. HERO SECTION -->
    <section class="pk-hero">
        <div class="pk-hero__content">
            <p class="kicker">Media Resources</p>
            <h1>Press Kit</h1>
            <p class="pk-hero__desc">Official bios, high-resolution photos, and brand assets for media use. Please credit <strong>Tel K. Ganesan</strong> when using these materials.</p>
            
            <div class="pk-hero__actions">
                <a href="#" class="button button--primary" download>
                    <i data-lucide="download"></i> Download Full Kit (ZIP)
                </a>
                <a href="#contact-press" class="button button--ghost">
                    Media Contact <i data-lucide="arrow-down"></i>
                </a>
            </div>
        </div>
        <div class="pk-hero__bg">
             <!-- Abstract or subtle background -->
             <div class="pk-gradient-orb"></div>
        </div>
    </section>

    <!-- 2. BIOGRAPHIES -->
    <section class="section pk-section" id="bios">
        <header class="section__head">
            <h2 class="h3">Official Biographies</h2>
            <p class="text-muted">Approved copy for event listings and introductions.</p>
        </header>

        <div class="bio-grid">
            <!-- Short Bio -->
            <div class="bio-card">
                <div class="bio-card__head">
                    <h3>Short Bio</h3>
                    <span class="badge">~50 Words</span>
                </div>
                <div class="bio-card__body">
                    <p id="bio-short">Tel K. Ganesan is a serial entrepreneur, movie producer, and investor residing in Detroit, Michigan. He is the Founder & Executive Chairman of Kyyba, Inc., a global IT services and staffing firm. Tel also founded Kyyba Films to produce independent cinema that champions underrepresented voices. He serves as a mentor and board member for several non-profits, bridging the gap between technology and wellness.</p>
                </div>
                <div class="bio-card__foot">
                    <button class="button button--sm button--outline copy-btn" data-target="bio-short">
                        <i data-lucide="copy"></i> Copy Text
                    </button>
                </div>
            </div>

            <!-- Standard Bio -->
            <div class="bio-card">
                <div class="bio-card__head">
                    <h3>Standard Bio</h3>
                    <span class="badge">~120 Words</span>
                </div>
                <div class="bio-card__body">
                    <p id="bio-std">Tel K. Ganesan represents the intersection of technology, media, and wellness. As the Founder and Executive Chairman of Kyyba, Inc., he has grown the company into a major global player in IT staffing and software solutions. Expanding his vision beyond tech, Tel established Kyyba Films, producing award-winning independent films that highlight diverse narratives and impactful storytelling.<br><br>
                    Tel is also a fervent wellness advocate, investing in health-tech initiatives that promote sustainable high performance for leaders. He serves as the President of The Indus Entrepreneurs (TiE) Detroit chapter and actively mentors the next generation of founders. His work has been featured in Forbes, improper, and other major publications.</p>
                </div>
                <div class="bio-card__foot">
                    <button class="button button--sm button--outline copy-btn" data-target="bio-std">
                        <i data-lucide="copy"></i> Copy Text
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. BRAND ASSETS (Photos) -->
    <section class="section pk-section" id="photos">
        <header class="section__head">
            <h2 class="h3">Approved Photos</h2>
            <p class="text-muted">High-resolution images for print and web.</p>
        </header>

        <div class="assets-grid">
            <!-- Image 1 -->
            <div class="asset-item">
                <div class="asset-preview">
                    <!-- Replace with actual dynamic field or static image -->
                    <img src="https://telkganesan.com/wp-content/uploads/2022/03/004.jpg" alt="Tel K. Ganesan - Headshot" loading="lazy">
                    <div class="asset-overlay">
                        <a href="https://telkganesan.com/wp-content/uploads/2022/03/004.jpg" class="button button--white" download target="_blank">
                            <i data-lucide="download"></i> JPG
                        </a>
                    </div>
                </div>
                <div class="asset-meta">
                    <span>Headshot (Portrait)</span>
                </div>
            </div>

            <!-- Image 2 -->
            <div class="asset-item">
                <div class="asset-preview">
                    <img src="https://telkganesan.com/wp-content/uploads/2022/03/001.jpg" alt="Tel K. Ganesan - Speaking" loading="lazy">
                    <div class="asset-overlay">
                        <a href="https://telkganesan.com/wp-content/uploads/2022/03/001.jpg" class="button button--white" download target="_blank">
                            <i data-lucide="download"></i> JPG
                        </a>
                    </div>
                </div>
                <div class="asset-meta">
                    <span>Speaking Event</span>
                </div>
            </div>

            <!-- Image 3 -->
            <div class="asset-item">
                <div class="asset-preview">
                    <img src="https://telkganesan.com/wp-content/uploads/2022/03/005.jpg" alt="Tel K. Ganesan - Casual" loading="lazy">
                    <div class="asset-overlay">
                        <a href="https://telkganesan.com/wp-content/uploads/2022/03/005.jpg" class="button button--white" download target="_blank">
                            <i data-lucide="download"></i> JPG
                        </a>
                    </div>
                </div>
                <div class="asset-meta">
                    <span>Casual / Lifestyle</span>
                </div>
            </div>
            
             <!-- Image 4 -->
            <div class="asset-item">
                <div class="asset-preview">
                    <img src="https://telkganesan.com/wp-content/uploads/2022/03/006.jpg" alt="Tel K. Ganesan - Awards" loading="lazy">
                    <div class="asset-overlay">
                        <a href="https://telkganesan.com/wp-content/uploads/2022/03/006.jpg" class="button button--white" download target="_blank">
                            <i data-lucide="download"></i> JPG
                        </a>
                    </div>
                </div>
                <div class="asset-meta">
                    <span>Awards / Formal</span>
                </div>
            </div>
        </div>
    </section>
    
    <!-- 4. LOGOS -->
     <section class="section pk-section" id="logos">
        <header class="section__head">
            <h2 class="h3">Company Logos</h2>
        </header>
        <div class="logos-grid">
             <div class="logo-card">
                 <img src="https://placehold.co/200x80?text=Kyyba+Inc" alt="Kyyba Inc Logo" class="logo-img">
                 <div class="logo-actions">
                     <a href="#" download>PNG</a>
                     <span class="sep">•</span>
                     <a href="#" download>SVG</a>
                 </div>
             </div>
             <div class="logo-card">
                 <img src="https://placehold.co/200x80?text=Kyyba+Films" alt="Kyyba Films Logo" class="logo-img">
                 <div class="logo-actions">
                     <a href="#" download>PNG</a>
                     <span class="sep">•</span>
                     <a href="#" download>SVG</a>
                 </div>
             </div>
             <div class="logo-card">
                 <img src="https://placehold.co/200x80?text=Kyyba+Wellness" alt="Kyyba Wellness Logo" class="logo-img">
                 <div class="logo-actions">
                     <a href="#" download>PNG</a>
                     <span class="sep">•</span>
                     <a href="#" download>SVG</a>
                 </div>
             </div>
        </div>
    </section>

    <!-- 5. CONTACT -->
    <section class="section pk-section" id="contact-press" style="margin-bottom: 5rem;">
        <div class="pk-contact-card">
            <div class="pk-contact-info">
                <h2 class="h3">Media Inquiries</h2>
                <p>For interviews, speaking engagements, or high-res requests not listed here, please contact the media team.</p>
                <a href="mailto:media@kyyba.com" class="button button--primary">
                    <i data-lucide="mail"></i> media@kyyba.com
                </a>
            </div>
             <div class="pk-contact-meta">
                <div class="meta-item">
                    <strong>Rep / Management</strong>
                    <span>Kyyba Public Relations</span>
                </div>
                 <div class="meta-item">
                    <strong>Location</strong>
                    <span>Farmington Hills, MI, USA</span>
                </div>
            </div>
        </div>
    </section>

</main>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Copy Bio Script
    const copyBtns = document.querySelectorAll('.copy-btn');
    
    copyBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const targetId = btn.getAttribute('data-target');
            const textToCopy = document.getElementById(targetId).innerText;
            
            navigator.clipboard.writeText(textToCopy).then(() => {
                const originalText = btn.innerHTML;
                btn.innerHTML = '<i data-lucide="check"></i> Copied!';
                btn.classList.add('button--success');
                
                setTimeout(() => {
                    btn.innerHTML = originalText;
                     btn.classList.remove('button--success');
                    lucide.createIcons(); // Re-init icon
                }, 2000);
            });
        });
    });
});
</script>

<?php get_footer(); ?>
