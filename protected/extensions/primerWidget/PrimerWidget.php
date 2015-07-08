<?php
class PrimerWidget extends CWidget {
    
    public $mensaje = 'test';
    
    public function run(){
        $this->render('index', array('mensaje'=>$this->mensaje));
    }
  
    public function init(){
        $direccion=dirname(__FILE__)."/assets";
        
        // Publica en assets y genera directorio aleatorio -1 nivel de publicacion todo!, true:force copy
        $publica=Yii::app()->assetManager->publish($direccion, false, -1, true);
        
        // Incorpora y aplica el archivo a la vista
        Yii::app()->getClientScript()->registerCSSFile($publica."/estilo.css");
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

