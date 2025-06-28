# 💈 Setyo Barber Booking Website

Website landing page resmi untuk **Setyo Barbershop Studio**, dilengkapi dengan fitur **booking online**, **notifikasi WhatsApp**, dan dibangun dengan teknologi modern seperti Laravel dan Tailwind CSS.

---

## 🚀 Fitur Unggulan

-   🎨 **Landing Page Elegan**  
    Tampilan modern, clean, dan responsif untuk semua perangkat.

-   ✂️ **Booking Online Capster**  
    Pelanggan dapat memilih layanan, tanggal, jam, dan capster langsung dari website.

-   📲 **Notifikasi WhatsApp Otomatis**  
    Sistem akan mengirimkan notifikasi secara otomatis ke admin dan pelanggan menggunakan **API Fonnte**.

-   🔒 **Manajemen Admin & Customer**  
    Akses dashboard terpisah untuk admin dan customer, menggunakan **Laravel Breeze**.

---

## 🛠️ Teknologi yang Digunakan

-   [Laravel 11](https://laravel.com/)
-   [Tailwind CSS](https://tailwindcss.com/)
-   [Laravel Breeze](https://laravel.com/docs/starter-kits#breeze)
-   [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission)
-   [Fonnte WhatsApp API](https://fonnte.com/)

---

## 📦 Instalasi

```bash
git clone https://github.com/daffahammam/setyo-barber-booking-website.git
cd setyo-barber-booking-website
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate

1. Edit file .env
- DB_DATABASE=your_db
- DB_USERNAME=your_user
- DB_PASSWORD=your_password

// Fonnte WhatsApp API
- FONNTE_TOKEN=your_fonnte_token
- ADMIN_WA_NUMBER=628xxxxxxx

2. Jalankan migrasi dan seeder
- php artisan migrate --seed

3. Buat symlink untuk penyimpanan
- php artisan storage:link

4. Jalankan node packages
- npm run dev

5. Jalankan Server lokal
- php artisan serve
```
