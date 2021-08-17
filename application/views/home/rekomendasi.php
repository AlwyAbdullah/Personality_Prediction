<!--Api key :  AIzaSyBAUlWW4vWXHup4vdrfSM3X-f27auZjYVE -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Rekomendasi Pasar</h2>
            <ol>
                <li><a href="<?= base_url(); ?>home">Home</a></li>
                <li>Rekomendasi Pasar</li>
            </ol>
        </div>
    </div>
</section><!-- End Breadcrumbs -->

<div class="container mt-3">
    <?= $this->session->flashdata('empty'); ?>
    <form method="POST" enctype="multipart/form-data" action="<?= base_url() ?>home/prediksi">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-10">
                <label><?= date('d-m-Y') ?></label>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Lokasi Anda Saat Ini (Berdasarkan GPS)</label>
            <div class="col-sm-10">
                <div class="badge badge-primary">Latitude : <b id="lat"></b></div>
                <div class="badge badge-success">Longitude : <b id="long"></b> </div>
                <input type="hidden" id="latform" name="lat">
                <input type="hidden" id="longform" name="long">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Bahan Pokok</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Beras Bengawan" name="bahan[]" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Beras Bengawan
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Gula" name="bahan[]" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Gula
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Minyak Bimoli" name="bahan[]" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Minyak Bimoli
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Daging Sapi" name="bahan[]" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Daging Sapi
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Daging Ayam" name="bahan[]" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Daging Ayam
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Telur" name="bahan[]" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Telur
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Garam" name="bahan[]" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Garam
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Susu Bubuk" name="bahan[]" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Susu Bubuk
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Cabai" name="bahan[]" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Cabai
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Bawang Merah" name="bahan[]" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Bawang Merah
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Bawang Putih" name="bahan[]" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Bawang Putih
                    </label>
                </div>
            </div>
        </div>
        <input class="btn btn-primary mb-3" type="submit" value="Submit">
    </form>
</div>

<script>
    $(document).ready(function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, error);
        } else {
            alert('Geolocation is not supported by this browser.');
        }
    });

    function error(err) {
        console.warn(`ERROR(${err.code}): ${err.message}`);
        alert('Please Enable Location Permission to Use This Feature then Refresh This Page');
    }


    function showPosition(position) {
        document.getElementById('latform').value = position.coords.latitude;
        document.getElementById('longform').value = position.coords.longitude;
        document.getElementById('lat').innerHTML = position.coords.latitude;
        document.getElementById('long').innerHTML = position.coords.longitude;
    }
</script>