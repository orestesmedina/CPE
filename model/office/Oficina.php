<?php
class Oficina {
	
	protected $idOficina;
	protected $nombreOficina;
	protected $unidad;
	
	public function __construct(){
		
	}
	
	public function setIdOficina($id) {
		$this->idOficina = $id;
	}
	
	public function getIdOficina() {
		return $this->idOficina;
	}
	
	public function setNombreOficina($nombre) {
		$this->nombreOficina = $nombre;
	}
	
	public function getNombreOficina() {
		return $this->nombreOficina;
	}
	
	public function setUnidad($unidad) {
		$this->unidad = $unidad;
	}
	
	public function getUnidad() {
		return $this->unidad;
	}
	
	
}
