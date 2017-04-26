<?php

namespace app\controllers;

use Yii;
use app\models\Noticia;
use app\models\NoticiaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NoticiaController implementa el CRUD para el modelo Noticia.
 */
class NoticiaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lista todos los modelos de Noticia,desde este metodo puedo ver toda la informacion guardada
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NoticiaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);//recupero todos los modelos y los guardo en dataProvider

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);//mando el modelo de searchModel y todos los modelos contenidos en dataProvider
    }

    /**
     * Lo mismo que actionIndex,pero en este caso muestra la informacion de un solo modelo de Noticia
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $miNoticia= $this->findModel($id);//recupera el modelo con el id indicado
        return $this->render('view', [
            'model' => $miNoticia,
        ]);//mando el modelo recuperado a la vista
    }

    /**
     *Crea un modelo de Noticia.
     * Si la creacion es exitosa,el navegador redirige hacia la pagina 'view' para mostrar la informacion de ese modelo en particular.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Noticia();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {//intenta cargar con los elementos del post
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Modifica un modelo de Noticia existente.
     * Si la modificacion es exitosa,el navegador redirige hacia la pagina 'view' para ver la informacion de ese modelo en particular.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);//recupera el modelo de Noticia

        if ($model->load(Yii::$app->request->post()) && $model->save()) {//carga en el modelo los datos del post
            return $this->redirect(['view', 'id' => $model->id]);//en caso exitoso se va a la vista view
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);//renderiza la vista update y le envia el modelo
        }
    }

    /**
     * Borra un modelo de Noticia existente.
     * Si el borrado es exitoso,el navegador redige hacia la pagina 'index'.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();//busca una noticia por su id y la borra

        return $this->redirect(['index']);// redirige al index
    }

    /**
     * Busca un modelo de Noticia por su ID y lo retorna.
     * Si el modelo no es encontrado,se genera una excepcion HTTP 404.
     * @param integer $id
     * @return Noticia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Noticia::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
