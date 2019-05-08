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
        <h2 style="margin-top:0px">Log Read</h2>
        <table class="table">
	    <tr><td>Info</td><td><?php echo $info; ?></td></tr>
	    <tr><td>Time</td><td><?php echo $time; ?></td></tr>
	    <tr><td>Ip</td><td><?php echo $ip; ?></td></tr>
	    <tr><td>Agent</td><td><?php echo $agent; ?></td></tr>
	    <tr><td>Uri</td><td><?php echo $uri; ?></td></tr>
	    <tr><td>Ref</td><td><?php echo $ref; ?></td></tr>
	    <tr><td>Proxy</td><td><?php echo $proxy; ?></td></tr>
	    <tr><td>Via</td><td><?php echo $via; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('log') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>