<div class="d-flex justify-content-center" style="margin-top: 70px;">
    <div class="card " style="width: 800px;">

        <div class="card-header">
            <h4>Add Master Visitor</h4>
        </div>

        <div class="card-body">
            <div class="p-2 bd-highlight">

                <?php if ($this->session->flashdata('data')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('data'); ?>
                    </div>
                <?php endif; ?>

                <form action="<?php echo base_url() . 'admin/save'; ?>" method="post">

                    <div class="form-group">
                        <label>Barcode</label>
                        <?php foreach ($barcode as $barcode) { ?>
                            <input class="form-control form-control-sm" style="width: 200px;" type="number" name="barcode" value="<?php echo $barcode->barcode + 1; ?>" required>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control form-control-sm" type="text" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input class="form-control form-control-sm" style="width: 150px;" type="date" name="tgl_lahir">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control form-control-sm" type="text" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input class="form-control form-control-sm" style="width: 230px;" type="text" name="tlp">
                    </div>
                    <div class="form-group">
                        <label>Status Masuk</label><br>
                        <select name="status" class="custom-select" style="width: 150px;">
                            <option value="Belum">Belum</option>
                            <option value="Masuk">Masuk</option>
                        </select>
                    </div>
                    <input type="hidden" name="image" value="default.png">
                    <input class="btn btn-primary" type="submit" value="Submit">
                    <input class="btn btn-primary" type="reset" value="Reset">
                    <a class="btn btn-secondary" href="<?php echo base_url() . 'admin/datavisitor'; ?>">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>