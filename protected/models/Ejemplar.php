<?php

/**
 * This is the model class for table "ejemplar".
 *
 * The followings are the available columns in table 'ejemplar':
 * @property integer $id
 * @property integer $disponibilidad
 * @property integer $idestado
 * @property integer $idbiblioteca
 * @property integer $idlibro
 *
 * The followings are the available model relations:
 * @property Estadoejemplar $idestado0
 * @property Biblioteca $idbiblioteca0
 * @property Libro $idlibro0
 * @property Prestamo[] $prestamos
 */
class Ejemplar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ejemplar the static model class
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
		return 'ejemplar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('disponibilidad, idestado, idbiblioteca, idlibro', 'required'),
			array('disponibilidad, idestado, idbiblioteca, idlibro', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, disponibilidad, idestado, idbiblioteca, idlibro', 'safe', 'on'=>'search'),
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
			'idestado0' => array(self::BELONGS_TO, 'Estadoejemplar', 'idestado'),
			'idbiblioteca0' => array(self::BELONGS_TO, 'Biblioteca', 'idbiblioteca'),
			'idlibro0' => array(self::BELONGS_TO, 'Libro', 'idlibro'),
			'prestamos' => array(self::HAS_MANY, 'Prestamo', 'idejemplar'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'disponibilidad' => 'Disponibilidad',
			'idestado' => 'Estado',
			'idbiblioteca' => 'Biblioteca',
			'idlibro' => 'Libro',
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
		$criteria->compare('disponibilidad',$this->disponibilidad);
		$criteria->compare('idestado',$this->idestado);
		$criteria->compare('idbiblioteca',$this->idbiblioteca);
		$criteria->compare('idlibro',$this->idlibro);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}