===========NOTES SEBELUM MENJALANKAN LARAVEL==============
    
    
    
    INI ISI FILE .env
=============================================================================================================================================================================================================================================
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:kYU9ioAZNT6p0RNUK8mX7XwD1qECkDAHZ/rRQ8URyMY=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
APP_MAINTENANCE_STORE=database

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pelajarin_db
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"
=============================================================================================================================================================================================================================================
    CARA PULL CODE AGAR BISA BERJALAN
composer install
tambahkan file env code nya ada diatas
memasukan database di phpmyadmin
=============================================================================================================================================================================================================================================
    untuk memunculkan gambar di web menggunakan
php artisan storage:link
=============================================================================================================================================================================================================================================
    untuk menjalankan server
php artisan serve
=============================================================================================================================================================================================================================================
    untuk menjalankan tailwind agar UI nya muncul
npm run dev
=============================================================================================================================================================================================================================================
    jika npm run dev gabisa gunakan
npm install vite
npm install
=============================================================================================================================================================================================================================================
