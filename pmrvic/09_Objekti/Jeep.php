<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Jeep
 *
 * @author Algebra
 */
class Jeep extends Fiat implements JeepInterface{
    private $uslepu=null;
    
    
    function __construct(string $marka="Jeep",string $boja="LightSalmon", int $snaga=420, string $model="Wrangler") {
        $this->boja = $boja;    //public
        $this->marka = $marka;    //public
        $this->snaga = $snaga;    //public
        $this->model = $model;    //public
        $this->setMaxBrzina(160);    //public
        $this->zakljucajse=false;  //protected
       // $this->$maxBrzina=200  // ne mogu dohvatiti private svojstvo!!!
    }
  //  public function shlep(Auto $a) {
     public function shlep($a) {
        $this->uslepu=$a;
        $this->setMaxBrzina(35);
        $this->ubrzaj();
        // upali sva 4
        // postavi potrosnju goriva x 2
        // i tako dalje....
        // postavljam istu max brzinu i na slepani auto
        $this->uslepu->setMaxBrzina(35); // postavi i slepani 
        $this->uslepu->ubrzaj();  // resetiraj brzinu na nulu
    }
    public function getSlepani() {
        return $this->uslepu;
    }
        public function printSlepani() {
        return $this->uslepu;
    }
    
    
    public function __toString() {
        if(is_null($this->uslepu)){  // ako nisi u slepu ide isti ispis kao fiat
           return parent::__toString();
        }
        else{
            return '<ul class="nav nav-pills" role="tablist">'
                . '<li role="presentation" class="active"><a href="#">'
                . '<i class="fas fa-car-side" style="color:'.$this->uslepu->boja.'"></i>------'
                . '<i class="fas fa-car-side" style="color:'.$this->boja.'"></i>&nbsp;&nbsp;'
                . $this->marka
                . '&nbsp;<span class="badge" style="width: '.$this->snaga.'px;">'
                . $this->model
                . '</span>'
                . '<span class="badge">'
                . $this->getBrzina()
                . '</span></a></li></ul>';
        }
    }

    public function upaliSva4() {
        $this->svjetla=[1,1,1,1];  // upali sve!
    }

    public function dugaSvjetla() {
        $this->svjetla=[1,1,0,0];  // upali samo prednja!
    }

}
