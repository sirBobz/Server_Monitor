<?php
/**
 * PHP Server Monitor
 * Monitor your servers and websites.
 *
 * This file is part of PHP Server Monitor.
 * PHP Server Monitor is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * PHP Server Monitor is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with PHP Server Monitor.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package     phpservermon
 * @author      Perri Vardy-Mason
 * @copyright   Copyright (c) 2008-2014 Pepijn Over <pep@neanderthal-technology.com>
 * @license     http://www.gnu.org/licenses/gpl.txt GNU GPL v3
 * @version     Release: v3.1.1
 * @link        http://www.phpservermonitor.org/
 * @since       phpservermon 2.1
 **/

namespace psm\Txtmsg;

class Textmarketer extends Core {
    // =========================================================================
    // [ Fields ]
    // =========================================================================
    public $gateway = 1;
    public $resultcode = null;
    public $resultmessage = null;
    public $success = false;
    public $successcount = 0;
    

    public function sendSMS($message) {

        // $textmarketer_url = "http://52.38.127.14/ucm_api/index.php";
        // $textmarketer_data = urlencode( $message );
        // $textmarketer_origin = urlencode( 'SERVERALERT' );


        // foreach( $this->recipients as $phone ){

        //     $URL = $textmarketer_url."?username=" . $this->username . "&password=" . $this->password . "&to=" . $phone . "&message=" . $textmarketer_data . "&orig=" . $textmarketer_origin;

        //     $result = file_get_contents( $URL );

        // }

        // return $result;


   $arraydata = array(
     "reference"=>"ref14263384923932",

        "user_id"=>"22",

        "org_id"=>"11",

        "subject"=>"Test Message",

        "src_address"=>"DIBON",

        "dst_address"=>"+254721553678",
        "message_type"=>"1",

        "auth_key"=>"43122fb8e9a3a83470e47d958a126970",

        "message"=>"This is a test message

      from

         UCM","app_id"=>"600101",

         "operation"=>"send",

         "timestamp"=>"20160722092813"

  );


            $jsonDataEncoded = json_encode($arraydata);

            //API Url

            $url = 'http://52.38.127.14/ucm_api/index.php';

            //Initiate cURL.
            $ch = curl_init($url);


            //Tell cURL that we want to send a POST request.
            curl_setopt($ch, CURLOPT_POST, 1);

            //Attach our encoded JSON string to the POST fields.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);


            //Set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

            //Execute the request
            $result = curl_exec($ch);

            curl_close($ch);
            return $result;
    }

}
