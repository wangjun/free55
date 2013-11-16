<?php
/**
 * App 行为控制
 * Class ApplicationBehavior
 */
class ApplicationBehavior extends CBehavior {

    public function events()
    {
        return array_merge(parent::events(),array(
            'onBeginRequest' => 'beginRequest'
        ));
    }

    public function beginRequest($event) {
//        echo "Hello this Behavior beginRequest";
//        $this->owner->urlManager->urlSuffix = ".html";
//        unset($this->owner->urlManager->rules['login']);
//var_dump(get_class($this->owner->viewRenderer));
//        $rules = Yii::app()->urlManager->rules;
//        Yii::app()->urlManager->rules = array();

//        var_dump($rules);
        //Yii::app()->urlManager->rules = array();

        // 网站标题
        $m = Yii::app()->settings->get("SystemBaseConfig");
        if ($m) {
            Yii::app()->name = $m->SiteName;
        }

        // Url 重写
        $m = Yii::app()->settings->get("SystemRewriteConfig");
        if ($m) {
            if ($m->UrlSuffix) {
                Yii::app()->urlManager->urlSuffix = Yii::app()->params['urlSuffix'][$m->UrlSuffix];
            }

            if ($m->CategoryRule) {
                $r = $m->CategoryRule;
                $r = str_replace('{shorttitle}', '<title:\w+>', $r);
                $r = array( $r =>  'category/index');
                Yii::app()->urlManager->addRules($r, false);
            }
            if ($m->BookDetailRule) {
                $r = $m->BookDetailRule;
                $r = str_replace('{id}', '<id:\d+>', $r);
                $r = array( $r =>  'book/view');
                Yii::app()->urlManager->addRules($r, false);
            }
            if ($m->ChapterDetailRule) {
                $r = $m->ChapterDetailRule;
                $r = str_replace('{id}', '<id:\d+>', $r);
                $r = array( $r =>  'article/view');
                Yii::app()->urlManager->addRules($r, false);
            }
        }

    }
}