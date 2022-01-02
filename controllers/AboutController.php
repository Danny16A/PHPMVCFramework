<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;

class AboutController extends Controller
{
    public function index()
    {
        Application::$app->triggerEvent(Application::EVENT_BEFORE_REQUEST);

        return $this->render('about');
    }
}