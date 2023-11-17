<?php

class Merchandise extends Controller
{
    public function index()
    {
        $this->validateSession();

        $data["pageTitle"] = "Merch!";
        $data["user_id"] = $_SESSION['user_id'];
        $data["email"] = $_SESSION['email'];

        // user's gems
        $baseUrl = 'http://soap:8080/service';

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
        $data['gems'] = $response;

        if (curl_errno($ch)) {
            $data['gems'] = "-1";
        }

        curl_close($ch);

        if (preg_match('/<return>(\d+)<\/return>/', $response, $matches)) {
            $data['gems'] = (int) $matches[1];
        } else {
        }

        // merch
        $baseUrl = 'http://express:5000/merch?apiKey=' . getenv('REST_API_KEY');
        $ch = curl_init($baseUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $merch = json_decode($response, true);

        $data["merch"] = $merch['result'] ?? [];

        $this->view('header/index', $data);
        $this->view('navbar/index');
        $this->view('merchandise/index', $data);
        $this->view('footer/index');
    }

    public function confirmation($merchId = null)
    {
        $this->validateSession();
        $this->validateParamMerch($merchId);

        // Confirmation
        if (isset($merchId) && !empty($merchId)) {
            $data["pageTitle"] = "Test your knowledge!";
            $data["merch_id"] = intval($merchId);
            $data["user_id"] = $_SESSION['user_id'];

            $query = $this->getQuery();
            $data["isSuccess"] = -1;

            if (isset($query["success"])) {
                $data["isSuccess"] = $query["success"];
            }

            // user's gems
            $baseUrl = 'http://soap:8080/service';

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
                $data['gems'] = (int) $matches[1];
            } else {
                echo 'Error extracting numeric value from XML response.';
            }

            // merch
            $baseUrl = 'http://express:5000/merch/' . $merchId . "?apiKey=" . getenv('REST_API_KEY');
            $ch = curl_init($baseUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $merch = json_decode($response, true);

            $data["merch"] = $merch['result'];

            $this->view('header/index', $data);
            $this->view('navbar/index');
            $this->view('confirmation/index', $data);
            $this->view('footer/index');
        }
    }

    public function validateParamMerch($merchId)
    {
        if (isset($merchId) && !empty($merchId)) {
            $baseUrl = 'http://express:5000/merch/validate/' . $merchId . "?apiKey=" . getenv('REST_API_KEY');
            $ch = curl_init($baseUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $valid = json_decode($response, true);

            $valid = $valid['result'] ?? [];

            if ($valid === true) {
                return;
            }

            $this->show404();
            exit();
        }
    }
}