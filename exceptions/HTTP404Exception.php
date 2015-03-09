<?php

/*class ModelException
        extends Exception
{

}*/

/*class HTTP403Exception
         extends PDOException
{
    public $code_answer = ' Исключение HTTP403 ';
}*/

class HTTP404Exception
         extends Exception
{
    public $code_answer = ' Ошибка 404 ';
}