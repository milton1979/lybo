<?php

/**
 * This is the model class for table "libro".
 *
 * The followings are the available columns in table 'libro':
 * @property integer $id
 * @property string $nombre
 * @property integer $idautor
 * @property integer $ideditorial
 * @property integer $idedicion
 * @property integer $idgenero
 * @property string $resumen
 * @property string $codigo
 *
 * The followings are the available model relations:
 * @property Ejemplar[] $ejemplars
 * @property Autor $idautor0
 * @property Editorial $ideditorial0
 * @property Edicion $idedicion0
 * @property Genero $idgenero0
 */
class Libro extends CActiveRecord
{
    
    public $autor;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Libro the static model class
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
		return 'libro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, idautor, ideditorial, idedicion, idgenero, resumen, codigo', 'required'),
			array('idautor, ideditorial, idedicion, idgenero', 'numerical', 'integerOnly'=>true),
			array('nombre, codigo', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, idautor, ideditorial, idedicion, idgenero, resumen, codigo, autor', 'safe', 'on'=>'search'),
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
			'ejemplars' => array(self::HAS_MANY, 'Ejemplar', 'idlibro'),
			'idautor0' => array(self::BELONGS_TO, 'Autor', 'idautor'),
			'ideditorial0' => array(self::BELONGS_TO, 'Editorial', 'ideditorial'),
			'idedicion0' => array(self::BELONGS_TO, 'Edicion', 'idedicion'),
			'idgenero0' => array(self::BELONGS_TO, 'Genero', 'idgenero'),
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
			'idautor' => 'Autor',
			'ideditorial' => 'Editorial',
			'idedicion' => 'Edicion',
			'idgenero' => 'Genero',
			'resumen' => 'Resumen',
			'codigo' => 'Codigo',
                        'autor'=> 'Autor',
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
                $criteria->with = array('idautor0');

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('idautor',$this->idautor);
		$criteria->compare('ideditorial',$this->ideditorial);
		$criteria->compare('idedicion',$this->idedicion);
		$criteria->compare('idgenero',$this->idgenero);
		$criteria->compare('resumen',$this->resumen,true);
		$criteria->compare('codigo',$this->codigo,true);
                $criteria->compare('idautor0.nombreyapellido',$this->autor,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort' => array(
                            'attributes' => array(
                                'autor' => array(
                                    'asc' => 'idautor0.nombreyapellido ASC',
                                    'desc' => 'idautor0.nombreyapellido DESC',
                                 ),
                                '*'
                            )
                        ),
		));
	}
}