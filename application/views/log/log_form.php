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
        <h2 style="margin-top:0px">Log <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Info <?php echo form_error('info') ?></label>
            <input type="text" class="form-control" name="info" id="info" placeholder="Info" value="<?php echo $info; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Time <?php echo form_error('time') ?></label>
            <input type="text" class="form-control" name="time" id="time" placeholder="Time" value="<?php echo $time; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ip <?php echo form_error('ip') ?></label>
            <input type="text" class="form-control" name="ip" id="ip" placeholder="Ip" value="<?php echo $ip; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Agent <?php echo form_error('agent') ?></label>
            <input type="text" class="form-control" name="agent" id="agent" placeholder="Agent" value="<?php echo $agent; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Uri <?php echo form_error('uri') ?></label>
            <input type="text" class="form-control" name="uri" id="uri" placeholder="Uri" value="<?php echo $uri; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ref <?php echo form_error('ref') ?></label>
            <input type="text" class="form-control" name="ref" id="ref" placeholder="Ref" value="<?php echo $ref; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Proxy <?php echo form_error('proxy') ?></label>
            <input type="text" class="form-control" name="proxy" id="proxy" placeholder="Proxy" value="<?php echo $proxy; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Via <?php echo form_error('via') ?></label>
            <input type="text" class="form-control" name="via" id="via" placeholder="Via" value="<?php echo $via; ?>" />
        </div>
	    <input type="hidden" name="id_log" value="<?php echo $id_log; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('log') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>