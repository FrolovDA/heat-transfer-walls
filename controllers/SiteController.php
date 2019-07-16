<?php

include_once ROOT.'/models/Site.php';

class SiteController
{
    /**
     * Action method for empty request
     * @return bool
     */
    public function actionIndex()
    {
        require_once(ROOT . '/views/site/index.php');
        return true;
    }
}