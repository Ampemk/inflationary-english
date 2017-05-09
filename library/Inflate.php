<?php

namespace inflationary\lib;
/**
 * This class takes a string and turns it into inflationary english
 *
 * @author kwameampem
 */
class Inflate {

    //put your code here

    public $inflate_bank;

    public function __construct($key = null,$value = null) {
        $this->inflate_bank = array(
            'won' => '1',
            'too' => '2',
            'to' => '2',
            'for' => '4',
            'fore' => '4',
            'ate' => '8');
        
        if(!is_null($key) && !is_null($value)){
            
            $this->inflate_bank[$key]=$value;
        }
    }
    
    
/*
 * This function takes a string (sentence) and returns an inflationary english
 *
 * @param (sentence) sentence from user
 * @return (inflatedsentence) sentence inflation based on specifications
 */    
    public function searchInflatable($sentence){
        
        $words = explode(" ", $sentence); //split string by space into array of strings
        
        $keys = array_keys($this->inflate_bank); // Get all of the array keys

        //words array loop
        foreach($words as $key=>$value){
                            

            //inflatable key array loop
            foreach($keys as $inflat){
                    
                    //to inflate
                    $inflated = $this->inflate($inflat);
                    //replace the string in the key;
                    $newvalue = str_ireplace($inflat, $inflated, $value);
                    
                    if($newvalue !== $value){
                        $words[$key]=$newvalue;
                    }

                
                           
            }
                            
        }
        
        //turn array values into strings seperated by a space
        $inflatedsentence = implode(" ", $words);
        return ucfirst($inflatedsentence); //capitalize first character
                

        
    }
    
/*
 * This function takes an integer increments it by 1 and spells it out
 *
 * @param (string) string from key
 * @return (string) interger spelled out
 */    
    public function inflate($key){
        

        $value = (int) $this->inflate_bank[$key];
        
        //increase value.
        $value=$value+1;

        $f = new \NumberFormatter("en", \NumberFormatter::SPELLOUT);
        return $f->format($value);

        
        
    }

}
