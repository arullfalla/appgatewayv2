<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
    <title>Selamat Datang | Halaman Login</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-transparent mb-0">
                        <h5 class="text-center">Please <span class="font-weight-bold text-primary">LOGIN</span></h5>
                        <h5 class="text-center"><span class="font-weight-bold text-primary">GATEWAY PASS SYSTEM</span></h5>
                    </div>
                    <div class="card-body">
                        <?php if ($this->session->flashdata('data')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $this->session->flashdata('data'); ?>
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo base_url() . 'login/masuk' ?>" method="post">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="" value="Login" class="btn btn-primary btn-block">
                            </div>
                        </form>

                    </div>
                    <div style="margin: auto;">
                        <a class="btn btn-primary" href="<?php echo base_url() . 'home'; ?>" role="button">Gateway Pass System</a>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.bundle.min.js"></script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 5000);
    </script>
</body>

</html>