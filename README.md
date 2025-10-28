# 🚀 Alumni Information System API

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-12.34.0-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![REST API](https://img.shields.io/badge/REST-API-009688?style=for-the-badge&logo=fastapi&logoColor=white)

**RESTful API untuk manajemen data alumni yang komprehensif**

Meliputi informasi profil, riwayat pekerjaan, pendidikan, prestasi, event, dan lowongan kerja.

[Dokumentasi](#-dokumentasi-api) • [Instalasi](#-instalasi) • [Fitur](#-fitur-utama) • [Kontribusi](#-kontribusi)

</div>

---

## 📋 Daftar Isi

- [Tentang Proyek](#-tentang-proyek)
- [Fitur Utama](#-fitur-utama)
- [Tech Stack](#-tech-stack)
- [Instalasi](#-instalasi)
- [Konfigurasi](#-konfigurasi)
- [Dokumentasi API](#-dokumentasi-api)
- [Authentication](#-authentication)
- [Endpoints](#-endpoints)
- [Response Format](#-response-format)
- [Kontribusi](#-kontribusi)
- [Lisensi](#-lisensi)
- [Author](#-author)

---

## 📖 Tentang Proyek

Alumni Information System API adalah sistem backend berbasis RESTful API yang dirancang untuk mengelola data alumni secara komprehensif. Sistem ini memungkinkan pengelolaan profil alumni, tracking karier, riwayat pendidikan, dokumentasi prestasi, manajemen event, hingga informasi lowongan pekerjaan.

Proyek ini dikembangkan untuk **Sistem Informasi Alumni** oleh **Ahmad Al Qodri Azizi Dalimunthe - Back End Developer**.

---

## ✨ Fitur Utama

- 🧑‍🎓 **Manajemen Profil Alumni** - CRUD data alumni dengan sistem filter yang fleksibel
- 💼 **Riwayat Karier** - Pencatatan dan tracking pengalaman kerja alumni
- 📚 **Riwayat Akademik** - Detail pendidikan dan latar belakang akademis alumni
- 🏆 **Prestasi Alumni** - Dokumentasi pencapaian dan prestasi yang diraih
- 📅 **Manajemen Event** - Informasi kegiatan alumni dan sistem pendaftaran
- 📢 **Lowongan Kerja** - Platform untuk berbagi dan mengelola informasi lowongan pekerjaan
- 🔐 **Authentication & Authorization** - Keamanan dengan Laravel Sanctum Token
- 🔍 **Advanced Filtering** - Filter berdasarkan jurusan, tahun lulus, dan status pekerjaan

---

## 🛠️ Tech Stack

| Teknologi | Versi | Deskripsi |
|-----------|-------|-----------|
| **Laravel** | 12.34.0 | Framework PHP modern untuk backend development |
| **MySQL** | 8 | Database relasional untuk penyimpanan data |
| **Laravel Sanctum** | - | Autentikasi API dengan token-based system |
| **REST API** | - | Arsitektur API yang terstruktur dan scalable |

---

## 🚀 Instalasi

### Prerequisites

Pastikan sistem Anda sudah memiliki:
- PHP >= 8.2
- Composer
- MySQL/MariaDB
- Node.js & NPM (opsional)

### Langkah Instalasi

1. **Clone repository**
   ```bash
   git clone https://github.com/username/alumni-information-system-api.git
   cd alumni-information-system-api
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Copy environment file**
   ```bash
   cp .env.example .env
   ```

4. **Generate application key**
   ```bash
   php artisan key:generate
   ```

5. **Konfigurasi database** di file `.env`
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=alumni_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Jalankan migrasi database**
   ```bash
   php artisan migrate
   ```

7. **Seed database (opsional)**
   ```bash
   php artisan db:seed
   ```

8. **Jalankan server**
   ```bash
   php artisan serve
   ```

API akan berjalan di: `http://localhost:8000`

---

## ⚙️ Konfigurasi

### Base URL

Semua request harus menggunakan base URL:
```
http://localhost:8000/api
```

### Environment Variables

Konfigurasi penting di file `.env`:
```env
APP_NAME="Alumni Information System"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=alumni_db
DB_USERNAME=root
DB_PASSWORD=

# Sanctum
SANCTUM_STATEFUL_DOMAINS=localhost:3000
```

---

## 📚 Dokumentasi API

### 🔐 Authentication

API menggunakan **Laravel Sanctum Token** untuk endpoint yang memerlukan otorisasi.

**Header yang diperlukan:**
```http
Authorization: Bearer {YOUR_TOKEN}
Accept: application/json
```

---

## 🌐 Endpoints

### 1️⃣ Alumni Profiles 🧑‍🎓

| Method | Endpoint | Deskripsi | Auth |
|--------|----------|-----------|------|
| `GET` | `/alumni` | Ambil semua data alumni | 🔒 Required |
| `GET` | `/alumni/{id}` | Detail alumni berdasarkan ID | 🔒 Required |
| `POST` | `/alumni` | Tambah data alumni baru | 🔒 Required |
| `PUT` | `/alumni/{id}` | Update data alumni | 🔒 Required |
| `DELETE` | `/alumni/{id}` | Hapus data alumni | 🔒 Required |

**Query Filters:**
```
/alumni?jurusan=TI&tahun_lulus=2023
/alumni?bekerja=true
```

### 2️⃣ Alumni Jobs 💼

| Method | Endpoint | Deskripsi | Auth |
|--------|----------|-----------|------|
| `GET` | `/alumni-jobs?alumni_id={ID}` | Riwayat pekerjaan | 🔓 Optional |
| `POST` | `/alumni-jobs` | Tambah data pekerjaan | 🔒 Required |
| `PUT` | `/alumni-jobs/{id}` | Update pekerjaan | 🔒 Required |
| `DELETE` | `/alumni-jobs/{id}` | Hapus pekerjaan | 🔒 Required |

### 3️⃣ Alumni Education 📚

| Method | Endpoint | Deskripsi | Auth |
|--------|----------|-----------|------|
| `GET` | `/alumni-education?alumni_id={ID}` | Riwayat pendidikan | 🔒 Required |
| `POST` | `/alumni-education` | Tambah pendidikan | 🔒 Required |
| `PUT` | `/alumni-education/{id}` | Update pendidikan | 🔒 Required |
| `DELETE` | `/alumni-education/{id}` | Hapus pendidikan | 🔒 Required |

### 4️⃣ Alumni Achievements 🏆

| Method | Endpoint | Deskripsi | Auth |
|--------|----------|-----------|------|
| `GET` | `/alumni-achievements?alumni_id={ID}` | Prestasi alumni | 🔒 Required |
| `POST` | `/alumni-achievements` | Tambah prestasi | 🔒 Required |
| `PUT` | `/alumni-achievements/{id}` | Update prestasi | 🔒 Required |
| `DELETE` | `/alumni-achievements/{id}` | Hapus prestasi | 🔒 Required |

### 5️⃣ Events 📅

| Method | Endpoint | Deskripsi | Auth |
|--------|----------|-----------|------|
| `GET` | `/events` | Daftar semua event | 🔓 Public |
| `GET` | `/events/{id}` | Detail event | 🔓 Public |
| `POST` | `/events` | Tambah event baru | 🔒 Admin |
| `PUT` | `/events/{id}` | Update event | 🔒 Admin |
| `DELETE` | `/events/{id}` | Hapus event | 🔒 Admin |

### 6️⃣ Event Members 👥

| Method | Endpoint | Deskripsi | Auth |
|--------|----------|-----------|------|
| `GET` | `/event-members?event_id={ID}` | Daftar peserta event | 🔒 Required |
| `POST` | `/event-members` | Daftarkan peserta | 🔒 Required |
| `DELETE` | `/event-members/{id}` | Hapus peserta | 🔒 Required |

### 7️⃣ Job Vacancies 📢

| Method | Endpoint | Deskripsi | Auth |
|--------|----------|-----------|------|
| `GET` | `/job-vacancies` | Daftar lowongan kerja | 🔓 Public |
| `GET` | `/job-vacancies/{id}` | Detail lowongan | 🔓 Public |
| `POST` | `/job-vacancies` | Tambah lowongan | 🔒 Required |
| `PUT` | `/job-vacancies/{id}` | Update lowongan | 🔒 Required |
| `DELETE` | `/job-vacancies/{id}` | Hapus lowongan | 🔒 Required |

---

## 📊 Response Format

### Success Response
```json
{
  "message": "success",
  "data": {
    // Data object atau array
  }
}
```

### Error Response
```json
{
  "message": "error",
  "errors": {
    // Detail error
  }
}
```

### HTTP Status Codes

| Code | Deskripsi |
|------|-----------|
| `200` | OK - Request berhasil |
| `201` | Created - Resource berhasil dibuat |
| `400` | Bad Request - Input tidak valid |
| `401` | Unauthorized - Autentikasi gagal |
| `403` | Forbidden - Akses ditolak |
| `404` | Not Found - Resource tidak ditemukan |
| `500` | Internal Server Error - Kesalahan server |

---

## 🤝 Kontribusi

Kontribusi selalu diterima! Berikut cara berkontribusi:

1. Fork repository ini
2. Buat branch fitur baru (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

---

## 📄 Lisensi

Distributed under the MIT License. See `LICENSE` for more information.

---

## 👨‍💻 Author

**Ahmad Al Qodri**

- Proyek: Sistem Informasi Alumni 
- GitHub: [@qodrizizi](https://github.com/qodrizizi)

---

## 📞 Kontak & Support

Jika Anda memiliki pertanyaan atau butuh bantuan:

- 📧 Email: [ahmadalqodridalimunthe@gmail.com](mailto:ahmadalqodridalimunthe@gmail.com)

---

<div align="center">

**⭐ Jangan lupa berikan star jika proyek ini bermanfaat! ⭐**

Made with ❤️ by Ahmad Al Qodri

</div>
