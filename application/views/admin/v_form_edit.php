<div class="d-flex justify-content-center" style="margin-top: 70px;">
    <div class="card " style="width: 800px;">

        <div class="card-header">
            <h4>Edit Master Visitor</h4>
        </div>

        <div class="card-body">
            <div class="p-2 bd-highlight">
                <?php foreach ($visitor as $visitor) { ?>
                    <form action="<?php echo base_url() . 'admin/editsave'; ?>" method="post">

                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $visitor->id ?>"><br>
                            <label>Barcode</label>

                            <input class="form-control form-control-sm" style="width: 200px;" type="number" name="barcode" value="<?php echo $visitor->barcode ?>" required>

                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control form-control-sm" type="text" name="nama" value="<?php echo $visitor->nama ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input class="form-control form-control-sm" style="width: 150px;" type="date" name="tgl_lahir" value="<?php echo $visitor->tgl_lahir ?>">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input class="form-control form-control-sm" type="text" name="alamat" value="<?php echo $visitor->alamat ?>"" required>
                </div>
                <div class=" form-group">
                            <label>Telepon</label>
                            <input class="form-control form-control-sm" style="width: 230px;" type="text" name="tlp" value="<?php echo $visitor->tlp ?>">
                        </div>
                        <div class="form-group">
                            <label>Status Masuk</label><br>
                            <select name="status" class="custom-select" style="width: 150px;">
                                <?php if ($visitor->status == 'Belum') { ?>
                                    <?php echo '<option selected value="Belum">Belum</option>'; ?>
                                    <?php echo '<option value="Masuk">Masuk</option>'; ?>
                                <?php } else { ?>
                                    <?php echo '<option  value="Belum">Belum</option>'; ?>
                                    <?php echo '<option selected value="Masuk">Masuk</option>'; ?>
                                <?php } ?>
                            </select>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Submit">
                        <input class="btn btn-primary" type="reset" value="Reset">
                        <a class="btn btn-secondary" href="<?php echo base_url() . 'admin/datavisitor'; ?>">Cancel</a>
                    </form>
                <?php } ?>
            </div>
        </div>