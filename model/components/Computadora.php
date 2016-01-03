<?php
		
class Computadora extends Equipo {
	
	protected $tipo;
	protected $procesador;
	protected $cantMemoriaHhd;
	protected $criterio;
	
	public function __construct() {
		
	}
	
	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}
	
	public function getTipo() {
		return $this->tipo;
	}
	
	public function setProcesador($procesador) {
		$this->procesador = $procesador;
	}
	
	public function getProcesador() {
		return $this->procesador;
	}
	
	public function setCantMemoriaHhd($cant) {
		$this->cantMemoriaHhd = $cant;
	}
	
	public function getCantMemoriaHhd() {
		return $this->cantMemoriaHhd;
	}
	
	public function setCriterio($criterio) {
		$this->criterio = $criterio;
	}
	
	public function getCriterio() {
		return $this->criterio;
	}
	
}