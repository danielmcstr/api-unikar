
<?php
/**
 * Exemplo de requisição com sucesso
 * Subistuir $placa e $token pelos valores correspondentes.
 */
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://unigestor.com.br/unikar/_modulos/asaas/segundaviaboleto.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('placa' => $placa,'offset' => '0','limit' => '1'),
  CURLOPT_HTTPHEADER => array(
    "X-Token: $token",
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

/**
 * Exemplo de resposta
 * 
 * {
 *   "error": false,
 *   "mensagem": "Payments found successfuly",
 *   "data": [
 *        {
 *           "dueDate": "2021-08-10",
 *           "bankSlipUrl": "https://www....",
 *           "description": "...",
 *           "value": 99.99,
 *          "status": "PENDING"
 *       }
 *  ]
 * }
 * 
 */