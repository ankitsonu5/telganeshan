// Icons
document.addEventListener('DOMContentLoaded', () => {
  if (window.lucide) window.lucide.createIcons();

  // Mobile menu
  const menuBtn = document.getElementById('menuBtn');
  const mobileNav = document.getElementById('mobileNav');
  if (menuBtn && mobileNav) {
    menuBtn.addEventListener('click', () => mobileNav.showModal());
    mobileNav.querySelectorAll('[data-close]').forEach(el => el.addEventListener('click', () => mobileNav.close()));
  }

  // Category Filter for Blog/Thoughts
  const filterBtns = document.querySelectorAll('.filter-btn');
  const blogCards = document.querySelectorAll('.blog-card, .post');

  if (filterBtns.length > 0 && blogCards.length > 0) {
    filterBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const category = btn.getAttribute('data-category');

        // Update active state
        filterBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        // Filter cards
        blogCards.forEach(card => {
          const cardCategory = card.getAttribute('data-category');

          if (category === 'all') {
            card.style.display = '';
          } else if (cardCategory === category) {
            card.style.display = '';
          } else {
            card.style.display = 'none';
          }
        });
      });
    });
  }


  // Hero Slider
  if (typeof Swiper !== 'undefined') {
    const heroSlider = new Swiper('.hero-slider', {
      effect: 'fade',
      fadeEffect: { crossFade: true },
      speed: 1000,
      autoplay: {
        delay: 10000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      loop: true
    });
  }

  // Parallax glow
  const glow = document.getElementById('heroGlow');
  if (glow) {
    const onScroll = () => {
      const y = Math.max(-80, -0.12 * window.scrollY);
      glow.style.transform = `translateY(${y}px)`;
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  // Video modal
  document.querySelectorAll('[data-open="videoModal"]').forEach(btn => {
    btn.addEventListener('click', () => document.getElementById('videoModal').showModal());
  });
  document.querySelectorAll('[data-close]').forEach(btn => {
    btn.addEventListener('click', (e) => {
      const dlg = e.target.closest('dialog');
      if (dlg?.open) dlg.close();
    });
  });

  // Year
  const y = new Date().getFullYear();
  const yearEl = document.getElementById('year');
  if (yearEl) yearEl.textContent = y;

  // Fancy form interactions
  const form = document.getElementById('inquiryForm');
  const status = document.getElementById('formStatus');
  const chips = document.getElementById('chips');
  const typeInput = document.getElementById('typeInput');
  const progressBar = document.getElementById('progressBar');

  function updateProgress() {
    if (!form) return;
    const required = ['name', 'email', 'message'];
    let score = 0;
    required.forEach(n => { if ((form.elements[n]?.value || '').trim().length > 2) score += 1; });
    if (typeInput.value) score += 1;
    const pct = Math.round((score / 4) * 100);
    progressBar.style.width = pct + '%';
  }

  if (chips) {
    chips.querySelectorAll('button').forEach(btn => {
      btn.addEventListener('click', () => {
        chips.querySelectorAll('button').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        typeInput.value = btn.dataset.value;
        updateProgress();
      });
    });
  }

  if (form) {
    form.addEventListener('input', updateProgress);
    updateProgress();

    // Persist to localStorage
    const key = 'telkg_form';
    try {
      const saved = JSON.parse(localStorage.getItem(key) || '{}');
      ['name', 'email', 'company', 'date', 'message', 'type'].forEach(n => { if (saved[n]) form.elements[n].value = saved[n]; });
      if (saved.type) {
        chips?.querySelectorAll('button').forEach(b => { if (b.dataset.value === saved.type) b.classList.add('active') });
        typeInput.value = saved.type;
      }
      updateProgress();
    } catch (e) { }

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const fd = new FormData(form);
      const data = Object.fromEntries(fd.entries());
      localStorage.setItem('telkg_form', JSON.stringify(data));
      status.textContent = 'Thanks — your inquiry has been noted. We will reply shortly.';
      form.reset();
      chips?.querySelectorAll('button').forEach(b => b.classList.remove('active'));
      typeInput.value = '';
      updateProgress();
      setTimeout(() => { status.textContent = ''; }, 6000);
    });
  }

  // Scroll to top button
  const scrollTopBtn = document.querySelector('.scroll-top');
  if (scrollTopBtn) {
    scrollTopBtn.addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // Ventures Slider
  // Ventures Slider
  // Ventures Slider
  const venturesSlider = new Swiper('.ventures-slider', {
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 3, // Force exactly 3 slides
    coverflowEffect: {
      rotate: 0,
      stretch: 0,
      depth: 100,
      modifier: 1, // Reduced modifier to keep them closer
      slideShadows: false,
      scale: 0.85, // Scale down side slides
    },
    initialSlide: 1,
    spaceBetween: 0, // Remove spaceBetween as coverflow handles spacing via depth/stretch
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 3,
      }
    },
  });

  // Netflix-style Video Carousel Swiper
  const videoCarouselSwiper = new Swiper('.video-carousel-swiper', {
    slidesPerView: 2,
    spaceBetween: 10,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      640: {
        slidesPerView: 3,
        spaceBetween: 10,
      },
      768: {
        slidesPerView: 4,
        spaceBetween: 10,
      },
      1024: {
        slidesPerView: 5,
        spaceBetween: 10,
      },
      1400: {
        slidesPerView: 6,
        spaceBetween: 10,
      },
    },
    loop: false, // No loop for Netflix style usually
    allowTouchMove: true,
  });
});

