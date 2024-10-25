<p  align="center">
<a  href="https://laravel.com"  target="_blank"><img  src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEifT3pnrjuihXifAI1hT4Ewp-RJMDFaqHh9tV3RQU-9F58gXebJ52AgW9kHmQwl6wjunJEYHz6gJvvLtzWo-5KlCqhCJQ4GFo0NJLQZuuVFpIveGsk4-_5Cwl55xtFCxD1OV5AXTlcw4go/s320/Logo+POLNEP.png"  width="220"  alt="Laravel Logo"></a> 
<a  href="https://laravel.com"  target="_blank"><img  src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg"  width="360"  alt="Laravel Logo"></a>
</p>  

## PBL Template D3 Teknik Informatika

Repository ini digunakan sebagai template aplikasi dasar yang akan digunakan untuk pelaksanaan Project-Based Learning pada prodi di Jurusan Teknik Elektro, Politeknik Negeri Pontianak.

PBL template ini membutuhkan <i>minimum requirements</i> untuk aplikasi menggunakan:
- PHP 8.2
- Laravel 11
- MySQL 8.0/MariaDB 10.4

Cara menggunakan template ini adalah sebagai berikut:
- Kloning template ini menggunakan perintah:
``
git clone https://github.com/Hexagonz/RUANG_KELAS_BACKEND.git {project-directory}
``
- Masuk ke``{project-directory}``.
- Install dependency menggunakan composer dengan perintah
``composer install``
- Salin file ``.env.example`` menjadi ``.env``
- Buat database sesuai yang anda butuhkan, kemudian sesuaikan entry berikut pada file ``.env``:
- Jalankan diterminal
```
cp .env.example .env
```
- Setup Koneksi Database MYSQL
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE={your database}
DB_USERNAME={your database username}
DB_PASSWORD={your database password}
```
- Jalankan perintah berikut:
```
php artisan key:generate
php artisan migrate
php artisan db:seed
```
- Jalankan aplikasi menggunakan perintah:
```
php artisan serve
```
- Anda dapat memodifikasi port yang digunakan:
```
php artisan serve --port={custom port}
```
- Link Dokumentasi API:
```
https://grey-eclipse-134128.postman.co/workspace/RUANG_KELAS~21ca7606-5fa3-4067-9650-b47d6dbdfba8/overview
```
<hr>

Terima Kasih kepada:
- Dosen Kami Fery Faisal
<hr>


