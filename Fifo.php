<?php
 
class Fifo
{
    public $limit=10;
    function __construct($limit)
    {
         $this->limit=$limit;
    }
    protected $data = [];
    protected function exists($key)
    {
        return isset($this->data[$key]);
    }
    public function get($key)
    {
	return $this->exists($key) ? $this->data[$key] : null;       
    }
    public function put($key, $value)
    {
       if(count($this->data)<= $this->limit ){
            $this->data[$key] = $value;
       }
    }
    public function remove($key)
    {
        if ($this->exists($key)) {
            unset($this->data[$key]);
            return true;
        }
        return false;
    }   
}
