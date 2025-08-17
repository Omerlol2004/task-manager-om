# Clear caches, migrate fresh, seed, serve
composer dump-autoload
php artisan optimize:clear
php artisan migrate:fresh --seed
# Start Laravel server
php artisan serve