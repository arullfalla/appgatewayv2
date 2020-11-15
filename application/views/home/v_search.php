<!-- Halaman Pencarian Data -->

<div style="margin: auto; height: 800px; padding: 10px;">
    <div style="margin: auto; width: 500px;">
        <?php if ($this->session->flashdata('data')) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('data'); ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('data2')) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('data2'); ?>
            </div>
        <?php endif; ?>
    </div>
    <form style="margin: auto; width: 600px; padding: 10px;" action="<?php echo base_url(); ?>home/cari" method="POST">
        <input class="form-control mr-sm-2" type="text" placeholder="Scan Barcode atau Cari Alamat disini ..." aria-label="Search" name="inputsearch" required>
        <div class="col text-center" style="margin-top: 10px">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="oNcliek()">Search</button>
        </div>
    </form>

</div>