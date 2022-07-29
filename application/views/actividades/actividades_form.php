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
        <h2 style="margin-top:0px">Actividades <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Actividad <?php echo form_error('Actividad') ?></label>
            <input type="text" class="form-control" name="Actividad" id="Actividad" placeholder="Actividad" value="<?php echo $Actividad; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Path <?php echo form_error('Path') ?></label>
            <input type="text" class="form-control" name="Path" id="Path" placeholder="Path" value="<?php echo $Path; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Activado <?php echo form_error('Activado') ?></label>
            <input type="text" class="form-control" name="Activado" id="Activado" placeholder="Activado" value="<?php echo $Activado; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Mostrar Asistencias <?php echo form_error('mostrar_asistencias') ?></label>
            <input type="text" class="form-control" name="mostrar_asistencias" id="mostrar_asistencias" placeholder="Mostrar Asistencias" value="<?php echo $mostrar_asistencias; ?>" />
        </div>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('actividades') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>