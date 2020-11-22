<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">

    <title><?php echo $judul; ?></title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Navbar content -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . 'home'; ?>">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . 'home/visitorlist'; ?>">VISITOR LIST</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . 'home/policy'; ?>">POLICY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . 'home/contact'; ?>">CONTACT US</a>
                </li>
            </ul>
        </div>
    </nav>