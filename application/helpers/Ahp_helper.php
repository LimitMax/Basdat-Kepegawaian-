<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ahp_helper {

    //mendapatkan nilai total dari matrik
    public function total_baris($matrik = null)
    {
        $arr = array();
        foreach($matrik as $key => $val){
            foreach($val as $k => $v){
                $arr[$k] = number_format((isset($arr[$k]) ? $arr[$k] : 0) + $v, 3);
            }
        }
        return $arr;
    }

    //mendapatkan nilai normalisasi
    public function normalisasi($matrik = null, $total_baris = null)
    {
        $arr = array();
        foreach($matrik as $key => $val){
            foreach($val as $k => $v){
                $arr[$key][$k] = number_format($v / $total_baris[$k], 3);
            }
        }
        return $arr;
    }

    //mendapatkan nilai local priority
    public function local_priority($normalisasi = null)
    {
        $arr = array();
        foreach($normalisasi as $key => $val){
            foreach($val as $k => $v){
                $arr[$key] = number_format(array_sum($val) / count($val), 3);
            }
        }
        return $arr;
    }

    //mendapatkan nilai eigen dibagi local priority
    public function ebl($total_baris = null, $local_priority = null)
    {
        $arr = array();
        foreach ($local_priority as $key => $val) {
            $arr[$key] = number_format($val * $total_baris[$key], 3);
        }
        return $arr;
    }

    //mendapatkan nilai CI
    public function ci($ebl)
    {
        $arr = array();
        $count = count($ebl);
        $sum = array_sum($ebl);
        $ci = number_format(($sum - $count) / ($count - 1), 3);
        return $ci;
    }
    
    //mendapatkan nilai CR
    public function cr($ebl = null, $ci = null)
    {
        $count = count($ebl);
        $nilai_ri = array(
            1=>0,
            2=>0,
            3=>0.58,
            4=>0.9,
            5=>1.12,
            6=>1.24,
            7=>1.32,
            8=>1.41,
            9=>1.45,
            10=>1.49,
        );
        $ri = $nilai_ri[$count];

        $cr = number_format(($ci / $ri), 3);
        return $cr;
    }

    //mendapatkan nilai global priority
    public function global_priority($bobot_a, $bobot_k)
    {
        $arr = [];
        $gp = [];
        foreach ($bobot_k as $key => $value) {
            foreach ($bobot_a[$key] as $k => $v) {
                $arr[$k] = number_format($bobot_a[$key][$k] * $bobot_k[$key], 3);
            }
            $gp[$key] = $arr ;
        }
        return $gp;
    }

    public function globalpriority_total($global_priority)
    {
        $arr = [];
        foreach ($global_priority as $key => $val) {
            foreach ($val as $k => $v) {
                $arr[$k] = (isset($arr[$k]) ? $arr[$k] : 0) + $global_priority[$key][$k];
            }
        }
        return $arr;
    }
    
}

?>