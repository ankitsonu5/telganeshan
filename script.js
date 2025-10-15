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

  // Parallax glow
  const glow = document.getElementById('heroGlow');
  const onScroll = () => {
    const y = Math.max(-80, -0.12 * window.scrollY);
    glow.style.transform = `translateY(${y}px)`;
  };
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });

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

  function updateProgress(){
    if(!form) return;
    const required = ['name','email','message'];
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
    try{
      const saved = JSON.parse(localStorage.getItem(key) || '{}');
      ['name','email','company','date','message','type'].forEach(n => { if(saved[n]) form.elements[n].value = saved[n]; });
      if(saved.type){
        chips?.querySelectorAll('button').forEach(b => { if (b.dataset.value === saved.type) b.classList.add('active') });
        typeInput.value = saved.type;
      }
      updateProgress();
    }catch(e){}

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const fd = new FormData(form);
      const data = Object.fromEntries(fd.entries());
      localStorage.setItem('telkg_form', JSON.stringify(data));
      status.textContent = 'Thanks — your inquiry has been noted. We will reply shortly.';
      form.reset();
      chips?.querySelectorAll('button').forEach(b => b.classList.remove('active'));
      typeInput.value='';
      updateProgress();
      setTimeout(() => { status.textContent = ''; }, 6000);
    });
  }
});
