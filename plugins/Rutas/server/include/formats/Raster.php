<?php
	class Raster 
	{
		private $rgb;
		public function __construct() {
			$this->rgb = "110055";

		}

		public function update($params)
		{
			return array(
				'action'=>'update'
			);
		}

		public function getRGB()
		{
			return $this->rgb;
		}
	}
?>

