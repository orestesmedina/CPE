<?php
class Proyector extends Equipo {
	protected $funcionalidad;
	
	public function __construct() {
	
	}
	
	public function setFuncionalidad($funcionalidad) {
		$this->funcionalidad = $funcionalidad;
	}
	
	public function getFuncionalidad() {
		return $this->funcionalidad;
	}
	
}