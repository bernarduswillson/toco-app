<?php

class Merchandise extends Controller
{
    public function index()
    {
        $this->validateSession();

        $data["pageTitle"] = "Merch!";
        $data["user_id"] = $_SESSION['user_id'];

        $baseUrl = 'http://10.97.58.62:8080/gems';

        $soapRequest = '<x:Envelope
                            xmlns:x="http://schemas.xmlsoap.org/soap/envelope/"
                            xmlns:ser="http://service.toco.org/">
                            <x:Header/>
                            <x:Body>
                                <ser:getGems>
                                    <arg0>1</arg0>
                                </ser:getGems>
                            </x:Body>
                        </x:Envelope>';

        $ch = curl_init($baseUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $soapRequest);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: text/xml',
            'SOAPAction: getGems'
        )
        );

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        }

        curl_close($ch);
        $data['gems'] = $response;


        $this->view('header/index', $data);
        $this->view('navbar/index');
        $this->view('merchandise/index', $data);
        $this->view('footer/index');
    }
}