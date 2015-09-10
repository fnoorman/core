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

    public function actionCodes()
    {

            $result = [];
            for($asciiCode = 48;$asciiCode < 58 ; $asciiCode++){
                $code = $this->ansiFormat(chr($asciiCode), Console::FG_GREEN);
                $result[]=$code;
            }

            for($asciiCode = 65;$asciiCode < 91 ; $asciiCode++){
                $code = $this->ansiFormat(chr($asciiCode), Console::FG_GREEN);
                $result[]=$code;
            }


            return $result;

    }

    public function actionPopulate()
    {
        ini_set('memory_limit', '256M');
        $count = 0;
        $startInsert = 100000;
        $arrayData =[];
        $connection = \Yii::$app->db;
//        $codeAplphabets = $this->actionCodes();
        $codeAplphabets = ['0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
        for($f = 0;$f < count($codeAplphabets);$f++){
            for($s = 0;$s < count($codeAplphabets);$s++){
                for($t = 0;$t < count($codeAplphabets);$t++){
                    for($l = 0;$l < count($codeAplphabets);$l++){
                        $code = $codeAplphabets[$f].$codeAplphabets[$s].$codeAplphabets[$t].$codeAplphabets[$l];
                        echo $this->ansiFormat($code, Console::FG_GREEN);
                        echo "\n";
                        $arrayData[]= [$code,0];
                        //Insert into Array
                        $count++;
                        if($count === $startInsert){
                            echo "Inserting end by $startInsert ....\n";
                            $connection->createCommand()->batchInsert('code', ['code', 'sold'], $arrayData)->execute();
                            echo "Done inserting...\n";
                            unset($arrayData);
                            $arrayData = [];
                            $startInsert = $startInsert + 100000;
                        }

                        echo "\n";
                    }
                }

            }
        }
        echo "Inserting the remaining ....\n";
        $connection->createCommand()->batchInsert('code', ['code', 'sold'], $arrayData)->execute();
        echo "Done final inserting last batch...\n";
        unset($arrayData);
        echo "Total : $count \n";

        return Controller::EXIT_CODE_NORMAL;

    }


}
