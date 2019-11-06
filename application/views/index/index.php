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

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css?version=1.2'); ?>">

</head>

<body>

    <nav class="navbar navbar-light">
        <a class="navbar-brand titulo-navbar">Cadê o <i>Professor ?</i></a>
        <form class="form-inline">
            <a class="navbar-text professor" href="">Sou Professor</a>
        </form>
    </nav>

    <div class="container">
        <?php echo form_open(); ?>
        <div class="row controles">
            <div class="col-5 col-xs-2 px-0">
                <input type="text" class="form-control" name="keyword" id="keyword"
                    value="<?php if(isset($keyword)) echo $keyword; ?>" />
                <i class='fa fa-search fa-2x search-icon' aria-hidden='true'></i>
            </div>
            <div class="col col-xl-2 px-1">
                <input type="text" class="form-control" id="date" name="date"
                    value="<?php if(isset($date)) echo $date; ?>" aria-label="Username">
                <i class='fa fa-calendar fa-2x calendar-icon d-none d-sm-block' aria-hidden='true'></i>
            </div>

            <div class="col col-xl-2 px-1">
                <button type="submit" class="btn btn-primary btn-block" id="search">Buscar</a>
            </div>
        </div>
        <?php echo form_close() ?>


        <?php

        if (isset($aulas)){
            $colunasExtra="";

            if(isset($aulas["Dia Semana"])){
                $colunasExtra.="<th>Dia Semana</th>";
            }
              
                echo "<div class='table-responsive-md'>
                <table class='table table-hover' id='aulas'>
                    <thead>
                        <tr>
                        ";

                foreach ($aulas[0] as $coluna => $valor){
                    if($coluna == "id"){
                        continue;
                    }
                    echo "<th>$coluna</th>";
                }

                echo       
                "</tr>
            </thead>
            <tbody>";
            foreach ($aulas as $aula) {
                
                echo("<tr>");
                foreach ($aula as $coluna => $valor){
                    if($coluna == "id"){
                        continue;
                    }
                echo "<td>".$aula[$coluna]."</td>";
                }   
                echo("</tr>"); 
            }
        }
            ?>
        </tbody>
        </table>

    </div>
    </div>

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

    <script src="<?php echo base_url('js/bootstrap-datepicker.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap-datepicker.pt-BR.min.js'); ?>"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script>
    $('#date').datepicker({
        startDate: "-7d",
        maxViewMode: 1,
        todayBtn: true,
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true
    });
    </script>

    <script>
    $(document).ready(function() {
        $('#aulas').DataTable({
            "bFilter": false,
            "info": false,
            "paging": false
        });
    });
    </script>

</body>

</html>