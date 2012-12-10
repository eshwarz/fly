<?php

class Code {
	public static function render() {
		$message = "
		<p class='fb'>
			Allowed Calls:
		</p>
		<code>
			<pre>render (array( 'controller' => 'xxxx', 'action' => 'xxx', 'locals' => array() ));</pre>
			<pre>render (array( 'view' => 'xxxx', 'locals' => array() ));</pre>
			<pre>render (array( 'partial' => 'xxxx', 'locals' => array() ));</pre>
		</code>
		";
		return $message;
	}
}

?>