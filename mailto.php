<?php
	//	mailto.php version 1.2.0 Gavin Brown (gavin.brown@uk.com)
	//	Future releases will be at http://jodrell.net/

	//	This program is free software; you can redistribute it and/or modify
	//	it under the terms of the GNU General Public License as published by
	//	the Free Software Foundation; either version 2 of the License, or
	//	(at your option) any later version.
	//
	//	This program is distributed in the hope that it will be useful,
	//	but WITHOUT ANY WARRANTY; without even the implied warranty of
	//	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	//	GNU General Public License for more details.

	//	this  library provides  a way of putting mailto:  links in  HTML
	//	pages  without  exposing your e-mail  address to spammers.  When
	//	called,  it  prints  some  JavaScript  which  prints  some  more
	//	JavaScript  that prints some HTML containing the  mailto:  link.
	//	This  means that e-mail  harvesters won't be able to pick it up,
	//	unless they were actually looking for code of this kind.
	//
	//	This uses some ideas from Paul Gregg's website, but I had been
	//	working on it before I knew Paul had actually implemented it.
	//	Visit www.pgregg.com for more information.
	//
	//	$Id: mailto.php,v 1.6 2002-05-29 10:00:09 jodrell Exp $

	// function to URI encode a string of ASCII text:
	function uri_escape($str) {
		for ($i = 0; $i < strlen($str); $i++) {
			// you could use unpack() here as well:
			$escaped .= '%' . dechex(ord(substr($str, $i, 1)));
		}
		return $escaped;
	}

	function mailto() {
		if (func_num_args() == 2) {
			list($email, $string) = func_get_args();
		} elseif (func_num_args() == 1) {
			list($email, $string) = array(func_get_arg(0), '');
		} else {
			return false;
		}
		print smailto($email, $string);
	}

	function smailto() {
		if (func_num_args() == 2) {
			list($email, $string) = func_get_args();
		} elseif (func_num_args() == 1) {
			list($email, $string) = array(func_get_arg(0), '');
		} else {
			return false;
		}

		// if the string is empty, use the e-mail address:
		if ($string == '') {
			$string = $email;
		}

		// the JavaScript code to print the HTML:
		// (putting newlines into $code seems to mess up the encoding, so don't)
		$enc_email = uri_escape($email);
		$enc_str   = uri_escape($string);
		$code =	"var addr = '$enc_email';" .
			"var string = '$enc_str';" .
			"document.write('<a href=\"mailto:' + unescape(addr) + '\">' + unescape(string) + '</a>');";

		// encode the JavaScript code:
		$encoded = uri_escape($code);

		// generate stuff to go inside <noscript></noscript> tags:
		if ($string == $email) {
			$noscript = "(e-mail address hidden)";
		} else {
			$noscript = $string;
		}

		// print the JavaScript which prints the JavaScript which prints the HTML:
		return	"<script language=\"JavaScript\" type=\"text/javascript\">\n" .
			"	eval(unescape('$encoded'));\n" .
			"</script>\n" .
			"<noscript>\n" .
			"	$noscript\n" .
			"</noscript>\n";

		return true;
	}
?>
