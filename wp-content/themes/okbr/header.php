<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
    	<?php
    		global $page, $paged;
    		wp_title( '|', true, 'right' );
    		bloginfo( 'description' );
    	?>
    </title>
	<?php wp_head(); ?>
	<link rel="icon" type="image/png" href="<?php tu(); ?>/assets/images/icon.png" />
    <link rel="stylesheet" href="<?php tu(); ?>/build/style.css?v=202310061815">
</head>
<body>