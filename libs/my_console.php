<?php

	class my_console {

		// 在瀏覽器上面 debug
		function log($data) {
			$output = $data;
			if ( is_array( $output ) )
				$output = implode( ',', $output);

			echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
		}

	}
?>