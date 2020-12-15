<?php

namespace Controller;

use Core\Request;

class HelloController extends Controller
{

    public function index(Request $request) {
        echo "Bonjour";
    }

    public function hello(Request $request) {

        $this->render(['name' => $request->getParam('name')]);

    }

}