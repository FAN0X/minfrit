<?php

class Consulta_registro{
	
	public $id;
	public $nombres;
	public $apellidos;
	public $cedula;
	public $telefono;
	public $email;
	public $conjunto;
	public $terminos;
	public $ip;
	public $clave_usuario;
	public $clave1_usuario;
	public $cantidadhab_conjunto;
	
	private $validation_error;
	
	public function __construct($nombres, $apellidos, $cedula, $telefono, $email, $conjunto, $terminos, $ip, $clave_usuario, $clave1_usuario,$cantidadhab_conjunto)
	{
		$this->nombres = $nombres ;
		$this->apellidos = $apellidos;
		$this->cedula = $cedula;
		$this->telefono = $telefono;
		$this->email = $email;
		$this->conjunto = $conjunto;
		$this->terminos = $terminos;
		$this->ip = $ip;
		$this->clave_usuario = $clave_usuario;
		$this->clave1_usuario = $clave1_usuario;
		$this->cantidadhab_conjunto = $cantidadhab_conjunto;
	}
	
	public function esValida()
	{
		if( $this->nombres == null || $this->nombres == FALSE ){
			$this->validation_error = "Nombre Incorrecto";
			return false;
		} else if(!$this->esNombreValido()){
			$this->validation_error = "El nombre debe tener entre 6 y 80 caracteres"; 
			return false;
		}
		if( $this->apellidos == null || $this->apellidos == FALSE ){
			$this->validation_error = "Apellido Incorrecto";
			return false;
		} else if(!$this->esNombreValido()){
			$this->validation_error = "El apellido debe tener entre 6 y 80 caracteres"; 
			return false;
		}
		if($this->cedula == null || $this->cedula == FALSE ){
			$this->validation_error = "Numero de cedula Incorrecto";
			return false;
		} else if(!$this->esCedulaValida()){
			$this->validation_error = "La cedula debe tener 10 numeros";
			return false;
		}
		
		if( $this->telefono == null || $this->telefono == FALSE ){
			$this->validation_error = "Telefono Incorrecto";
			return false;
		} else if(!$this->esTelefonoValido()){
			$this->validation_error = "El telefono debe tener como minimo 7 numeros y como maximo 15";
			return false;
		}
		
		if( $this->email == null || $this->email == FALSE ){
			$this->validation_error = "Email Incorrecto";
			return false;
		}
		
		if( $this->conjunto == null || $this->conjunto == FALSE ){
			$this->validation_error = "Ingrese el nombre del conjunto";
			return false;
		}
		
		if( $this->ip == null || $this->ip == FALSE ){
			$this->validation_error = "IP Incorrecto";
			return false;
		}
		if( $this->terminos == null || $this->terminos == 0 ){
			$this->validation_error = "NO SE ACEPTO LOS TERMINOS Y CONDICIONES";
			return false;
		}
		if( $this->clave_usuario != $this->clave1_usuario ){
			$this->validation_error = "LAS CONTRASEÑAS NO COINCIDEN";
			return false;
		}
		if( $this->cantidadhab_conjunto ==null || $this->cantidadhab_conjunto==0 ){
			$this->validation_error = "El número de unidades habitacionales debe ser mayor a cero";
			return false;
		}
		return true;
	}
	
	public function getValidationError()
	{
		return $this->validation_error;
	}
	
	private function esNombreValido()
	{
		$length = strlen($this->nombres);
		if($length < 6 || $length > 80 )
			return false;
		return true;
	}
	
	private function esCedulaValida()
	{
		if ( !preg_match('/^\d{10}$/', $this->cedula) )
			return false;
		return true;
	}
	
	private function esTelefonoValido()
	{
		$length = strlen($this->telefono);
		if($length < 7 || $length > 15 )
			return false;
		return true;
	}
}