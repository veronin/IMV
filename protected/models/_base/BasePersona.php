<?php

/**
 * This is the model class for table "persona".
 *
 * The followings are the available columns in table 'persona':
 * @property integer $idPersona
 * @property string $dni
 * @property string $cuil
 * @property string $nombre
 * @property string $apellido
 * @property string $sexo
 * @property string $lugarNac
 * @property string $fechaNac
 * @property string $grupoSang
 * @property string $dirCalle
 * @property integer $dirNro
 * @property integer $idLocalidad
 * @property string $telefono
 * @property string $celular
 * @property string $email
 * @property string $profesion
 *
 * The followings are the available model relations:
 * @property Alumno[] $alumnos
 * @property Alumno[] $alumnos1
 * @property Alumno[] $alumnos2
 * @property Alumno[] $alumnos3
 * @property Cliente[] $clientes
 * @property Localidad $idLocalidad0
 * @property Usuario[] $usuarios
 */
class BasePersona extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'persona';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dirNro, idLocalidad', 'numerical', 'integerOnly'=>true),
			array('dni, cuil', 'length', 'max'=>20),
			array('nombre, apellido, lugarNac, dirCalle, telefono, celular, profesion', 'length', 'max'=>45),
			array('sexo', 'length', 'max'=>1),
			array('grupoSang', 'length', 'max'=>4),
			array('email', 'length', 'max'=>100),
			array('fechaNac', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPersona, dni, cuil, nombre, apellido, sexo, lugarNac, fechaNac, grupoSang, dirCalle, dirNro, idLocalidad, telefono, celular, email, profesion', 'safe', 'on'=>'search'),
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
			'alumnos' => array(self::HAS_MANY, 'Alumno', 'idPersona'),
			'alumnos1' => array(self::HAS_MANY, 'Alumno', 'idPadre'),
			'alumnos2' => array(self::HAS_MANY, 'Alumno', 'idMadre'),
			'alumnos3' => array(self::HAS_MANY, 'Alumno', 'idTutor'),
			'clientes' => array(self::HAS_MANY, 'Cliente', 'idPersona'),
			'idLocalidad0' => array(self::BELONGS_TO, 'Localidad', 'idLocalidad'),
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'idPersona'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPersona' => 'Id Persona',
			'dni' => 'Dni',
			'cuil' => 'Cuil',
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',
			'sexo' => 'Sexo',
			'lugarNac' => 'Lugar Nac',
			'fechaNac' => 'Fecha Nac',
			'grupoSang' => 'Grupo Sang',
			'dirCalle' => 'Dir Calle',
			'dirNro' => 'Dir Nro',
			'idLocalidad' => 'Id Localidad',
			'telefono' => 'Telefono',
			'celular' => 'Celular',
			'email' => 'Email',
			'profesion' => 'Profesion',
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

		$criteria->compare('idPersona',$this->idPersona);
		$criteria->compare('dni',$this->dni,true);
		$criteria->compare('cuil',$this->cuil,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('lugarNac',$this->lugarNac,true);
		$criteria->compare('fechaNac',$this->fechaNac,true);
		$criteria->compare('grupoSang',$this->grupoSang,true);
		$criteria->compare('dirCalle',$this->dirCalle,true);
		$criteria->compare('dirNro',$this->dirNro);
		$criteria->compare('idLocalidad',$this->idLocalidad);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('profesion',$this->profesion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BasePersona the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
