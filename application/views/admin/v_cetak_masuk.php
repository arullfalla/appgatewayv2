<div style="margin: 10px 10px 10px 10px;">
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>No.</th>
                <th>Barcode</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Status</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0 + 1; ?>
            <?php foreach ($visitor as $visitor) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $visitor->barcode; ?></td>
                    <td><?php echo $visitor->nama; ?></td>
                    <?php $this->load->helper(array('umur', 'date')); ?>
                    <?php $tgl = $visitor->tgl_lahir; ?>
                    <td><?php echo hitung_umur($tgl); ?></td>
                    <td><?php echo $visitor->alamat; ?></td>
                    <td><?php echo $visitor->tlp; ?></td>
                    <td><?php echo $visitor->status; ?></td>
                    <td><img src="<?php echo base_url() . 'uploads/' . $visitor->image; ?>" width="100px"></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>