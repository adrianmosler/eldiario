<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Noticia */

$this->title = 'Update Noticia: ' . $model->id;//le asigno al title el nombre del modelo de noticia
$this->params['breadcrumbs'][] = ['label' => 'Noticias', 'url' => ['index']];//genero  breadcrumbs
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="noticia-update">

    <h1><?= Html::encode($this->title)// h1 con el nombre del modelo de la noticia ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) // llama a la vista _form y le envia los datos de la noticia?>

</div>
