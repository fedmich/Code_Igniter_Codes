<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
v0.1
Author : Fedmich
*/

class csv_tools {
	function download( $query, $filename = 'csv_download' , $fields = FALSE ) {		
		if (!$fields) {
			$fields = $query->list_fields();
		}
		
		if ($query->num_rows() == 0) {
			$content = 'NO DATA';
		} else {
			$headers = join(',', $fields );
			
			$data = '';
			foreach ($query->result() as $row) {
				$vals = array();
				foreach($row as $value) {
					if ((!isset($value)) OR ($value == "")) {
						$value = "";
					} else {
						$value = '"' . str_replace('"', '""', $value) . '"';
					}
					$vals[] = $value;
				}
				$data .= implode(',', $vals ) . "\n";
			}
			$data = utf8_decode( $data );
			$data = str_replace("\r","",$data);
			$content = "$headers\n$data";
		}
		
		//Send header to force browser to download the file
		header("Content-type: application/ms-excel");
		header("Content-Disposition: attachment; filename=\"$filename\"");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
		header("Pragma: public");

		echo $content;
	}
}