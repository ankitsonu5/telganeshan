  </main>

  <!-- ===== FOOTER ===== -->
  <footer class="footer">
    <div class="footer__main">
      <!-- Brand Column -->
      <div class="footer__col footer__brand">
        <h3>Tel K Ganesan</h3>
        <p>Founder • Investor • Producer</p>
        <p class="footer__desc">Operating at the intersection of technology, media and wellness. Relentlessly
          execution‑focused, impact‑obsessed.</p>
        <div class="footer__socials">
          <a href="#" aria-label="LinkedIn"><i data-lucide="linkedin"></i></a>
          <a href="#" aria-label="Twitter"><i data-lucide="twitter"></i></a>
          <a href="#" aria-label="Globe"><i data-lucide="globe"></i></a>
          <a href="mailto:tel@kyyba.com" aria-label="Email"><i data-lucide="mail"></i></a>
        </div>
      </div>

      <!-- Quick Links 1 -->
      <div class="footer__col">
        <h4>Quick Links</h4>
        <ul class="footer__links">
          <li><a href="#about">Home</a></li>
          <li><a href="#journey">My Journey</a></li>
          <li><a href="#awards">Awards</a></li>
          <li><a href="#about">Philanthropy</a></li>
          <li><a href="#ventures">Ventures</a></li>
        </ul>
      </div>

      <!-- Quick Links 2 -->
      <div class="footer__col">
        <h4>Quick Links</h4>
        <ul class="footer__links">
          <li><a href="#about">Non Profit Organization</a></li>
          <li><a href="<?php echo home_url('/collection-of-thoughts/'); ?>">Collection of Thoughts</a></li>
          <li><a href="<?php echo home_url('/collection-of-thoughts/'); ?>">Articles</a></li>
          <li><a href="https://telkganesan.com/videos/" target="_blank">Videos</a></li>
          <li><a href="<?php echo home_url('/contact-us/'); ?>">Contact Us</a></li>
        </ul>
      </div>

      <!-- Recent Posts -->
      <div class="footer__col footer__posts">
        <h4>Recent Post</h4>
        <div class="footer__post">
          <img src="https://telkganesan.com/wp-content/uploads/2022/03/005.jpg" alt="Post thumbnail">
          <div>
            <a href="#blog">Breaking The Silence: Unveiling The Untold Realities Of Maternal Health Inequality</a>
            <span class="footer__date">NOVEMBER 29, 2023</span>
          </div>
        </div>
        <div class="footer__post">
          <img src="https://telkganesan.com/wp-content/uploads/2022/03/001.jpg" alt="Post thumbnail">
          <div>
            <a href="#blog">Importance To Distinguish Yourself With Personal Brand</a>
            <span class="footer__date">MARCH 08, 2022</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer__bottom">
      <p>Copyright <span id="year"></span> Tel K Ganesan, All Rights Reserved.</p>
      <div class="footer__bottom-links">
        <a href="#" aria-label="Scroll to top" class="scroll-top"><i data-lucide="arrow-up"></i></a>
      </div>
    </div>
    <!-- Glow Effect Moved to Footer -->
    <div class="contact-glow"></div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>
