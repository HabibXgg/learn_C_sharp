'use strict';

const menuButton = document.querySelector('[data-open-nav]');
const sidebar = document.querySelector('#sidebar');
const shade = document.querySelector('.mobile-shade');
const closeButton = document.querySelector('.close-menu');
let previousFocus;

function closeMenu() {
  document.body.classList.remove('menu-open');
  menuButton.setAttribute('aria-expanded', 'false');
  shade.hidden = true;
  document.querySelector('.app-shell').inert = false;
  if (previousFocus && window.innerWidth < 1024) previousFocus.focus();
}

menuButton.addEventListener('click', () => {
  previousFocus = document.activeElement;
  document.body.classList.add('menu-open');
  menuButton.setAttribute('aria-expanded', 'true');
  shade.hidden = false;
  document.querySelector('.app-shell').inert = true;
  closeButton.focus();
});
document.querySelectorAll('[data-close-nav]').forEach(button => button.addEventListener('click', closeMenu));
document.addEventListener('keydown', event => {
  if (!document.body.classList.contains('menu-open')) return;
  if (event.key === 'Escape') closeMenu();
  if (event.key === 'Tab') {
    const focusable = [...sidebar.querySelectorAll('a[href], button')].filter(el => el.getClientRects().length);
    const first = focusable[0];
    const last = focusable[focusable.length - 1];
    if (event.shiftKey && document.activeElement === first) { event.preventDefault(); last.focus(); }
    if (!event.shiftKey && document.activeElement === last) { event.preventDefault(); first.focus(); }
  }
});
window.matchMedia('(min-width: 1024px)').addEventListener('change', event => {
  if (event.matches) closeMenu();
});

let toastTimeout;
function notify(message) {
  const toast = document.querySelector('.toast');
  toast.textContent = message;
  toast.hidden = false;
  clearTimeout(toastTimeout);
  toastTimeout = setTimeout(() => { toast.hidden = true; }, 3500);
}
document.querySelectorAll('[data-copy]').forEach(button => {
  button.addEventListener('click', async () => {
    const code = button.closest('.code-block').querySelector('code');
    try {
      if (!navigator.clipboard) throw new Error('Clipboard unavailable');
      await navigator.clipboard.writeText(code.textContent);
      notify('Kode berhasil disalin. Coba jalankan di editormu!');
    } catch {
      const selection = window.getSelection();
      const range = document.createRange();
      range.selectNodeContents(code);
      selection.removeAllRanges();
      selection.addRange(range);
      notify('Kode sudah dipilih. Gunakan menu salin atau Ctrl/Cmd+C.');
    }
  });
});
