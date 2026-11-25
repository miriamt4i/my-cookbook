document.addEventListener('DOMContentLoaded', () => {
  const navigation = document.querySelector('#site-navigation');
  const toggle = navigation?.querySelector('.menu-toggle');
  const menu = navigation?.querySelector('.main-menu-container');
  const header = navigation?.closest('#masthead');
  const backdrop = header?.querySelector('.menu-backdrop');

  if (!navigation || !toggle || !menu || !header || !backdrop) {
    return;
  }

  const mobile = window.matchMedia('(max-width: 767px)');
  const label = toggle.querySelector('.menu-toggle-label');

  const background = [
    ...document.querySelectorAll('#content, #colophon')
  ].map(element => ({
    element,
    wasInert: element.inert
  }));

  const setMenu = (open, restoreFocus = false) => {
    navigation.classList.toggle('is-open', open);
    header.classList.toggle('menu-is-open', open);
    document.body.classList.toggle('menu-open', open);

    toggle.setAttribute('aria-expanded', String(open));
    toggle.setAttribute(
      'aria-label',
      open ? 'Close menu' : 'Open menu'
    );

    if (label) {
      label.textContent = open ? 'Close menu' : 'Menu';
    }

    menu.inert = mobile.matches && !open;
    backdrop.hidden = !open;

    background.forEach(({ element, wasInert }) => {
      element.inert = open || wasInert;
    });

    if (restoreFocus) {
      toggle.focus();
    }
  };

  toggle.addEventListener('click', () => {
    if (!mobile.matches) {
      return;
    }

    const open = !navigation.classList.contains('is-open');
    setMenu(open);

    if (open) {
      menu.querySelector('.main-menu a')?.focus();
    }
  });

  backdrop.addEventListener('click', () => {
    setMenu(false, true);
  });

  menu.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      setMenu(false);
    });
  });

  document.addEventListener('keydown', event => {
    if (!navigation.classList.contains('is-open')) {
      return;
    }

    if (event.key === 'Escape') {
      event.preventDefault();
      setMenu(false, true);
      return;
    }

    if (event.key === 'Tab') {
      const focusable = [
        ...header.querySelectorAll('a[href], button, [tabindex]')
      ].filter(element =>
        element.tabIndex >= 0 &&
        !element.closest('[inert]') &&
        element.getClientRects().length > 0 &&
        getComputedStyle(element).visibility !== 'hidden'
      );

      const first = focusable[0];
      const last = focusable[focusable.length - 1];

      if (event.shiftKey && document.activeElement === first) {
        event.preventDefault();
        last?.focus();
      } else if (!event.shiftKey && document.activeElement === last) {
        event.preventDefault();
        first?.focus();
      }
    }
  });

  mobile.addEventListener('change', () => {
    setMenu(false);
  });

  setMenu(false);
});