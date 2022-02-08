<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('/css/style.css'); ?>">
    <link rel="shortcut icon" type="image/png" href="<?= base_url('/favicon.ico'); ?>" />
</head>

<body>
    <header>
        <?php
        if (session()->role == 'admin') {
            echo $this->include('App\Modules\Admin\Views\layout\navbar_admin');
        } elseif (session()->role == 'user') {
            echo $this->include('App\Modules\Users\Views\layout\navbar_user');
        } else {
            echo $this->include('App\Modules\Auth\Views\layout\navbar');
        }
        ?>
    </header>

    <main>
        <?= $this->renderSection('content'); ?>
    </main>

    <script>
        var base_url = '<?= base_url(); ?>'
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('js/validate.js'); ?>"></script>
    <script src="<?= base_url('js/script.js'); ?>"></script>
    <script src="<?= base_url('js/table.js'); ?>"></script>
    <script src="<?= base_url('js/alert.js'); ?>"></script>
</body>

</html>