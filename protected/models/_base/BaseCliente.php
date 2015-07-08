<?php

/**
 * This is the model class for table "cliente".
 *
 * The followings are the available columns in table 'cliente':
 * @property integer $idCliente
 * @property integer $idPersona
 * @property string $nombreCompleto
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property Alumno[] $alumnos
 * @property Persona $idPersona0
 * @property Cuenta[] $cuentas
 */
class BaseCliente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cliente';
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
			array('nombreCompleto', 'length', 'max'=>100),
			array('descripcion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCliente, idPersona, nombreCompleto, descripcion', 'safe', 'on'=>'search'),
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
			'alumnos' => array(self::HAS_MANY, 'Alumno', 'idCliente'),
			'idPersona0' => array(self::BELONGS_TO, 'Persona', 'idPersona'),
			'cuentas' => array(self::HAS_MANY, 'Cuenta', 'idCliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCliente' => 'Id Cliente',
			'idPersona' => 'Id Persona',
			'nombreCompleto' => 'Nombre Completo',
			'descripcion' => 'Descripcion',
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

		$criteria->compare('idCliente',$this->idCliente);
		$criteria->compare('idPersona',$this->idPersona);
		$criteria->compare('nombreCompleto',$this->nombreCompleto,true);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cliente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
