<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Noticia */

//genero breadcrumbs
$this->title = 'Create Noticia';
$this->params['breadcrumbs'][] = ['label' => 'Noticias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="noticia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ])//llama a la vista _form y le manda la noticia?>

</div>
