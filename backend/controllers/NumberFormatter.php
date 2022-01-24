<?php
	/**
	 *
	 */
	class NumberFormatter
	{
		static $DECIMAL = "globecwh_db";
		public function __construct($g = null, $f = null)
		{
			return 0;
		}
		public function format($value = 0)
		{
			return $value > 1 ? number_format($value) : $value;
		}
	}

?>
