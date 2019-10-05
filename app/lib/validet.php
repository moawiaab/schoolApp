<?php
namespace FR_MO\Lib;

trait Validet
{
    private $_regexPattrans = [
        'num'         => '/^[0-9]+(?:\.[0-9]+)?$/',
        'int'         => '/^[0-9]+$/',
        'float'       => '/^[0-9]+\.[0-9]+$/',
        'alpha'       => '/^[a-zAZ\p{Arabic}]+$/u',
        'alphanum'    => '/^[a-zAZ\p{Arabic}0-9]+$/u',
        'email'       => '/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i',
        'pass'    =>  '/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,})\S$/',
    ];

    public function num($value){
        return (bool) preg_match($this->_regexPattrans['num'],$value);
    }
    public function int($value){
        return (bool) preg_match($this->_regexPattrans['int'],$value);
    }
    public function float($value){
        return (bool) preg_match($this->_regexPattrans['float'],$value);
    }
    public function alpha($value){
        return (bool) preg_match($this->_regexPattrans['alpha'],$value);
    }
    public function alphanum($value){
        return (bool) preg_match($this->_regexPattrans['alphanum'],$value);
    }
    public function email($value){
        return (bool) preg_match($this->_regexPattrans['email'],$value);
    }
    public function pass($value){
        return (bool) preg_match($this->_regexPattrans['pass'],$value);
    }

    public function lt($value,$match){
        if(is_numeric($value)){
            return $value < $match;
        }elseif(is_string($value)){
            return mb_strlen($value) < $match;
        }
    }

    public function gt($value,$match){
        if(is_numeric($value)){
            return $value > $match;
        }elseif(is_string($value)){
            return mb_strlen($value) > $match;
        }
    }

    public function min($value,$min){
        if(is_numeric($value)){
            return $value >= $min;
        }elseif(is_string($value)){
            return mb_strlen($value) >= $min;
        }
    }

    public function max($value,$max){
        if(is_numeric($value)){
            return $value <= $max;
        }elseif(is_string($value)){
            return mb_strlen($value) <= $max;
        }
    }

    public function between($value,$min,$max){
        if(is_numeric($value)){
            return $value <= $max && $value >= $min;
        }elseif(is_string($value)){
            return mb_strlen($value) <= $max && mb_strlen($value) >= $min;
        }
    }

    public function floatLike($value,$before,$after){
        if(!$this->float($value)){
            return false;
        }
        $marchPa = '/^[0-9]{'.$before.'}\.[0-9]{'.$after.'}$/';
        return (bool) preg_match($marchPa,$value);
    }

    public function isValide($roles, $inputType){
        $error = [];
        if(!empty($roles)){
            foreach($roles as $fillInput => $valideType){
                $value = $inputType[$fillInput];
                $valideType = explode('|',$valideType);
                foreach($valideType as $valide){
                    if(preg_match_all('/min\((\d+)\)/',$valide,$m)){
                        $this->min($value,$m[1][0]);
                    }
                }
            }
        }
    }
}

