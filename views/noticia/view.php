<?php
use yii\helpers\Html;
/**
* @var yii\web\View $this
* @var app\models\Noticia $model
*/
$this->title = $model->Titulo;
$this->params['breadcrumbs'][] = ['label' => 'Noticias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;// muestra el la estructura del directorio actual
?>
<div class="noticia-view">
<h1><?= Html::encode($this->title) //pone un h1 con el titulo?></h1>
<p>
<?php if (!Yii::$app->user->isGuest)://Pregunta si el usuario esta logueado, si esta logueado permite hacer update y delete?>
<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btnprimary'])
?>
<?= Html::a('Delete', ['delete', 'id' => $model->id], [
'class' => 'btn btn-danger', 'data' => [
'confirm' => 'Are you sure you want to delete this item?',
'method' => 'post',
],
]) ?>
<?php endif;?>
</p>
<h4><?= Html::encode($model->Copete)//muestra datos del modelo de la noticia?></h4>
<p><?= Html::encode($model->Nota)?></p>

<h3>Comentarios (<?php echo count($model->comentarios); //imprimo la cantidad de comentarios asociados al modelo actual?>)</h3>
<p>
<?php
  $arregloComentarios=$model->comentarios;
  foreach ($arregloComentarios as $row) {//Listo los comentarios asociados

    echo "Anonimo dice (".Html::encode($row->Fecha).") :".Html::encode($row->Comentario)."<br>";
 }

 echo "<br><hr>". Html::a('Comentar', ['comentario/create', 'idNoticia' => $model->id], ['class' => 'btn btn-info'])
?>
</p>


</div>
