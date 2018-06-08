<?php

	class my_date_mutator {

		// 載取日期字串：將 YYYY-MM-DD HH:MM:SS 取成 YYYY-MM-DD
		function convert($date) {
			return explode(' ',$date)[0];
		}

	}

?>