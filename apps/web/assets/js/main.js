/**
 * main.js — ヘッダーのスクロール制御 + Contact フォームのクライアントサイドバリデーション
 */

(function () {
  'use strict';

  /* ----------------------------------------------------------
     Header: PC時にスクロールしたら非表示、トップに戻ったら再表示
     md ブレークポイント (768px) 未満はスキップ
  ---------------------------------------------------------- */
  var header = document.querySelector('header.sticky-top');
  var logo   = header ? header.querySelector('.header-logo') : null;

  if (header) {
    window.addEventListener('scroll', function () {
      var scrolled = window.scrollY > 0;

      if (window.innerWidth >= 768) {
        // PC: ヘッダー全体を非表示
        header.classList.toggle('header-hidden', scrolled);
        if (logo) logo.classList.remove('header-logo-hidden');
      } else {
        // SP: ロゴのみ非表示、ハンバーガーは残す
        if (logo) logo.classList.toggle('header-logo-hidden', scrolled);
        header.classList.remove('header-hidden');
      }
    }, { passive: true });
  }

  /* ----------------------------------------------------------
     Scroll indicator: クリックで次セクションへスムーススクロール
  ---------------------------------------------------------- */
  var scrollIndicator = document.getElementById('js-scroll-indicator');
  if (scrollIndicator) {
    scrollIndicator.addEventListener('click', function () {
      var heroSection = document.querySelector('.hero-section');
      var nextSection = heroSection ? heroSection.nextElementSibling : null;
      if (nextSection) {
        nextSection.scrollIntoView({ behavior: 'smooth' });
      }
    });
  }

  /* ----------------------------------------------------------
     Hamburger overlay (SP only)
  ---------------------------------------------------------- */
  var navCollapse = document.getElementById('mainNav');
  if (navCollapse) {
    var overlay = document.createElement('div');
    overlay.className = 'nav-overlay';
    document.body.appendChild(overlay);

    navCollapse.addEventListener('show.bs.collapse', function () {
      overlay.classList.add('nav-overlay--active');
    });
    navCollapse.addEventListener('hide.bs.collapse', function () {
      overlay.classList.remove('nav-overlay--active');
    });
    overlay.addEventListener('click', function () {
      var bsCollapse = bootstrap.Collapse.getInstance(navCollapse);
      if (bsCollapse) bsCollapse.hide();
    });
  }

  /* ----------------------------------------------------------
     Works: カテゴリ絞り込み + テキスト検索
  ---------------------------------------------------------- */
  var filterBtns   = document.querySelectorAll('.works-filter-btn');
  var searchInput  = document.getElementById('worksSearch');
  var worksItems   = document.querySelectorAll('.works-grid-item');
  var noResults    = document.getElementById('worksNoResults');

  if (filterBtns.length && worksItems.length) {
    var activeFilter = 'all';

    function applyFilter() {
      var keyword = searchInput ? searchInput.value.trim().toLowerCase() : '';
      var visible = 0;

      worksItems.forEach(function (item) {
        var cat    = item.getAttribute('data-category') || '';
        var text   = item.getAttribute('data-search')   || '';
        var catOk  = activeFilter === 'all' || cat === activeFilter;
        var textOk = keyword === '' || text.includes(keyword);

        if (catOk && textOk) {
          item.classList.remove('is-hidden');
          visible++;
        } else {
          item.classList.add('is-hidden');
        }
      });

      if (noResults) noResults.style.display = visible === 0 ? 'block' : 'none';
    }

    filterBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        filterBtns.forEach(function (b) { b.classList.remove('is-active'); });
        btn.classList.add('is-active');
        activeFilter = btn.getAttribute('data-filter');
        applyFilter();
      });
    });

    if (searchInput) {
      searchInput.addEventListener('input', applyFilter);
    }
  }

  /* ----------------------------------------------------------
     Contact フォーム: クライアントサイドバリデーション
  ---------------------------------------------------------- */
  const form = document.getElementById('contactForm');
  if (!form) return;

  form.addEventListener('submit', function (e) {
    clearErrors();

    const name           = form.querySelector('[name="name"]');
    const email          = form.querySelector('[name="email"]');
    const message        = form.querySelector('[name="message"]');
    const inquiryChecked = form.querySelectorAll('[name="inquiry_type[]"]:checked');
    const privacyAgree   = form.querySelector('[name="privacy_agree"]');

    let valid = true;

    if (inquiryChecked.length === 0) {
      const group = form.querySelector('.inquiry-type-group');
      if (group) {
        const err = document.createElement('div');
        err.className = 'form-error-msg mt-2';
        err.textContent = 'お問い合わせ種別を1つ以上選択してください。';
        group.after(err);
      }
      valid = false;
    }

    if (!name.value.trim()) {
      showError(name, 'お名前を入力してください。');
      valid = false;
    }

    if (!email.value.trim()) {
      showError(email, 'メールアドレスを入力してください。');
      valid = false;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) {
      showError(email, '有効なメールアドレスを入力してください。');
      valid = false;
    }

    if (!message.value.trim()) {
      showError(message, 'メッセージを入力してください。');
      valid = false;
    } else if (message.value.trim().length < 10) {
      showError(message, '10文字以上のメッセージを入力してください。');
      valid = false;
    }

    if (privacyAgree && !privacyAgree.checked) {
      const group = form.querySelector('.privacy-agree-group');
      if (group) {
        const err = document.createElement('div');
        err.className = 'form-error-msg mt-2';
        err.textContent = 'プライバシーポリシーへの同意が必要です。';
        group.after(err);
      }
      valid = false;
    }

    if (!valid) {
      e.preventDefault();
      return;
    }

    // バリデーション通過後：送信中UIに切り替え
    const submitBtn = form.querySelector('[type="submit"]');
    if (submitBtn) {
      submitBtn.style.display = 'none';

      const sending = document.createElement('div');
      sending.className = 'contact-sending';
      sending.innerHTML =
        '<span class="contact-sending-spinner"></span>' +
        '<span class="contact-sending-text">送信中...</span>';
      submitBtn.parentNode.insertBefore(sending, submitBtn.nextSibling);
    }
  });

  function showError(input, msg) {
    input.classList.add('is-invalid');
    const feedback = document.createElement('div');
    feedback.className = 'invalid-feedback d-block';
    feedback.style.cssText = 'font-size:.8rem;color:#f43f5e;margin-top:.3rem;padding-left:.5rem';
    feedback.textContent = msg;
    input.parentNode.appendChild(feedback);
  }

  function clearErrors() {
    form.querySelectorAll('.is-invalid').forEach(function (el) {
      el.classList.remove('is-invalid');
    });
    form.querySelectorAll('.invalid-feedback').forEach(function (el) {
      el.remove();
    });
    form.querySelectorAll('.form-error-msg').forEach(function (el) {
      el.remove();
    });
  }
})();
