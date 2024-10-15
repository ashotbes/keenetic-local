<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class SendTranslationsToDirectus extends Command
{
    protected $signature = 'app:send-translations-to-directus';
    protected $description = 'Send translations to directus';

    public function handle()
    {
        $client = new Client();
        $baseLangPath = resource_path('lang');
        $token = 'tqTYVpQVbdWXj8zn1brCCR7M2UsCCAfS';

        $languages = ['en', 'de', 'fr'];

        // Получаем все существующие записи в коллекции languages
        $existingResponse = $client->get('http://0.0.0.0:8055/items/languages', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        $existingData = json_decode($existingResponse->getBody(), true);

        // Проверяем структуру ответа
        if (!isset($existingData['data'])) {
            $this->error("Неверная структура ответа от API: " . print_r($existingData, true));
            return;
        }

        // Сохраняем все существующие ключи и коды в массив
        $existingKeys = [];
        foreach ($existingData['data'] as $item) {
            // Проверяем, что поле key существует
            if (isset($item['key']) && isset($item['code'])) {
                $existingKeys[$item['key'] . '_' . $item['code']] = true;
            } else {
                $this->error("Пропущено поле: " . print_r($item, true));
            }
        }

        foreach ($languages as $lang) {
            $langPath = "{$baseLangPath}/{$lang}/index.json";

            if (File::exists($langPath)) {
                $translations = json_decode(File::get($langPath), true);
                foreach ($translations as $key => $value) {
                    // Проверяем, существует ли ключ с текущим кодом языка
                    $uniqueKey = $key . '_' . $lang;
                    if (!isset($existingKeys[$uniqueKey])) {
                        $response = $client->post('http://0.0.0.0:8055/items/languages', [
                            'json' => [
                                'key' => $key,
                                'text' => $value,
                                'language' => $lang,
                                'code' => $lang,
                            ],
                            'headers' => [
                                'Authorization' => 'Bearer ' . $token,
                            ],
                        ]);

                        if ($response->getStatusCode() !== 200) {
                            $this->error("Ошибка отправки перевода: {$key} для языка {$lang}");
                        } else {
                            $this->info("Перевод отправлен: {$key} для языка {$lang}");
                        }
                    } else {
                        $this->info("Запись с ключом {$key} и кодом {$lang} уже существует. Пропуск.");
                    }
                }
            } else {
                $this->error("Файл не найден: {$langPath}");
            }
        }
    }
}
