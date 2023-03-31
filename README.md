# **Tutorial**

### 1. Controller
Semua controller harus ditaruh di folder **controllers/**.
Untuk penggunaan pembuatan adalah (Lihat sample controllers yang sudah ada).. Jika ada ditanyakan maka langsung diskusi.

### 2. Model
Semua model harus ditaruh di folder **models/**. Tidak ada yang spesial dengan penamaan. Cukup namakan sesuai dengan table dan harus meng-extends **BaseModel** yang ada di direktori **models/**. NB: di BaseModel tersedia dasar dari mysql seperti getData/getWhere, dll. Cukup panggil dengan 
```php
$this->NamaModel = new NamaModel();
$cuci = $this->NamaModel->where(array("a" => $a))->get();
```

### 3. View
Semua view harus ditaruh di folder **views/**. Di folder views tersimpan page-page yang akan ditampilkan ke pengguna pada saat ditampilkan, dengan controller yang bertindak sebagai penghubung antara aplikasi dan pengguna
untuk menggunakan view. Cukup panggil method view di dalam function pada controller.  NB: pemanggilan view tidak usah memakai ekstensi php, hanya nama file saja.

View juga bisa mengirimkan data dari controller ke pengguna, hanya dengan cara memanggil variable yang akan dikirimkan ke pengguna

```php
$this->view('nama-view_tidak_usah_pakai_php');

//Parameter kedua dari function view adalah opsional
$data = array('a'=>'1');
$this->view('nama-view_tidak_usah_pakai_php',$data);
```

## **INFORMASI PENTING**
**JANGAN LUPA GANTI FILE .env_ex SESUAI DENGAN SETTINGANMU.. DAN GANTI NAMA FILE NYA JADI .env DOANG.. OKAYY... :)**


# **NEK GA EROH TAKON BOSS, OJO MENENG AE KOYO PEMERINTAH!1!1!**
