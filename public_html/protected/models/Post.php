<?php

Yii::import('application.models._base.BasePost');

class Post extends BasePost
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    public function getTweets($q) {
        $criteria = New CDbCriteria();
        $criteria->compare('text', $q, true);
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
}