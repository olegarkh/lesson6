<?php

class View
    implements Iterator
{
    public $position;
    public $data =[];

    public function __construct()
    {
        $this->position = 0;
    }

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function assign($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function display($template)
    {
        foreach ($this->data as $key=>$value) {

            $$key = $value;
        }
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        include __DIR__.'/news/'.$template;
    }

    public function current()
    {
        return $this->data[$this->name][$this->position];
    }

    public function next()
    {
        ++$this->position;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        if ($this->position >=2){
            return false;
        }
        return isset($this->data[$this->name][$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }
}
