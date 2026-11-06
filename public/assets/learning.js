'use strict';

(() => {
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  const motionButton = document.querySelector('[data-motion-toggle]');
  const runningAnimations = new Set();
  const steppers = [];
  let preference = 'on';
  let motionEnabled = false;
  let stopHero = () => {};
  try { preference = localStorage.getItem('csharp-motion') || 'on'; } catch { /* Storage may be unavailable. */ }

  function animate(element, keyframes, options = {}) {
    if (!motionEnabled || typeof element.animate !== 'function') return;
    const animation = element.animate(keyframes, { duration: 350, easing: 'cubic-bezier(.2,.7,.2,1)', ...options });
    runningAnimations.add(animation);
    animation.finished.catch(() => {}).finally(() => runningAnimations.delete(animation));
    return animation;
  }

  function applyMotionPreference() {
    motionEnabled = !reducedMotion.matches && preference !== 'off';
    document.documentElement.dataset.motion = motionEnabled ? 'on' : 'off';
    if (motionButton) {
      motionButton.hidden = false;
      motionButton.disabled = reducedMotion.matches;
      motionButton.setAttribute('aria-pressed', String(motionEnabled));
      motionButton.setAttribute('aria-label', reducedMotion.matches
        ? 'Animasi dinonaktifkan mengikuti pengaturan perangkat'
        : 'Aktifkan animasi');
      motionButton.querySelector('[data-motion-label]').textContent = reducedMotion.matches
        ? 'Gerak dikurangi' : motionEnabled ? 'Animasi aktif' : 'Animasi mati';
    }
    if (!motionEnabled) {
      runningAnimations.forEach(animation => animation.cancel());
      runningAnimations.clear();
      steppers.forEach(stepper => stepper.pause());
      stopHero();
    }
    steppers.forEach(stepper => stepper.updatePlayButton());
  }

  motionButton?.addEventListener('click', () => {
    preference = motionEnabled ? 'off' : 'on';
    try { localStorage.setItem('csharp-motion', preference); } catch { /* Preference still applies this page. */ }
    applyMotionPreference();
  });
  reducedMotion.addEventListener('change', applyMotionPreference);
  applyMotionPreference();

  document.querySelectorAll('[data-stepper]').forEach(root => {
    const steps = [...root.querySelectorAll('[data-step]')];
    if (!steps.length) return;
    const previous = root.querySelector('[data-step-prev]');
    const next = root.querySelector('[data-step-next]');
    const play = root.querySelector('[data-step-play]');
    const count = root.querySelector('[data-step-count]');
    const dots = [...root.querySelectorAll('[data-step-to]')];
    const status = root.querySelector('[data-step-status]');
    let current = 0;
    let timer = null;
    let activeAnimation;

    function updatePlayButton() {
      if (!play) return;
      play.disabled = !motionEnabled;
      play.setAttribute('aria-pressed', String(timer !== null));
      play.querySelector('span').textContent = !motionEnabled ? 'Gunakan tombol langkah' : timer !== null ? 'Jeda' : current === steps.length - 1 ? 'Putar ulang' : 'Putar alurnya';
    }

    function pause() {
      clearInterval(timer);
      timer = null;
      updatePlayButton();
    }

    function show(index, { manual = false, animateChange = true } = {}) {
      const old = current;
      current = Math.max(0, Math.min(steps.length - 1, index));
      if (manual) pause();
      activeAnimation?.cancel();
      steps.forEach((step, i) => {
        const active = i === current;
        step.dataset.active = String(active);
        step.setAttribute('aria-hidden', String(!active));
        step.inert = !active;
      });
      previous.disabled = current === 0;
      next.disabled = current === steps.length - 1;
      count.textContent = `${current + 1} / ${steps.length}`;
      dots.forEach((dot, i) => {
        dot.setAttribute('aria-current', i === current ? 'step' : 'false');
      });
      if (animateChange && old !== current) {
        activeAnimation = animate(steps[current], [
          { opacity: 0.35, transform: `translateX(${current > old ? 12 : -12}px)` },
          { opacity: 1, transform: 'translateX(0)' }
        ], { duration: root.dataset.kind === 'visual' ? 400 : 260 });
      }
      if (manual) status.textContent = `Langkah ${current + 1} dari ${steps.length}: ${steps[current].querySelector('h3').textContent}`;
      if (current === steps.length - 1) {
        pause();
        if (animateChange) status.textContent = `Semua ${steps.length} langkah selesai. Kamu bisa mengulang atau memilih langkah sebelumnya.`;
      }
      updatePlayButton();
    }

    root.classList.add('is-enhanced');
    root.querySelector('.step-controls').hidden = false;
    root.querySelector('.step-dots').hidden = false;
    previous.addEventListener('click', () => show(current - 1, { manual: true }));
    next.addEventListener('click', () => show(current + 1, { manual: true }));
    dots.forEach(dot => dot.addEventListener('click', () => show(Number(dot.dataset.stepTo), { manual: true })));
    play?.addEventListener('click', () => {
      if (!motionEnabled) return;
      if (timer !== null) {
        pause();
        status.textContent = `Dijeda pada langkah ${current + 1} dari ${steps.length}.`;
        return;
      }
      if (current === steps.length - 1) show(0);
      timer = setInterval(() => show(current + 1), 4200);
      updatePlayButton();
      status.textContent = 'Alur diputar. Tekan Jeda untuk membaca lebih lama.';
    });
    steppers.push({ pause, updatePlayButton, root });
    show(0, { animateChange: false });
  });

  // Entry effects never hide content. The page remains fully readable if JS fails.
  if ('IntersectionObserver' in window) {
    const revealObserver = new IntersectionObserver(entries => {
      let started = 0;
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        revealObserver.unobserve(entry.target);
        if (started >= 2 || !motionEnabled) return;
        started++;
        animate(entry.target, [
          { opacity: 0.55, transform: 'translateY(14px)' },
          { opacity: 1, transform: 'translateY(0)' }
        ], { duration: 450, delay: (started - 1) * 70 });
      });
    }, { threshold: 0.08 });
    document.querySelectorAll('.stage-card, .tool-card, .objectives, .analogy, .concept-lab, .walkthrough, .practice-card').forEach(element => revealObserver.observe(element));
    const pauseObserver = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) steppers.find(stepper => stepper.root === entry.target)?.pause();
      });
    });
    steppers.forEach(stepper => pauseObserver.observe(stepper.root));
  }

  document.addEventListener('visibilitychange', () => {
    if (!document.hidden) return;
    steppers.forEach(stepper => stepper.pause());
    stopHero();
  });

  document.querySelectorAll('details.solution, details.practice-hint, details.stage-card').forEach(details => {
    details.addEventListener('toggle', () => {
      if (!details.open) return;
      const content = details.querySelector(':scope > div');
      if (content) animate(content, [{ opacity: 0.5, transform: 'translateY(-5px)' }, { opacity: 1, transform: 'translateY(0)' }], { duration: 240 });
    });
  });

  const article = document.querySelector('[data-reading-article]');
  const progressHost = document.querySelector('[data-reading-progress]');
  if (article && progressHost) {
    progressHost.hidden = false;
    const progress = progressHost.querySelector('progress');
    const tocLinks = [...document.querySelectorAll('.article-toc a[href^="#"]')];
    const sections = tocLinks.map(link => ({ link, section: document.getElementById(link.hash.slice(1)) })).filter(item => item.section);
    let scheduled = false;
    const updateReadingPosition = () => {
      const rect = article.getBoundingClientRect();
      const distance = Math.max(1, article.offsetHeight - window.innerHeight);
      progress.value = Math.round(Math.max(0, Math.min(100, (-rect.top / distance) * 100)));
      let active;
      for (const item of sections) {
        if (item.section.getBoundingClientRect().top <= window.innerHeight * 0.35) active = item;
      }
      tocLinks.forEach(link => {
        if (link === active?.link) link.setAttribute('aria-current', 'location');
        else link.removeAttribute('aria-current');
      });
      scheduled = false;
    };
    const scheduleUpdate = () => {
      if (scheduled) return;
      scheduled = true;
      requestAnimationFrame(updateReadingPosition);
    };
    window.addEventListener('scroll', scheduleUpdate, { passive: true });
    window.addEventListener('resize', scheduleUpdate, { passive: true });
    window.addEventListener('pageshow', scheduleUpdate);
    updateReadingPosition();
  }

  const hero = document.querySelector('.hero-code');
  if (hero) {
    const lines = [...hero.querySelectorAll('.hero-code-body > p')];
    const output = hero.querySelector('.hero-output');
    const replay = document.createElement('button');
    replay.type = 'button';
    replay.className = 'hero-replay';
    replay.textContent = 'Putar contoh';
    hero.querySelector('.window-top').append(replay);
    let heroTimers = [];
    stopHero = () => {
      heroTimers.forEach(clearTimeout);
      heroTimers = [];
      lines.forEach(line => line.classList.remove('line-running'));
      replay.disabled = false;
    };
    function playHero() {
      stopHero();
      if (!motionEnabled) return;
      replay.disabled = true;
      [1, 2, 3].forEach((lineIndex, i) => {
        heroTimers.push(setTimeout(() => {
          lines.forEach(line => line.classList.remove('line-running'));
          lines[lineIndex].classList.add('line-running');
        }, i * 600));
      });
      heroTimers.push(setTimeout(() => {
        animate(output, [{ opacity: 0.4, transform: 'translateY(5px)' }, { opacity: 1, transform: 'translateY(0)' }]);
        stopHero();
      }, 1800));
    }
    replay.addEventListener('click', () => {
      if (!motionEnabled) { notify('Aktifkan animasi untuk memutar contoh.'); return; }
      playHero();
    });
    if (motionEnabled) heroTimers.push(setTimeout(playHero, 650));
  }
})();
