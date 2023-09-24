<?
namespace app;

class ArrayHelper {

    /**
     * @description: in case of join it combines the values ​​and avoids repetitions
     */
    public static function fixer(array $array):array{

        $arr= array_intersect( $array[0],$array[1]);

        $key = array_keys(array_diff($array[0],$arr)); 

        foreach($key as $k){
            if($k)
                $arr[$k]=array_column($array,$k);
        }
        
        return $arr;

    }

    /**
     * @description: returns an array containing the key values 
     */
    public static function multiarray_keys($array):array{

        foreach($array as $k => $v) {

            $keys[] = $k;

            if (is_array($array[$k])) {
                
                $keys = array_merge($keys, self::multiarray_keys($array[$k]));
            }
        }
        return $keys;
    } 

    /**
     * @description: implode function recursive for multiarray
     */
    static public function imploderec(array $array, string $str=''):string{

        foreach($array as $key => $val){
            
            if(is_array($val))
                $str = self::imploderec($val,$str." $key => [")."]";
    
            if(is_string($val)||is_numeric($val))
                $str .= " $key => $val ";
            
        }
    
        return $str;
    
    }

}