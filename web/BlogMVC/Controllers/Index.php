<?php

namespace Controllers;

use Repository\PostRepository;
use Repository\UserRepository;
use templates\Main;

class Index implements Controller {

    public function action()
    {
        $posts = PostRepository::getAll();

        if(UserRepository::is_logged_in()) {
            redirect(\route\Route::get("userIndex")->generate());
        }

        $mainView = new Main();
        $indexView = new \templates\Index();
        $indexView->setPosts($posts);
        $mainView->setPageTitle('Home page')->setBody((string) $indexView);

        echo $mainView;
    }

}