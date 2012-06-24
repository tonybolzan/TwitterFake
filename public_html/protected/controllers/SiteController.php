<?php

class SiteController extends Controller {

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('login', 'error', 'user'),
            ),
            array('allow',
                'users' => array('@'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     * Default page
     */
    public function actionIndex() {
        $this->layout = '//layouts/logged';

        $modelPost = new Post('insert');

        if (isset($_POST['Post']['text'])) {
            $modelPost->text = $_POST['Post']['text'];
            $modelPost->id_user = Yii::app()->user->getId();
            $modelPost->date = time();
            $modelPost->save();
        }

        $user = User::model()->findByPk(Yii::app()->user->getId());

        $this->render('index', array(
            'modelPost' => $modelPost,
            'seguindo' => $user->getSeguindo(),
            'seguido' => $user->getSeguidoPor(),
            'img' => "http://www.gravatar.com/avatar/" . md5(strtolower(trim($user->email))) . "?d=mm&s=128",
            'name' => $user->fullname,
            'username' => $user->username,
            'bio' => $user->bio,
            'location' => $user->location,
            'url' => $user->url,
            'tweets' => $user->getTweets(),
        ));
    }
    
    public function actionPesquisa($q) {

    }

    public function actionUser($id) {
        if (!Yii::app()->user->isGuest) {
            // Se eu estiver tentando me ver manda pra index
            if(Yii::app()->user->username == $id) {
                $this->redirect(array('index'));
            }
            // Define o layout como logado
            $this->layout = '//layouts/logged';
        }
        
        $user = User::model()->find('LOWER(username)=?', array(strtolower($id)));
        
        if ($user) {
            $this->render('user', array(
                'seguindo' => $user->getSeguindo(),
                'seguido' => $user->getSeguidoPor(),
                'id' => $user->id,
                'img' => "http://www.gravatar.com/avatar/" . md5(strtolower(trim($user->email))) . "?d=mm&s=128",
                'name' => $user->fullname,
                'username' => $user->username,
                'bio' => $user->bio,
                'location' => $user->location,
                'url' => $user->url,
                'tweets' => $user->getTweets(),
            ));
        } else {
            throw new CHttpException(404, 'Usuário Não Encontrado.');
        }
    }

    public function actionSeguir($id) {
        $me = Yii::app()->user->getId();
        $old = Follow::model()->find('id_followed = :id AND id_follower = :me',array(':id'=>$id,':me'=>$me));
        
        // nao estou tentando me seguir
        if(!$old and $me != $id) {
            $follow = new Follow('insert');
            $follow->id_followed = $id;
            $follow->id_follower = $me;
            $follow->save();
        }
        
        $this->redirect(Yii::app()->user->returnUrl);
    }

    public function actionPostDelete($id) {
        $post = Post::model()->findByPk($id, 'id_user='.Yii::app()->user->getId());
        
        if($post) {
            $post->delete();
        }
        
        $this->redirect(Yii::app()->user->returnUrl);
    }
    
    public function actionUserDelete() {
        $user = User::model()->findByPk(Yii::app()->user->getId());
        
        if($user) {
            foreach ($user->posts as $post) {
                $post->delete();
            }
            foreach ($user->followers as $followers) {
                $followers->delete();
            }
            foreach ($user->followeds as $followeds) {
                $followeds->delete();
            }
            
            $user->delete();
        }
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    /**
     * Login page
     */
    public function actionLogin() {
        if (!Yii::app()->user->isGuest) {
            $this->redirect(array('index'));
        }
        
        $this->layout = '//layouts/login';

        $model = new LoginForm;
        $modelUser = new User('insert');

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($modelUser);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(array('index'));
        }
        
        if (isset($_POST['User'])) {
            $modelUser->setAttributes($_POST['User']);
            $passwd = $modelUser->password;
            $modelUser->setPassword($passwd);
            
            if ($modelUser->validate() && $modelUser->save()) {
                
                // faz login
                $model->email = $modelUser->email;
                $model->password = $passwd;
                
                if ($model->validate() && $model->login())
                    $this->redirect(array('index'));
            }
        }
        $modelUser->password = '';
        // display the login form
        $this->render('login', array('model' => $model, 'modelUser' => $modelUser));
    }

    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    /**
     * Render error page
     */
    public function actionError() {
        if (!Yii::app()->user->isGuest) {
            $this->layout = '//layouts/logged';
        }
        
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                $this->render('error', $error);
            }
        }
    }

}
