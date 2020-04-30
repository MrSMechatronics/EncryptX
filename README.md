## Class Features
- [x]Secure Encryption
- [x]Easy To Use
- [x]Cannot Be Cracked
- [x]Secure From SQLInjection Hacking Technique
- [x]Secure From Header-Injection Hacking Technique
- [x]Alert For Sucspicious Inputs
- [x]Irreversible Hashes
- [x]No Clash Between Hashes Of Two Different Passwords
- [x]No Compromise Of User Details
- [x]Hackers Can't Get The The Details Even After Getting Access To Your Server


## Why you might need it
Many Web And Php Developers Need To Create Accounts For Their Users And Thus Need To Store Some Incompromisable Details Of The Users. 
However In Todays Cyber Era No 
Place In The World Is Secure Where To Survive We Need To Secure Ourselves And Our Users. But Where Our Users Can Be Potential Attackers
We Need Something To Secure Ourselves From Them. Most User-Based Attacks Are In The From Of SQLInjection Or Header-Injection Attacks So 
We Need Filter Out The Information They Give Us At Every Step.


## How To Use EncryptXSecure
Starting EncryptXSecure
```
use EncX\EncXSec;
include 'class.EncryptXSecure.php';

$enc = new EncXSec($salt,$DevMode);
```
__Note :__ -Do Not Play Play With The Use Statement.
           -Replace ['class.EncryptXSecure.php'] With The Location Of The File.
                -_No Need To Change If The Class File Is In The Same Directory._
           -Set $DevMode To False If Publishing.


Check A Hash:
```
check($in,$InHash);
```
__Note :__ -Replace ['$in'] With The Value And ['$InHash'] With The Hash.


## License
This software is distributed under the [LGPL 2.1](http://www.gnu.org/licenses/lgpl-2.1.html) license, along with the 
[GPL Cooperation Commitment](https://gplcc.github.io/gplcc/). Please read LICENSE for information on the software availability and distribution.
