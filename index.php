<?php
define('BOT_TOKEN', '6721406026:AAHO5AGgz3f4OZD_Z0nSofoISwr_-coWGJc');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

function sendMessage($chatId, $text, $replyMarkup) {
    $url = API_URL . 'sendMessage';
    $data = [
        'chat_id' => $chatId,
        'text' => $text,
        'reply_markup' => $replyMarkup,
    ];

    $options = [
        'http' => [
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => http_build_query($data),
        ],
    ];

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        // Handle error
        return false;
    }

    return $result;
}

$chatId = 'Foydalanuvchi_Chat_IDsi'; // Foydalanuvchi chat ID'si o'zgartiring
$text = 'Ruxsat so\'rovi';
$inlineKeyboard = [
    'inline_keyboard' => [
        [
            ['text' => 'Ruxsat berish', 'callback_data' => 'allow'],
            ['text' => 'Ruxsat bermaslik', 'callback_data' => 'deny'],
        ],
    ],
];

$replyMarkup = json_encode($inlineKeyboard);
$result = sendMessage($chatId, $text, $replyMarkup);

if ($result !== false) {
    echo "Xabar yuborildi!";
} else {
    echo "Xatolik yuz berdi";
}
?>
