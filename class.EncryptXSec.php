<?php
/**
 * EncryptX Cryptography Class For PhP
 * Tested In PHP Version 5.5.
 *
 * @see https://github.com/MrSMechatronics/EncryptX
 *
 * @author Mr.S Mechatronics <mr.smechatronics@gmail.com>
 * @license   http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */
namespace EncX;

use mysqli;


/**
 * EncryptX Cryptography Class For PhP
 *
 * @author Mr.S Mechatronics <mr.smechatronics@gmail.com>
 */
class EncXSec
{
        /**
         * The Salting Key
         *
         * @var string
         */
        protected $salt = 'UnsecureSaltKey';

        function __construct($saltIn = 'UnsecureSaltKey', $devMode = false){
                $this->salt = $saltIn;
                if($devMode){
                        error_reporting(E_ALL);
                }elseif(!$devMode){
                        error_reporting(0);
                }
        }

        function enc($in){
                $head = "abcdefgh";
                $midp = "jklmnopq";
                $foot = "stuvwxyz";
                $hash = str_rot13($in);
                $hash = crypt($hash, "$5$".$this->salt."$");
                $hash = crypt($hash, "$6$".$this->salt."$");
                $hash = str_replace("$","d",$hash);
                $hash = str_replace(".","p",$hash);
                $hash = str_replace("/","bs",$hash);
                $hash = strtolower($hash);
                $onep = substr($hash,1,8);
                $twop = substr($hash,8,8);
                $hash = str_shuffle($head).str_rot13($onep).str_shuffle($midp).str_rot13($twop).str_shuffle($foot);
                return $hash;
        }

        function check($in,$InHash){
                $hash = str_rot13($in);
                $hash = crypt($hash, "$5$".$this->salt."$");
                $hash = crypt($hash, "$6$".$this->salt."$");
                $hash = str_replace("$","d",$hash);
                $hash = str_replace(".","p",$hash);
                $hash = str_replace("/","bs",$hash);
                $hash = strtolower($hash);
                $onep = substr($hash,1,8);
                $twop = substr($hash,8,8);
                $hash = str_rot13($onep).str_rot13($twop);
                $InHash = substr($InHash,8,8).substr($InHash,24,8);
                if(similar_text($hash,$InHash) == 16){
                        return true;
                }else{
                        return false;
                }
        }
}

class EncXQL extends EncXSec
{
        function __construct($host, $dbusername, $dbpassword, $dbname){
                $EncXQLconn = new mysqli($host, $dbusername, $dbpassword, $dbname);
                if ($EncXQLconn->connect_error) {
                        die("Connection failed: " . $EncXQLconn->connect_error);
                }
        }

        function createUser($table,$columnName,$){

        }
}
?>
