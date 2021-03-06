<?php

/**
 * This is the model class for table "socio".
 *
 * The followings are the available columns in table 'socio':
 * @property integer $idsocio
 * @property integer $idbiblioteca
 * @property integer $idusuario
 *
 * The followings are the available model relations:
 * @property Prestamo[] $prestamos
 * @property Biblioteca $idbiblioteca0
 * @property Usuario $idusuario0
 */
class Socio extends CActiveRecord {

    public $dni;
    public $nombre;
    public $apellido;
    public $biblioteca;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Socio the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'socio';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idbiblioteca, idusuario', 'required'),
            array('idbiblioteca, idusuario', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('idsocio, idbiblioteca, idusuario, dni, nombre, apellido, biblioteca', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'prestamos' => array(self::HAS_MANY, 'Prestamo', 'idsocio'),
            'idbiblioteca0' => array(self::BELONGS_TO, 'Biblioteca', 'idbiblioteca'),
            'idusuario0' => array(self::BELONGS_TO, 'Usuario', 'idusuario'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idsocio' => 'Idsocio',
            'idbiblioteca' => 'Biblioteca',
            'idusuario' => 'Usuario',
            'dni' => 'DNI',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'bibliotceca' => 'Biblioteca',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->with = array('idusuario0', 'idbiblioteca0');

        $criteria->compare('idsocio', $this->idsocio);
        $criteria->compare('idbiblioteca', $this->idbiblioteca);
        $criteria->compare('idusuario0.dni', $this->dni, true);
        $criteria->compare('idusuario0.nombre', $this->nombre, true);
        $criteria->compare('idusuario0.apellido', $this->apellido, true);
        $criteria->compare('idbiblioteca0.nombre', $this->biblioteca, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'sort' => array(
                        'attributes' => array(
                            'dni' => array(
                                'asc' => 'idusuario0.dni ASC',
                                'desc' => 'idusuario0.dni DESC',
                            ),
                            'nombre' => array(
                                'asc' => 'idusuario0.nombre ASC',
                                'desc' => 'idusuario0.nombre DESC',
                            ),
                            'apellido' => array(
                                'asc' => 'idusuario0.apellido ASC',
                                'desc' => 'idusuario0.apellido DESC',
                            ),
                            'biblioteca' => array(
                                'asc' => 'idbiblioteca0.nombre ASC',
                                'desc' => 'idbiblioteca0.nombre DESC',
                            ),
                            '*',
                        ),
                    //'defaultOrder'=>'status, update_time DESC',
                    ),
                ));
    }

}