// Lightbox Logic
const lightbox = document.createElement('div');
lightbox.classList.add('lightbox');
lightbox.innerHTML = `
  <button class="lightbox-close"><i data-lucide="x"></i></button>
  <button class="lightbox-nav lightbox-prev"><i data-lucide="chevron-left"></i></button>
  <button class="lightbox-nav lightbox-next"><i data-lucide="chevron-right"></i></button>
  <img src="" alt="Lightbox Image">
`;
document.body.appendChild(lightbox);

const lightboxImg = lightbox.querySelector('img');
const closeBtn = lightbox.querySelector('.lightbox-close');
const prevBtn = lightbox.querySelector('.lightbox-prev');
const nextBtn = lightbox.querySelector('.lightbox-next');

let galleryItems = [];
let currentIndex = 0;

function openLightbox(index) {
  currentIndex = index;
  updateLightboxImage();
  lightbox.classList.add('active');
  document.body.style.overflow = 'hidden';
}

function updateLightboxImage() {
  if (galleryItems.length === 0) return;
  const item = galleryItems[currentIndex];
  lightboxImg.src = item.href;
}

function slideNext(e) {
  if (e) e.stopPropagation();
  currentIndex = (currentIndex + 1) % galleryItems.length;
  updateLightboxImage();
}

function slidePrev(e) {
  if (e) e.stopPropagation();
  currentIndex = (currentIndex - 1 + galleryItems.length) % galleryItems.length;
  updateLightboxImage();
}

function closeLightbox() {
  lightbox.classList.remove('active');
  document.body.style.overflow = '';
  setTimeout(() => { lightboxImg.src = ''; }, 300);
}

// Event Delegation
document.addEventListener('click', (e) => {
  const link = e.target.closest('.gallery-item-link');
  if (link) {
    e.preventDefault();
    galleryItems = Array.from(document.querySelectorAll('.gallery-item-link'));
    const index = galleryItems.indexOf(link);
    openLightbox(index);
  }
});

closeBtn.addEventListener('click', closeLightbox);
nextBtn.addEventListener('click', slideNext);
prevBtn.addEventListener('click', slidePrev);

lightbox.addEventListener('click', (e) => {
  if (e.target === lightbox) closeLightbox();
});

document.addEventListener('keydown', (e) => {
  if (!lightbox.classList.contains('active')) return;
  if (e.key === 'Escape') closeLightbox();
  if (e.key === 'ArrowRight') slideNext();
  if (e.key === 'ArrowLeft') slidePrev();
});

// Re-init lucide icons for the appended buttons
if (typeof lucide !== 'undefined') {
  lucide.createIcons();
}

// Video Page Navbar Logic removed to enforce global solid header
/* 
const videoPage = document.querySelector('.videos-page');
if (videoPage) {
  // ... removed ...
}
*/

// Global Open Hero Video Function (Background Play)
window.openHeroVideo = function (url) {
  const heroBg = document.querySelector('.video-hero-bg');
  if (!heroBg) return;

  // Clear existing content (image)
  heroBg.innerHTML = '';

  if (url.match(/\.(mp4|webm|ogg)$/i)) {
    // Native Video
    heroBg.innerHTML = `<video src="${url}" controls autoplay class="w100 h100" style="width:100%;height:100%;object-fit:cover;"></video>`;
  } else {
    // Iframe Video (YouTube/Vimeo)
    let finalUrl = url;
    // Append autoplay params
    // Note: loop=1&playlist=VIDEO_ID is often needed for looping BG video on YT, but for Play button we just want it to play once normally?
    // User said "background me paly", usually means substituting the BG.
    // Autoplay is essential.
    if (url.includes('youtube.com') || url.includes('youtu.be')) {
      // Add allow=autoplay
      finalUrl += (url.includes('?') ? '&' : '?') + 'autoplay=1&rel=0&modestbranding=1&controls=0&showinfo=0';
      // YouTube often blocks autoplay with sound if not muted. But user interaction (click) triggered this.
      // However, we are injecting iframe... browsers might block unmuted autoplay if it's not the direct result of the click in the same frame?
      // Since we are replacing DOM, it should work in most modern browsers as long as it's immediate.
    } else if (url.includes('vimeo')) {
      finalUrl += (url.includes('?') ? '&' : '?') + 'autoplay=1&background=1';
      // Vimeo 'background=1' mutes it automatically. If user wants sound, maybe just autoplay=1.
      // Let's try to give sound if possible, but reliable BG play usually requires mute or specific API.
      // Given user intent "Play", let's try standard play.
      // finalUrl += '&autoplay=1';
    }
    heroBg.innerHTML = `<iframe src="${finalUrl}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width:100%;height:100%;"></iframe>`;
  }

  // Optional: Hide the Play button to prevent re-clicks?
  const playBtn = document.querySelector('.btn-play');
  if (playBtn) {
    playBtn.style.opacity = '0.5';
    playBtn.style.pointerEvents = 'none';
    playBtn.innerHTML = '<i data-lucide="play" style="fill: black; margin-right: 8px; width: 24px;"></i> Playing...';
    if (typeof lucide !== 'undefined') lucide.createIcons();
  }
}

// Close Modal Logic (Stop Video)
const vModal = document.getElementById('videoModal');
if (vModal) {
  vModal.addEventListener('close', () => {
    const container = document.getElementById('videoModalContainer');
    if (container) container.innerHTML = '';
  });
  vModal.addEventListener('click', (e) => {
    if (e.target === vModal) vModal.close();
  });
}
