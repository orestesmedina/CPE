<?php
class Impresora extends Equipo {
	
	protected $tipo;
	protected $consumible;
	
	public function __construct() {
		
	}
	
	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}
	
	public function getTipo() {
		return $this->tipo;
	}
	
	public function setConsumible($consumible) {
		$this->consumible = $consumible;
	}
	
	public function getConsumible() {
		return $this->consumible;
	}
	
}