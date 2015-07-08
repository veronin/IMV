<?php

/**
 * This is the model class for table "medioPago".
 *
 * The followings are the available columns in table 'medioPago':
 * @property integer $idMedioPago
 * @property integer $idTipoMedio
 * @property string $titular
 * @property string $direccion
 * @property string $entidad
 * @property string $sucursal
 * @property string $cuenta
 *
 * The followings are the available model relations:
 * @property TipoMedio $idTipoMedio0
 * @property Pago[] $pagos
 */
class BaseMedioPago extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'medioPago';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idTipoMedio', 'numerical', 'integerOnly'=>true),
			array('titular, direccion', 'length', 'max'=>100),
			array('entidad, sucursal, cuenta', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idMedioPago, idTipoMedio, titular, direccion, entidad, sucursal, cuenta', 'safe', 'on'=>'search'),
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
			'idTipoMedio0' => array(self::BELONGS_TO, 'TipoMedio', 'idTipoMedio'),
			'pagos' => array(self::HAS_MANY, 'Pago', 'idMedioPago'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idMedioPago' => 'Id Medio Pago',
			'idTipoMedio' => 'Id Tipo Medio',
			'titular' => 'Titular',
			'direccion' => 'Direccion',
			'entidad' => 'Entidad',
			'sucursal' => 'Sucursal',
			'cuenta' => 'Cuenta',
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

		$criteria->compare('idMedioPago',$this->idMedioPago);
		$criteria->compare('idTipoMedio',$this->idTipoMedio);
		$criteria->compare('titular',$this->titular,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('entidad',$this->entidad,true);
		$criteria->compare('sucursal',$this->sucursal,true);
		$criteria->compare('cuenta',$this->cuenta,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MedioPago the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
