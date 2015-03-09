<?php

class HTTP403Exception
      extends PDOException
{
    public $code_answer = 'Ошибка 403';
} 