<!-- $Id: test.php,v 1.1.1.1 2002-02-11 13:27:26 jodrell Exp $ -->
<?php include('mailto.php'); ?>
<html>
	<head>
		<title>mailto.php test page</title.
	</head>
	<body>
		<h1>mailto.php test page</h1>
		<p>This is the test page for mailto.php.</p>
		<p>Here's the test:</p>
		<p>The administrator of this site is <? mailto(getenv('SERVER_ADMIN')); ?>.</p>
	</body>
</html>