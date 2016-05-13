<?php
require_once("Cache.php");
class CacheTest extends PHPUnit_Framework_TestCase
{
   function test_CasheTest_re()
   {
       $cache = new Cache();
       $key = 'key';
       $data = 'for key';
       $cache->put($data,$key);
       $get_data = $cache->get($key);
       $bool = $get_return === $data;
       $this-assertTrue($bool);
   }



}
