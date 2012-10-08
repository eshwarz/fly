<?php

class Code {
	public static function render() {
		$message = "
		<p class='fb'>
			Allowed Calls:
		</p>
		<code>
			<pre>View::render( array( 'controller' => 'xxxx', 'action' => 'xxx', 'locals' => array() ) )</pre>
			<pre>View::render( array( 'view' => 'xxxx', 'locals' => array() ) )</pre>
			<pre>View::render( array( 'partial' => 'xxxx', 'locals' => array() ) )</pre>
		</code>
		";
		return $message;
	}
}

?>