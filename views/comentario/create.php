<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Comentario */

$this->title = 'Agregar Comentario';
$this->params['breadcrumbs'][] = ['label' => 'Comentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="comentario-create">

    <h1><?= Html::encode($this->title) ?></h1>
<h3>Noticia: <?php echo ($model->idNoticia0->Titulo); ?></h3>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
