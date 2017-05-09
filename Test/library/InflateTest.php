<?php

namespace inflationary\lib\Test\library;


class InflateTest extends \PHPUnit_Framework_TestCase
{
    
    //Test inflation
    public function testsearchInflatable(){

                $expect="Threeday I two an award five being awesome.";
                $input="Today I won an award for being awesome.";
                
                $inflate = new \inflationary\lib\Inflate(); //instantiate object inflate
                
                $result=$inflate->searchInflatable($input);
                
                $this->assertEquals($expect, $result);                

    }
    
    //test number inflate
    public function testinflate(){
        
                $expect="five";
                $input="for";
                
                $inflate = new \inflationary\lib\Inflate(); //instantiate object inflate
                
                $result=$inflate->inflate($input);
                
                $this->assertEquals($expect, $result);          
        
    }
}