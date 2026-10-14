# Gending Golden Park

Website landing page dan panel admin untuk perumahan **Gending Golden Park**, dibangun dengan [Laravel 13](https://laravel.com) dan [Filament 5](https://filamentphp.com) sebagai admin panel.

## Daftar Isi

- [Teknologi](#teknologi)
- [Prasyarat](#prasyarat)
- [Instalasi (clone pertama kali)](#instalasi-clone-pertama-kali)
- [Konfigurasi Environment (`.env`)](#konfigurasi-environment-env)
- [Menjalankan Server Development](#menjalankan-server-development)
- [Build Aset Frontend (Production)](#build-aset-frontend-production)
- [Panel Admin](#panel-admin)
- [Testing](#testing)
- [Struktur Proyek](#struktur-proyek)
- [Deployment ke Production](#deployment-ke-production)
- [Troubleshooting](#troubleshooting)

## Teknologi

- **Backend:** PHP 8.3+, Laravel 13
- **Admin Panel:** Filament 5
- **Frontend:** Blade, Alpine.js, Tailwind CSS 4, Vite
- **Database:** SQLite (default, siap pakai tanpa setup server DB)
- **Testing:** PHPUnit

## Prasyarat

Pastikan sudah terpasang di device:

- **PHP** `^8.3` beserta ekstensi umum Laravel: `pdo_sqlite`, `sqlite3`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `curl`
- **Composer** `2.x`
- **Node.js** `18+` dan **npm** (untuk build aset Vite/Tailwind)
- **Git**

Cek versi yang terpasang:

```sh
php -v
composer -V
node -v
npm -v
```

Jika PHP/Composer belum ada, instal lewat [php.new](https://php.new):

```sh
# macOS / Linux
/bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.5)"
```

```powershell
# Windows PowerShell
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.5'))
```

## Instalasi (clone pertama kali)

```sh
git clone git@github.com:hambarthegoat/gendinggoldenpark.git
cd gendinggoldenpark

# 1. Install dependency PHP
composer install

# 2. Salin file environment lalu generate APP_KEY
cp .env.example .env
php artisan key:generate

# 3. Buat file database SQLite (jika belum ada)
touch database/database.sqlite

# 4. Jalankan migrasi + seeder (isi data awal: admin, konten landing, dsb.)
php artisan migrate --seed

# 5. Install dependency JS & build aset frontend
npm install
npm run build
```

Atau jalankan semuanya sekaligus lewat script Composer yang sudah disediakan:

```sh
composer run setup
```

> Script `setup` di `composer.json` melakukan: `composer install` → salin `.env` → `key:generate` → `migrate --force` → `npm install` → `npm run build`. Setelah itu jalankan sendiri `php artisan db:seed` jika butuh data awal (admin & konten landing), karena script ini tidak menyertakan seeding.

## Konfigurasi Environment (`.env`)

Setelah `.env` dibuat dari `.env.example`, sesuaikan nilai-nilai berikut sebelum dipakai:

| Variable | Keterangan | Default |
|---|---|---|
| `APP_URL` | URL aplikasi | `http://localhost:8000` |
| `DB_CONNECTION` | Driver database | `sqlite` (tidak perlu host/user/password) |
| `ADMIN_EMAIL` | Email login panel admin (`/admin`) | `user` — **wajib diganti** |
| `ADMIN_PASSWORD` | Password login panel admin | `password` — **wajib diganti** |
| `COMPANY_WHATSAPP` | Nomor WhatsApp yang tampil di landing page | contoh placeholder |
| `COMPANY_PHONE_DISPLAY` | Nomor telepon yang ditampilkan | contoh placeholder |
| `COMPANY_EMAIL` | Email kontak perusahaan | contoh placeholder |
| `COMPANY_ADDRESS` | Alamat perumahan | contoh placeholder |
| `COMPANY_MAPS_EMBED` | URL embed Google Maps | contoh placeholder |
| `COMPANY_INSTAGRAM` / `COMPANY_FACEBOOK` / `COMPANY_TIKTOK` | Link media sosial | contoh placeholder |
| `MAIL_MAILER` | Driver email (default `log`, ganti untuk kirim email asli) | `log` |

`ADMIN_EMAIL` dan `ADMIN_PASSWORD` dipakai oleh `database/seeders/AdminUserSeeder.php` saat `php artisan db:seed` dijalankan — ganti nilainya di `.env` **sebelum** seeding, atau jalankan ulang seeder setelah mengganti `.env`.

## Menjalankan Server Development

Jalankan server saja:

```sh
php artisan serve
```

Aplikasi bisa diakses di `http://127.0.0.1:8000`.

Atau jalankan server + queue listener + log viewer (Pail) + Vite dev server sekaligus (butuh `concurrently`, sudah ada di `devDependencies`):

```sh
composer run dev
```

Untuk hot-reload aset frontend saja (CSS/JS) saat development, jalankan di terminal terpisah:

```sh
npm run dev
```

## Akses dari Luar Jaringan (Cloudflare Tunnel)

Untuk berbagi situs sementara lewat internet, install [`cloudflared`](https://developers.cloudflare.com/cloudflare-one/connections/connect-networks/downloads/) (`winget install Cloudflare.cloudflared`), lalu jalankan:

```powershell
powershell -ExecutionPolicy Bypass -File scripts\tunnel.ps1
```

Skrip menjalankan server + tunnel dan mencetak URL `https://*.trycloudflare.com`. Keduanya dihidupkan ulang otomatis kalau mati. URL berubah setiap tunnel dibuat ulang. Panel `/admin` ikut terbuka ke publik, jadi ganti password admin default lebih dulu.

## Build Aset Frontend (Production)

```sh
npm run build
```

Hasil build masuk ke `public/build/` dan tidak di-commit ke git (lihat `.gitignore`) — jalankan ulang setelah clone atau setiap kali ada perubahan di `resources/css` atau `resources/js`.

## Panel Admin

- URL: `http://<APP_URL>/admin`
- Login menggunakan `ADMIN_EMAIL` dan `ADMIN_PASSWORD` dari `.env` (dibuat lewat `AdminUserSeeder` saat seeding).
- Resource yang tersedia: Leads, Stats, Advantages, House Types, Facilities, Gallery Items, Access Points, Testimonials, FAQs, Site Settings.

**Wajib diganti sebelum production:** nilai default `ADMIN_EMAIL=user` / `ADMIN_PASSWORD=password` di `.env.example` hanya untuk development lokal.

## Testing

```sh
php artisan test
# atau
composer run test
```

## Struktur Proyek

```
app/
  Filament/           # Resource, Page, Widget untuk panel admin (/admin)
  Http/Controllers/   # LandingController, LeadController
  Models/              # Eloquent model (Lead, Stat, Advantage, HouseType, dll.)
database/
  migrations/          # Skema tabel
  seeders/             # AdminUserSeeder, LandingContentSeeder, DatabaseSeeder
  database.sqlite       # Database lokal (tidak di-commit)
resources/
  views/                # Blade views landing page (partials, components)
  css/ js/               # Sumber aset Tailwind & Alpine.js
routes/
  web.php               # Route landing page (`/`) & form kontak (`/kontak`)
public/                 # Document root, hasil build Vite masuk ke public/build/
```

## Deployment ke Production

1. Set `APP_ENV=production` dan `APP_DEBUG=false`.
2. Pastikan `APP_KEY`, `ADMIN_EMAIL`, `ADMIN_PASSWORD` diganti dengan nilai yang aman (bukan default).
3. Pertimbangkan pindah dari SQLite ke MySQL/PostgreSQL untuk traffic tinggi (ubah `DB_CONNECTION` dan kredensial terkait di `.env`).
4. Jalankan:
   ```sh
   composer install --no-dev --optimize-autoloader
   npm ci && npm run build
   php artisan migrate --force
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```
5. Arahkan web server (Nginx/Apache) ke folder `public/` sebagai document root.
6. Atur `MAIL_MAILER` dan kredensial SMTP asli jika form kontak perlu mengirim email.

## Troubleshooting

- **`could not find driver (SQLite::__construct)`** — ekstensi PHP `pdo_sqlite` belum aktif, install/enable ekstensi tersebut.
- **Halaman blank / error 500 saat pertama kali diakses** — pastikan `APP_KEY` sudah di-generate (`php artisan key:generate`) dan `database/database.sqlite` sudah dibuat + dimigrasi.
- **Aset CSS/JS tidak termuat** — jalankan `npm run build` (production) atau `npm run dev` (development); folder `public/build/` tidak ikut di-commit.
- **Tidak bisa login ke `/admin`** — pastikan sudah menjalankan `php artisan db:seed` (atau `migrate --seed`) setelah mengatur `ADMIN_EMAIL`/`ADMIN_PASSWORD` di `.env`.

## Lisensi

Proyek ini dibangun di atas framework [Laravel](https://laravel.com), yang berlisensi [MIT](https://opensource.org/licenses/MIT).
