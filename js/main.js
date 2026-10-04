const toggle = document.querySelector('.site-header__toggle');
const nav = document.querySelector('.global-nav');

toggle.addEventListener('click', () => {
  const isOpen = nav.classList.toggle('is-open');
  toggle.classList.toggle('is-active', isOpen);
  toggle.setAttribute('aria-expanded', String(isOpen));
  // 開いている間は背面スクロールを止める
  document.body.style.overflow = isOpen ? 'hidden' : '';
});
