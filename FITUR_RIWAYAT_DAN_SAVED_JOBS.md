# Fitur Riwayat Lamaran dan Saved Jobs

## Ringkasan

Fitur ini menambahkan kemampuan untuk:

1. Melihat riwayat lamaran pekerjaan user di dashboard
2. Menyimpan lowongan pekerjaan yang menarik
3. Mengelola lowongan yang disimpan

## File yang Dibuat

### 1. Migration

- `database/migrations/2026_02_06_101300_create_saved_jobs_table.php`
    - Membuat tabel `saved_jobs` dengan kolom:
        - `id`, `user_id`, `ptkform_id`, `timestamps`
        - Unique constraint untuk mencegah duplikasi

### 2. Model

- `app/Models/SavedJob.php`
    - Model untuk tabel saved_jobs
    - Relasi ke User dan Ptkform

## File yang Dimodifikasi

### 1. Controllers

#### HomeController.php

- **Import**: Menambahkan `use App\Models\SavedJob`
- **Method `index()`**:
    - Mengambil riwayat lamaran user dengan relasi ptkform
    - Mengambil lowongan yang disimpan user
- **Method `toggleSaveJob()`**:
    - Handle save/unsave lowongan
    - Return JSON response
- **Method `getSavedJobIds()`**:
    - Mengambil ID lowongan yang disimpan user

#### MainController.php

- **Import**: Menambahkan `use App\Models\SavedJob`
- **Method `showVacancy()`**:
    - Cek apakah lowongan sudah disimpan user
    - Pass variable `$isSaved` ke view

### 2. Routes (web.php)

```php
Route::post('/toggle-save-job', 'toggleSaveJob');
Route::get('/get-saved-job-ids', 'getSavedJobIds');
```

### 3. Views

#### resources/views/home/index.blade.php

**Penambahan Section:**

1. **Riwayat Lamaran** (setelah Available Exams):
    - Tabel dengan kolom: Posisi, Departemen, Lokasi, Status, Tanggal Lamar
    - Badge status dengan warna berbeda
    - Empty state jika belum ada lamaran

2. **Lowongan Tersimpan**:
    - Tabel dengan kolom: Posisi, Departemen, Lokasi, Disimpan Pada, Aksi
    - Tombol hapus untuk unsave
    - Empty state jika belum ada lowongan tersimpan

**JavaScript:**

- Handler untuk unsave job dengan konfirmasi
- Update UI dinamis setelah unsave
- Notifikasi SweetAlert

#### resources/views/ptkforms/show.blade.php

**Penambahan:**

- Tombol "Simpan Lowongan" di sidebar (untuk user yang login)
- Toggle antara "Simpan Lowongan" dan "Tersimpan"
- Icon bookmark yang berubah sesuai status
- JavaScript untuk handle save/unsave dengan AJAX
- Toast notification untuk feedback

## Fitur Utama

### 1. Riwayat Lamaran

- Menampilkan semua lamaran user
- Status dengan badge berwarna:
    - Info: Aplikasi Masuk, MCU
    - Primary: Interview HC, Interview User, Interview Direksi
    - Warning: Psikotest
    - Success: Offering, Joined
    - Danger: Rejected
- Informasi lengkap: posisi, departemen, lokasi, tanggal

### 2. Save/Unsave Lowongan

- User bisa save lowongan dari halaman detail
- Toggle button dengan feedback visual
- Tidak bisa save duplikat (unique constraint)
- Bisa unsave dari dashboard atau halaman detail

### 3. UI/UX

- Design modern dan konsisten dengan dashboard
- Animasi smooth untuk interaksi
- Toast notification untuk feedback
- Confirmation dialog untuk aksi delete
- Empty state yang informatif

## Cara Penggunaan

### Untuk User:

1. **Melihat Riwayat**: Buka `/dashboard`, scroll ke section "Riwayat Lamaran"
2. **Save Lowongan**:
    - Buka detail lowongan
    - Klik tombol "Simpan Lowongan" di sidebar
3. **Unsave Lowongan**:
    - Dari dashboard: klik tombol "Hapus" di tabel Lowongan Tersimpan
    - Dari detail: klik tombol "Tersimpan" untuk toggle

### Database:

- Tabel: `saved_jobs`
- Relasi: Many-to-Many antara User dan Ptkform melalui saved_jobs

## Status Lamaran

```php
0 => Aplikasi Masuk
1 => Interview HC
2 => Psikotest
3 => Interview User
4 => Interview Direksi
5 => Offering
6 => MCU
7 => Joined
8 => Rejected
```
