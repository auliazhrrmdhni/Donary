# 🤝 Donary – Platform Donasi Sosial

<div align="center">

![alt text](https://github.com/auliazhrrmdhni/Donary/blob/main/lOGO_Universitas%20Sulawesi%20Barat%20-.jpg?raw=true)

<br><br>

<strong>Aulia Zahra Ramadhani</strong><br>
<strong>D0222346</strong><br>
<strong>Framework Web Based</strong><br>
Program Studi Informatika<br>
Fakultas Teknik<br>
Universitas Sulawesi Barat<br>
<strong>2025</strong>

</div>

---

## 🎯 Role dan Fitur-fiturnya

### 1. Admin
- Buat akun/login
- Mengelola semua data (donatur, penggalang dana, donasi)
- Menyetujui/menolak donasi yang diajukan penggalang dana
- Menghapus donasi
- Melihat laporan jumlah donasi yang masuk secara keseluruhan

### 2. Penggalang Dana
- Buat akun/login
- Membuat, mengedit atau menghapus campaign donasi
- Melihat status pengajuan (ditolak, disetujui, sedang ditinjau)
- Melihat jumlah donasi yang terkumpul (campaign yang diajukan)

### 3. Donatur
- Buat akun/login
- Melihat daftar donasi yang ada
- Memberi donasi
- Melihat riwayat donasi

---

## 🗂️ Tabel-Tabel Database

### 1. **Tabel pengguna**

| Nama Field  | Tipe Data   | Keterangan                      |
|-------------|-------------|----------------------------------|
| id          | INT (PK)    | Primary key                     |
| nama        | VARCHAR     | Nama pengguna                   |
| email       | VARCHAR     | Email (unik)                    |
| password    | VARCHAR     | Kata sandi                      |
| role        | ENUM        | Role: admin, penggalang, donatur|
| created_at  | TIMESTAMP   | Waktu dibuat                    |
| updated_at  | TIMESTAMP   | Waktu diperbarui                |

---

### 2. **Tabel Campaigns**

| Nama Field        | Tipe Data      | Keterangan                              |
|-------------------|----------------|------------------------------------------|
| id                | INT (PK)       | Primary key                              |
| id_penggalang     | INT (FK)       | ID penggalang dana (relasi ke pengguna)  |
| judul             | VARCHAR        | Judul campaign                           |
| deskripsi         | TEXT           | Deskripsi lengkap                        |
| target_donasi     | DECIMAL(12,2)  | Target nominal donasi                    |
| donasi_sekarang   | DECIMAL(12,2)  | Nominal donasi terkumpul                 |
| status            | ENUM           | Status: pending, disetujui, ditolak      |
| image_url         | VARCHAR        | URL gambar campaign (opsional)           |
| created_at        | TIMESTAMP      | Waktu dibuat                             |
| updated_at        | TIMESTAMP      | Waktu terakhir diupdate                  |

---

### 3. **Tabel Donasi**

| Nama Field          | Tipe Data       | Keterangan                             |
|---------------------|------------------|----------------------------------------|
| id                  | INT (PK)         | Primary key                            |
| id_campaign         | INT (FK)         | ID campaign (relasi ke campaigns)      |
| id_donatur          | INT (FK)         | ID donatur (relasi ke pengguna)        |
| nominal             | DECIMAL(10,2)    | Nominal donasi                         |
| metode_pembayaran   | VARCHAR          | Pilihan metode pembayaran              |
| created_at          | TIMESTAMP        | Waktu donasi dilakukan                 |

---

## 🔗 Relasi Antar Tabel

- `pengguna` ↔ `campaigns`  
  **One-to-Many**: Satu pengguna (penggalang dana) bisa membuat banyak campaign.

- `campaigns` ↔ `donasi`  
  **One-to-Many**: Satu campaign bisa menerima banyak donasi dari berbagai donatur.

- `pengguna` ↔ `donasi`  
  **One-to-Many**: Satu pengguna (donatur) bisa memberi banyak donasi.

---
