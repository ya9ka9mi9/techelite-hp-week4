const toggle = document.querySelector('.site-header__toggle');
const nav = document.querySelector('.global-nav');

function setMenu(isOpen) {
  nav.classList.toggle('is-open', isOpen);
  toggle.classList.toggle('is-active', isOpen);
  toggle.setAttribute('aria-expanded', String(isOpen));
  toggle.setAttribute('aria-label', isOpen ? 'menu メニューを閉じる' : 'menu メニューを開く');
  // 開いている間は背面スクロールを止める
  document.body.style.overflow = isOpen ? 'hidden' : '';
}

toggle.addEventListener('click', () => {
  setMenu(!nav.classList.contains('is-open'));
});

// メニューの暗い部分をクリック、またはリンクを押したら閉じる（ページ内リンク対策）
nav.addEventListener('click', (e) => {
  if (e.target === nav || e.target.closest('.global-nav__link')) {
    setMenu(false);
  }
});

// お部屋のタブ切り替え（TOP）
const tabs = document.querySelectorAll('.room-tabs__tab');
tabs.forEach((tab) => {
  tab.addEventListener('click', () => {
    tabs.forEach((t) => {
      const selected = t === tab;
      t.setAttribute('aria-selected', String(selected));
      document.getElementById(t.getAttribute('aria-controls')).hidden = !selected;
    });
  });
});

// 四季の写真スライダー（TOP）
// 並び：[複製5枚][本物5枚][複製5枚]。本物の範囲をはみ出したら、見た目が同じ位置へ一瞬で戻す
const slider = document.querySelector('.season-slider');
if (slider) {
  const track = slider.querySelector('.season-slider__track');
  const items = track.children;
  const count = items.length / 3;        // 本物の枚数（5）
  let index = 0;                          // 今の位置（0〜4）

  function move(animate = true) {
    const item = items[0];
    const step = item.offsetWidth + parseFloat(getComputedStyle(item).marginRight);
    const viewWidth = slider.offsetWidth;
    const setWidth = step * count - parseFloat(getComputedStyle(item).marginRight);
    // 5枚を画面の中央にそろえる（Figma：1440px 幅で左端が -186px になる位置）
    const base = (viewWidth - setWidth) / 2;
    track.classList.toggle('is-jump', !animate);
    track.style.transform = `translateX(${base - (count + index) * step}px)`;
  }

  slider.querySelector('.season-slider__btn--next').addEventListener('click', () => { index++; move(); });
  slider.querySelector('.season-slider__btn--prev').addEventListener('click', () => { index--; move(); });

  // 本物の範囲の外なら、同じ見た目の位置へ一瞬で戻す
  function wrap() {
    if (index >= count) { index -= count; move(false); }
    if (index < 0)      { index += count; move(false); }
  }
  track.addEventListener('transitionend', wrap);   // 動き終わったとき
  // 「動きを減らす」設定ではアニメーションしないので、すぐ戻す
  slider.addEventListener('click', () => {
    if (getComputedStyle(track).transitionDuration === '0s') wrap();
  });

  window.addEventListener('resize', () => move(false));
  move(false);
}
