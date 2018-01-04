<?php

namespace Styde;

if(! function_exists('show'))
{
	function show($message)
	{
		echo "<p>$message</p>";
	}
}