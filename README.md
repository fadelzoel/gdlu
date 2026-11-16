# kel13-web: clothing shop (storefront + admin)

Copy everything in this folder into your Laravel project root (same paths).
`routes/web.php` REPLACES your current one (merge your own routes if you have any).

## Setup
1. Delete your old `database/migrations/*_create_products_table.php`
   (keep only `2026_11_15_000001_create_products_table.php` from this zip).
2. In `app/Providers/AppServiceProvider.php` boot():
   `\Illuminate\Pagination\Paginator::useBootstrapFive();`
3. Put the library files used by the admin theme in `public/admin-assets/libs/`
   (bootstrap, simplebar, @tabler/icons-webfont).
4. Run:
   php artisan migrate:fresh        (wipes ALL local tables)
   php artisan db:seed --class=ShopSeeder
   php artisan storage:link
   php artisan route:clear
   php artisan view:clear

## URLs
- Store home:     /
- Catalog:        /shop
- Admin:          /admin  (products, sales history, admin users)
- Seeded admin:   admin@example.com / password
