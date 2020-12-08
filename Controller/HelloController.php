<?php

namespace Controller;

use core\Request;

class HelloController extends Controller
{

    public function index(Request $request) {
        echo "Bonjour";
    }

    public function hello(Request $request) {

        $this->render(['name' => $request->getParam('name')]);

    }

}