<div class="d-flex justify-content-center" style="margin-top: 70px;">

    <div class="card " style="width: 800px;">

        <div class="card-header">
            <h4>Contact</h4>

        </div>

        <div class="card-body">

            <?php if ($this->session->flashdata('data')) : ?>
                <div class="alert alert-success text-left" role="alert" style="width: 300px;">
                    <?php echo $this->session->flashdata('data'); ?>
                </div>
            <?php endif; ?>

            <div class="p-2 bd-highlight">
                <?php foreach ($contact as $contact) { ?>
                    <form action="<?php echo base_url() . 'admin/contactsave'; ?>" method="post">

                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control form-control-sm" style="width: 200px;" type="text" name="nama" value="<?php echo $contact->nama ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input class="form-control form-control-sm" type="text" name="alamat" value="<?php echo $contact->alamat ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Telepon</label>
                            <input class="form-control form-control-sm" style="width: 200px;" type="text" name="tlp" value="<?php echo $contact->tlp ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Support</label>
                            <input class="form-control form-control-sm" style="width: 200px;" type="text" name="support" value="<?php echo $contact->support ?>" required>
                        </div>
                        <div class=" form-group">
                            <label>Billing</label>
                            <input class="form-control form-control-sm" style="width: 200px;" type="text" name="billing" value="<?php echo $contact->billing ?>" required>
                        </div>

                        <input class="btn btn-primary" type="submit" value="Submit">

                        <a class="btn btn-secondary" href="<?php echo base_url() . 'admin'; ?>">Back</a>
                    </form>
                <?php } ?>
            </div>
        </div>