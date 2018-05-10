<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inmuebles".
 *
 * @property int $id
 * @property string $precio
 * @property string $num_hab
 * @property string $num_banos
 * @property bool $lavavajillas
 * @property bool $garaje
 * @property bool $trastero
 * @property int $propietario_id
 *
 * @property Propietarios $propietario
 */
class Inmuebles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inmuebles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['precio', 'num_hab', 'num_banos', 'lavavajillas', 'garaje', 'trastero', 'propietario_id'], 'required'],
            [['precio', 'num_hab', 'num_banos'], 'number'],
            [['lavavajillas', 'garaje', 'trastero'], 'boolean'],
            [['propietario_id'], 'default', 'value' => null],
            [['propietario_id'], 'integer'],
            [['propietario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Propietarios::className(), 'targetAttribute' => ['propietario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'precio' => 'Precio',
            'num_hab' => 'Num Hab',
            'num_banos' => 'Num Banos',
            'lavavajillas' => 'Lavavajillas',
            'garaje' => 'Garaje',
            'trastero' => 'Trastero',
            'propietario_id' => 'Propietario ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropietario()
    {
        return $this->hasOne(Propietarios::className(), ['id' => 'propietario_id'])->inverseOf('inmuebles');
    }
}
