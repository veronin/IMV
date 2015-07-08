<?php

class Usuario extends BaseUsuario
{
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        /* Validacion de clave chequeando la base */
        
        public function validatePassword($password)
        {
                return CPasswordHelper::verifyPassword($password,$this->clave);
        }
        
        public function hashPassword($password)
        {
                return CPasswordHelper::hashPassword($password);
        }
        
        public function getApellido()
        {
           $apellido = $this->idPersona->apellido;
           return $apellido;
        }
       
        public function getCantidadPermisos()
        {
           return count($this->permisoUsuario);
        }
}
