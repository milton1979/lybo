<?php

/**
 * This is the model class for table "ciudad".
 *
 * The followings are the available columns in table 'ciudad':
 * @property integer $id
 * @property string $nombre
 * @property integer $idprovincia
 *
 * The followings are the available model relations:
 * @property Biblioteca[] $bibliotecas
 * @property Provincia $idprovincia0
 * @property Usuario[] $usuarios
 */
class Ciudad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ciudad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ciudad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, idprovincia', 'required'),
			array('idprovincia', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, idprovincia', 'safe', 'on'=>'search'),
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
			'bibliotecas' => array(self::HAS_MANY, 'Biblioteca', 'idciudad'),
			'idprovincia0' => array(self::BELONGS_TO, 'Provincia', 'idprovincia'),
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'idciudad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'idprovincia' => 'Idprovincia',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('idprovincia',$this->idprovincia);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}