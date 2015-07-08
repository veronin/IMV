<?php

class Persona extends BasePersona
{
	public function getFullName()
        {
                return $this->apellido . " " . $this->nombre;
        }
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function getXfechaNac() {
            if(!empty($this->fechaNac)&& CDateTimeParser::parse($this->fechaNac, 'yyyy-MM-dd')){
            $nacimiento = yii::app()->format->date(strtotime($this->fechaNac));
            return $nacimiento;            
        }else return $this->fechaNac;
        }
        
        public function setXfechaNac($value) {
             if(!empty($value)&& CDateTimeParser::parse($value, yii::app()->locale->dateFormat)){   
             $this->fechaNac = date('Y-m-d',CDateTimeParser::parse($value, yii::app()->locale->dateFormat));
             
             }else { $this->fechaNac = $value;}
        }
        
        public function rules()
	{
		return CMap::mergeArray(parent::rules(), array(
			array('fechaNac', 'date', 'format' => 'yyyy-MM-dd'),
                        array('xfechaNac', 'safe'),
                    ));
        } 
        public function search()
	{
            $tmpFechaNac=$this->xfechaNac;
            $this->fechaNac='';
            $provider=parent::search();
            
                $this->fechaNac=$tmpFechaNac;   
	
                $criteria=new CDbCriteria;
                
                if (!empty($this->fechaNac))
                {
                    $criteria->compare('fechaNac', date('Y-m-d', CDateTimeParser::parse($this->fechaNac, yii::app()->locale->dateFormat)));
                }
                $provider->getCriteria()->mergeWith($criteria);
                
            return $provider;
        }
        
}
