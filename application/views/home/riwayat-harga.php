 <!-- ======= Breadcrumbs ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
     <div class="container">

         <div class="d-flex justify-content-between align-items-center">
             <h2>Riwayat Harga</h2>
             <ol>
                 <li><a href="<?= base_url() ?>">Home</a></li>
                 <li>Riwayat Harga</li>
             </ol>
         </div>

     </div>
 </section><!-- End Breadcrumbs -->

 <div class="container">
     <div class="col-lg-12 mt-5 mb-5">
         <form class="form-inline" id="form-pasar" action="<?= base_url() ?>home/riwayatHarga" method="POST">
             <input class="form-control m-1" type="date" min="2015-01-01" max="2018-12-31" name="filter_tanggal" required>
             <select class="form-control m-1" name="nama_pasar" required>
                 <option>Pasar Dinoyo</option>
                 <option>Pasar Blimbing</option>
                 <option>Pasar Tawangwangu</option>
                 <option>Pasar Oro-Oro Dowo</option>
                 <option>Pasar Klojen</option>
             </select>
             <button type="submit" class="btn btn-primary m-2">Tampilkan Data</button>
         </form>
         <?php
            if (isset($data_harga)) {
            ?>
             <h5>Data Harga Tanggal : <?= date("d-m-Y", strtotime($data_harga[0]))  ?></h5>
             <div class="table-responsive">
                 <table class="table table-hover">
                     <thead class="thead-dark">
                         <tr>
                             <th>Nama Bahan Pokok</th>
                             <th>Harga</th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Beras Bengawan</td>
                             <td><?= number_format($data_harga[1], 0, ',', '.') ?></td>
                         </tr>
                         <tr>
                             <td>Gula Pasir</td>
                             <td><?= number_format($data_harga[2], 0, ',', '.') ?></td>
                         </tr>
                         <tr>
                             <td>Minyak Goreng Bimoli 2L</td>
                             <td><?= number_format($data_harga[3], 0, ',', '.') ?></td>
                         </tr>
                         <tr>
                             <td>Daging Sapi</td>
                             <td><?= number_format($data_harga[4], 0, ',', '.') ?></td>
                         </tr>
                         <tr>
                             <td>Daging Ayam Broiler</td>
                             <td><?= number_format($data_harga[5], 0, ',', '.') ?></td>
                         </tr>
                         <tr>
                             <td>Telur Ayam Ras</td>
                             <td><?= number_format($data_harga[6], 0, ',', '.') ?></td>
                         </tr>
                         <tr>
                             <td>Susu Bubuk Indomilk</td>
                             <td><?= number_format($data_harga[7], 0, ',', '.') ?></td>
                         </tr>
                         <tr>
                             <td>Garam Beryodium Halus</td>
                             <td><?= number_format($data_harga[8], 0, ',', '.') ?></td>
                         </tr>
                         <tr>
                             <td>Cabe Rawit</td>
                             <td><?= number_format($data_harga[9], 0, ',', '.') ?></td>
                         </tr>
                         <tr>
                             <td>Bawang Merah</td>
                             <td><?= number_format($data_harga[10], 0, ',', '.') ?></td>
                         </tr>
                         <tr>
                             <td>Bawang Putih</td>
                             <td><?= number_format($data_harga[11], 0, ',', '.') ?></td>
                         </tr>
                     </tbody>
                 </table>
             </div>
         <?php
            } ?>
     </div>
 </div>