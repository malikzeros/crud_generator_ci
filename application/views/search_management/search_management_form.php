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
        <h2 style="margin-top:0px">Search_management <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Operator Idoperator <?php echo form_error('operator_idoperator') ?></label>
            <input type="text" class="form-control" name="operator_idoperator" id="operator_idoperator" placeholder="Operator Idoperator" value="<?php echo $operator_idoperator; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Aircraft Name <?php echo form_error('aircraft_name') ?></label>
            <input type="text" class="form-control" name="aircraft_name" id="aircraft_name" placeholder="Aircraft Name" value="<?php echo $aircraft_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Acreg <?php echo form_error('acreg') ?></label>
            <input type="text" class="form-control" name="acreg" id="acreg" placeholder="Acreg" value="<?php echo $acreg; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Doctype Code <?php echo form_error('doctype_code') ?></label>
            <input type="text" class="form-control" name="doctype_code" id="doctype_code" placeholder="Doctype Code" value="<?php echo $doctype_code; ?>" />
        </div>
	    <input type="hidden" name="id_search_management" value="<?php echo $id_search_management; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('search_management') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>