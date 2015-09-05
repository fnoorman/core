<?php
namespace console\controllers;

use yii\console\Controller;
use yii\helpers\Console;
use backend\models\Randomcode;

class GeneratorController extends Controller
{

    public function actionIndex(){
      $name = $this->ansiFormat('Code Generator', Console::FG_YELLOW);
      echo "Hello, my name is $name.\n";
      $asciiCode = chr($this->evaluate(mt_rand(48,90))) . chr($this->evaluate(mt_rand(48,90))).chr($this->evaluate(mt_rand(48,90))).chr($this->evaluate(mt_rand(48,90)));
      $code = $this->ansiFormat($asciiCode, Console::FG_GREEN);
      echo "Your code is $code.\n";

    }

    private function evaluate($code){
      while(57 < $code && $code < 65){
        $code = mt_rand(48,90);
      }
      return $code;
    }

    public function actionRandom(){
      $asciiCode = mt_rand(1, 1600000);
      $code = $this->ansiFormat($asciiCode, Console::FG_GREEN);
      echo "Your code is $code.\n";
    }

    public function actionActivate(){
      $rc = new Randomcode();
      $rc->code = '1ZAA';
      if($rc->save())
        echo "Bravo\n";
      else
        echo "Duplicate found\n";
    }


}
