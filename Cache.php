<?php

class Cache 
{
    public $put_data = array();
    function put($data, $data_name)
    {
        $this->put_data[$data_name] = $data;
    }

    function get($check_key)
    {
        if(array_key_exists($check_key, $this->put_data)){
            return $this->put_data[$check_key];
        }else{
            return null;
        }
    }
    
    function remove($del_name)
    {
        if(array_key_exists($del_name, $this->put_data)){
            unset($this->put_data($del_name));
            $this->put_data = array_values($this->put_data);
        }
    }
 
}
