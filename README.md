Langkah utama:
1. Install Laravel (tanpa tambahan AdminLTE)
2. Migrasi dari Vite ke Laravel Mix (https://github.com/laravel/vite-plugin/blob/main/UPGRADE.md#migrating-from-vite-to-laravel-mix)
3. Ubah settingan database, env, dan lain-lain
4. Ubah database migration User bawaan agar mencakup username dan is_admin
5. Ubah proses login controller dan register controller agar menerima username
6. Buat table database baru (https://www.malasngoding.com/migration-laravel/)
7. Buat model untuk tabel yang dibuat (https://stillat.com/blog/2016/12/07/laravel-artisan-generator-command-the-makemodel-command)


Referensi lainnya:
- Laravel database multivalue (https://stackoverflow.com/questions/32954424/laravel-migration-array-type-store-array-in-database-column)
- Laravel database foreign key (https://stackoverflow.com/questions/48180314/how-to-create-foreign-key-by-laravel-migration)
- Laravel CRUD AdminLTE (https://bukuinformatika.com/tutorial-membuat-aplikasi-crud-laravel-adminlte/)
- Laravel eloquent documentation (https://laravel.com/docs/9.x/eloquent)

TODO:

- [x] Gabungkan informasi biodata, akun, dan dokumen
- [ ] Kelola dokumen dengan relationship one to many / belongs to
- [x] Gabungkan fungsi create dan update menjadi satu kesatuan
- [x] Hubungkan bagian frontend dengan backend