<?php
// backend-api/config/auth_helper.php

if (!defined('SECRET_KEY')) {
  define('SECRET_KEY', 'la_teva_clau_secreta_super_segura_12345');
}

/**
 * Valida el token JWT rebut a la capçalera HTTP Authorization.
 * Si el token és vàlid, retorna el Payload amb les dades de l'usuari.
 * Si no és vàlid o falta, atura l'execució enviant un codi 401.
 * 
 * @return array Payload del JWT autenticat
 */
function requerir_autenticacio()
{
  $headers = getallheaders();
  $authHeader = $headers['Authorization'] ?? $headers['authorization'] ?? '';

  // 1. Validar que la capçalera existeix i té format "Bearer <token>"
  if (empty($authHeader) || !preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
    http_response_code(401);
    echo json_encode(["status" => "error", "message" => "Accés denegat: Falta el token d'autenticació (Bearer)."]);
    exit;
  }

  $jwt = $matches[1];
  $token_parts = explode('.', $jwt);

  if (count($token_parts) !== 3) {
    http_response_code(401);
    echo json_encode(["status" => "error", "message" => "Format de token JWT invàlid."]);
    exit;
  }

  list($header_b64, $payload_b64, $signature_b64) = $token_parts;

  // 2. Recalcular la signatura per verificar que no ha estat manipulat
  // Correcció del punt 2 (Signatura)
  $valid_signature = hash_hmac('sha256', $header_b64 . "." . $payload_b64, SECRET_KEY, true);
  $base64ValidSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($valid_signature));

  if ($base64ValidSignature !== $signature_b64) {
    http_response_code(401);
    echo json_encode(["status" => "error", "message" => "Token invàlid! La signatura no coincideix."]);
    exit;
  }

  // 3. Descodificar el Payload i verificar si ha caducat
  $payload_json = base64_decode(str_replace(['-', '_'], ['+', '/'], $payload_b64));
  $payload = json_decode($payload_json, true);

  if (isset($payload['exp']) && $payload['exp'] < time()) {
    http_response_code(401);
    echo json_encode(["status" => "error", "message" => "El token ha caducat, cal tornar a fer login."]);
    exit;
  }

  // Si tot és correcte, retornem les dades de l'usuari/empresa del Token
  return $payload;
}
