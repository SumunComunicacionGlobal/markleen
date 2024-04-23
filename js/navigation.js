jQuery(document).ready(function() {
  jQuery(".wp-block-gallery figure a").each(function() {
      jQuery(this).attr("data-lightbox", "lightbox")
  })
}),

$ = jQuery;
$(document).ready(function() {
  var openMenuButton = $('.menu-toggle');
  var closeMenuButton = $('.close-menu-toggle');
  var mainNavigation = $('.main-navigation');
  var menuItemsWithSubmenus = mainNavigation.find('li:has(ul.sub-menu)');
  var overlay = $('<div class="nav-overlay"></div>');

  openMenuButton.click(function() {
    mainNavigation.toggleClass('show-main-nav');
    var isMenuOpen = mainNavigation.hasClass('show-main-nav');
    openMenuButton.attr('aria-expanded', isMenuOpen);

    if (isMenuOpen) {
      $('body').append(overlay);
      overlay.toggleClass('show-overlay');
    } else {
      overlay.remove();
    }
  });

  overlay.click(function() {
    mainNavigation.removeClass('show-main-nav');
    overlay.removeClass('show-overlay');
    openMenuButton.attr('aria-expanded', false);
  });

  closeMenuButton.click(function() {
    mainNavigation.removeClass('show-main-nav');
    overlay.removeClass('show-overlay');
    openMenuButton.attr('aria-expanded', false);
  });

  menuItemsWithSubmenus.each(function() {
    var menuItem = $(this);
    var subMenu = menuItem.find('ul.sub-menu:first');
    var menuLink = menuItem.find('a:first');

    subMenu.prepend('<li class="sub-menu-title">' + menuLink.text() + '</li>');
    subMenu.prepend('<button class="close-sub-menu" aria-label="Close"></button>');
    
    // Agrega el botón de abrir submenú dentro del <li>
    menuItem.append('<span class="sub-menu-toggle" aria-expanded="false" aria-label="Toggle Submenu"></span>');
    var subMenuToggle = menuItem.find('.sub-menu-toggle');

    subMenuToggle.click(function() {
      toggleSubMenu(subMenu, subMenuToggle);
    });

    menuLink.click(function(e) {
      if ($(this).attr('href') === '#' || $(this).attr('href') === '') {
        e.preventDefault();
        toggleSubMenu(subMenu, subMenuToggle);
      }
    });

    menuItem.find('.close-sub-menu').click(function() {
      subMenu.removeClass('open-sub-menu');
      subMenuToggle.attr('aria-expanded', false);
    });
  });
});

function toggleSubMenu(subMenu, subMenuToggle) {
  // Comprueba si el ancho de la ventana es menor o igual a 768px (típicamente considerado el límite para dispositivos móviles)
  if (window.innerWidth <= 768) {
    subMenu.toggleClass('open-sub-menu');
    var isSubMenuOpen = subMenu.hasClass('open-sub-menu');
    subMenu.find('.close-sub-menu').toggle(isSubMenuOpen);
    subMenu.find('.sub-menu-title').toggle(isSubMenuOpen);
    subMenuToggle.attr('aria-expanded', isSubMenuOpen);
  }
}

document.addEventListener("DOMContentLoaded", function() {
  [].forEach.call(document.querySelectorAll(".link-ofuscado"), function(e) {
      var t = document.createElement("a");
      t.innerHTML = e.innerHTML,
      e.parentNode.insertBefore(t, e),
      e.parentNode.removeChild(e),
      t.setAttribute("href", e.dataset.url)
  })
}),
/(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function() {
  var e, t = location.hash.substring(1);
  /^[A-z0-9_-]+$/.test(t) && (e = document.getElementById(t)) && (/^(?:a|select|input|button|textarea)$/i.test(e.tagName) || (e.tabIndex = -1), e.focus())
},
!1);


document.addEventListener('DOMContentLoaded', function() {
  const masthead = document.getElementById('page');
  let hasScrolled = false;

  window.addEventListener('scroll', function() {
    if (window.scrollY > 80 && !hasScrolled) {
      masthead.classList.add('scrolled'); // Agrega una clase cuando se hace scroll
      hasScrolled = true;
    } else if (window.scrollY === 0 && hasScrolled) {
      masthead.classList.remove('scrolled'); // Quita la clase cuando se está en la parte superior
      hasScrolled = false;
    }
  });
});


document.addEventListener('DOMContentLoaded', function () {
  const container = document.getElementById('hover-boxes');
  const columns = container.querySelectorAll('.wp-block-column');

  columns.forEach((column) => {
    column.addEventListener('mouseover', () => {
      columns.forEach((col) => {
        col.classList.remove('active-box');
      });
      column.classList.add('active-box');
    });
  });
});
