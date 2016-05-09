<?php

require_once("Cache.php");
class CacheTest extends PHPUnit_Framework_TestCase
{
    function test_CacheTest()
    {
        $cache = new Cache();
        $key = 'apple';
        $val = 'リンゴ';
        $cache->put($val, $key);
        $get_return = $cache->get($key);
        $bool = $val === $get_return;
        $this->assertTrue($bool);
    }
    function test_get_null()
    {
        $cache = new Cache();
        $check_null = $cache->get('nothing');
        $this->assertEmpty($check_null);
    }
    function test_put_overwrite()
    {
        $cache =new Cache();
        $key = 'apple';
        $val = 'リンゴ';
        $key2 = 'apple';
	$val2 = 'バナナ';
        $key3 = 'orange';
        $val3 = 'オレンジ';
	$cache->put($val, $key);
        $cache->put($val2, $key2);
        $cache->put($val3, $val3);
        $this->assertCount(2,$cache->put_data);
    }
 
}

