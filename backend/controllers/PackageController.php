<?php

namespace backend\controllers;

use Yii;
use common\models\Package;
use common\models\PackageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Offer;
/**
 * PackageController implements the CRUD actions for Package model.
 */
class PackageController extends Controller
{
    public $layout = 'inspinia/columns-2';
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Package models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PackageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Package model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $offerModel = new Offer();

        return $this->render('view', [
            'model'     => $this->findModel($id),
            'offerModel'=> $offerModel
        ]);
    }

    /**
     * Creates a new Package model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Package();
        $model->loadDefaultValues();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Package model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Package model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Package model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Package the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Package::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    /**
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionAddOffer()
    {
        $packageId = Yii::$app->request->post('Offer')['package_id'];
        $offerModel = new Offer();
        $offerModel->loadDefaultValues();
        if ($offerModel->load(Yii::$app->request->post()) && $offerModel->save()) {
            $offerModel = new Offer();
        }

        return $this->render('view', [
            'model'     => $this->findModel($packageId),
            'offerModel'=> $offerModel
        ]);


    }

    /**
     * @param $offerId
     * @param $packageId
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionLoadOffer($offerId,$packageId)
    {

        return $this->render('view', [
            'model'     => $this->findModel($packageId),
            'offerModel'=> Offer::findOne($offerId)
        ]);


    }

    /**
     * @param $offerId
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdateOffer($offerId)
    {
        $packageId = Yii::$app->request->post('Offer')['package_id'];
        $offerModel = Offer::findOne($offerId);
        if ($offerModel->load(Yii::$app->request->post()) && $offerModel->save()) {
            return $this->redirect(['view', 'id' => $packageId]);
        } else {
            return $this->render('view', [
                'offerModel' => $offerModel,
                'model'     => $this->findModel($packageId),
            ]);
        }
    }

    public function actionDeleteOffer($offerId,$packageId)
    {
        Offer::findOne($offerId)->delete();
        return $this->redirect(['view', 'id' => $packageId]);

    }


}
