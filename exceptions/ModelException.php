<?php
/**
 * Created by PhpStorm.
 * User: Олег
 * Date: 09.03.15
 * Time: 10:38
 */

class ModelException
{
   public static function logg($exc)
   {
       $file = fopen(__DIR__."/logfile.log", "a+");

       $str = date("Y:m:d H:i:s").' - '. $exc->getMessage() . ' - стр.'.$exc->getLine().' в файле '.$exc->getFile();
       fwrite($file, $str . "\n");

       fclose($file);
   }

   public static function getExceptions()
   {
       $file = fopen(__DIR__.'/logfile.log',"r");

       $content = file(__DIR__.'/logfile.log');
       fclose($file);

       header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
       foreach ($content as $record){
           echo $record.'<br>';
       }
   }

}

