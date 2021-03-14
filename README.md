

1. Ekstrak folder "haidoc" ke htdocs dan import database ke phpmyadmin
2. Konfigurasi Database pada file koneksi.php (ada 2 file koneksi.php) yang terletak di :

	haidoc/fungsi/koneksi.php
	haidoc/admin/koneksi.php

3. Konfigurasi BASE_URL pada file helper.php (ada 2 file helper.php) terletak di :

	haidoc/fungsi/helper.php
	haidoc/admin/helper.php
4. Jika nama folder "haidoc" pada htdocs diubah 
   maka sesuaikan nama folder yang baru pada file proses_edit.php yang terletak di admin/proses_edit.php
   jika nama folder tetap "haidoc" tidak diubah. maka abaikan langkah ini.

5. sesuaikan nama database dengan data yang ada pada file koneksi.php
6. sesuaikan nama folder di htdocs dengan nama folder pada BASE_URL di helper.php

	akun untuk masuk sebagai admin :

	email :pbw0@yahoo.com

	password :12345
