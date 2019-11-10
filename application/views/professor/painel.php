<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('favicon/apple-touch-icon.png');?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('favicon/favicon-32x32.png');?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('favicon/favicon-16x16.png');?>">
    <link rel="manifest" href="/site.webmanifest">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url('css/bootstrap-datepicker3.standalone.min.css');?>">

    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <title>Cadê o professor ?!</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css?version=1.3'); ?>">

</head>

<body>

    <nav class="navbar navbar-light">
        <a href="<?php echo base_url('/') ?>" ><i class="fa fa-arrow-left  back-btn"></i></a>
        <a class="navbar-brand titulo-navbar">Cadê o <i>Professor ?</i></a>
    </nav>

    <div class="container">
    <?php echo anchor("painel/list/professor", 'Professor', 'class="btn btn-primary btn-lg btn-block my-3"') ?>
    <?php echo anchor("painel/list/sala", 'Sala', 'class="btn btn-primary btn-lg btn-block my-3"') ?>
    <?php echo anchor("painel/list/disciplina", 'Disciplina', 'class="btn btn-primary btn-lg btn-block my-3"') ?>




    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>

</html>