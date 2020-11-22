<div class="container">
    <div style="margin: 5px 0px 5px 0px;">
        <button type="button" class="btn btn-success text-weight-bold">Masuk: <?= $masuk; ?></button>
        <button type="button" class="btn btn-danger text-weight-bold">Belum: <?= $belum; ?></button>
        <button type="button" class="btn btn-info text-weight-bold">Total: <?= $total; ?></button>
    </div>
    <div class="table-responsive-lg">
        <table class="table table-hover">
            <thead class="table-primary text-left">
                <tr>
                    <th scope="col">Barcode</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Telepon</th>
                    <th scope="col" class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($visitor as $visitor) { ?>
                    <tr>
                        <td><?php echo $visitor->barcode; ?></td>
                        <td><?php echo $visitor->nama; ?></td>
                        <?php $this->load->helper(array('umur', 'date')); ?>
                        <td><?php echo hitung_umur($visitor->tgl_lahir); ?></td>
                        <td class="text-justify"><?php echo $visitor->alamat; ?></td>
                        <td><?php echo $visitor->tlp; ?></td>
                        <td class="bg-success text-center font-weight-bold text-light"><?php echo $visitor->status; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>