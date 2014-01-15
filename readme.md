#Sumalindo Administration

Mohon maaf bila tata penulisan sintaks programnya amat sangat berantakan. Maklum, aplikasi 3 malam jadi. Aplikasi ini berbasis Web dan dibangun untuk memudahkan divisi-divisi dalam perusahaan berinteraksi dalam sebuah intranet (bukan internet loh ya). Karena semua laporan atau apapun itu yang sifatnya untuk perusahaan dapat di upload dalam satu server. Dan divisi IT sebagai pemilih hak Administrator dapat melakukan pengecekan aktifitas pada setiap divisi yang ada. 

####Divisi itu sendiri ada 10 Bagian :
 - Divisi Audit
 - Divisi Corsek
 - Divisi Finance
 - Divisi HRDS
 - Divisi IT
 - Divisi KP
 - Divisi Logging
 - Divisi Marketing
 - Divisi Plymill
 - Divisi Procurement

Entah apa itu tugas mereka masing-masing, intinya aplikasi ini jadi apa adanya. Hahahaha.. Terus terang, ini kali pertamanya saya terlibat dalam pembuatan aplikasi dengan banyak tabel dalam 1 database, terhitung ada 38 tabel didalamnya. Sebenarnya sih masih bisa di minimalisir, tapi ya apa boleh buat kalo maunya si perusahaan seperti itu. Dan hasilnya... Ya begitulah... Untuk fungsi bisa di telusuri sendiri...

Siapa tau kiranya ada yang lagi nyari referensi untuk tugas kuliah atau apapun itu yang sifatnya untuk pembelajaran, monggo dipahami tentunya walaupun apa adanya. Dan buat yang sudah pro, jangan di ketawain ya. XD

Satu lagi, untuk aplikasi yang di share, saya ubah databasenya menggunakan `sqlite`, jadi kamu tidak butuh ngejalanin service `MySQL Server`. Jadi, langsung instan, biar mudah.

###Alat Tempur
 - [Sublime Text 3](www.sublimetext.com/3)
 - [Adobe Photoshop CC](www.adobe.com/products/photoshop.html)

###Screenshot
 - ####FrontEnd Preview
 <img src="https://raw.github.com/novay/sumalindo-administration/master/public/assets/_ss/Frontend.png" />

 - ####BackEnd Preview
 <img src="https://raw.github.com/novay/sumalindo-administration/master/public/assets/_ss/Backend.png" />

###Instalasi
 - Download ZIP
 - `composer install`
 - `php artisan migrate`
 - `php artisan db:seed`
 - `php artisan serve`
 - Buka browser lalu kunjungi `localhost:8000`
 - SELESAI

###Credit
 - Laravel
 - Twitter Bootstrap
 - Reside

Semoga bermanfaat, regard 
[Novay](http://novay.web.id).