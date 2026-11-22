// Mobile menu
function toggleMobileMenu() {
  document.getElementById('mobileMenu').classList.toggle('active');
}

document.addEventListener('DOMContentLoaded', function () {
  var buttons = document.querySelectorAll('.filter-btn');
  var cards = document.querySelectorAll('#productGrid .product-card');
  var noResults = document.getElementById('noResults');
  var mobileMenu = document.getElementById('mobileMenu');

  // Products are rendered by Laravel; JS only shows / hides them.
  // filter = "all" | a category slug | "new"
  function applyFilter(filter) {
    var visible = 0;

    buttons.forEach(function (b) {
      b.classList.toggle('active', b.dataset.filter === filter);
    });

    cards.forEach(function (card) {
      var show = filter === 'all'
        || (filter === 'new' ? card.dataset.new === '1' : card.dataset.category === filter);
      card.hidden = !show;
      if (show) visible++;
    });

    if (noResults) noResults.hidden = visible !== 0;
  }

  // every element with data-filter (buttons, nav links, footer links)
  document.querySelectorAll('[data-filter]').forEach(function (el) {
    el.addEventListener('click', function () {
      applyFilter(el.dataset.filter);
      if (mobileMenu) mobileMenu.classList.remove('active');
    });
  });

  // close the mobile menu after tapping any other link
  document.querySelectorAll('#mobileMenu a').forEach(function (a) {
    a.addEventListener('click', function () { mobileMenu.classList.remove('active'); });
  });
});
