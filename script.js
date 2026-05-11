
    // ===========================================
    // CUSTOMIZE YOUR PRODUCTS HERE
    // ===========================================
    
    // Replace with your WhatsApp number (include country code, no + or spaces)
    const WHATSAPP_NUMBER = '6481376753900';

    // Your products - edit this array to add your own items
    const products = [
      {
        id: 1,
        name: 'Shadow Realm Hoodie',
        price: 89.99,
        originalPrice: 110,
        category: 'hoodies',
        image: 'https://images.unsplash.com/photo-1556821840-3a63f95609a7?w=600&h=600&fit=crop',
        isNew: true,
        isSoldOut: false
      },
      {
        id: 2,
        name: 'Nightmare Tee',
        price: 45,
        originalPrice: null,
        category: 't-shirts',
        image: 'https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?w=600&h=600&fit=crop',
        isNew: true,
        isSoldOut: false
      },
      {
        id: 3,
        name: 'Afterlife Joggers',
        price: 75,
        originalPrice: null,
        category: 'bottoms',
        image: 'https://images.unsplash.com/photo-1624378439575-d8705ad7ae80?w=600&h=600&fit=crop',
        isNew: false,
        isSoldOut: false
      },
      {
        id: 4,
        name: 'Hail to the King Cap',
        price: 35,
        originalPrice: null,
        category: 'accessories',
        image: 'https://images.unsplash.com/photo-1588850561407-ed78c282e89b?w=600&h=600&fit=crop',
        isNew: false,
        isSoldOut: false
      },
      {
        id: 5,
        name: 'Buried Alive Jacket',
        price: 150,
        originalPrice: 185,
        category: 'outerwear',
        image: 'https://images.unsplash.com/photo-1551028719-00167b16eac5?w=600&h=600&fit=crop',
        isNew: false,
        isSoldOut: false
      },
      {
        id: 6,
        name: 'Beast Mode Hoodie',
        price: 95,
        originalPrice: null,
        category: 'hoodies',
        image: 'https://images.unsplash.com/photo-1578768079052-aa76e52ff62e?w=600&h=600&fit=crop',
        isNew: false,
        isSoldOut: true
      },
      {
        id: 7,
        name: 'Deathbat Logo Tee',
        price: 40,
        originalPrice: null,
        category: 't-shirts',
        image: 'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?w=600&h=600&fit=crop',
        isNew: true,
        isSoldOut: false
      },
      {
        id: 8,
        name: 'Seize the Day Shorts',
        price: 55,
        originalPrice: 70,
        category: 'bottoms',
        image: 'https://images.unsplash.com/photo-1591195853828-11db59a44f6b?w=600&h=600&fit=crop',
        isNew: false,
        isSoldOut: false
      }
    ];

    // ===========================================
    // DO NOT EDIT BELOW THIS LINE
    // ===========================================

    let currentFilter = 'all';

    function toggleMobileMenu() {
      const menu = document.getElementById('mobileMenu');
      menu.classList.toggle('active');
    }

    function createWhatsAppLink(product) {
      const message = encodeURIComponent(
        `Hi! I'm interested in buying:\n\n` +
        `*${product.name}*\n` +
        `Price: $${product.price.toFixed(2)}\n\n` +
        `Please let me know if it's available!`
      );
      return `https://wa.me/${WHATSAPP_NUMBER}?text=${message}`;
    }

    function createProductCard(product) {
      const whatsappLink = createWhatsAppLink(product);
      
      let badgeHTML = '';
      if (product.isSoldOut) {
        badgeHTML = '<span class="product-badge badge-sold-out">Sold Out</span>';
      } else if (product.isNew) {
        badgeHTML = '<span class="product-badge badge-new">New</span>';
      }

      const buyBtnClass = product.isSoldOut ? 'buy-btn disabled' : 'buy-btn';
      const buyBtnText = product.isSoldOut ? 'Sold Out' : 'Buy via WhatsApp';
      const buyBtnLink = product.isSoldOut ? '#' : whatsappLink;

      const priceHTML = product.originalPrice 
        ? `<span class="current-price">$${product.price.toFixed(2)}</span>
           <span class="original-price">$${product.originalPrice.toFixed(2)}</span>`
        : `<span class="current-price">$${product.price.toFixed(2)}</span>`;

      return `
        <article class="product-card" data-category="${product.category}">
          <div class="product-image-wrapper">
            <img src="${product.image}" alt="${product.name}" class="product-image" loading="lazy">
            ${badgeHTML}
            <div class="product-overlay">
              <a href="${buyBtnLink}" target="_blank" class="${buyBtnClass}">
                ${!product.isSoldOut ? `
                <svg class="icon-sm" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                ` : ''}
                ${buyBtnText}
              </a>
            </div>
          </div>
          <div class="product-info">
            <p class="product-category">${product.category}</p>
            <h3 class="product-name">${product.name}</h3>
            <div class="product-price">
              ${priceHTML}
            </div>
            <div class="mobile-buy-btn">
              <a href="${buyBtnLink}" target="_blank" class="${product.isSoldOut ? 'disabled' : ''}">
                ${!product.isSoldOut ? `
                <svg class="icon-sm" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                ` : ''}
                ${buyBtnText}
              </a>
            </div>
          </div>
        </article>
      `;
    }

    function filterProducts(category) {
      currentFilter = category;
      
      // Update active button
      document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('active');
        if (btn.textContent.toLowerCase().replace('-', '') === category || 
            (category === 'all' && btn.textContent.toLowerCase() === 'all') ||
            (category === 't-shirts' && btn.textContent.toLowerCase() === 't-shirts')) {
          btn.classList.add('active');
        }
      });

      renderProducts();
    }

    function renderProducts() {
      const grid = document.getElementById('productGrid');
      const filteredProducts = currentFilter === 'all' 
        ? products 
        : products.filter(p => p.category === currentFilter);

      if (filteredProducts.length === 0) {
        grid.innerHTML = `
          <div class="no-results">
            <h3>No products found</h3>
            <p>Try selecting a different category</p>
          </div>
        `;
        return;
      }

      grid.innerHTML = filteredProducts.map(createProductCard).join('');
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', renderProducts);
