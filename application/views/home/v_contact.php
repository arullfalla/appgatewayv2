<div class="container">
    <?php foreach ($contact as $contact) { ?>
        <div style="height: 297px; width: 629px; margin-left: 50px; margin-top: 150px; border-radius: nullpx;">

            <h4>Office</h4>
            <h4><?= strtoupper($contact->nama); ?></h4>
            <p><?= $contact->alamat; ?></p>
            <h5>Telp. <?= $contact->tlp; ?></h5>
            <h5>Support. <?= $contact->support; ?></h5>
            <h5>Billing. <?= $contact->billing; ?></h5>
        </div>
    <?php } ?>
</div>