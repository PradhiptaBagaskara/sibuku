$(document).ready(function() {
              /** Membuat Waktu Mulai Hitung Mundur Dengan
                * var detik = 0,
                * var menit = 1,
                * var jam = 1
              */
              var detik = 30;
              var menit = 30;
              var jam   = 1;
              var target = "auto_logot.php"

             /**
               * Membuat function hitung() sebagai Penghitungan Waktu
             */
            function hitung() {
                /** setTimout(hitung, 1000) digunakan untuk
                    * mengulang atau merefresh halaman selama 1000 (1 detik)
                */
                setTimeout(hitung,1000);

               /** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
               if(menit < 10 && jam == 0){
                     var peringatan = 'style="color:red"';
               };

               /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
               $('#logot').html(
                      '<b class="nav-link" '+peringatan+'>Waktu Login Anda ' + jam + ' : ' + menit + ' : ' + detik + ' </b>'
                );

                /** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
                detik --;

                /** Jika var detik < 0
                    * var detik akan dikembalikan ke 59
                    * Menit akan Berkurang 1
                */
                if(detik < 0) {
                    detik = 59;
                    // window.location.href=target;
                    menit --;

                    /** Jika menit < 0
                        * Maka menit akan dikembali ke 59
                        * Jam akan Berkurang 1
                    */
                    if(menit < 0) {
                        menit = 59;
                        jam --;

                        /** Jika var jam < 0
                            // * clearInterval() Memberhentikan Interval dan submit secara otomatis
                        */
                        if(jam < 0) {
                            clearInterval();
                            window.location.href= target;
                        }
                    }
                }
            }
            /** Menjalankan Function Hitung Waktu Mundur */
            hitung();
      });
