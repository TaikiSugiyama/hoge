<?php
require_once("Fifo.php");
class FifoTest extends PHPUnit_Framework_TestCase
{
    function testStartsEmpty() {
        $cache = new Fifo(5);
        $this->assertNull($cache->get(1));
    }
    function testGet() {
        $cache = new Fifo(5);
        $key = 'key1';
        $data = 'content for key1';
        $cache->put($key, $data);
        $this->assertEquals($cache->get($key), $data);
    }
    function testMultipleGet() {
        $cache = new Fifo(5);
        $key = 'key1';
        $data = 'content for key1';
        $key2 = 'key2';
        $data2 = 'content for key2';
        $cache->put($key, $data);
        $cache->put($key2, $data2);
        $this->assertEquals($cache->get($key), $data);
        $this->assertEquals($cache->get($key2), $data2);
    }
    function testRemove() {
        $cache = new Fifo(1000);
        $cache->put('key1', 'value1');
        $cache->put('key2', 'value2');
        $cache->put('key3', 'value3');
        $ret = $cache->remove('key2');
        $this->assertTrue($ret);
        $this->assertNull($cache->get('key2'));
        
        $ret = $cache->remove('key2');
        $this->assertFalse($ret);
        
        $this->assertEquals($cache->get('key1'), 'value1');
        $this->assertEquals($cache->get('key3'), 'value3');
    }
    function testPutOverride() {
        $cache = new Fifo(5);
        $key1 = 'key1';
        $value1 = 'value1forkey1';
        $key2 = 'key2';
        $value2 = 'value2forkey2';
        $key3 = 'key3';
        $value3 = 'value3forkey3';
        
        $cache->put($key1, $value1);
        $cache->put($key2, $value2);
        $cache->put($key3, $value3);
        $this->assertEquals($value1, $cache->get($key1));
        $this->assertEquals($value2, $cache->get($key2));
        $this->assertEquals($value3, $cache->get($key3));   

    }

/*********/
    function testSetLimit(){
        $cache = new Fifo(3);
        $cache->put('key1', 'value1');
        $cache->put('key2', 'value2');
        $cache->put('key3', 'value3');
	//ksort($cache);
	//foreach($cache as $key => $val){
	//	echo "$key = $val\n";
	//}
	//array_key_sort();
	//unset();	
    }

}
