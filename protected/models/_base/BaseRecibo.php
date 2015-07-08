<?php

/**
 * This is the model class for table "recibo".
 *
 * The followings are the available columns in table 'recibo':
 * @property integer $idRecibo
 * @property string $fechaEmision
 * @property string $fechaCobroCompleto
 * @property string $concepto
 * @property double $importePendiente
 * @property integer $mes
 * @property integer $ciclo
 * @property integer $idCuenta
 *
 * The followings are the available model relations:
 * @property ItemRecibo[] $itemRecibos
 * @property Pago[] $pagos
 * @property Cuenta $idCuenta0
 */
class BaseRecibo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'recibo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mes, ciclo, idCuenta', 'numerical', 'integerOnly'=>true),
			array('importePendiente', 'numerical'),
			array('concepto', 'length', 'max'=>50),
			array('fechaEmision, fechaCobroCompleto', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idRecibo, fechaEmision, fechaCobroCompleto, concepto, importePendiente, mes, ciclo, idCuenta', 'safe', 'on'=>'search'),
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
			'itemRecibos' => array(self::HAS_MANY, 'ItemRecibo', 'idRecibo'),
			'pagos' => array(self::HAS_MANY, 'Pago', 'idRecibo'),
			'idCuenta0' => array(self::BELONGS_TO, 'Cuenta', 'idCuenta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idRecibo' => 'Id Recibo',
			'fechaEmision' => 'Fecha Emision',
			'fechaCobroCompleto' => 'Fecha Cobro Completo',
			'concepto' => 'Concepto',
			'importePendiente' => 'Importe Pendiente',
			'mes' => 'Mes',
			'ciclo' => 'Ciclo',
			'idCuenta' => 'Id Cuenta',
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

		$criteria->compare('idRecibo',$this->idRecibo);
		$criteria->compare('fechaEmision',$this->fechaEmision,true);
		$criteria->compare('fechaCobroCompleto',$this->fechaCobroCompleto,true);
		$criteria->compare('concepto',$this->concepto,true);
		$criteria->compare('importePendiente',$this->importePendiente);
		$criteria->compare('mes',$this->mes);
		$criteria->compare('ciclo',$this->ciclo);
		$criteria->compare('idCuenta',$this->idCuenta);
                return
                $_SESSION['datos_filtrados'] = new CActiveDataProvider($this, array(
                        'criteria'=>$criteria,
                //        'sort'=>$sort,
                        'pagination'=>false,
                ));
                
		//return new CActiveDataProvider($this, array(
		//	'criteria'=>$criteria,
		//));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Recibo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
