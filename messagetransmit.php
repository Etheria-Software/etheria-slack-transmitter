<?php

////////////////////////////////////////////////
//              LGPL notice                   //
////////////////////////////////////////////////
/*
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Lesser General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Lesser General Public License for more details.
    You should have received a copy of the GNU Lesser General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
////////////////////////////////////////////////
//         used libraries/code modules        //
////////////////////////////////////////////////
/*
*/
////////////////////////////////////////////////
// 	       notes/requirements             //
////////////////////////////////////////////////
/*
php5 must be installed
*/
////////////////////////////////////////////////
//               Version info                 //
////////////////////////////////////////////////
/*
version 1
*/
////////////////////////////////////////////////
//               Developer Info               //
////////////////////////////////////////////////
/*
Name : James
Alias : Shadow AKA ShadowGauardian507-IRL
Contact : shadow@shadowguardian507-irl.tk
Alternate contact : shadow@etheria-software.tk
Note as an Anti-spam Measure I run graylisting on my mail servers, so new senders email will be held for some time before it 
arrives in my mail box,
please ensure that the service you are sending from tolerates graylisting on target address (most normal mail systems are 
perfectly happy with this)
This software is provided WITHOUT any SUPPORT or WARRANTY but bug reports and feature requests are welcome.
*/


function messagetransmit($url,$messagetitle,$botname,$color,$attfields,$icontype,$icondata,$room){
                $attfieldarry = json_decode("[".$attfields."]");
                $payloadarry = array(
                        "channel"  =>  "#{$room}",
                        "username" => $botname,
                        "fallback" => $messagetitle,
                        "pretext"  => $messagetitle,
                        "color"    => $color,
                        $icontype  => $icondata,
                        "fields"   => $attfieldarry
                        );

                $data = "payload=" . json_encode($payloadarry);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $result = curl_exec($ch);
                echo var_dump($result);
                if($result === false)
                {
                    echo 'Curl error: ' . curl_error($ch);
                }

                curl_close($ch);
}

?>

