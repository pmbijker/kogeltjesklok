<?php
/**
 * Shift register class
 * Peter Bijker
 * Grafisch Lyceum Utrecht, the Netherlands
 * January 2017
 * 
 * Class to create a register with a variable length
 * (int)$_length Length of the shift register
 * (bool$start_item Indicates whether the first array item is/must be 1
 * (array)$_shiftarray The array of length $_length that shifts
 *
 */
class ShiftRegister{
    private $_length;
    private $_start_item;
    public $_shiftarray = [];

    /**
    * Constructor
    *
    * @param string $length Length of the shift register
    * @param bool   $start_item If true, first array item = 1
    */
    public function __construct($length, $start_item = false){
        $this->_length = $length;
        $this->_start_item = $start_item;
        self::createRegister();
    }

    /**
    * Create the register
    * Creation of the shift register by length
    *
    * @param string $length Length of the shift register
    * @param bool   $start_item If true, first array item = 1
    */
    private function createRegister(){
        // create first item if needed
        $j = 0;
        if($this->_start_item){
            $this->_shiftarray[] = 1;
            $j = 1;
        }
        // create array with length $this->_length
        for($i = $j;  $i < $this->_length; $i++){
            $this->_shiftarray[] = 0;
        }
    }

    /**
    * Shift the register
    * A (int) 1 will be pushed into the register
    * The last register item is truncated and returned
    * If the last shift register value is 1, the register is unset
    *
    * @return int Last value of shift register
    */
    public function shiftRegister(){
        array_unshift($this->_shiftarray, 1);
        $last_item = array_pop($this->_shiftarray);
        if($last_item == 1){
            // unset
            $this->_shiftarray = [];
            // init array
            self::createRegister();
        }
        return $last_item;
    }

    /**
    * Read the register
    *
    * @return array The contents of the shift register
    */
    public function readRegister(){
        return $this->_shiftarray;
    }
}
?>