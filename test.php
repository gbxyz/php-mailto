<?php include('mailto.php'); ?>
<html>
	<head>
		<title>mailto.php test page</title>
		<style type="text/css">
			body {
				margin:			10px 100px;
				font-famiy:		Helvetica, Arial, Sans-Serif;
				background-color:	#E2E2DE;
				color:			#404040;
			}
		</style>
	</head>
	<body>
		<h1>mailto.php test page</h1>
		<p>This is the test page for mailto.php.</p>
		<hr />
		<h2>1. mailto() test:</h2>
		<p>You can use the <tt>mailto()</tt> function to directly embed an obfuscated e-mail address link into some HTML, using the following syntax:</p>
		<blockquote><pre>&lt;? mailto('user@host.com', 'click here to e-mail me'); ?&gt;</pre></blockquote>
		<p>The second argument is optional.</p>
		<p>Here's the test:</p>
		<p>The administrator of this site is <? mailto($_SERVER[SERVER_ADMIN]); ?>.</p>
		<hr />
		<h2>2. smailto() test</h2>
		<p>the <tt>smailto()</tt> function returns a string containting an obfuscated HTML link to an e-mail address. This function is useful if you want to store or buffer the link for use later on. The syntax is:</p>
		<blockquote><pre>&lt;?php
	$link = smailto('user@host.com', 'click here to e-mail me');
	print $link;
?&gt;</pre></blockquote>
		<p>The second argument is optional.</p>
		<p>Here's the test:</p>
		<?php
			$string = smailto($_SERVER[SERVER_ADMIN], 'click here to e-mail the administrator.');
			print '<p>'.$string.'</p>';
		?>

		<address>
			--<br />
			Id: test.php,v 1.3 2002/05/29 10:00:09 jodrell Exp $
		</address>
	</body>
</html>
