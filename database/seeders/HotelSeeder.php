<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Floor;
use App\Models\Hotel;
use App\Models\Tag;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable model events to bypass the creating and deleting events
        Hotel::withoutEvents(function () {
            // FAKE DATA
//            $types = Type::all();
//            $tags = Tag::factory(10)->create(); // Create 10 tags
//            $features = Feature::factory(10)->create(); // Create 10 features
//
//            // Create 20 hotels
//            Hotel::factory(20)->create()->each(function ($hotel) use ($types, $tags, $features) {
//                // Manually set the created_at and updated_at fields
//                $createdAt = Carbon::now()->subDays(rand(0, 30)); // Random date in the last 30 days
//                $updatedAt = Carbon::now()->subDays(rand(0, 30)); // Random date in the last 30 days
//
//                // Update the hotel with the created_at and updated_at
//                $hotel->update([
//                    'created_at' => $createdAt,
//                    'updated_at' => $updatedAt,
//                ]);
//
//                // Attach random tags
//                $hotel->types()->attach($types->random(rand(1, 3))->pluck('id')->toArray());
//
//                // Attach random tags
//                $hotel->tags()->attach($tags->random(rand(1, 10))->pluck('id')->toArray());
//
//                // Attach random features
//                $hotel->features()->attach($features->random(rand(1, 10))->pluck('id')->toArray());
//
//                // Create floors for each hotel
//                Floor::factory(rand(1, 5))->create(['hotel_id' => $hotel->id]);
//
//                // Optionally, you can set a different `updated_at` for each update action
//                $hotel->touch(); // Updates the `updated_at` field only if needed
//            });

            // REAL DATA
            $hotels = [
                // 1. Hennessy Residence
                [
                    'title'          => 'Hennessy Residence',
                    'description'    => [
                        'en' => "Hennessy Residence Phuket is an upscale, modern development that embodies contemporary luxury and refined living. The project features exclusive residences designed with sleek architecture, spacious interiors, and high-end finishes, offering a seamless blend of comfort and sophistication. Each unit is thoughtfully crafted to provide a private and serene living environment, complete with modern amenities and lush surroundings.<br />Situated in one of Phuket's sought‐after areas, Hennessy Residence enjoys a prime location close to the island’s top attractions. With easy access to beaches, shopping districts, and fine dining, residents can enjoy the best of Phuket’s vibrant lifestyle while residing in a peaceful, well-connected area.<br />Hennessy Residence is ideal for luxury property seekers, including families, couples, and professionals, who desire a stylish and comfortable home in Phuket. It suits those looking for a balance between privacy and proximity to key lifestyle amenities, making it a perfect choice for long-term residents or investors looking for a high-end property in a prime location.",
                        'ru' => "Residence Hennessy на Пхукете — это современный, роскошный комплекс, олицетворяющий современную роскошь и изысканный стиль жизни. Проект предлагает эксклюзивные резиденции, спроектированные с элегантной архитектурой, просторными интерьерами и высококачественной отделкой, обеспечивая гармоничное сочетание комфорта и утонченности. Каждая квартира продумана до мелочей, чтобы предоставить приватную и спокойную обстановку с современными удобствами и пышной зеленью вокруг.<br />Расположенный в одном из самых востребованных районов Пхукета, Hennessy Residence занимает привилегированное место рядом с главными достопримечательностями острова. С легким доступом к пляжам, торговым районам и изысканным ресторанам, жители могут наслаждаться лучшей стороной яркой жизни Пхукета, проживая в спокойном и хорошо связанном с инфраструктурой районе.<br />Hennessy Residence идеально подходит для ценителей роскошной недвижимости, в том числе для семей, пар и профессионалов, ищущих стильное и комфортное жилье на Пхукете. Этот комплекс подойдет тем, кто хочет сочетать уединенность с близостью к важнейшим удобствам, что делает его идеальным выбором для постоянного проживания или инвестиций в элитную недвижимость.",
                    ],
                    'codename'       => 'IE-RNT-001',
                    'latitude'       => 8.010658936,
                    'longitude'      => 98.30201626,
                    'price'          => 350000,
                    'main_image_url' => 'https://ignatevestate.co.th/wp-content/uploads/2024/06/Laguna-Links-Villas-Ignatev-Estate-026.jpg',
                    'active'         => 1,
                    'location'       => [
                        'en' => 'Phuket',
                        'ru' => 'Пхукет',
                    ],
                    'location_description' => [
                        'en' => 'Quiet paradise with 5km white sand beach and premium hotels',
                        'ru' => 'Тихий рай с 5 км белоснежным пляжем и премиальными отелями',
                    ],
                    'tags'    => [1],                  // Villa
                    'features' => [1,2,3,4,5,6,7],      // BBQ area, Fully equipped kitchen, Jacuzzi, Laundry Area, Salt Water Swimming Pool, Private Wi‑Fi, Co‑Working Space
                    'types'     => [1]                   // For Rent
                ],
                // 2. Laguna Homes
                [
                    'title'          => 'Laguna Homes',
                    'description'    => [
                        'en' => "Laguna Homes Phuket is an exclusive residential project offering luxurious villas with stunning views of the lagoons and fairways of the renowned Laguna Golf Course. These spacious homes are designed with contemporary elegance and provide a serene and private living environment within one of Phuket's most prestigious communities.<br />Situated within the expansive Laguna Phuket resort complex, Laguna Homes benefits from its prime location near Bang Tao Beach, world-class resorts, golf courses, and a variety of dining and leisure options. It's also just a short drive from Phuket International Airport, making it convenient for both short and long-term stays.<br />Laguna Homes is perfect for families, golf enthusiasts, and investors seeking a refined lifestyle in a secure and well-maintained community. It caters to those who desire a luxurious yet comfortable residence, with access to exclusive amenities and services in one of Phuket’s most sought-after areas.",
                        'ru' => "Проект Laguna Homes на Пхукете – это эксклюзивный жилой комплекс, предлагающий роскошные виллы с захватывающими видами на лагуны и поля известного гольф-клуба Laguna. Эти просторные дома выполнены в современном стиле и обеспечивают спокойное и приватное жилье в одном из самых престижных районов Пхукета.<br />Расположенный в обширном курортном комплексе Laguna Phuket, Laguna Homes выигрывает от своего первоклассного расположения недалеко от пляжа Бан Тау, мировых курортов, гольф-полей и разнообразных ресторанов и развлекательных заведений. До международного аэропорта Пхукета можно добраться за короткое время, что делает комплекс удобным как для краткосрочного, так и для долгосрочного проживания.<br />Laguna Homes идеально подходит для семей, любителей гольфа и инвесторов, стремящихся к изысканному образу жизни в безопасном и ухоженном сообществе. Он предназначен для тех, кто ищет роскошное, но комфортное жилье с доступом к эксклюзивным удобствам и услугам в одном из самых востребованных районов Пхукета.",
                    ],
                    'codename'       => 'IE-RNT-002',
                    'latitude'       => 8.010350836,
                    'longitude'      => 98.30283701,
                    'price'          => 400000,
                    'main_image_url' => 'https://ignatevestate.co.th/wp-content/uploads/2024/06/Laguna-Homes-Ignatev-Estate-006.jpg',
                    'active'         => 1,
                    'location'       => [
                        'en' => 'Phuket',
                        'ru' => 'Пхукет',
                    ],
                    'location_description' => [
                        'en' => 'Quiet paradise with 5km white sand beach and premium hotels',
                        'ru' => 'Тихий рай с 5 км белоснежным пляжем и премиальными отелями',
                    ],
                    'tags'    => [1],                // Villa
                    'features' => [8,9,1,10,11,12,13,2,3,4,14,6,15,16,17],
                    'types'     => [1,2]             // For Rent, Completed
                ],
                // 3. Oceanstone 614
                [
                    'title'          => 'Oceanstone 614',
                    'description'    => [
                        'en' => "Oceanstone Phuket is a modern condominium development offering stylish and fully furnished units designed for comfort and convenience. The project features a rooftop swimming pool, fitness center, and lush tropical surroundings, making it an ideal choice for those seeking a contemporary living experience in Phuket’s serene environment.<br />Located in the heart of Cherngtalay, Oceanstone is just minutes away from the pristine Bang Tao Beach and the vibrant Laguna Phuket area. It provides easy access to premium dining, shopping, and entertainment venues, as well as being a short drive from Phuket International Airport. Oceanstone Phuket is perfect for professionals, couples, and investors looking for a modern, hassle-free lifestyle. It caters to those who want a holiday home or rental property close to the beach, with easy access to leisure and recreational facilities in a prime location.",
                        'ru' => "Oceanstone Phuket – это современный кондоминиум, предлагающий стильные и полностью меблированные квартиры, разработанные с учетом комфорта и удобства. Проект включает в себя бассейн на крыше, фитнес-центр и пышные тропические сады, что делает его идеальным выбором для тех, кто ищет современный стиль жизни в спокойной обстановке Пхукета.<br />Расположенный в самом сердце Чернгталай, Oceanstone находится всего в нескольких минутах от нетронутого пляжа Бан Тау и оживленного района Laguna Phuket. Комплекс обеспечивает легкий доступ к ресторанам высокой кухни, торговым и развлекательным заведениям, а также находится в краткой досягаемости от международного аэропорта Пхукета. Oceanstone Phuket идеально подходит для профессионалов, пар и инвесторов, ищущих современный и удобный образ жизни, а также для тех, кто хочет иметь дом для отпуска или сдавать жилье в аренду недалеко от пляжа.",
                    ],
                    'codename'       => 'IE-RNT-003',
                    'latitude'       => 7.99681635,
                    'longitude'      => 98.29939991,
                    'price'          => 100000,
                    'main_image_url' => 'https://ignatevestate.co.th/wp-content/uploads/2024/06/861feabd-b284-435b-b749-6ff55628a1d4.jpeg',
                    'active'         => 1,
                    'location'       => [
                        'en' => 'Cherngtalay',
                        'ru' => 'Чернгталай',
                    ],
                    'location_description' => [
                        'en' => 'Quiet paradise with 5km white sand beach and premium hotels',
                        'ru' => 'Тихий рай с 5 км белоснежным пляжем и премиальными отелями',
                    ],
                    'tags'    => [2],                // Apartment
                    'features' => [8,9,12,18,19,13,20,21,22,4,24,14,25,26],
                    'types'     => [1]               // For Rent
                ],
                // 4. The Breeze Villas Phase II
                [
                    'title'          => 'The Breeze Villas Phase II',
                    'description'    => [
                        'en' => "The Breeze villas are surrounded by impressive green open spaces and unspoilt mountain views. Experience luxurious and private living between the beautiful beaches of Bangtao and Surin with international shopping at your doorstep.<br />Invest with confidence knowing that our land is wholly owned by the developer, and enjoy bespoke modern design with spacious layouts, high ceilings, and premium amenities including outdoor pools and landscaped gardens.",
                        'ru' => "Виллы The Breeze располагаются среди впечатляющих зеленых пространств и нетронутых горных видов. Насладитесь роскошной и приватной жизнью между прекрасными пляжами Бангтао и Сурин, с возможностью шопинга мирового уровня прямо у порога.<br />Инвестируйте с уверенностью, зная, что земля принадлежит застройщику, и наслаждайтесь индивидуальным современным дизайном с просторными планировками, высокими потолками и первоклассными удобствами, включая открытые бассейны и ландшафтные сады.",
                    ],
                    'codename'       => 'IE-TBV-001',
                    'latitude'       => 7.982843973,
                    'longitude'      => 98.30223083,
                    'price'          => 34828920,
                    'main_image_url' => 'https://ignatevestate.co.th/wp-content/uploads/2024/06/The-Breeze-Villas_8-1.jpg',
                    'active'         => 1,
                    'location'       => [
                        'en' => 'Bangtao',
                        'ru' => 'Бангтао',
                    ],
                    'location_description' => [
                        'en' => 'Quiet paradise with 5km white sand beach and premium hotels',
                        'ru' => 'Тихий рай с 5 км белоснежным пляжем и премиальными отелями',
                    ],
                    'tags'    => [1,3],             // Villa, Projects
                    'features' => [27,8,9,12,28,2,3,24,5,6,29,30],
                    'types'     => [3,2]              // Primary, Completed
                ],
                // 5. Alisha Seaview Villas
                [
                    'title'          => 'Alisha Seaview Villas',
                    'description'    => [
                        'en' => "Available 4 units<br /><br />Sold Out 4 units<br /><br />Alisha Seaview is the 3rd project of Alisha Property. Located on Koh Kaew hill over 4 rai, this project offers views of Koh Kaew city, the sea, and lush greenery. Designed in a modern luxury style, it delivers an exclusive lifestyle combining nature, luxury, and sustainability.",
                        'ru' => "Доступно 4 единицы<br /><br />4 единицы проданы<br /><br />Alisha Seaview – третий проект компании Alisha Property. Расположенный на холме Кох Каев на участке 4 рай, проект предлагает виды на город Кох Каев, море и пышную зелень. Выполненный в современном роскошном стиле, он обеспечивает эксклюзивный образ жизни, сочетающий природу, роскошь и устойчивость.",
                    ],
                    'codename'       => 'IE-ALS-002',
                    'latitude'       => 7.951737275,
                    'longitude'      => 98.35988184,
                    'price'          => 20000000,
                    'main_image_url' => 'https://ignatevestate.co.th/wp-content/uploads/2024/06/Alisha-Seaview_3.jpg',
                    'active'         => 1,
                    'location'       => [
                        'en' => 'Koh Kaew',
                        'ru' => 'Кох Каев',
                    ],
                    'location_description' => [
                        'en' => 'Quiet paradise with 5km white sand beach and premium hotels',
                        'ru' => 'Тихий рай с 5 км белоснежным пляжем и премиальными отелями',
                    ],
                    'tags'    => [1,3],             // Villa, Projects
                    'features' => [8,5,6],
                    'types'     => [4,3]              // Off Plan, Primary
                ],
                // 6. Alisa Pool Villa
                [
                    'title'          => 'Alisa Pool Villa',
                    'description'    => [
                        'en' => "A private pool villa that harmoniously combines traditional Thai style with modern design. Exquisite details and Thai handicrafts add unique charm, making this villa ideal for those passionate about simplicity and modernity.",
                        'ru' => "Частная вилла с бассейном, которая гармонично сочетает традиционный тайский стиль с современным дизайном. Изысканные детали и тайские ремесленные изделия придают ей уникальное очарование, делая эту виллу идеальной для тех, кто ценит простоту и современность.",
                    ],
                    'codename'       => 'IE-ALP-003',
                    'latitude'       => 7.989305615,
                    'longitude'      => 98.30665417,
                    'price'          => 19900000,
                    'main_image_url' => 'https://ignatevestate.co.th/wp-content/uploads/2024/06/Alisa-Pool-Villa-Pasak_10.jpg',
                    'active'         => 1,
                    'location'       => [
                        'en' => 'Phuket',
                        'ru' => 'Пхукет',
                    ],
                    'location_description' => [
                        'en' => 'Quiet paradise with 5km white sand beach and premium hotels',
                        'ru' => 'Тихий рай с 5 км белоснежным пляжем и премиальными отелями',
                    ],
                    'tags'    => [1,3],
                    'features' => [27,8,9,12,2,3,31,24,5,6,30],
                    'types'     => []                  // No tags provided
                ],
                // 7. Villa Qabalah
                [
                    'title'          => 'Villa Qabalah',
                    'description'    => [
                        'en' => "Villa Qabalah takes its name from the ancient Hebrew word 'Qibel' and is inspired by spiritual teachings that emphasize a harmonious relationship between humans and nature. Designed as a serene retreat, it offers both primary residence and holiday home options close to Phuket’s luxury amenities.",
                        'ru' => "Villa Qabalah получила своё название от древнееврейского слова 'Qibel' и вдохновлена духовными учениями, подчеркивающими гармонию между человеком и природой. Проектирована как спокойное убежище, вилла предлагает варианты как для постоянного проживания, так и для отдыха вблизи роскошных удобств Пхукета.",
                    ],
                    'codename'       => 'IE-VQL-004',
                    'latitude'       => 7.997593683,
                    'longitude'      => 98.32731217,
                    'price'          => 16600000,
                    'main_image_url' => 'https://ignatevestate.co.th/wp-content/uploads/2024/06/Villa-Qabalah__10.jpg',
                    'active'         => 1,
                    'location'       => [
                        'en' => 'Cherngtalay',
                        'ru' => 'Чернгталай',
                    ],
                    'location_description' => [
                        'en' => 'Quiet paradise with 5km white sand beach and premium hotels',
                        'ru' => 'Тихий рай с 5 км белоснежным пляжем и премиальными отелями',
                    ],
                    'tags'    => [1,3],
                    'features' => [8,32,12,22,33,5,6,34],
                    'types'     => [4,2]             // Off Plan, Completed
                ],
                // 8. Andamaya Surin Bay
                [
                    'title'          => 'Andamaya Surin Bay',
                    'description'    => [
                        'en' => "This exquisite condominium consists of 27 apartments in 3 buildings, located just 700 meters from the sea on a hillside with breathtaking views of Bang Tao and Surin – Phuket's pristine beaches. Each apartment features a sea view and a private pool, complemented by a long communal pool and sunbathing terrace.",
                        'ru' => "Этот изысканный кондоминиум включает 27 апартаментов в 3 зданиях, расположенных всего в 700 метрах от моря на склоне с захватывающим видом на пляжи Бан Тау и Сурин – нетронутые пляжи Пхукета. Каждая квартира предлагает вид на море и частный бассейн, а также общий длинный бассейн с зоной для загара.",
                    ],
                    'codename'       => 'IE-ADM-010',
                    'latitude'       => 7.974333363,
                    'longitude'      => 98.2850647,
                    'price'          => 26018000,
                    'main_image_url' => 'https://ignatevestate.co.th/wp-content/uploads/2024/06/Andamaya-Type-C.jpg',
                    'active'         => 1,
                    'location'       => [
                        'en' => 'Surin',
                        'ru' => 'Сурин',
                    ],
                    'location_description' => [
                        'en' => 'Quiet paradise with 5km white sand beach and premium hotels',
                        'ru' => 'Тихий рай с 5 км белоснежным пляжем и премиальными отелями',
                    ],
                    'tags'    => [3,2],             // Projects, Apartment
                    'features' => [8,32,12,21,5],
                    'types'     => [4]                // Off Plan
                ],
                // 9. Walai Layan Villas Phase I
                [
                    'title'          => 'Walai Layan Villas Phase I',
                    'description'    => [
                        'en' => "Walai Layan Villas Phase I is a luxury villa development blending modern tropical design with exquisite craftsmanship. With spacious layouts, private pools, and landscaped gardens, these villas offer both comfort and privacy. Located in the sought‐after Layan area, they are just 950 meters from Layan Beach and a short drive from high-end amenities.",
                        'ru' => "Walai Layan Villas Phase I – это роскошный жилой комплекс, сочетающий современный тропический дизайн с великолепным мастерством. С просторными планировками, частными бассейнами и ландшафтными садами, эти виллы предлагают комфорт и уединение. Расположенные в востребованном районе Лаян, они находятся всего в 950 метрах от пляжа Лаян и в краткой досягаемости от высококлассных удобств.",
                    ],
                    'codename'       => 'IE-WLV-005',
                    'latitude'       => 8.028549604,
                    'longitude'      => 98.29947352,
                    'price'          => 28500000,
                    'main_image_url' => 'https://ignatevestate.co.th/wp-content/uploads/2024/06/WhatsApp-Image-2024-06-13-at-15.44.40_29d2ef85.jpg',
                    'active'         => 1,
                    'location'       => [
                        'en' => 'Layan',
                        'ru' => 'Лаян',
                    ],
                    'location_description' => [
                        'en' => 'Quiet paradise with 5km white sand beach and premium hotels',
                        'ru' => 'Тихий рай с 5 км белоснежным пляжем и премиальными отелями',
                    ],
                    'tags'    => [1,3],
                    'features' => [8,9,12,2,3,22,31,24,5,6,29,35],
                    'types'     => [5,4,3]          // Structure, Off Plan, Primary
                ],
                // 10. Anchan Mountain Breeze
                [
                    'title'          => 'Anchan Mountain Breeze',
                    'description'    => [
                        'en' => "Anchan Mountain Breeze is a luxurious villa development that combines contemporary elegance with natural beauty. The villas feature high ceilings, expansive living areas, and private pools—providing a peaceful retreat with modern amenities.",
                        'ru' => "Anchan Mountain Breeze – это роскошный комплекс вилл, сочетающий современную элегантность с красотой природы. Виллы отличаются высокими потолками, просторными зонами и частными бассейнами, создающими спокойное убежище с современными удобствами.",
                    ],
                    'codename'       => 'IE-AMB-006',
                    'latitude'       => 8.056170228,
                    'longitude'      => 98.34617615,
                    'price'          => 32858000,
                    'main_image_url' => 'https://ignatevestate.co.th/wp-content/uploads/2024/06/Anchan-Mountain-Breeze.jpg',
                    'active'         => 1,
                    'location'       => [
                        'en' => 'Naiyang',
                        'ru' => 'Найянг',
                    ],
                    'location_description' => [
                        'en' => 'Quiet paradise with 5km white sand beach and premium hotels',
                        'ru' => 'Тихий рай с 5 км белоснежным пляжем и премиальными отелями',
                    ],
                    'tags'    => [1,3],
                    'features' => [8,12,5],
                    'types'     => [4,3]          // Off Plan, Primary
                ],
                // 11. Asherah Villas Phase III
                [
                    'title'          => 'Asherah Villas Phase III',
                    'description'    => [
                        'en' => "Asherah Villas Phase III is the latest addition to the prestigious Asherah Villas development. These luxury villas offer modern design, spacious living areas, private pools, and lush gardens, creating an oasis of calm and elegance. Located in the peaceful Pasak area, they are conveniently close to fine dining and shopping.",
                        'ru' => "Asherah Villas Phase III – это последнее дополнение к престижному комплексу Asherah Villas. Эти роскошные виллы предлагают современный дизайн, просторные жилые зоны, частные бассейны и пышные сады, создавая оазис спокойствия и элегантности. Расположенные в спокойном районе Пасак, они находятся в удобной близости от изысканных ресторанов и магазинов.",
                    ],
                    'codename'       => 'IE-ASH-007',
                    'latitude'       => 8.026382362,
                    'longitude'      => 98.32276093,
                    'price'          => 22900000,
                    'main_image_url' => 'https://ignatevestate.co.th/wp-content/uploads/2024/06/Asherah-Villas-Phase-3.jpg',
                    'active'         => 1,
                    'location'       => [
                        'en' => 'Pasak',
                        'ru' => 'Пасак',
                    ],
                    'location_description' => [
                        'en' => 'Quiet paradise with 5km white sand beach and premium hotels',
                        'ru' => 'Тихий рай с 5 км белоснежным пляжем и премиальными отелями',
                    ],
                    'tags'    => [1,3],
                    'features' => [8,12,5,34,33,17],
                    'types'     => [4,2]          // Off Plan, Completed
                ],
                // 12. Clover Residence Phase III
                [
                    'title'          => 'Clover Residence Phase III',
                    'description'    => [
                        'en' => "Clover Residence offers the perfect opportunity to experience Phuket's luxury island lifestyle. With easy access to international schools, shopping centers, and entertainment hubs, this development provides the ideal balance between city convenience and suburban tranquility.",
                        'ru' => "Clover Residence предоставляет идеальную возможность окунуться в роскошный островной образ жизни Пхукета. Благодаря легкому доступу к международным школам, торговым центрам и развлекательным заведениям, этот комплекс обеспечивает идеальный баланс между городским удобством и пригородным спокойствием.",
                    ],
                    'codename'       => 'IE-CLR-008',
                    'latitude'       => 7.982680578,
                    'longitude'      => 98.31801082,
                    'price'          => 39500000,
                    'main_image_url' => 'https://ignatevestate.co.th/wp-content/uploads/2024/06/Clover-Residence_2.jpg',
                    'active'         => 1,
                    'location'       => [
                        'en' => 'Phuket',
                        'ru' => 'Пхукет',
                    ],
                    'location_description' => [
                        'en' => 'Quiet paradise with 5km white sand beach and premium hotels',
                        'ru' => 'Тихий рай с 5 км белоснежным пляжем и премиальными отелями',
                    ],
                    'tags'    => [1,3],
                    'features' => [8,2,5,6],
                    'types'     => [4]            // Off Plan
                ],
                // 13. The Gloria Villas
                [
                    'title'          => 'The Gloria Villas',
                    'description'    => [
                        'en' => "Our villas are designed for luxury eco living in the heart of Phuket, offering stunning views of the lake, mountains, and forest. With a blend of contemporary design and tropical architecture, these villas are built to the highest standards for comfort and satisfaction.",
                        'ru' => "Наши виллы созданы для экологичной роскошной жизни в самом сердце Пхукета, предлагая захватывающие виды на озеро, горы и лес. Сочетая современный дизайн с тропической архитектурой, эти виллы построены по самым высоким стандартам для обеспечения комфорта и удовлетворения.",
                    ],
                    'codename'       => 'IE-GRV-009',
                    'latitude'       => 7.969516854,
                    'longitude'      => 98.33520212,
                    'price'          => 15900000,
                    'main_image_url' => 'https://ignatevestate.co.th/wp-content/uploads/2024/06/The-Gloria-Villas_15.jpg',
                    'active'         => 1,
                    'location'       => [
                        'en' => 'Phuket',
                        'ru' => 'Пхукет',
                    ],
                    'location_description' => [
                        'en' => 'Quiet paradise with 5km white sand beach and premium hotels',
                        'ru' => 'Тихий рай с 5 км белоснежным пляжем и премиальными отелями',
                    ],
                    'tags'    => [1,3],
                    'features' => [8,12,2,5,6,30],
                    'types'     => [4,3]          // Off Plan, Primary
                ],
                // 14. Layan Lucky Villas Phase II
                [
                    'title'          => 'Layan Lucky Villas Phase II',
                    'description'    => [
                        'en' => "Introducing our latest project featuring 18 smart villas with 3 or 4 bedrooms. Located just a 10-minute drive from Laguna Phuket as well as Layan and Bangtao beaches, these villas are fully equipped for modern island living. Land sizes range from 500 m² to 1111 m², with installment payments available during construction phases.",
                        'ru' => "Представляем наш новый проект, включающий 18 современных вилл с 3 или 4 спальнями. Расположенные всего в 10 минутах езды от Laguna Phuket, а также пляжей Лаян и Бангтао, эти виллы полностью оснащены для современной жизни на острове. Площадь участков варьируется от 500 до 1111 м², с возможностью рассрочки в процессе строительства.",
                    ],
                    'codename'       => 'IE-LLV-011',
                    'latitude'       => 8.015857136,
                    'longitude'      => 98.3103658,
                    'price'          => 28001558,
                    'main_image_url' => 'https://ignatevestate.co.th/wp-content/uploads/2024/06/Layan-Lucky-Villas-Plan.jpg',
                    'active'         => 1,
                    'location'       => [
                        'en' => 'Layan',
                        'ru' => 'Лаян',
                    ],
                    'location_description' => [
                        'en' => 'Quiet paradise with 5km white sand beach and premium hotels',
                        'ru' => 'Тихий рай с 5 км белоснежным пляжем и премиальными отелями',
                    ],
                    'tags'    => [1,3],
                    'features' => [8,13,35],
                    'types'     => [4]            // Off Plan
                ],
                // 15. Sunti Villas
                [
                    'title'          => 'Sunti Villas',
                    'description'    => [
                        'en' => "Sunti Villas is where East meets West—a harmonious blend rooted in Buddhism’s long history and modern innovation. This gated community of 8 premium villas (available in 3, 4, or 5-bedroom layouts) offers a tranquil retreat just 10 minutes from the vibrant center of island life.",
                        'ru' => "Sunti Villas – это место, где Восток встречается с Западом, гармоничное сочетание древних буддийских традиций и современных инноваций. Этот закрытый комплекс из 8 премиальных вилл (с вариантами 3, 4 или 5 спальнями) предлагает спокойное убежище всего в 10 минутах от оживленного центра острова.",
                    ],
                    'codename'       => 'IE-STV-012',
                    'latitude'       => 7.999176098,
                    'longitude'      => 98.33241571,
                    'price'          => 28870000,
                    'main_image_url' => 'https://ignatevestate.co.th/wp-content/uploads/2024/06/Sunti-Villas.jpg',
                    'active'         => 1,
                    'location'       => [
                        'en' => 'Phuket',
                        'ru' => 'Пхукет',
                    ],
                    'location_description' => [
                        'en' => 'Quiet paradise with 5km white sand beach and premium hotels',
                        'ru' => 'Тихий рай с 5 км белоснежным пляжем и премиальными отелями',
                    ],
                    'tags'    => [1,3],
                    'features' => [8,12,2,21,5,6],
                    'types'     => [4]            // Off Plan
                ],
                // 16. La Vista Villas
                [
                    'title'          => 'La Vista Villas',
                    'description'    => [
                        'en' => "La Vista is a club complex of luxury villas based on environmental sustainability, family values, and safety. Comprising 9 villas (ranging from 453 to 1,139 m²), these residences offer both relaxation and practical living. Located on a mountain in Chalong, Phuket, with stunning sea views and nearby international schools and beaches, La Vista meets strict ecological standards.",
                        'ru' => "La Vista – это комплекс роскошных вилл, основанный на принципах экологической устойчивости, семейных ценностей и безопасности. В состав комплекса входят 9 вилл (от 453 до 1,139 м²), предлагающих как комфортный отдых, так и практичное проживание. Расположенный на горе в Чалонге на Пхукете, с потрясающим видом на море и вблизи международных школ и пляжей, La Vista соответствует строгим экологическим стандартам.",
                    ],
                    'codename'       => 'IE-LVV-013',
                    'latitude'       => 7.840084677,
                    'longitude'      => 98.32705736,
                    'price'          => 37900000,
                    'main_image_url' => 'https://ignatevestate.co.th/wp-content/uploads/2024/06/La-Vista-Villas.jpg',
                    'active'         => 1,
                    'location'       => [
                        'en' => 'Chalong',
                        'ru' => 'Чалонг',
                    ],
                    'location_description' => [
                        'en' => 'Quiet paradise with 5km white sand beach and premium hotels',
                        'ru' => 'Тихий рай с 5 км белоснежным пляжем и премиальными отелями',
                    ],
                    'tags'    => [1,3],
                    'features' => [8,5,6,34,35,17],
                    'types'     => [4]            // Off Plan
                ],
                // 17. ISOLA Phase II
                [
                    'title'          => 'ISOLA Phase II',
                    'description'    => [
                        'en' => "Isola II is where elegance meets luxury. These villas offer a refined living experience with two dedicated parking spaces and an architectural design that seamlessly harmonizes with nature. Located near Layan Beach, residents are welcomed into a serene environment where dreams become reality.",
                        'ru' => "Isola II – это место, где элегантность встречается с роскошью. Эти виллы предлагают изысканный образ жизни с двумя выделенными парковочными местами и архитектурным дизайном, гармонично вписывающимся в природу. Расположенные недалеко от пляжа Лаян, они приглашают в спокойную обстановку, где мечты становятся реальностью.",
                    ],
                    'codename'       => 'IE-ISL-014',
                    'latitude'       => 8.027691741,
                    'longitude'      => 98.30052763,
                    'price'          => 49449937,
                    'main_image_url' => 'https://ignatevestate.co.th/wp-content/uploads/2024/06/Isola-2_4.jpg',
                    'active'         => 1,
                    'location'       => [
                        'en' => 'Layan',
                        'ru' => 'Лаян',
                    ],
                    'location_description' => [
                        'en' => 'Quiet paradise with 5km white sand beach and premium hotels',
                        'ru' => 'Тихий рай с 5 км белоснежным пляжем и премиальными отелями',
                    ],
                    'tags'    => [1,3],
                    'features' => [8,12,3,5,6],
                    'types'     => [4,3]          // Off Plan, Primary
                ],
                // 18. Lavish Estates
                [
                    'title'          => 'Lavish Estates',
                    'description'    => [
                        'en' => "Lavish Estates is Elite Manor’s premier luxury real estate project in Phuket. Featuring 13 two-story pool villas with modern designs, smart home capabilities, and eco-friendly features, this development is perfect for luxurious living and wise investments.",
                        'ru' => "Lavish Estates – это первоклассный проект элитной недвижимости от Elite Manor на Пхукете. В проекте представлено 13 двухэтажных вилл с бассейнами, выполненных в современном стиле, с возможностями умного дома и экологичными решениями, что делает его идеальным для роскошного проживания и разумных инвестиций.",
                    ],
                    'codename'       => null,
                    'latitude'       => 7.8804479,
                    'longitude'      => 98.3922504,
                    'price'          => 120000,
                    'main_image_url' => null,
                    'active'         => 1,
                    'location'       => [
                        'en' => 'Phuket',
                        'ru' => 'Пхукет',
                    ],
                    'location_description' => [
                        'en' => 'Quiet paradise with 5km white sand beach and premium hotels',
                        'ru' => 'Тихий рай с 5 км белоснежным пляжем и премиальными отелями',
                    ],
                    'tags'    => [],   // none attached
                    'features' => [],
                    'types'     => []
                ],
                // 19. Above Element Condominium
                [
                    'title'          => 'Above Element Condominium',
                    'description'    => [
                        'en' => "Above Element inspires you to express your ideal lifestyle—symbolizing wealth, stability, and peace. With a unique design and elegant style, this condominium reflects eternal prosperity and offers a balanced dual lifestyle.",
                        'ru' => "Above Element вдохновляет на воплощение идеального образа жизни, символизируя богатство, стабильность и мир. Благодаря уникальному дизайну и элегантному стилю, этот кондоминиум отражает вечное процветание и предлагает сбалансированный образ жизни.",
                    ],
                    'codename'       => 'IE-AEC-015',
                    'latitude'       => 7.995865707,
                    'longitude'      => 98.30900942,
                    'price'          => 5640000,
                    'main_image_url' => 'https://ignatevestate.co.th/wp-content/uploads/2024/06/Above-Element-Condo_2.jpg',
                    'active'         => 1,
                    'location'       => [
                        'en' => 'Phuket',
                        'ru' => 'Пхукет',
                    ],
                    'location_description' => [
                        'en' => 'Quiet paradise with 5km white sand beach and premium hotels',
                        'ru' => 'Тихий рай с 5 км белоснежным пляжем и премиальными отелями',
                    ],
                    'tags'    => [3,4],         // Projects, Condominium
                    'features' => [8,12,31,14],
                    'types'     => [4]            // Off Plan
                ],
                // 20. Ansaya Phuket (New Record)
                [
                    'title'          => 'Ansaya Phuket',
                    'description'    => [
                        'en' => "ANAYA PHUKET is to be an extension of Thai cultural heritage architecture design and intelligence into the moment of modern and comfortable living. It provides a delightful cultural living quality and identity both spiritually and physically through time. The architecture also was designed to have a sense of the quality of timelessness, so it can be stated eternally and doesn’t lose the title as time passes by. The combination between Thai heritage identity and modernity in ANAYA PHUKET creates a sense of luxury art and timelessness rather than just a residence in Phuket. It can be stated as your own proud.",
                        'ru' => "ANAYA PHUKET призвана стать продолжением традиционной тайской архитектуры и культурного наследия, интегрированного в современный и комфортный образ жизни. Она обеспечивает восхитительное качество культурного проживания и самобытность как в духовном, так и в физическом плане на протяжении времени. Архитектура также спроектирована так, чтобы передавать ощущение вечности, чтобы название оставалось актуальным и не утратило своей ценности со временем. Сочетание тайской идентичности наследия и современности в ANAYA PHUKET создаёт ощущение роскошного искусства и вечности, а не просто жилья на Пхукете. Это может стать вашей гордостью.",
                    ],
                    'codename'       => 'IE-ASY-016',
                    'latitude'       => 8.001383951,
                    'longitude'      => 98.32333446,
                    'price'          => 26500000,
                    'main_image_url' => 'https://ignatevestate.co.th/wp-content/uploads/2024/06/Ansaya-Phuket.jpg',
                    'active'         => 1,
                    'location'       => [
                        'en' => 'Phuket',
                        'ru' => 'Пхукет',
                    ],
                    'location_description' => [
                        'en' => 'Quiet paradise with 5km white sand beach and premium hotels',
                        'ru' => 'Тихий рай с 5 км белоснежным пляжем и премиальными отелями',
                    ],
                    'tags'    => [1,3],          // Villa, Projects
                    'features' => [8,12,2,5],       // 24-hour Security, CCTV, Fully equipped kitchen, Salt Water Swimming Pool
                    'types'     => [4]             // Off Plan
                ],
            ];

            foreach ($hotels as $hotelData) {
                // Generate slug from title
                $hotelData['slug'] = Str::slug($hotelData['title']);

                // Extract relationship arrays
                $typesArray = $hotelData['types'];
                $featuresArray = $hotelData['features'];
                $tagsArray = $hotelData['tags'];

                // Remove relationship keys before inserting into the hotels table
                unset($hotelData['types'], $hotelData['features'], $hotelData['tags']);

                // Create the hotel record
                $hotel = Hotel::create($hotelData);

                // Attach relationships using the hardcoded ID arrays
                if (!empty($typesArray)) {
                    $hotel->types()->attach($typesArray);
                }
                if (!empty($featuresArray)) {
                    $hotel->features()->attach($featuresArray);
                }
                if (!empty($tagsArray)) {
                    $hotel->tags()->attach($tagsArray);
                }
            }
        });
    }
}
