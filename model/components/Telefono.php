<?php
class Telefono extends Equipo {
	
	protected $extension;
	
	public function __construct() {
	
	}
	
	public function setExtension($extension) {
		$this->extension = $extension;
	}
	
	public function getExtension() {
		return $this->extension;
	}
	
}
