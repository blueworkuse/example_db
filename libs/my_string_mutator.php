<?php

	class my_string_mutator {

		// 截取字串：從開始位置到結整位置，最後加上...
		function trim($string, $start = 0, $limit = 130, $append = '...') {
			return mb_substr($string, $start, $limit, 'utf-8').$append;
		}


		// 載取日期字串：將 YYYY-MM-DD HH:MM:SS 取成 YYYY-MM-DD
		function trim_created_at($date) {
			$my_date_mutator = new my_date_mutator();
			return $my_date_mutator->convert($date);
		}
	}

?>