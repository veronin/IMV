<?php

class Alumno extends BaseAlumno
{
        /**
     * @var string Alumno legajo
     * @soap
     */
    public $legajo;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
}
