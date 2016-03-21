<?php

/*
  Created on : 17.03.2016, 19:00:55
  Author     : DeadMerc <https://github.com/DeadMerc>
 */

class Core {

    public $mode;
    
    //desktop
    public function __construct($mode = 'api') {
        $this->mode = $mode;
    }

    public function getCitys($id = false) {
        if ($id != false) {
            if ($id == 1) {
                $citys = 'First city';
            }else{
                $this->errorReturn('Wrong id number');
            }
        } else {
            $citys = 'All citys';
        }
        return $this->helpReturn($citys,'many information');
    }

    public function getMainInfo() {
        $info = 'Hello';
        return $this->helpReturn($info);
    }

    private function helpReturn($data,$info = false) {
        if ($this->mode == 'api') {
            $app = \Slim\Slim::getInstance();
            $app->status(200);
            $app->contentType('application/json');
            $response = array('response' => $data,'error'=>false);
            if($info){
                $response['info'] = $info;
            }
            
            $response = json_encode($response);
            echo $response;
            return;
        } elseif ($this->mode == 'desktop') {
            return $data;
        }
    }

    private function errorReturn($message) {
        if ($this->mode == 'api') {
            $app = \Slim\Slim::getInstance();
            $app->status(500);
            $app->contentType('application/json');
            $response = json_encode(array('response' => [], 'error' => true, 'message' => $message));
            echo $response;
            $app->stop();
            return;
        } elseif ($this->mode == 'desktop') {
            return $data;
        }
    }

}
