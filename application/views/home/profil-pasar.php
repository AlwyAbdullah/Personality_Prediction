 <!-- ======= Breadcrumbs ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
     <div class="container">
         <div class="d-flex justify-content-between align-items-center">
             <h2>Profil Pasar</h2>
             <ol>
                 <li><a href="<?= base_url(); ?>home/rekomendasi">Home</a></li>
                 <li>Profil Pasar</li>
             </ol>
         </div>
     </div>
 </section><!-- End Breadcrumbs -->

 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
     <ol class="carousel-indicators">
         <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
     </ol>
     <div class="carousel-inner" role="listbox">
         <!-- Slide One - Set the background image for this slide in the line below -->
         <div class="carousel-item active" id="carousel1">
             <div class="carousel-caption d-none d-md-block" style="color: white;">
                 <h4>Sebagai Pusat Pengembangan Ekonomi Rakyat</h4>
             </div>
         </div>
         <!-- Slide Two - Set the background image for this slide in the line below -->
         <div class="carousel-item" id="carousel2">
             <div class="carousel-caption d-none d-md-block" style="color: white;">
                 <h4>Sebagai Tempat Jual Beli kebutuhan Sehari-hari</h4>
             </div>
         </div>
         <!-- Slide Three - Set the background image for this slide in the line below -->
         <div class="carousel-item" id="carousel3">
             <div class="carousel-caption d-none d-md-block" style="color: white;">
                 <h4>Sebagai Sumber Retribusi Daerah</h4>
             </div>
         </div>
     </div>
     <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
     </a>
     <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
     </a>
 </div>
 <div class="container mt-3 mb-3">
     <div id="accordion">
         <div class="row">
             <div class="col-lg-4">
                 <div class="card">
                     <div class="card-header" id="headingOne">
                         <h5 class="mb-0">
                             <button class="btn btn-link nav-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                 Pasar Dinoyo
                             </button>
                         </h5>
                     </div>

                     <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                         <div class="card-body">
                             <img src="<?= base_url() ?>assets/img/pasar/pasar-dinoyo.jpg" style="max-width: 308px;" />
                         </div>
                     </div>
                 </div>
                 <div class="card">
                     <div class="card-header" id="headingTwo">
                         <h5 class="mb-0">

                             <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                 Pasar Klojen
                             </button>
                         </h5>
                     </div>
                     <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                         <div class="card-body">
                             <img src="<?= base_url() ?>assets/img/pasar/pasar-klojen.jpg" style="max-width: 308px;" />
                         </div>
                     </div>
                 </div>
                 <div class="card">
                     <div class="card-header" id="headingThree">
                         <h5 class="mb-0">
                             <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                 Pasar Blimbing
                             </button>
                         </h5>
                     </div>
                     <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                         <div class="card-body">
                             <img src="<?= base_url() ?>assets/img/pasar/pasar-blimbing.jpg" style="max-width: 308px;" />
                         </div>
                     </div>
                 </div>
                 <div class="card">
                     <div class="card-header" id="headingFour">
                         <h5 class="mb-0">
                             <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                 Pasar Oro-Oro Dowo
                             </button>
                         </h5>
                     </div>
                     <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                         <div class="card-body">
                             <img src="<?= base_url() ?>assets/img/pasar/pasar-oro-oro.jpg" style="max-width: 308px;" />
                         </div>
                     </div>
                 </div>
                 <div class="card">
                     <div class="card-header" id="headingFive">
                         <h5 class="mb-0">
                             <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                 Pasar Tawangwangu
                             </button>
                         </h5>
                     </div>
                     <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                         <div class="card-body">
                             <img src="<?= base_url() ?>assets/img/pasar/pasar-tawangwangu.jpg" style="max-width: 308px;" />
                         </div>
                     </div>
                 </div>

             </div>
             <div class="col-lg-8">
                 <!-- Pasar Content -->
                 <div class="tab-content">
                     <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                         <div class="row">
                             <div class="col-lg-8 details order-2 order-lg-1">
                                 <h3>Pasar Dinoyo</h3>
                                 <p>Pasar ini memilik 800 pedagang dan tergolong pasar tradisional yang besar dan lengkap di Kota Malang. Para pedagang umumnya menjual sembako, pakaian, dan berbagai macam barang kebutuhan masyarakat, selain kebutuhan rumah tangga, juga merupakan pemasok kebutuhan hotel-hotel dan restoran di sekitar Malang.</p>
                             </div>
                             <div class="col-lg-4 text-center order-1 order-lg-2">
                                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.584763515188!2d112.60516061434492!3d-7.9383609942818945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e788327d98daf3f%3A0xf8d857018a132b35!2sPasar%20Dinoyo!5e0!3m2!1sid!2sid!4v1618283334881!5m2!1sid!2sid" style="border:0;" allowfullscreen=""></iframe>
                             </div>
                         </div>
                     </div>
                     <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                         <div class="row">
                             <div class="col-lg-8 details order-2 order-lg-1">
                                 <h3>Pasar Klojen</h3>
                                 <p>
                                     Pasar tradisional yang masih tetap eksis sampai saat ini salah satunya adalah pasar Klojen. Walaupun sudah bertebaran pasar modern namun pasar Klojen tidak kalah pamornya.Pasar Klojen sendiri merupakan Pasar Tradisional yang berada di Kelurahan Klojen, Kota Malang, dan tepatnya berada di JL. Cokro Aminoto. Pasar ini cukup ramai didatangi oleh pembeli dan pedagang yang berasal dari wilayah Kelurahan Klojen dan sekitarnya. Sebagian besar pedagang berasal dari daerah Klojen dan kecamatan sekitarnya. Komoditi di pasar ini berupa sayuran, buah-buahan, kue basah, kue kering dan daging. Pasar ini juga di lengkapi dengan fasilitas pendukung yakni: toilet, musholla, kantor dinas kepala pasar, area parkir, dsb. Untuk menuju ke area pasar ini bisa mengunakan sarana transportasi berupa: motor, mobil ataupun angkutan umum. Hal ini semakin memudahkan pedagang dan pembeli untuk menuju lokasi pasar.
                                 </p>
                             </div>
                             <div class="col-lg-4 text-center order-1 order-lg-2">
                                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.2522385529337!2d112.63466841434537!3d-7.972862594257747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6283dc29c7cd7%3A0x109ce0d4b74b0ec6!2sPasar%20Klojen!5e0!3m2!1sid!2sid!4v1618284067799!5m2!1sid!2sid" style="border:0;" allowfullscreen=""></iframe>
                             </div>
                         </div>
                     </div>
                     <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                         <div class="row">
                             <div class="col-lg-8 details order-2 order-lg-1">
                                 <h3>Pasar Blimbing</h3>
                                 <p>Pasar Blimbing merupakan salah satu pasar tradisional yang terdapat dikecamatan Blimbing, kabupaten Malang. Pasar Blimbing cukup ramai dan padat, terutama di pagi hari. Pembeli dan pedagang kebanyakan berasal dari kecamatan Blimbing dan sekitarnya. Transaksi d pasar Blimbing berlangsung dari pagi hari sampai siang hari. Pasar Blimbing berdiri sejak tahun 1970 dan memiliki luas area sekitar 2000 meter2. Pasar ini terletak di dekat pusat pemukiman warga Blimbing tepatnya di JL. Borobudur, Kec. Blimbing, Kab. Malang. Pasar Blimbing ini memiliki struktur pengurus pasar yang dikepalai oleh Bapak Tumirin, selaku Kepala Pasar. Pasar Blimbing ini juga cukup memudahkan warga sekitar untuk mendapatkan kebutuhan sehari-hari yang tentunya dengan harga yang miring. Keberadaan pasar Blimbing turut berperan penting dalam menunjang pendapatan daerah, khsusnya kecamatan Blimbing. Hal ini ditunjang dengan keberadaan beberapa ruko di sekitarnya yang juga menyediakan aneka macam kebutuhan, mulai dari alat elektronik hingga kebutuhan pokok.</p>
                             </div>
                             <div class="col-lg-4 text-center order-1 order-lg-2">
                                 <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15806.272003151576!2d112.6393446!3d-7.9401038!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2d7ee88e69cc81aa!2sPs.%20Blimbing%2C%20Jl.%20Borobudur%2C%20Kota%20Malang%2C%20Jawa%20Timur%2065126!5e0!3m2!1sid!2sid!4v1618290112024!5m2!1sid!2sid" style="border:0;" allowfullscreen=""></iframe>
                             </div>
                         </div>
                     </div>
                     <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                         <div class="row">
                             <div class="col-lg-8 details order-2 order-lg-1">
                                 <h3>Pasar Oro-Oro Dowo</h3>
                                 <p>Pasar Rakyat Oro-Oro Dowo (atau yang lebih dikenal dengan Pasar Oro-Oro Dowo) merupakan salah satu pasar tradisional yang ada di Kota Malang. Pasar ini dibangun pada zaman kolonial Belanda tahun 1932. Pasar ini berdiri seluas 3.400 meter persegi. Pasar ini menampung 251 pedagang yang tersebar menempati 71 kios serta 180 los. Pasar 2 lantai ini terletak di Jalan Guntur, Kota Malang. Pasar ini merupakan pasar pertama di Kota Malang yang telah direvitalisasi oleh pemerintah pusat. Pasar ini direvitalisasi pada awal September 2015 dan dibangun atas kerja sama Kementerian Perdagangan Republik Indonesia dengan Pemerintah Kota Malang melalui dana tugas pembantuan tahun 2015.</p>
                             </div>
                             <div class="col-lg-4 text-center order-1 order-lg-2">
                                 <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15805.173904234574!2d112.6282099!3d-7.968592!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x61d4b1c97788610a!2sPasar%20Oro%20Oro%20Dowo!5e0!3m2!1sid!2sid!4v1618290854715!5m2!1sid!2sid" style="border:0;" allowfullscreen=""></iframe>
                             </div>
                         </div>
                     </div>
                     <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                         <div class="row">
                             <div class="col-lg-8 details order-2 order-lg-1">
                                 <h3>Pasar Tawangwangu</h3>
                                 <p>Pasar rakyat tawangmangu. Kami menyediakan semua kebutuhan rumahtangga anda. Berbelanja dengan harga murah dan berkualitas hanya di pasar tawangmangu. Tempat bersih dan nyaman. Kami juga menjamin keamanan di dalam pasar.</p>
                             </div>
                             <div class="col-lg-4 text-center order-1 order-lg-2">
                                 <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15805.510819978264!2d112.6312841!3d-7.9598621!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe95e3a0922c27794!2sPasar%20Tawangmangu%20Malang%20Kota!5e0!3m2!1sid!2sid!4v1618290944038!5m2!1sid!2sid" style="border:0;" allowfullscreen=""></iframe>
                             </div>
                         </div>
                     </div>
                 </div>

             </div>
         </div>
     </div>
 </div>