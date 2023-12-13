# Класс для работы с Telegram по API
В данном репозитории представлены методы и классы для работы с API Telegram.
Класс TelegramMethods содержит в себе методы для отправки запросов в Telegram и все необходимые доступы.

Курс по работе с API Telegram - [https://prog-time.ru/course_cat/yandeks-disk-api-php/](https://prog-time.ru/course_cat/telegram-bot-basic/)

Ниже я представлю примеры кода для отправки запросов в Telegram.

Для всех примеров создаём экземпляр класса
```
$bot = new TelegramMethods();
```
Для отправки простых запросов используем метод **sendQueryTelegram**. Данный метод в качестве первого аргумента принимает метод запроса, в качестве второго - массив с параметрами запроса.

## Отправка текстового сообщения
```
$dataQuery = [
  "chat_id" => 1233121,
  "text" => "Новое сообщение",
  "parse_mode" => "html"
];

$bot->sendQueryTelegram("sendMessage", $dataQuery);
```

## Отправка ответа на сообщение
```
$dataQuery = [
  "chat_id" => 1233121,
  "text" => "Новое сообщение из формы",
  "parse_mode" => "html",
  "reply_to_message_id" => 7
];

$bot->sendQueryTelegram("sendMessage", $dataQuery);
```

## Удаление сообщения
```
$dataQuery = [
  "chat_id" => 1233121,
  "message_id" => 7
];

$bot->sendQueryTelegram("deleteMessage", $dataQuery);
```

## Отправка кнопок в чат
```
$keyboard = [
  [
    [
      "text" => "Button 1",
      "callback_data" => "test_2",
    ],
    [
      "text" => "Button 2",
      "callback_data" => "test_2",
    ]
  ],
  [
    [
      "text" => "Button 1",
      "callback_data" => "test_3",
    ],
  ]
];

$dataQuery = [
  "chat_id" => 1233121,
  "text" => "Новое сообщение",
  "parse_mode" => "html",
  "reply_markup" => json_encode(
    [
      "inline_keyboard" => $keyboard
    ]
  )
];

$bot->sendQueryTelegram("sendMessage", $dataQuery);
```

## Отправка клавиатуры в чат
```
$keyboard = [
  [
    [
      "text" => "Button 1",
      "url" => "https://test.ru",
    ],
    [
      "text" => "Button 2",
    ]
  ],
  [
    [
      "text" => "Button 1",
    ],
  ]
];

$dataQuery = [
  "chat_id" => 1233121,
  "text" => "Новое сообщение",
  "parse_mode" => "html",
  "reply_markup" => json_encode(
    [
      "keyboard" => $keyboard,
      "one_time_keyboard" => true,
      "resize_keyboard" => true,
    ]
  )
];

$bot->sendQueryTelegram("sendMessage", $dataQuery);
```

## Отправка изображений
```
$dataQuery = [
  "chat_id" => 1233121,
  "caption" => "Подпись к файлу",
  "photo" => curl_file_create("путь_к_файлу")
];

$bot->sendQueryTelegram("sendPhoto", $dataQuery);
```

## Отправка файлов
```
$dataQuery = [
  "chat_id" => 1233121,
  "caption" => "Подпись к файлу",
  "document" => curl_file_create("путь_к_файлу")
];

$bot->sendQueryTelegram("sendDocument", $dataQuery);
```

