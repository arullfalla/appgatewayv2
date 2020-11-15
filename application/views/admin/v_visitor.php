<div class="container" style="margin-top: 80px;">
    <h4>Data Visitor</h4>
    <hr>
    <?php if ($this->session->flashdata('data')) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('data'); ?>
        </div>
    <?php endif; ?>
    <a class="btn btn-primary" href="<?php echo base_url() . 'admin/create' ?>">Add</a>
    <a class="btn btn-primary" href="<?php echo base_url() . 'import' ?> ">Import Data</a>
    <a class="btn btn-primary" target="_blank" href="<?php echo base_url() . 'cetakmasuk' ?> ">Cetak Masuk</a>

    <br><br>

    <div class="table-responsive-lg">
        <table class="table table-hover">
            <thead class="table-primary text-center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Barcode</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Status</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = $this->uri->segment('3') + 1; ?>
                <?php foreach ($visitor as $visitor) { ?>
                    <tr>
                        <td scope="row"><?php echo $no++; ?></td>
                        <td><?php echo $visitor->barcode; ?></td>
                        <td><?php echo $visitor->nama; ?></td>
                        <?php $this->load->helper('tgl_indo'); ?>
                        <td><?php echo shortdate_indo($visitor->tgl_lahir); ?></td>
                        <td><?php echo $visitor->alamat; ?></td>
                        <td><?php echo $visitor->tlp; ?></td>
                        <td><?php echo $visitor->status; ?></td>
                        <td><img src="<?php echo base_url() . 'uploads/' . $visitor->image; ?>" width="100px"></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="<?php echo base_url() . 'admin/edit/' . $visitor->id; ?>">Edit</a>
                            <a class="btn btn-danger btn-sm" href="<?php echo base_url() . 'admin/delete/' . $visitor->id; ?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <p><?php echo $links; ?></p>
    </div>
</div>