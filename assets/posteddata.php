<!DOCTYPE html>
<?php
/*
Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.md or http://ckeditor.com/license
*/
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Sample &mdash; CKEditor</title>
	<link rel="stylesheet" href="sample.css">
</head>
<body>
	
	<table border="1" cellspacing="0" id="outputSample">
		<colgroup><col width="120"></colgroup>
		<thead>
			
		</thead>
<?php

if (!empty($_POST))
{
	foreach ( $_POST as $key => $value )
	{
	/*	if ( ( !is_string($value) && !is_numeric($value) ) || !is_string($key) )
			continue;

		if ( get_magic_quotes_gpc() )
			$value = htmlspecialchars( stripslashes((string)$value) );
		else
			$value = htmlspecialchars( (string)$value );
?>
		<tr>
			<th style="vertical-align: top"><?php echo htmlspecialchars( (string)$key ); ?></th>
			<td><pre class="samples"><?php echo $value; ?></pre></td>
		</tr>
	<?php*/
	echo $value;
	}
}

//echo $value;
?>
	</table>
	
</body>
</html>
