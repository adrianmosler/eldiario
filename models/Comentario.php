<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comentario".
 *
 * @property integer $idComentario
 * @property integer $idNoticia
 * @property string $Fecha
 * @property string $Comentario
 *
 * @property Noticia $idNoticia0
 */
class Comentario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comentario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNoticia', 'Fecha', 'Comentario'], 'required'],
            [['idNoticia'], 'integer'],
            [['Fecha'], 'safe'],
            [['Comentario'], 'string', 'max' => 5000],
            [['idNoticia'], 'exist', 'skipOnError' => true, 'targetClass' => Noticia::className(), 'targetAttribute' => ['idNoticia' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idComentario' => 'Id Comentario',
            'idNoticia' => 'Id Noticia',
            'Fecha' => 'Fecha',
            'Comentario' => 'Comentario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNoticia0()
    {
        return $this->hasOne(Noticia::className(), ['id' => 'idNoticia']);
    }

    public static function comentariosHoy(){
      $hoy=date("Y-m-d");
      $comentarios=Comentario::find()
      ->where(['Fecha' => $hoy])//hasta aca es una query
      ->all();//para pasar a arreglo
     return $comentarios;
    }
}
