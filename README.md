# kel13-web: GDLU clothing shop (storefront + admin)

Copy everything in this folder into your Laravel project root (same paths).
`routes/web.php` REPLACES your current one (merge your own routes if you have any).

## Remove old files from your project
- resources/views/products/index.blade.php   (the old Bootstrap catalog)
- resources/views/products/show.blade.php    (if you have it)
- resources/views/layouts/app.blade.php is NOT used any more (safe to delete)
- the old database/migrations/2026_11_10_*_create_products_table.php

## Setup
1. In `app/Providers/AppServiceProvider.php` boot():
   `\Illuminate\Pagination\Paginator::useBootstrapFive();`   (admin tables)
2. Admin theme libs go in `public/admin-assets/libs/` (bootstrap, simplebar, @tabler/icons-webfont).
3. Run:
   php artisan migrate:fresh        (wipes ALL local tables)
   php artisan db:seed --class=ShopSeeder
   php artisan storage:link
   php artisan config:clear
   php artisan route:clear
   php artisan view:clear

## Store files
- public/css/style.css       the original design (unchanged)
- public/css/shop-extra.css  tiny additions
- public/js/shop.js          mobile menu + category filter
- config/shop.php            WhatsApp number, email, social links (or set SHOP_* in .env)

## URLs
- Store:   /
- Admin:   /admin  (products, sales history, admin users)
- Seeded admin: admin@example.com / password
