<?php

class Transaction extends Controller
{
  public function index()
  {
    $this->validateSession();

    $data["pageTitle"] = "Transaction History";
    $data["user_id"] = $_SESSION['user_id'];

    // user's transaction
    $baseUrl = 'http://soap:8080/service';

    $soapRequest = '<x:Envelope
                        xmlns:x="http://schemas.xmlsoap.org/soap/envelope/"
                        xmlns:ser="http://service.toco.org/">
                        <x:Header/>
                        <x:Body>
                            <ser:getTransactions>
                                <user_id>' . $data["user_id"] . '</user_id>
                            </ser:getTransactions>
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
            'SOAPAction: getTransactions',
            'X-api-key: toco_php'
        )
    );

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
    }

    curl_close($ch);
    $data['transaction'] = $response;

    if (preg_match_all('/<return>(.*?)<\/return>/', $response, $matches)) {
        $data['transaction'] = [];
    
        foreach ($matches[1] as $match) {
            $components = explode(', ', $match);
            $transaction = [
                'amount' => intval($components[0]),
                'action' => $components[1],
                'status' => $components[2],
                'created_at' => $components[3]
            ];
            $data['transaction'][] = $transaction;
        }
    } else {
        $data['transaction'] = [];
    }    

    $this->view('header/index', $data);
    $this->view('navbar/index');
    $this->view('transaction/index', $data);
    $this->view('footer/index');
  }
}