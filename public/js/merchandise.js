// const soapApiKey = 'your_api_key';

const soapRequest = `<x:Envelope
xmlns:x="http://schemas.xmlsoap.org/soap/envelope/"
xmlns:ser="http://service.toco.org/">
<x:Header/>
<x:Body>
    <ser:getGems>
        <arg0>1</arg0>
    </ser:getGems>
</x:Body>
</x:Envelope>`;

const soapUrl = 'http://localhost:8080/gems';

const headers = new Headers({
    'Content-Type': 'text/xml',
    'SOAPAction': 'getGems',
    // 'Authorization': 'ApiKey ' + soapApiKey,
});

const requestOptions = {
    method: 'POST',
    headers: headers,
    body: soapRequest,
};

fetch(soapUrl, requestOptions)
    .then(response => response.text())
    .then(data => {
        console.log('Response:', data);
        // Handle respons di sini
    })
    .catch(error => {
        console.error('Error:', error);
    });
