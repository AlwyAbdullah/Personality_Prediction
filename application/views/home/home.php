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
                <h2>Pasar</h2>
                <h4>Sebagai Pusat Pengembangan Ekonomi Rakyat</h4>
            </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" id="carousel2">
            <div class="carousel-caption d-none d-md-block" style="color: white;">
                <h2>Pasar</h2>
                <h4>Sebagai Tempat Jual Beli kebutuhan Sehari-hari</h4>
            </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" id="carousel3">
            <div class="carousel-caption d-none d-md-block" style="color: white;">
                <h2>Pasar</h2>
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

<section id="about" class="about">
    <div class="container">

        <div class="row content">
            <div class="col-lg-6">
                <h2>Sistem Rekomendasi Pembelian Bahan Pokok</h2>
                <h5>
                    Sembako (Sembilan Bahan Pokok) merupakan sembilan jenis kebutuhan
                    pokok masyarakat yang terdiri atas berbagai bahan-bahan makanan dan minuman.
                    Kebutuhan akan sembako menjadi prioritas utama bagi masyarakat Indonesia untuk
                    untuk memenuhi kebutuhan sehari-hari
                </h5>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
                <p>
                    Harga setiap bahan pokok didapatkan dari 5 pasar yang berada di wilayah
                    Kota Malang. Pasar yang berada pada wilayah kota Malang antara lain :
                </p>
                <ul>
                    <li><i class="ri-check-double-line"></i> Pasar Dinoyo</li>
                    <li><i class="ri-check-double-line"></i>Pasar Klojen</li>
                    <li><i class="ri-check-double-line"></i>Pasar Blimbing</li>
                    <li><i class="ri-check-double-line"></i>Pasar oro-oro dowo</li>
                    <li><i class="ri-check-double-line"></i>Pasat Tawangmangu</li>
                </ul>
                <ul>
                    <!-- <li><i class="ri-check-double-line"></i> Beras Bengawan</li>
                     <li><i class="ri-check-double-line"></i> Gula Pasir</li>
                     <li><i class="ri-check-double-line"></i> Minyak Goreng Bimoli 1 Liter</li>
                     <li><i class="ri-check-double-line"></i> Daging Sapi</li>
                     <li><i class="ri-check-double-line"></i> Daging Ayam Broiler</li>
                     <li><i class="ri-check-double-line"></i> Telor Ayam Ras</li>
                     <li><i class="ri-check-double-line"></i> Garam Beryodium Halus</li>
                     <li><i class="ri-check-double-line"></i> Susu Bubuk Indomilk</li>
                     <li><i class="ri-check-double-line"></i> Cabe Rawit</li>
                     <li><i class="ri-check-double-line"></i> Bawang Merah</li>
                     <li><i class="ri-check-double-line"></i> Bawang Putih</li> -->
                </ul>
            </div>
        </div>
        <p class="mt-3 mb-3">
            Data yang digunakan untuk Sistem Rekomendasi berupa harga bahan pokok
            setiap hari selama 2 tahun terakhir, yaitu mulai dari Januari 2019 sampai dengan
            Desember 2020. Data tersebut diperoleh dari aplikasi SISKAPERBAPO pada situs
            http://siskaperbapo.com/. SISKAPERBAPO merupakan aplikasi untuk memantau
            harga bahan pokok yang dikelola Disperindag Jatim. Data bahan pokok yang
            digunakan untuk penelitian ini antara lain :
        </p>
        <hr>
        <div class="row content">

            <div class="col-lg-4 col-sm-6 portfolio-item mb-4">
                <div class="card h-100 bg-l bg-light">
                    <img class="card-img-top" src="<?= base_url(); ?>/assets/img/produk/gula.jpg" style="max-height: 400px;" />
                    <div class="card-body">
                        <h4 class="card-title text-center"><b>Gula</b></h4>
                        <hr>
                        <p class="card-text">Gula adalah suatu karbohidrat sederhana yang menjadi sumber energi dan komoditas perdagangan utama. Gula digunakan untuk mengubah rasa menjadi manis dan keadaan makanan atau minuman.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 portfolio-item mb-4">
                <div class="card h-100 bg-l bg-light">
                    <img class="card-img-top" src="<?= base_url(); ?>/assets/img/produk/beras.jpg" style="max-height: 400px;" />
                    <div class="card-body">
                        <h4 class="card-title text-center"><b>Beras</b></h4>
                        <hr>
                        <p class="card-text">Beras dimanfaatkan terutama untuk diolah menjadi nasi, makanan pokok terpenting warga dunia. Beras juga digunakan sebagai bahan pembuat berbagai macam penganan dan kue-kue, utamanya dari ketan, termasuk pula untuk dijadikan tapai.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 portfolio-item mb-4">
                <div class="card h-100 bg-l bg-light">
                    <img class="card-img-top" src="<?= base_url(); ?>/assets/img/produk/minyak2.jpg" style="max-height: 400px;" />
                    <div class="card-body">
                        <h4 class="card-title text-center"><b>Minyak</b></h4>
                        <hr>
                        <p class="card-text">Minyak masakan (atau lebih dikenal dengan istilah minyak goreng) adalah minyak atau lemak yang berasal dari pemurnian bagian tumbuhan, hewan, atau dibuat secara sintetik yang dimurnikan dan biasanya digunakan untuk menggoreng makanan</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 portfolio-item mb-4">
                <div class="card h-100 bg-l bg-light">
                    <img class="card-img-top" src="<?= base_url(); ?>/assets/img/produk/daging_sapi.jpg" style="max-height: 400px;" />
                    <div class="card-body">
                        <h4 class="card-title text-center"><b>Daging Sapi</b></h4>
                        <hr>
                        <p class="card-text">Daging sapi adalah daging yang diperoleh dari sapi yang biasa dan umum digunakan untuk keperluan konsumsi makanan.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 portfolio-item mb-4">
                <div class="card h-100 bg-l bg-light">
                    <img class="card-img-top" src="<?= base_url(); ?>/assets/img/produk/daging_ayam.jpg" style="max-height: 250px;" />
                    <div class="card-body">
                        <h4 class="card-title text-center"><b>Daging Ayam</b></h4>
                        <hr>
                        <p class="card-text">Daging ayam didapatkan dari ayam ternak yaitu unggas yang paling banyak diternak di dunia. ayam telah menjadi bahan yang sangat lazim pada berbagai hidangan.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 portfolio-item mb-4">
                <div class="card h-100 bg-l bg-light">
                    <img class="card-img-top" src="<?= base_url(); ?>/assets/img/produk/telur.jpg" style="max-height: 400px;" />
                    <div class="card-body">
                        <h4 class="card-title text-center"><b>Telur</b></h4>
                        <hr>
                        <p class="card-text">Telur sebagai bahan makanan yang biasa dikonsumsi mempunyai kandungan gizi yang cukup lengkap, meliputi karbohidrat, protein dan delapan macam asam amino sehingga berguna bagi tubuh.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 portfolio-item mb-4">
                <div class="card h-100 bg-l bg-light">
                    <img class="card-img-top" src="<?= base_url(); ?>/assets/img/produk/garam2.jpg" style="max-height: 400px;" />
                    <div class="card-body">
                        <h4 class="card-title text-center"><b>Garam</b></h4>
                        <hr>
                        <p class="card-text">Garam dapur adalah sejenis mineral yang dapat membuat rasa asin, garam juga merupakan hal yang wajib dalam setiap masakan sebagai bumbu utama</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 portfolio-item mb-4">
                <div class="card h-100 bg-l bg-light">
                    <img class="card-img-top" src="<?= base_url(); ?>/assets/img/produk/susu.jpeg" style="max-height: 400px;" />
                    <div class="card-body">
                        <h4 class="card-title text-center"><b>Susu</b></h4>
                        <hr>
                        <p class="card-text">Susu merupakan salah satu minuman yang umum dikonsumsi oleh setiap orang di segala usia. Susu mengandung beragam nutrisi penting yang mampu menjaga organ tubuh tetap berfungsi dengan baik dan melindungi tubuh dari serangan penyakit.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 portfolio-item mb-4">
                <div class="card h-100 bg-l bg-light">
                    <img class="card-img-top" src="<?= base_url(); ?>/assets/img/produk/cabe.jpg" style="max-height: 400px;" />
                    <div class="card-body">
                        <h4 class="card-title text-center"><b>Cabai</b></h4>
                        <hr>
                        <p class="card-text">cabai merah atau lombok adalah buah yang digunakan sebagai sayuran maupun bumbu. Dalam cabai terdapat beragam nutrisi yang bermanfaat untuk kesehatan. Namun, jangan sampai mengonsumsi cabai berlebihan, karena dapat menyebabkan gangguan pencernaan</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 portfolio-item mb-4">
                <div class="card h-100 bg-l bg-light">
                    <img class="card-img-top" src="<?= base_url(); ?>/assets/img/produk/bawang_merah.jpg" style="max-height: 400px;" />
                    <div class="card-body">
                        <h4 class="card-title text-center"><b>Bawang Merah</b></h4>
                        <hr>
                        <p class="card-text">Selain membuat masakan terasa gurih dan harum, ada banyak manfaat bawang merah yang berguna untuk kesehatan. Bahan masakan yang lezat dijadikan bawang goreng ini, ternyata rendah kalori, bebas lemak, mengandung antioksidan, vitamin, dan mineral.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 portfolio-item mb-4">
                <div class="card h-100 bg-l bg-light">
                    <img class="card-img-top" src="<?= base_url(); ?>/assets/img/produk/bawang_putih.jpg" style="max-height: 400px;" />
                    <div class="card-body">
                        <h4 class="card-title text-center"><b>Bawang Putih</b></h4>
                        <hr>
                        <p class="card-text">Meski bawang putih memiliki aroma yang menyengat, ada banyak manfaat bawang putih bagi kesehatan. Bukan hanya sebagai pelezat masakan, bawang putih telah lama digunakan untuk mencegah dan mengatasi berbagai penyakit. Hal ini adalah berkat kandungan nutrisi di dalamnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>