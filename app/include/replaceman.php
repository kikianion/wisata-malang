<?

class replaceman {
	
	$fileContents = '';
	
	public function replaceman($fileName) {
		
		if (trim($fileName) == '' || !is_file($fileName) ) {
			trigger_error("Invalid filename or no access to read file: ".$fileName, E_USER_ERROR);
		}
		else {
			$this->fileContents = file_get_contents($fileName);
		}
	}
	

	public function tag($tagname, $value) {
		
			$this->fileContents = str_replace("{".strtolower($tagname)."}", $value, $this->fileContents);
		
	}
	
	
	
	public function write() {
		return $this->fileContents;
	}
}
?>
