 <!-- ======= Breadcrumbs ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
     <div class="container">

         <div class="d-flex justify-content-between align-items-center">
             <h2>Hasil Rekomendasi</h2>
             <ol>
                 <li><a href="<?= base_url() ?>">Home</a></li>
                 <li><a href="<?= base_url() ?>home/rekomendasi">Rekomendasi</a></li>
                 <li>Hasil Rekomendasi</li>
             </ol>
         </div>

     </div>
 </section><!-- End Breadcrumbs -->

 <div class="container">
     <div class="col-lg-12 mt-5 mb-5">
         <table class="table table-hover">
             <thead class="thead-dark">
                 <tr>
                     <th scope="col">No</th>
                     <th scope="col">Bahan Pokok</th>
                     <th scope="col">Peramalan</th>
                 </tr>
             </thead>
             <tbody>
                 <?php
                    $index = 0;
                    $no = 1;
                    foreach ($bahan as $b) {
                    ?>
                     <tr>
                         <th><?= $no ?></th>
                         <td><?= $b ?></td>
                         <td>
                             <?php foreach ($prediksi as $key => $p) {
                                    if ($key == $index) {
                                ?>
                                     <ul>
                                         <li><?= $p['pasar_dinoyo'] ?></li>
                                         <li><?= $p['pasar_klojen'] ?></li>
                                         <li><?= $p['pasar_blimbing'] ?></li>
                                         <li><?= $p['pasar_oro'] ?></li>
                                         <li><?= $p['pasar_tawangwangu'] ?></li>
                                     </ul>
                             <?php
                                    }
                                } ?>
                         </td>
                     </tr>
                 <?php
                        $index++;
                        $no++;
                    } ?>
             </tbody>
         </table>
         <h6>
             Berikut urutan lokasi pasar terdekat dari tempat anda :
         </h6>
         <ol>
             <?php foreach ($nearest as $n) { ?>
                 <li><a href="<?= $n['maps_link'] ?>" target="_blank"><?= $n['nama'] ?></a></li>
             <?php } ?>
         </ol>
     </div>
 </div>