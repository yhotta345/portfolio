<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/config.php';

/**
 * お問い合わせメールを送信する
 *
 * @return bool 送信成功なら true
 *
 * TODO: 将来的に GraphQL mutation API へ差し替える場合は
 *       この関数の内部実装のみを変更すればよい
 */
function send_contact_mail(string $name, string $email, string $message, array $inquiryTypes = []): bool
{
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = SMTP_USER;
        $mail->Password   = SMTP_PASS;
        $mail->SMTPSecure = SMTP_SECURE;
        $mail->Port       = SMTP_PORT;
        $mail->CharSet    = 'UTF-8';

        $senderName = 'Yoshihiro Hotta Portfolio Contact';
        $mail->setFrom(MAIL_FROM, $senderName);
        $mail->addAddress(MAIL_TO);
        $mail->addReplyTo($email, $name); // 返信先を送信者に設定

        $typesLabel = !empty($inquiryTypes) ? implode('、', $inquiryTypes) : '未選択';

        $mail->Subject = "お問い合わせ: {$name}（{$typesLabel}）";
        $mail->Body    = implode("\n", [
            "お名前     : {$name}",
            "Email      : {$email}",
            "お問い合わせ種別: {$typesLabel}",
            str_repeat('-', 40),
            $message,
        ]);

        $mail->send();

        // 送信者への自動返信
        $reply = new PHPMailer(true);
        $reply->isSMTP();
        $reply->Host       = SMTP_HOST;
        $reply->SMTPAuth   = true;
        $reply->Username   = SMTP_USER;
        $reply->Password   = SMTP_PASS;
        $reply->SMTPSecure = SMTP_SECURE;
        $reply->Port       = SMTP_PORT;
        $reply->CharSet    = 'UTF-8';

        $reply->setFrom(MAIL_FROM, $senderName);
        $reply->addAddress($email, $name);
        $reply->Subject = "【自動返信】お問い合わせを受け付けました";
        $reply->Body    = implode("\n", [
            "{$name} 様",
            "",
            "お問い合わせいただきありがとうございます。",
            "以下の内容でお問い合わせを受け付けました。",
            "内容を確認のうえ、改めてご連絡いたします。",
            "",
            str_repeat('-', 40),
            "お名前     : {$name}",
            "Email      : {$email}",
            "お問い合わせ種別: {$typesLabel}",
            str_repeat('-', 40),
            $message,
            str_repeat('-', 40),
            "",
            "※このメールは自動送信です。このメールへの返信はできません。",
        ]);

        $reply->send();

        return true;
    } catch (Exception $e) {
        // エラーログに記録（本番環境でデバッグに使用）
        error_log('[contact] PHPMailer error: ' . $mail->ErrorInfo);
        return false;
    }
}
