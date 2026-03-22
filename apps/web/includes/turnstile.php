<?php

require_once __DIR__ . '/config.php';

/**
 * Cloudflare Turnstile のトークンをサーバー側で検証する
 *
 * @param string $token  フォームから送られた cf-turnstile-response の値
 * @param string $ip     送信者の IP アドレス（$_SERVER['REMOTE_ADDR']）
 * @return bool          検証成功なら true
 */
function turnstile_verify(string $token, string $ip): bool
{
    if (empty($token)) {
        return false;
    }

    $payload = http_build_query([
        'secret'   => TURNSTILE_SECRET_KEY,
        'response' => $token,
        'remoteip' => $ip,
    ]);

    $context = stream_context_create([
        'http' => [
            'method'  => 'POST',
            'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
            'content' => $payload,
            'timeout' => 5,
        ],
    ]);

    $response = @file_get_contents(
        'https://challenges.cloudflare.com/turnstile/v0/siteverify',
        false,
        $context
    );

    if ($response === false) {
        error_log('[contact] Turnstile: failed to reach verification endpoint');
        return false;
    }

    $data = json_decode($response, true);
    return (bool) ($data['success'] ?? false);
}
