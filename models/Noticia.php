<?php

namespace app\models;

use Yii;

/**
 * Este es el modelo de la clase para la tabla "noticia".
 *
 * @property integer $id
 * @property string $Titulo
 * @property string $Copete
 * @property string $Nota
 *
 * @property Comentario[] $comentarios
 */
class Noticia extends \yii\db\ActiveRecord // ActiveRecord me permite generar el ORM
{
    /**
     * @inheritdoc
     */
    public static function tableName()//retorna el nombre de la tabla
    {
        return 'noticia';
    }

    /**
     * @inheritdoc
     */
    public function rules()//caracteristicas que tienen los atributos de la clase Noticia,puedo agregar mas caracteristicas manualmente
    {
        return [
            [['Titulo', 'Copete', 'Nota'], 'required'],
            [['Nota'], 'string'],
            [['Titulo'], 'string', 'max' => 255],
            [['Copete'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()// renombro los atributos por nombres personalizados
    {
        return [
            'id' => 'ID',
            'Titulo' => 'Titulo',
            'Copete' => 'Copete',
            'Nota' => 'Nota',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentario::className(), ['idNoticia' => 'id']);//recupera todos los comentarios relacionados con la noticia
    }


}
