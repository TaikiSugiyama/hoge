<?php

require_once("Cache.php");
class CacheTest extends PHPUnit_Framework_TestCase
{
    function test_CacheTest()
    {
        $cache = new Cache();
        $key = 'key';
        $data = 'for key';
        $cache->put($data, $key);
        $get_return = $cache->get($key);
        $bool = $data === $get_return;
        $this->assertTrue($bool);
    }
    function test_when_empty(){
        $cache = new Cache();
        $this->assertNull($cache->get(1));
    }
    /*function test_get_null()
    {
        $cache = new Cache();
        $check_null = $cache->get('nothing');
        $this->assertEmpty($check_null);
    }*/
    function test_test_overwrite()
    {
        $cache = new Cache();
        $key = 'key1';
        $data = 'for key1';
        $key2 = 'key2';
	$data2 = 'for key2';
	$cache->put($key, $data);
        $cache->put($key, $data2);
        $this->assertCount(2,$cache->put_data);
    }
    function test_remove() 
    {
        $cache = new Cache();
        $cache->put('key, $data');
	var_dump($cache);
        $this->assertTrue($cache->remove($data));
        $this->assertNull($cache->get($data));
        $this->assertFalse($cache->remove($data));
    }
}

