<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            'BBQ area' => 'Зона для барбекю',
            'Fully equipped kitchen' => 'Полностью оборудованная кухня',
            'Jacuzzi' => 'Джакузи',
            'Laundry Area' => 'Прачечная зона',
            'Salt Water Swimming Pool' => 'Бассейн с солёной водой',
            'Private Wi-Fi' => 'Частный Wi‑Fi',
            'Co-Working Space' => 'Коворкинг',
            '24-hour Security' => 'Круглосуточная охрана',
            'Access Control' => 'Контроль доступа',
            'Built-in furniture' => 'Встроенная мебель',
            'Car hire available' => 'Аренда автомобиля',
            'CCTV' => 'Видеонаблюдение',
            'Concierge Service' => 'Консьерж-сервис',
            'Parking' => 'Парковка',
            'Shuttle Bus' => 'Трансфер',
            'Water filtration system' => 'Система фильтрации воды',
            'Common Area' => 'Общая зона',
            'Common Pool' => 'Общий бассейн',
            'Key Card Access' => 'Доступ по ключевой карте',
            'Gym' => 'Тренажёрный зал',
            'Juristic Management' => 'Юридическое управление',
            'Management Office' => 'Офис управления',
            'Reception' => 'Ресепшн',
            'Rooftop Pool' => 'Бассейн на крыше',
            'Pet Friendly' => 'Дружелюбный к животным',
            'Covered Garage' => 'Крытый гараж',
            'Storage Room' => 'Кладовая',
            'Underground Electricity Supply' => 'Подземное электроснабжение',
            'Maintenance Services' => 'Сервисное обслуживание',
            'Cafe & Restaurant' => 'Кафе и ресторан',
            'Multifunction room' => 'Многофункциональный зал',
            'Yoga & Sauna' => 'Йога и сауна',
            'Villa Service' => 'Обслуживание виллы',
            'Solar Power System' => 'Солнечная энергетическая система',
            'Smart Home Technology' => 'Технология умного дома',
        ];

        foreach ($features as $en => $ru) {
            DB::table('features')->insert([
                'name' => json_encode([
                    'en' => $en,
                    'ru' => $ru,
                ]),
            ]);
        }
    }
}
