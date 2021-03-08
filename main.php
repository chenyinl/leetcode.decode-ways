class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function numDecodings($s) {
        $r = [];
        if($s[0]=='0') return 0;
        $len = strlen($s);
        
        $r[0] = 1;
        $r[1] = ($s[0]==0)?0:1;
        //$r[2] = 2;
        for($i=2; $i<=$len; $i++){//var_dump($i);
            $lastNumber = ((int)$s[$i-2])*10 + (int)$s[$i-1];
            echo $lastNumber."-";
            if($lastNumber == 0){return 0;}
            
            if((int)$s[$i-1]==0){
                if($lastNumber>26) return 0;
                $r[$i]=$r[$i-2];
                continue;
            }
           
            if($lastNumber>10 && $lastNumber<=26 && $lastNumber!=20){
                $r[$i] = $r[$i-2]+$r[$i-1];
            }else{
                $r[$i] = $r[$i-1];
            }
        }
        var_dump($r);
        return $r[$len];
    }
}
