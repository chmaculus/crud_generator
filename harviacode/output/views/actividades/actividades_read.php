<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Actividades Read</h2>
        <table class="table">
	    <tr><td>Actividad</td><td><?php echo $Actividad; ?></td></tr>
	    <tr><td>Path</td><td><?php echo $Path; ?></td></tr>
	    <tr><td>Activado</td><td><?php echo $Activado; ?></td></tr>
	    <tr><td>Mostrar Asistencias</td><td><?php echo $mostrar_asistencias; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('actividades') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>