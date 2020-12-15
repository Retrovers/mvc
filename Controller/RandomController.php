<?php


namespace Controller;


use Core\Request;

class RandomController extends Controller {

    public function file(Request $request) {
        if ($request->isPOST()) {
            $files = $request->getFiles();
            var_dump($files);
        } else {
            $this->render();
        }
    }

}