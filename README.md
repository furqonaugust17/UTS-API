# 📝 UTS Konstruksi dan Evolusi Perangkat Lunak

- **Nama** : Furqon August Seventeenth
- **NIM**  : 2311082018
- **Kelas**: TRPL 2D

---

# 🎬 MovieDB Web App

Aplikasi web ini dibangun menggunakan Laravel serta menampilkan data film dari TMDB API.

---

## 🚀 Features

- Menampilkan data film dari TMDB API
- Menampilkan film yang sedang tayang, dan yang akan datang
- Halaman detail film 
- Tampilan responsif menggunakan Bootstrap 5

---

## 🛠️ Tech Stack

- **Backend:** Laravel 11
- **Frontend:** Bootstrap 5, Blade Templating
- **API:** TMDB (The Movie Database)
- **Other Dependencies:**
  - `guzzlehttp/guzzle` – HTTP client for TMDB API

---

## ⚙️ Langkah-Langkah Instalasi

Ikuti panduan berikut untuk menjalankan project Laravel MovieDB di lokal:

### 1. **Clone Repository**

```bash
git clone https://github.com/furqonaugust17/UTS-API.git
cd UTS-API
```

### 2. **Install Dependency Laravel**

```bash
composer install
```

### 3. **Install Dependency Frontend**

```bash
npm install
npm run dev
```

> Jika ingin production:\
> Gunakan `npm run build` untuk compile asset production.

### 4. **Copy dan Atur File .env**

```bash
cp .env.example .env
```

Lalu buka file `.env` dan ubah bagian berikut sesuai kebutuhan:

```env
TMDB_KEY=masukkan_api_key_tmdb_anda_disini
```

### 5. **Generate App Key**

```bash
php artisan key:generate
```

### 6. **(Opsional) Jalankan Migrasi & Seeder**

> Jika aplikasi ini menggunakan database, kamu bisa jalankan:

```bash
php artisan migrate --seed
```

### 7. **Jalankan Server**

```bash
php artisan serve
```

Buka di browser:

```
http://localhost:8000
```

---

## 📁 Project Structure

```
├── app
│   └── Http
│       ├── Controllers
│       │   └── MovieController.php
|       └── Services
│           └── MovieService.php
├── resources
│   └── views
│       ├── components
│       |   ├── layout.blade.php
│       |   ├── nav-link.blade.php
│       |   └── navbar.blade.php
│       └── movies
│           ├── main.blade.php
│           └── detail.blade.php
├── routes
│   └── web.php
```

---

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).

---

## 🙌 Acknowledgements

- [TMDB API](https://www.themoviedb.org/documentation/api)
- [Laravel](https://laravel.com)
- [Bootstrap](https://getbootstrap.com)

---

## 📬 Contact

Feel free to reach out via [[furqonaugust@furqonaugust.web.id](mailto\:furqonaugust@furqonaugust.web.id)] or [@yourgithub](https://github.com/furqonaugust17) if you have any questions or suggestions!

