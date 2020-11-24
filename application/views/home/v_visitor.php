<div class="container">
    <div class="row justify-content-center" style="margin-top: 20px;">
        <h4>Data Pengunjung Visitor</h4>
    </div>

    <div class="row">
        <?php foreach ($visitor as $visitor) { ?>

            <!-- Ambil gambar dan Ubah status Masuk -->
            <div class="col-sm">
                <div class="col-sm">
                    <form action="<?php echo base_url() . 'home/masuk'; ?>" method="post">
                        <!-- data id -->
                        <input type="hidden" name="id" value="<?php echo $visitor->id ?>">
                        <!-- nama pengunjung -->
                        <input type="hidden" name="nama" value="<?php echo $visitor->nama ?>">
                        <!-- status ubah menjadi sudah -->
                        <input type="hidden" name="status" value="Masuk">
                        <!-- Camera Webcam -->
                        <div id="my_camera"></div>
                        <input type="hidden" name="image" class="image-tag">
                        <div id="results"></div>
                        <br>
                        <div style="margin-left: 70px;">
                            <input class="btn btn-primary btn-danger btn-sm" type=button value="Ambil Gambar" onClick="take_snapshot()">
                            <input class="btn btn-secondary btn-sm" type=button value="Ulang" onClick="resetSnap()">
                        </div>
                        <br><br>
                        <!-- Tombol Masuk Pengunjung -->
                        <div style="margin-left: 100px;">
                            <input class="btn btn-success btn-lg" class="btn btn-primary" type="submit" value="MASUK">
                        </div>
                    </form>
                </div>
            </div>

            <!-- Informasi Pengunjung -->
            <div class="col-sm">
                <form>

                    <div class="form-group">
                        <label>Barcode</label>
                        <input style="font-weight: bold;" readonly class="form-control form-control-sm" type="number" name="barcode" value="<?php echo $visitor->barcode ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input style="font-weight: bold;" readonly class="form-control form-control-sm" type="text" name="nama" value="<?php echo $visitor->nama ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Umur</label>
                        <?php $this->load->helper(array('umur', 'date')); ?>
                        <?php $tgl = hitung_umur($visitor->tgl_lahir); ?>
                        <input style="font-weight: bold;" readonly class="form-control form-control-sm" type="text" name="tgl_lahir" value="<?php echo $tgl; ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input style="font-weight: bold;" readonly class="form-control form-control-sm" type="text" name="alamat" value="<?php echo $visitor->alamat ?>"" required>
                </div>
                <div class=" form-group">
                        <label>Telepon</label>
                        <input style="font-weight: bold;" readonly class="form-control form-control-sm" type="text" name="tlp" value="<?php echo $visitor->tlp ?>">
                    </div>

                    <a class="btn btn-secondary" href="<?php echo base_url() . 'home'; ?>">BACK TO SEARCH</a>
                </form>
            </div>
        <?php } ?>
    </div>
</div>