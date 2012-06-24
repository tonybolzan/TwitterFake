<?php
/**
 * Controller class.
 *
 * @author Tonin De Rosso Bolzan <admin@tonybolzan.com>
 * @link http://sgcs.odig.net
 * @copyright Copyright &copy; 2012 ODIG.net
 * @license http://sgcs.odig.net
 */

/**
 * Controller é uma classe base de controle customizada.
 * Todos os outros controladores da aplicação extendem esta classe.
 */
class Controller extends CController {
    /**
    * @var string Define o layout padrão.
    */
    public $layout='//layouts/notlogged';
    /**
    * @var array Itens do menu de contexto. This property will be assigned to {@link CMenu::items}.
    */
    public $menu=array();
    /**
    * @var array Itens do menu principal. This property will be assigned to {@link Bootstrap::nav...}.
    */
    public $mainmenu=array();
    /**
    * @var array Listagem da pagina atual.
    */
    public $breadcrumbs=array();
    
    public function filters() {
        return array(
            'accessControl',
            array(
                'COutputCache',
                'duration'=> Yii::app()->user->isGuest ? 60 : 0,
                'requestTypes'=>array('GET'),
                'cacheID'=>'inicio',
                'varyByExpression'=>'Yii::app()->user->isGuest',
            ),
        );
    }
}
