## silahkan jalan perintah composer update
## silahkan jalankan perintah php artisan migrate untuk membuat table
## silahkan jalankan perintah php artisan db:seed --class=PenggunaSeeder untuk membuat data dummy pengguna
## silahkan jalankan perintah php artisan serve untuk menjalankan rest API

## Berikut end poit API yang digunakan
## localhost:8000/api/register : post
## localhost:8000/api/login : post // dan jangan lupa menaruh bearer token untuk bisa menjalankan endpoint lain 
## localhost:8000/api/foto : get
## localhost:8000/api/foto/{id} : get // untuk menampilkan foto yang dipilih
## localhost:8000/api/foto : post // untuk upload foto
## localhost:8000/api/foto/{id} : put // untuk update data foto
## localhost:8000/api/foto/{id} : delete // untuk hapus foto
## localhost:8000/api/like : post // untuk like foto
## localhost:8000/api/unlike : post // untuk unlike foto

