<?php

namespace Controllers;

use Repository\PostRepository;
use Repository\UserRepository;

class UserIndex implements Controller {

    public function action() {

        if(!isLoggedIn()) {
            redirect(\route\Route::get("error404")->generate());
        }
        $username = getUsername();
        $id = UserRepository::getIdByUsername($username);

        $posts = PostRepository::getAllById($id);

        $mainView = new \templates\Main();
        $userIndexView = new \templates\UserIndex();
        $userIndexView->setPosts($posts);
        $mainView->setPageTitle('User posts')->setBody((string) $userIndexView);

        echo $mainView;

    }

}