<?php
    namespace EncX\EncX;

    class EncX{
    /**
     * The Security Level
     *
     * @var string
     */
     public $Seclvl = 5;

     /**
     * The Salting Key
     *
     * @var string
     */
     public $salt = 'UnsecureSaltKey';

        function enc($in){
            if($SecLvl = 1){
                return md5Enc($in);
            }elseif($SecLvl = 2){
                return sha1Enc(md5Enc($in));
            }elseif($SecLvl = 3){
                return cryptEnc(sha1Enc(md5Enc($in)));
            }elseif($SecLvl = 4){
                return sha256Enc(cryptEnc(sha1Enc(md5Enc($in))));
            }elseif($SecLevel = 5){
                return sha512Enc(sha256Enc(cryptEnc(sha1Enc(md5Enc($in)))));
            }
        }

        function md5Enc($in){
            $code = $in;
            while($i < $Seclvl){
                $code = md5($code);
                $i++;                
            }
            return $code;

        }

        function Sha1Enc($in){
            $code = $in;
            while($i < $Seclvl){
                $code = sha1($code);
                $i++;            
            }
            return $code;
        }

        function cryptEnc($in){
            $code = $in;
            while($i < $Seclvl){
                $code = crypt($code);
                $i++;            
            }
            return $code;
        }

        function sha256Enc($in){
            $code = $in;
            while($i < $Seclvl){
                $code = crypt($code,'$5$'.$salt.'$');
                $i++;
            }
            return $code;
        }

        function sha512Enc($in){
            $code = $in;
            while($i < $Seclvl){
                $code = crypt($code,'$6$'.$salt.'$');
                $i++;
            }
            return $code;
        }
    }
?>