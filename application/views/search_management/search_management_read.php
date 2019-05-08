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
        <h2 style="margin-top:0px">Search_management Read</h2>
        <table class="table">
	    <tr><td>Operator Idoperator</td><td><?php echo $operator_idoperator; ?></td></tr>
	    <tr><td>Aircraft Name</td><td><?php echo $aircraft_name; ?></td></tr>
	    <tr><td>Acreg</td><td><?php echo $acreg; ?></td></tr>
	    <tr><td>Doctype Code</td><td><?php echo $doctype_code; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('search_management') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>