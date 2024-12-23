
# Unikloh - Web-based online fashion store

Selamat datang di Unikloh, Web-based online fashion store andalan Anda! Unikloh adalah aplikasi web di mana pengguna dapat menjelajahi dan membeli pakaian, membaca artikel fashion, serta berinteraksi dengan komunitas. Website ini menawarkan berbagai fitur baik untuk admin maupun pengguna untuk memastikan pengalaman yang optimal bagi semua.




# Fitur
#### Autentikasi Pengguna
- Login dan Buat Akun: Pengguna dapat mendaftar dan login sebagai admin atau pengguna biasa.

#### Fitur Admin
Admin memiliki akses ke fitur-fitur berikut:
- CRUD Stok Baju: Membuat, membaca, memperbarui, dan menghapus item pakaian dalam stok.
- CRUD Artikel: Membuat, membaca, memperbarui, dan menghapus artikel.
- Manajemen Komentar: Menambahkan dan menghapus komentar pada artikel.
- Mengganti Password: Memperbarui password akun admin.

#### Fitur Pengguna
Pengguna biasa memiliki akses ke fitur-fitur berikut:
- Melihat Artikel: Menjelajahi dan membaca artikel yang dibuat oleh admin.
- Komentar pada Artikel: Menambahkan komentar pada artikel tanpa dapat menghapusnya.
- Melihat Produk: Menjelajahi dan melihat detail item pakaian yang tersedia di toko.
- Mengganti Password: Memperbarui password akun pengguna.


## Get Started
Untuk menjalankan proyek ini secara lokal, ikuti langkah-langkah berikut:

#### Prasyarat
- Pastikan Anda telah menginstal PHP dan MySQL.
- Web server seperti Apache atau Nginx.

## Installation
1.  #### Clone repositori:
    ```bash
    git clone https://github.com/putrifbryn/unikloh.git
    ```
    
2. #### Konfigurasi database:
- Buat database baru di MySQL.
- Import file 'comp.sql'.

3. #### Set up config environment:
- Buka file koneksi.php dan atur parameter database sesuai dengan konfigurasi Anda:
    ```bash
    <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $db = "comp";

        $conn = mysqli_connect($host, $username, $password, $db);
    ?>
    ```
4. #### Jalankan server web Anda (Apache/Nginx) dan arahkan ke direktori proyek.
5. #### Buka 'http://localhost/unikloh' di browser web Anda.
# Screenshots
<img width="500" alt="unikloh6" src="https://github.com/putrifbryn/unikloh/assets/106117098/df2fff2f-063c-4244-9cfc-e653f5493679">
<img width="500" alt="unikloh5" src="https://github.com/putrifbryn/unikloh/assets/106117098/d153469d-ecc4-4b67-a01b-2840611cf67b">
<img width="500" alt="unikloh4" src="https://github.com/putrifbryn/unikloh/assets/106117098/028914e8-1bdb-4a48-ba3e-a3c1fb946239">
<img width="500" alt="unikloh3" src="https://github.com/putrifbryn/unikloh/assets/106117098/37bf90b0-3c41-4ce6-8644-97297c6bf5d8">
<img width="500" alt="unikloh2" src="https://github.com/putrifbryn/unikloh/assets/106117098/4005363f-f5c4-445f-825b-a8024ade2c9b">
<img width="500" alt="unikloh1" src="https://github.com/putrifbryn/unikloh/assets/106117098/19266dd8-60af-40f7-90cb-66e36e08cc84">


