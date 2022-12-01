# Manajemen-Indikator

## Requirement
- PHP Ver. 8.0.+
- Laravel Ver. 8.*
- NPM Ver. 8.*
- Composer Ver. 2.*
- Database Support =
- - MariaDB 10.2+ 
- - MySQL 5.7+ 
- - PostgreSQL 9.6+
- - SQLite 3.8.8+
- - SQL Server 2017+ 

## Installation
- Buat database baru (Misal 'PSM')
- Rename file .env.example menjadi .env
- Isi nama database yang sudah dibuat sebelumnya kedalam file env pada DB_DATABASE=<nama_database> (Misal : DB_DATABASE=PSM)
- Buat CMD / Terminal pada projek anda. Dan jalankan langkah berikut
- composer update 
- php artisan migrate
- php artisan db:seed --class=OpdSeeder
- php artisan db:seed --class=UserSeeder
- php artisan key:generate
- php artisan config:cache
- Copy 2 file didalam folder app/Tambahan dan REPLACE ke dalam direktori vendor/laravel/ui/auth-backend
