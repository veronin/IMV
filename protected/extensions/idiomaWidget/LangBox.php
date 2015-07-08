<?php

class LangBox extends CWidget
{
    public function run()
    {
        $currentLang = Yii::app()->language;
        $this->render('index', array('currentLang' => $currentLang));
    }
    public function init(){
        $direccion=dirname(__FILE__)."/assets";
        
        // Publica en assets y genera directorio aleatorio -1 nivel de publicacion todo!, true:force copy
        $publica=Yii::app()->assetManager->publish($direccion, false, -1, true);
        
        // Incorpora y aplica el archivo a la vista
        Yii::app()->getClientScript()->registerCSSFile($publica."/estilo.css");
    }
    
    
}
?>
