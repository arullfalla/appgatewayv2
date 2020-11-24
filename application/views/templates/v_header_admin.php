<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">

    <title><?php echo $judul; ?></title>
</head>

<body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">GATEWAY PASS</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url() . 'admin' ?>">Admin <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . 'admin/datavisitor' ?>">Data Visitor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . 'admin/contactedit' ?>" tabindex="-1" aria-disabled="true">Contact Us</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Setting
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <h6 class="dropdown-header">Hi ! Jika keluar silahkan Logout</h6>
                        <a class=" dropdown-item" href="<?php echo base_url() . 'admin/deleteall'; ?>" onclick="return confirm('Anda yakin menghapus semua data pengunjung?')">Hapus Semua Data Pengunjung ! (Warning)</a>
                        <a class=" dropdown-item" href="<?php echo base_url() . 'login/keluar'; ?>">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>