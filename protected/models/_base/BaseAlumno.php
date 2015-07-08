<?php

/**
 * This is the model class for table "alumno".
 *
 * The followings are the available columns in table 'alumno':
 * @property integer $idAlumno
 * @property integer $idPersona
 * @property string $legajo
 * @property integer $lua
 * @property integer $idPadre
 * @property integer $idMadre
 * @property integer $idTutor
 * @property integer $idCliente
 * @property string $nombreCompleto
 *
 * The followings are the available model relations:
 * @property Cliente $idCliente0
 * @property Persona $idPersona0
 * @property Persona $idPadre0
 * @property Persona $idMadre0
 * @property Persona $idTutor0
 * @property Matricula[] $matriculas
 */
class BaseAlumno extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'alumno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idPersona, lua, idPadre, idMadre, idTutor, idCliente', 'numerical', 'integerOnly'=>true),
			array('legajo', 'length', 'max'=>20),
			array('nombreCompleto', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idAlumno, idPersona, legajo, lua, idPadre, idMadre, idTutor, idCliente, nombreCompleto', 'safe', 'on'=>'search'),
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
			'idCliente0' => array(self::BELONGS_TO, 'Cliente', 'idCliente'),
			'idPersona0' => array(self::BELONGS_TO, 'Persona', 'idPersona'),
			'idPadre0' => array(self::BELONGS_TO, 'Persona', 'idPadre'),
			'idMadre0' => array(self::BELONGS_TO, 'Persona', 'idMadre'),
			'idTutor0' => array(self::BELONGS_TO, 'Persona', 'idTutor'),
			'matriculas' => array(self::HAS_MANY, 'Matricula', 'idAlumno'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idAlumno' => 'Id Alumno',
			'idPersona' => 'Id Persona',
			'legajo' => 'Legajo',
			'lua' => 'Lua',
			'idPadre' => 'Id Padre',
			'idMadre' => 'Id Madre',
			'idTutor' => 'Id Tutor',
			'idCliente' => 'Id Cliente',
			'nombreCompleto' => 'Nombre Completo',
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

		$criteria->compare('idAlumno',$this->idAlumno);
		$criteria->compare('idPersona',$this->idPersona);
		$criteria->compare('legajo',$this->legajo,true);
		$criteria->compare('lua',$this->lua);
		$criteria->compare('idPadre',$this->idPadre);
		$criteria->compare('idMadre',$this->idMadre);
		$criteria->compare('idTutor',$this->idTutor);
		$criteria->compare('idCliente',$this->idCliente);
		$criteria->compare('nombreCompleto',$this->nombreCompleto,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BaseAlumno the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
