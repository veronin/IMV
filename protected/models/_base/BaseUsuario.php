<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $idUsuario
 * @property string $nombre
 * @property string $clave
 * @property string $legajo
 * @property string $area
 * @property string $ocupacion
 * @property integer $idPersona
 *
 * The followings are the available model relations:
 * @property PermisoUsuario[] $permisoUsuarios
 * @property Persona $idPersona0
 */
class BaseUsuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idPersona', 'numerical', 'integerOnly'=>true),
			array('nombre, clave, legajo', 'length', 'max'=>20),
			array('area, ocupacion', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idUsuario, nombre, clave, legajo, area, ocupacion, idPersona', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'permisoUsuarios' => array(self::HAS_MANY, 'PermisoUsuario', 'idUsuario'),
			'idPersona0' => array(self::BELONGS_TO, 'Persona', 'idPersona'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idUsuario' => 'Id Usuario',
			'nombre' => 'Nombre',
			'clave' => 'Clave',
			'legajo' => 'Legajo',
			'area' => 'Area',
			'ocupacion' => 'Ocupacion',
			'idPersona' => 'Id Persona',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idUsuario',$this->idUsuario);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('clave',$this->clave,true);
		$criteria->compare('legajo',$this->legajo,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('ocupacion',$this->ocupacion,true);
		$criteria->compare('idPersona',$this->idPersona);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BaseUsuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
