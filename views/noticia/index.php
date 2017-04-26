<?php
use yii\helpers\Html;
use yii\widgets\ListView;
/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var app\models\NoticiaSearch $searchModel
*/
$this->title = 'Ultimas Noticias ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="noticia-index">
<p>
<?= !Yii::$app->user->isGuest ? Html::a('Create Noticia', ['create'],
['class' => 'btn btnsuccess']):''
//si el usuario esta logueado puedo crear modelos de Noticia?>
</p>
<?= ListView::widget([
'dataProvider' => $dataProvider,
'itemView'=>'_view',
]);//estructura listView para mostrar con otro formato(en _view especifico la forma) ?>
</div>
