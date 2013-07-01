<?php
SQLRejection();
Function SQLRejection(){
    # definisikan SQL Injection Chars pada sebuah variable array
    $SQLInjectionChars = array("'","-","\"","\\","+","@","/","*","(",")","=",","," ");

    # ambil semua request atau input yang di kirim
    $REQUEST = $_GET;

    # cek keberadaan karakter sql injection
    foreach($REQUEST as $varname => $value){
        $filtered = false;
        
        #cek karakter demi karakter
        for($i = 0; $i <= strlen($value); $i++){
            $karakter = substr($value,$i,1);
            if(!in_array($karakter,$SQLInjectionChars)) {
                #jika karakter tidak berada pada array $SQLInjectionChars
                # maka tambahkan karakter pada $filtered
                $filtered .= $karakter;
            }
        }
        #cek karakter sqli pada $filtered
        for($i = 0; $i < count($SQLInjectionChars); $i++){
            $filtered = str_replace($SQLInjectionChars[$i],"",$filtered);
        }
        
        #input clear
        
        #buat variable baru (replace) dengan nama yang sama tetapi value baru
        $_GET[$varname] = addslashes($filtered);
        
        #input aman    
    }
}
?>
