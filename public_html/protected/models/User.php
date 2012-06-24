<?php

Yii::import('application.models._base.BaseUser');

class User extends BaseUser {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getTweets() {
        $criteria = New CDbCriteria();
        $criteria->compare('id_user', $this->id,false,'OR');
        $criteria->compare('id_user', $this->getFollowers(),false,'OR');
        $posts = Post::model()->findAll($criteria);
        
        $tweets = array();
        foreach ($posts as $post) {
            $diff = time() - intval($post->date);
            
            if($diff < 60) {
                $date = $diff . ' Seg';
            } elseif($diff < (60*60)) {
                $date = round($diff/60) . ' Min';
            } elseif($diff < (24*60*60)) {
                $date = round($diff/60/24) . ' H';
            } else {
                $date = date('d/m/Y',intval($post->date));
            }
            
            $tweets[] = array(
                'id' => $post->id,
                'time' => $date,
                'msg' => $post->text,
                'avatar' => "http://www.gravatar.com/avatar/" . md5(strtolower(trim($post->idUser->email))) . "?d=mm&s=48",
                'name' => $post->idUser->fullname,
                'username' => $post->idUser->username,
            );
        }

        return $tweets;
    }
    
    public function getFollowers() {
        $followers = array();
        foreach ($this->followers as $follower) {
            $followers[] = $follower->id_followed;
        }
        return $followers;
    }


    public function getSeguindo() {
        $seguindo = array();
        foreach ($this->followers as $follower) {
            $seguindo[] = array(
                'avatar' => "http://www.gravatar.com/avatar/" . md5(strtolower(trim($follower->idFollowed->email))) . "?d=mm&s=16",
                'name' => $follower->idFollowed->fullname,
                'username' => $follower->idFollowed->username,
            );
        }
        return $seguindo;
    }
    
    public function getSeguidoPor() {
        $seguido = array();
        foreach ($this->followeds as $followed) {
            $seguido[] = array(
                'avatar' => "http://www.gravatar.com/avatar/" . md5(strtolower(trim($followed->idFollower->email))) . "?d=mm&s=16",
                'name' => $followed->idFollower->fullname,
                'username' => $followed->idFollower->username,
            );
        }
        return $seguido;
    }

    /**
     * make a new password
     * @param string the password to be maked
     */
    public function setPassword($password) {
        $this->salt = $this->generateSalt();
        $this->password = $this->hashPassword($password, $this->salt);
    }

    /**
     * Checks if the given password is correct.
     * @param string the password to be validated
     * @return boolean whether the password is valid
     */
    public function validatePassword($password) {
        return $this->hashPassword($password, $this->salt) === $this->password;
    }

    /**
     * Generates the password hash.
     * @param string password
     * @param string salt
     * @return string hash
     */
    public function hashPassword($password, $salt) {
        return md5($salt . $password);
    }

    /**
     * Generates a salt that can be used to generate a password hash.
     * @return string the salt
     */
    protected function generateSalt() {
        return uniqid('', true);
    }

}