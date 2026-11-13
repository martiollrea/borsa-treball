<?php
define('API_BASE_URL', 'http://localhost/borsa-treball/backend-api/api');

// Envia una petició HTTP cURL cap a l'API REST
function fer_peticio_api($endpoint, $metode = 'GET', $dades = null, $token = null)
{
  $url = API_BASE_URL . $endpoint;
  $ch = curl_init($url);

  $headers = ['Content-Type: application/json'];
  if ($token !== null) {
    $headers[] = 'Authorization: Bearer ' . $token;
  }

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $metode);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  if ($dades !== null) {
    $payload = json_encode($dades);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
  }

  $resposta = curl_exec($ch);
  $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

  if (curl_errno($ch)) {
    $error_msg = curl_error($ch);
    curl_close($ch);
    return [
      'code' => 500,
      'body' => ['message' => 'Error cURL: ' . $error_msg]
    ];
  }

  curl_close($ch);

  return [
    'code' => $http_code,
    'body' => json_decode($resposta, true)
  ];
}
