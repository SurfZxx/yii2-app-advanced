<?php

namespace backend\controllers;

use common\models\LoginForm;
use common\models\UploadForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use common\models\Products;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'products', 'create-product', 'edit-product', 'delete-product', 'file-uploader', 'download-file'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $products = Products::find()->count();
        return $this->render('index', ['products' => $products]);
    }

    
    public function actionProducts() 
    {
        
        return $this->render('products');
    }

    public function actionCreateProduct()
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Save the product to the database
            Yii::$app->db->createCommand()->insert('products', [
                'name' => $model->name,
                'description' => $model->description,
                'price' => $model->price,
            ])->execute();

            return $this->redirect(['products']);
        }

        return $this->render('createproducts', [
            'model' => $model,
        ]);
    }

    public function actionEditProduct($id)
    {
        // $model = ProductsForm::findOne($id);
        // if (!$model) {
        //     throw new \yii\web\NotFoundHttpException('Product not found.');
        // }
        $product = Yii::$app->db->createCommand('SELECT * FROM products WHERE id=:id')
            ->bindValue(':id', $id)    
            ->queryOne();

        if (!$product) {
            throw new \yii\web\NotFoundHttpException('Product not found.');
        }

        $model = new Products();
        $model->id = $product['id'];
        $model->name = $product['name'];
        $model->description = $product['description'];
        $model->price = $product['price'];

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Update the product in the database
            Yii::$app->db->createCommand()->update('products', [
                'name' => $model->name,
                'description' => $model->description,
                'price' => $model->price,
            ], ['id' => $id])->execute();

            return $this->redirect(['products']);
        }

        return $this->render('editProducts', [
            'model' => $model,
        ]);
    }

    public function actionDeleteProduct($id)   {
        Yii::$app->db->createCommand()->delete('products', ['id' => $id])->execute();
        return $this->redirect(['products']);
    }

    public function actionFileUploader() {
        
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->upload()) {
                // file is uploaded successfully
                return $this->redirect(['site/index']);
            }
        } 
        $uploadPath = Yii::getAlias('@common/uploads');
        $files = [];
        if (is_dir($uploadPath)) {
            $files = array_diff(scandir($uploadPath), ['.', '..']);
        } 

        return $this->render('fileUploader', [
            'model' => $model,
            'files' => $files,
        ]);
    }

    public function actionDownloadFile($filename) {
        $filename = basename($filename); //serve para apagar o path do nome
        $filePath = Yii::getAlias('@common/uploads/' . $filename);
        if (file_exists($filePath)) {
            Yii::$app->response->sendFile($filePath, $filename);
        } else {
            throw new \yii\web\NotFoundHttpException('File not found.');
        }
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
