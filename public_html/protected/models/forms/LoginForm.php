<?php

/**
 * LoginForm class.
 * Modelo para o formulario de Login.
 */
class LoginForm extends CFormModel {

    public $email;
    public $password;
    public $rememberMe = false;
    private $_identity;

    /**
     * Regras de validação do formulário.
     * @return array Regras
     */
    public function rules() {
        return array(
            array('email, password', 'required'),
            array('email, password', 'length', 'min' => 4, 'max' => 128),
            array('rememberMe', 'boolean'),
            array('password', 'authenticate'),
        );
    }

    /**
     * Rótulos dos atributos.
     * @return array atributos -> rótulo
     */
    public function attributeLabels() {
        return array(
            'email' => Yii::t('sys', 'Usuário/Email'),
            'password' => Yii::t('sys', 'Senha'),
            'rememberMe' => Yii::t('sys', 'Lembre-me'),
        );
    }

    /**
     * Autenticador de senha.
     * Este é o validador 'authenticate' declarado em rules().
     * @param string Nome do atributo a ser validado
     * @param array Opções especificadas na regra de validação
     */
    public function authenticate($attribute, $params) {
        if (!$this->hasErrors()) {
            $this->_identity = new UserIdentity($this->email, $this->password);
            $status = $this->_identity->authenticate();

            if ($status)
                $this->addError('password', 'Usuário ou senha inválida!');
        }
    }

    /**
     * Loga o usuário usando o email e a senha declarados neste modelo.
     * @return boolean Se o login form bem sucedido
     */
    public function login() {
        if ($this->_identity === null) {
            $this->_identity = new UserIdentity($this->email, $this->password);
            $this->_identity->authenticate();
        }

        if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 7 : 0; // 7 days
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        } else
            return false;
    }

}