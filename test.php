<?require('mailto.php')?>
<?ob_start('ob_mailto')?>
<html>
	<head>
		<title>mailto.php test page</title>
		<style type="text/css">
			noscript {
				display: inline;
			}
		</style>
		<script language="JavaScript">
			/*
				this bit of code works around a bug in Mozilla. <noscript> tags should be
				inline, but Mozilla renders them as blocks. So we explicity set the display
				attribute in the CSS above, and then use JavaScript to correct it. When JavaScript
				is turned off, the <noscript> tags render correctly, and when it's turned on they're
				invisible.
			*/
			document.write('<style type="text/css">noscript { display: none; }</style>');
		</script>
	</head>
	<body>

		<h1>mailto.php test page</h1>

		<p>This is the test page for mailto.php.</p>
		<hr />

		<h2>1. mailto() test:</h2>
		<p>You can use the <tt>mailto()</tt> function to directly embed an obfuscated e-mail address link into some HTML, using the following syntax:</p>

		<blockquote><pre>&lt;?mailto('user@host.com', 'click here to e-mail me')?&gt;</pre></blockquote>

		<p>The second argument is optional.</p>
		<p>Here's the test:</p>

		<blockquote>The administrator of this site is <?mailto($_SERVER[SERVER_ADMIN])?>.</blockquote>

		<hr />

		<h2>2. smailto() test</h2>

		<p>the <tt>smailto()</tt> function returns a string containting an obfuscated HTML link to an e-mail address. This function is useful if you want to store or buffer the link for use later on. The syntax is:</p>

		<blockquote><pre>&lt;?php
	$link = smailto('user@host.com', 'click here to e-mail me');
	print $link;
?&gt;</pre></blockquote>

		<p>The second argument is optional.</p>
		<p>Here's the test:</p>

		<blockquote><?php
			$string = smailto($_SERVER[SERVER_ADMIN]);
			print '<p>The administrator of this site is '.$string.'</p>';
		?></blockquote>

		<hr />

		<h2>3. mailto_text() test</h2>

		<p>When supplied a string, <tt>mailto_text()</tt> will attempt to replace any e-mail addresses it finds with obfuscated links.</p>

		<blockquote><pre>&lt;php
	$string = "&lt;p&gt;Here is some text with an e-mail address (user@host.com) in it.&lt;/p&gt;";
	print mailto_text($string);
?&gt;</pre></blockquote>

		<p>This produces:</p>

		<blockquote><?php
			$string = "<p>Here is some text with an e-mail address ($_SERVER[SERVER_ADMIN]) in it.</p>";
			print mailto_text($string);
		?></blockquote>

		<hr />

		<h2>3. mailto_html() test</h2>

		<p>When supplied a string, <tt>mailto_html()</tt> will attempt to replace any mailto: links it finds with obfuscated links.</p>

		<blockquote><pre>&lt;php
	$string = "&lt;p&gt;Here is some HTML with an &lt;a href="mailto:user@host.com"&gt;e-mail address&lt;/a&gt; in it.&lt;/p&gt;";
	print mailto_text($string);
?&gt;</pre></blockquote>

		<p>This produces:</p>

		<blockquote><?php
			$string = "<p>Here is some HTML with an <a href=\"mailto:$_SERVER[SERVER_ADMIN]\">e-mail address</a> in it.</p></p>";
			print mailto_html($string);
		?></blockquote>

		<h2>3. ob_mailto() test</h2>
			
		<p><tt>ob_mailto()</tt> is a custom output buffer handler. It means that you can write plain HTML with all your mailto: links as they are, and ob_mailto() will automagically obfuscate them for you.</p>

		<blockquote><pre>&lt;php
	ob_start('ob_mailto');

	print "&lt;p&gt;Here is some HTML with an &lt;a href="mailto:user@host.com"&gt;e-mail address&lt;/a&gt; in it.&lt;/p&gt;";
?&gt;</blockquote></pre>

		<p>This produces:</p>

		<blockquote><?php
			ob_start('ob_mailto');
			print "<p>Here is some HTML with an <a href=\"mailto:$_SERVER[SERVER_ADMIN]\">e-mail address</a> in it.</p></p>";
		?></blockquote>

		<hr />
		<address>
			--<br />
			Id: test.php,v 1.3 2002/05/29 10:00:09 jodrell Exp $
		</address>
	</body>
</html>
