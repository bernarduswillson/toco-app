<?php

class Merchandise extends Controller
{
    public function index()
    {
        $this->validateSession();

        $data["pageTitle"] = "Merch!";
        $data["user_id"] = $_SESSION['user_id'];

        $baseUrl = 'http://soap:8080/service/gems';

        $soapRequest = '<x:Envelope
                            xmlns:x="http://schemas.xmlsoap.org/soap/envelope/"
                            xmlns:ser="http://service.toco.org/">
                            <x:Header/>
                            <x:Body>
                                <ser:getGems>
                                    <user_id>' . $data["user_id"] . '</user_id>
                                </ser:getGems>
                            </x:Body>
                        </x:Envelope>';

        $ch = curl_init($baseUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $soapRequest);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: text/xml',
                'SOAPAction: getGems',
                'X-api-key: toco_php'
            )
        );

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        }

        curl_close($ch);
        $data['gems'] = $response;
        
        if (preg_match('/<return>(\d+)<\/return>/', $response, $matches)) {
            $data['gems'] = (int)$matches[1];
        } else {
            echo 'Error extracting numeric value from XML response.';
        }

        $this->view('header/index', $data);
        $this->view('navbar/index');
        $this->view('merchandise/index', $data);
        $this->view('footer/index');
    }
}