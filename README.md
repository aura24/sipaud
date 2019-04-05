##AMI TAMBAH
1. tahun ajaran
2. peserta rombel
3. penilaian
4. indikator penilaian
5. anekdot tambah

##BELUM/BUG 28 Maret 2017

1. navigasi halaman SUDAH
2. login
3. dashboard
4.laporan
5.  notifikasi error
   - duplikat data,salah input,berhasil/gagal belum ada
   - klu data int dimasukan varchar, data masuk dan id=0
   - terdapat spasi di awal kolom alamat
6.  ```filter tahun ajaran & semester dipenilaian_table belum jalan```
7.  Masih error
     -  ``` SUDAH- count() peserta didik tidak muncul ``` 
     - ``` SUDAH- (  u ) detail_rombel ```   
     -``` SUDAH- (   d) peserta rombel (-)pembatasan tiap peserta```
     -  ``` SUDAH- (c u ) penilaian/aktivitas```
     -``` SUDAH- (crud) detail_penilaian```
     -  ``` SUDAH- (  ud) anekdot```
     -```SUDAH- (c ud) indikator yang muncul di catatan anekdot (UPDATENYA TIDAK ADA)```

##tambahan Error baru 1 April
      -```SUDAH- (  u ) peserta_didik```
      -```SUDAH- tombol pilih di halaman penilaian_index tidak berjalan```
      -```SUDAH- indikator yg muncul dihalaman penilaian_anekdot error```

(?)- penilaian_anekdor baru blum di push
   -```SUDAH- proses belum ubah ke postgre: anekdot, tahun_ajaran, penilaian, peserta_rombel, rombel, tahun```

##BELUM VERSI dara
  - ```SUDAH -peserta yang tampil harusnya peserta yang tidak termasuk dalam rimbel (peserta rombel)```
  -update detail rombel?
  -penilaian_show (aktiifitas) ketika dimasukan subtema dg tanggal yang sama masih bisa, harusnya tidak bisa. cek database

