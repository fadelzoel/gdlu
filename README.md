## Project Structure

```text
laravel-project/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── HomeController.php          # (Backend)
│   │       └── ProductController.php       # (Backend)
│   └── Models/
│       └── Product.php                     # (Backend)
│
├── database/
│   ├── migrations/
│   │   └── xxxx_create_products_table.php  # (Backend)
│   └── seeders/
│       └── ProductSeeder.php               # (Backend) - isi data dari array JS kamu
│
├── public/                                 # ⚠️ PENTING
│   ├── css/
│   │   └── style.css                       # ✅ pindahkan style.css ke sini
│   ├── js/
│   │   └── script.js                       # ✅ pindahkan script.js ke sini
│   └── image/
│       └── gallery/
│           ├── notFinal1.jpeg
│           ├── notFinal2.jpeg
│           ├── notFinal3.jpeg
│           ├── notFinal4.jpeg
│           └── final1.jpeg
│
├── resources/
│   └── views/                              # ✅ BAGIAN KAMU
│       ├── layouts/
│       │   └── app.blade.php               # Layout utama (header + footer)
│       ├── partials/
│       │   ├── header.blade.php            # Header + nav + mobile menu
│       │   ├── hero.blade.php              # Section hero
│       │   ├── footer.blade.php            # Footer
│       │   └── product-card.blade.php      # 1 card produk (dipanggil loop)
│       ├── home.blade.php                  # Halaman utama (gabungan)
│       └── products/
│           └── index.blade.php             # (opsional) halaman shop terpisah
│
└── routes/
    └── web.php                             # (Backend) route ke controller
```
