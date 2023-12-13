<?php

class TelegramMethods {
    
    /**
     * Токен Telegram бота
     *
     * @var string
     */
    protected $token = "токен_бота";

    /**
     * Отправка запроса в Telegram
     *
     * @param  string $method
     * @param  array $arrayQuery
     * @return void
     */
    public function sendQueryTelegram(string $method, array $arrayQuery = []) 
    {
        $ch = curl_init("https://api.telegram.org/bot". $this->token ."/" . $method . "");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $arrayQuery);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type:multipart/form-data"]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

}
