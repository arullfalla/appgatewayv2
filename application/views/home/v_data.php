<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>Barcode</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visitor as $visitor) { ?>
                <tr>
                    <td><?php echo $visitor->barcode; ?></td>
                    <td><?php echo $visitor->nama; ?></td>
                    <?php $this->load->helper(array('umur', 'date')); ?>
                    <td><?php echo hitung_umur($visitor->tgl_lahir); ?></td>
                    <td><?php echo $visitor->alamat; ?></td>
                    <td><?php echo $visitor->tlp; ?></td>
                    <td><?php echo $visitor->status; ?></td>
                    <td><a href="<?php echo base_url() . 'home/masukdata/' . $visitor->barcode; ?>" class="btn btn-success">Masuk</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>