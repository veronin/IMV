<?php

class NuevoController extends CController
{
    public function actions()
    {
        return array(
            'ws'=>array(
                'class'=>'CWebServiceAction',
            ),
        );
    }
 
    /**
     * @return Alumno
     * @soap
     */
    public function holaServicio()
    {
        $al = new Alumno();
        return $al;
        //return "Hola";
    }
}



