<?php
/*------Входные данные------*/
$str = 'xAAAAAAAAAAfffffhxddgfka';

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////Packer 1////////////////////////////////////
/*----------------------------------------------------------------------------*/
/*------------------------Result - arr(letters,quantity)----------------------*/
/*----------------------------------------------------------------------------*/
function packer_1($str){
    $count = mb_strlen($str);
    $return = [];
    $return_1 = [];
    $return_2 = [];
    for($i=0;$i<$count;$i++){
        if($str[$i] == $str[$i-1] or $str[$i-1] == null) $mark++;
        else{
            $j++;
            $return_1 += [$j => "{$str[$i-1]}"];
            $return_2 += [$j => $mark];
            $mark = 1;
        }
    }
    
    if($mark != 0){
        $j++;
        $return_1 += [$j => "{$str[$i-1]}"];
        $return_2 += [$j => $mark];
    }
    
$return = ["letters" => $return_1, "quantity" => $return_2];
return $return;
}

function unpacker_1($str){
    $count = count($str["letters"]);   
    
    for($i=0;$i<=$count;$i++){
        for($j=0;$j<$str["quantity"][$i];$j++){
            $return .= $str["letters"][$i];
        }
    }
    
return $return;
}

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////Packer 2////////////////////////////////////
/*----------------------------------------------------------------------------*/
/*--------------------------------Result - str -------------------------------*/
/*----------------------------------------------------------------------------*/
function packer_2($str){
    $count = mb_strlen($str);
    
    for($i=0;$i<$count;$i++){
        
        if($str[$i] == $str[$i-1]) $mark++;
        else{
            
            if($mark > 0)$return .= $str[$i-1];
            if($mark > 1)$return .= $mark;
            $mark = 1;
        }
    }
    
    if($mark > 0)$return .= $str[$i-1];
    if($mark > 1)$return .= $mark;
    
return $return;
}

function unpacker_2($str){
    $count = mb_strlen($str);
    $g = 0;
    
    for($i=0;$i<$count;$i++){
        $bukva = $str[$g];
        
        if(!is_numeric($str[$g+1])){
            $return .= $bukva;    
            $g++;
        }else{
            if(is_numeric($str[$g+2])){
                
                if(is_numeric($str[$g+3])){
                    $num = $str[$g+1].$str[$g+2].$str[$g+3];
                    $g+=4;
                }else{
                    $num = $str[$g+1].$str[$g+2]; 
                    $g+=3;
                }
                
            }else{
                $num = $str[$g+1];
                $g+=2;
            } 
            
            for($j=0;$j<$num;$j++){
                $return .= $bukva;
            }
        }
    }
    
return $return;
}

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////Packer 3////////////////////////////////////
/*----------------------------------------------------------------------------*/
/*------------------------Result - arr(letters,quantity)----------------------*/
/*----------------------------------------------------------------------------*/
function packer_3($str){
    $count = mb_strlen($str);
    $return = [];
    $return_1 = [];
    $return_2 = [];
    for($i=0;$i<$count;$i++){
        if($str[$i] == $str[$i-1] or $str[$i-1] == null) $mark++;
        else{
            $j++;
            $return_1 += [$j => "{$str[$i-1]}"];
            $return_2 += [$j => chr($mark)];
            $mark = 1;
        }
    }
    
    if($mark != 0){
        $j++;
        $return_1 += [$j => "{$str[$i-1]}"];
        $return_2 += [$j => chr($mark)];
    }
    
$return = ["letters" => $return_1, "quantity" => $return_2];
return $return;
}

function unpacker_3($str){
    $count = count($str["letters"]);   
    
    for($i=0;$i<=$count;$i++){
        $num = ord($str["quantity"][$i]);
        for($j=0;$j<$num;$j++){
            $return .= $str["letters"][$i];
        }
    }
    
return $return;
}


?>
