<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Region, Island, Province, Destination, ProductCategory, GiProduct, Producer, SupplyChainStep, ExperienceCategory, Experience, Journey, JourneyStop, Restaurant, Chef, Recipe, Article, ArticleCategory, Event, Partner, MarketListing, Milestone, Accommodation};

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // ──────────────────────────────────
        // 1. ISLANDS
        // ──────────────────────────────────
        $sumatra  = Island::create(['name' => 'Sumatra', 'name_id' => 'Sumatera', 'slug' => 'sumatra', 'description' => 'The sixth largest island in the world, known for its diverse coffee and spice origins.', 'description_id' => 'Pulau terbesar keenam di dunia, terkenal dengan kopi dan rempah-rempahnya.']);
        $java     = Island::create(['name' => 'Java', 'name_id' => 'Jawa', 'slug' => 'java', 'description' => 'The cultural heart of Indonesia with rich agricultural heritage.', 'description_id' => 'Jantung budaya Indonesia dengan warisan pertanian yang kaya.']);
        $bali     = Island::create(['name' => 'Bali & Nusa Tenggara', 'name_id' => 'Bali & Nusa Tenggara', 'slug' => 'bali-nusa-tenggara', 'description' => 'Paradise islands with unique tropical products.', 'description_id' => 'Pulau surga dengan produk tropis yang unik.']);
        $kalimantan = Island::create(['name' => 'Kalimantan', 'name_id' => 'Kalimantan', 'slug' => 'kalimantan', 'description' => 'The Indonesian part of Borneo, rich in pepper and tropical fruits.', 'description_id' => 'Bagian Indonesia dari Borneo, kaya akan lada dan buah tropis.']);
        $sulawesi = Island::create(['name' => 'Sulawesi', 'name_id' => 'Sulawesi', 'slug' => 'sulawesi', 'description' => 'Known for Toraja coffee and rich marine products.', 'description_id' => 'Terkenal dengan kopi Toraja dan produk laut yang kaya.']);
        $papua    = Island::create(['name' => 'Papua & Maluku', 'name_id' => 'Papua & Maluku', 'slug' => 'papua-maluku', 'description' => 'The spice islands and last frontier of Indonesian biodiversity.', 'description_id' => 'Kepulauan rempah dan perbatasan terakhir keanekaragaman hayati Indonesia.']);

        // ──────────────────────────────────
        // 2. REGIONS
        // ──────────────────────────────────
        $western  = Region::create(['name' => 'Western Indonesia', 'name_id' => 'Indonesia Barat', 'slug' => 'western-indonesia', 'description' => 'Sumatra and its surrounding islands.', 'description_id' => 'Sumatera dan pulau-pulau sekitarnya.', 'sort_order' => 1]);
        $central  = Region::create(['name' => 'Central Indonesia', 'name_id' => 'Indonesia Tengah', 'slug' => 'central-indonesia', 'description' => 'Java, Bali, and Nusa Tenggara.', 'description_id' => 'Jawa, Bali, dan Nusa Tenggara.', 'sort_order' => 2]);
        $eastern  = Region::create(['name' => 'Eastern Indonesia', 'name_id' => 'Indonesia Timur', 'slug' => 'eastern-indonesia', 'description' => 'Kalimantan, Sulawesi, Maluku, and Papua.', 'description_id' => 'Kalimantan, Sulawesi, Maluku, dan Papua.', 'sort_order' => 3]);

        // ──────────────────────────────────
        // 3. PROVINCES (with coordinates)
        // ──────────────────────────────────
        $aceh = Province::create(['region_id' => $western->id, 'island_id' => $sumatra->id, 'name' => 'Aceh', 'name_id' => 'Aceh', 'slug' => 'aceh', 'description' => 'Home of the world-renowned Gayo Arabica Coffee, cultivated in the highlands of Central Aceh.', 'description_id' => 'Rumah kopi Arabika Gayo yang terkenal di dunia, dibudidayakan di dataran tinggi Aceh Tengah.', 'latitude' => 4.6951, 'longitude' => 96.7494, 'gi_destination_count' => 2, 'gi_product_count' => 3, 'experience_count' => 4]);
        $sumut = Province::create(['region_id' => $western->id, 'island_id' => $sumatra->id, 'name' => 'North Sumatra', 'name_id' => 'Sumatera Utara', 'slug' => 'north-sumatra', 'description' => 'Famous for Simalungun Coffee and Lake Toba, the largest volcanic lake in the world.', 'description_id' => 'Terkenal dengan Kopi Simalungun dan Danau Toba, danau vulkanik terbesar di dunia.', 'latitude' => 2.1154, 'longitude' => 99.5451, 'gi_destination_count' => 2, 'gi_product_count' => 2, 'experience_count' => 3]);
        $sumbar = Province::create(['region_id' => $western->id, 'island_id' => $sumatra->id, 'name' => 'West Sumatra', 'name_id' => 'Sumatera Barat', 'slug' => 'west-sumatra', 'description' => 'Land of Minangkabau cuisine and Cassia Vera cinnamon.', 'description_id' => 'Negeri masakan Minangkabau dan kayu manis Cassia Vera.', 'latitude' => -0.7399, 'longitude' => 100.8000, 'gi_destination_count' => 1, 'gi_product_count' => 2, 'experience_count' => 2]);
        $lampung = Province::create(['region_id' => $western->id, 'island_id' => $sumatra->id, 'name' => 'Lampung', 'name_id' => 'Lampung', 'slug' => 'lampung', 'description' => 'Major producer of Robusta coffee and black pepper.', 'description_id' => 'Produsen utama kopi Robusta dan lada hitam.', 'latitude' => -4.5586, 'longitude' => 105.4068, 'gi_destination_count' => 1, 'gi_product_count' => 2, 'experience_count' => 2]);

        $jateng = Province::create(['region_id' => $central->id, 'island_id' => $java->id, 'name' => 'Central Java', 'name_id' => 'Jawa Tengah', 'slug' => 'central-java', 'description' => 'Cultural heartland featuring Dieng Plateau coffee and Purwaceng.', 'description_id' => 'Jantung budaya yang menampilkan kopi Dataran Tinggi Dieng dan Purwaceng.', 'latitude' => -7.1510, 'longitude' => 110.1403, 'gi_destination_count' => 2, 'gi_product_count' => 3, 'experience_count' => 4]);
        $jatim = Province::create(['region_id' => $central->id, 'island_id' => $java->id, 'name' => 'East Java', 'name_id' => 'Jawa Timur', 'slug' => 'east-java', 'description' => 'Renowned for Malang apples and Ijen coffee from volcanic highlands.', 'description_id' => 'Terkenal dengan apel Malang dan kopi Ijen dari dataran tinggi vulkanik.', 'latitude' => -7.5361, 'longitude' => 112.2384, 'gi_destination_count' => 2, 'gi_product_count' => 3, 'experience_count' => 3]);
        $jabar = Province::create(['region_id' => $central->id, 'island_id' => $java->id, 'name' => 'West Java', 'name_id' => 'Jawa Barat', 'slug' => 'west-java', 'description' => 'The birthplace of premium Java tea and highland vegetables.', 'description_id' => 'Tempat kelahiran teh Jawa premium dan sayuran dataran tinggi.', 'latitude' => -6.9175, 'longitude' => 107.6191, 'gi_destination_count' => 1, 'gi_product_count' => 2, 'experience_count' => 2]);

        $baliProv = Province::create(['region_id' => $central->id, 'island_id' => $bali->id, 'name' => 'Bali', 'name_id' => 'Bali', 'slug' => 'bali', 'description' => 'Island of the Gods, home to Kintamani Coffee and traditional Arak Bali.', 'description_id' => 'Pulau Dewata, rumah bagi Kopi Kintamani dan Arak Bali tradisional.', 'latitude' => -8.3405, 'longitude' => 115.0920, 'gi_destination_count' => 2, 'gi_product_count' => 3, 'experience_count' => 5]);
        $ntt = Province::create(['region_id' => $central->id, 'island_id' => $bali->id, 'name' => 'East Nusa Tenggara', 'name_id' => 'Nusa Tenggara Timur', 'slug' => 'east-nusa-tenggara', 'description' => 'Known for Bajawa coffee and ikat weaving traditions.', 'description_id' => 'Terkenal dengan kopi Bajawa dan tradisi tenun ikat.', 'latitude' => -8.6574, 'longitude' => 121.0794, 'gi_destination_count' => 1, 'gi_product_count' => 2, 'experience_count' => 2]);

        $kalbar = Province::create(['region_id' => $eastern->id, 'island_id' => $kalimantan->id, 'name' => 'West Kalimantan', 'name_id' => 'Kalimantan Barat', 'slug' => 'west-kalimantan', 'description' => 'Famous for Sambas durian and Sarawak pepper.', 'description_id' => 'Terkenal dengan durian Sambas dan lada Sarawak.', 'latitude' => -0.2788, 'longitude' => 111.4753, 'gi_destination_count' => 1, 'gi_product_count' => 1, 'experience_count' => 1]);
        $sulsel = Province::create(['region_id' => $eastern->id, 'island_id' => $sulawesi->id, 'name' => 'South Sulawesi', 'name_id' => 'Sulawesi Selatan', 'slug' => 'south-sulawesi', 'description' => 'Origin of Toraja Coffee, one of the finest specialty coffees globally.', 'description_id' => 'Asal kopi Toraja, salah satu kopi spesialti terbaik secara global.', 'latitude' => -3.6688, 'longitude' => 119.9741, 'gi_destination_count' => 2, 'gi_product_count' => 2, 'experience_count' => 3]);
        $maluku = Province::create(['region_id' => $eastern->id, 'island_id' => $papua->id, 'name' => 'Maluku', 'name_id' => 'Maluku', 'slug' => 'maluku', 'description' => 'The original Spice Islands, birthplace of clove and nutmeg trade.', 'description_id' => 'Kepulauan Rempah asli, tempat kelahiran perdagangan cengkeh dan pala.', 'latitude' => -3.2385, 'longitude' => 130.1453, 'gi_destination_count' => 1, 'gi_product_count' => 2, 'experience_count' => 2]);

        // ──────────────────────────────────
        // 4. PRODUCT CATEGORIES
        // ──────────────────────────────────
        $coffee  = ProductCategory::create(['name' => 'Coffee', 'name_id' => 'Kopi', 'slug' => 'coffee', 'icon' => '☕', 'description' => 'Indonesia\'s world-class single-origin coffees from volcanic highlands.', 'description_id' => 'Kopi single-origin kelas dunia Indonesia dari dataran tinggi vulkanik.', 'sort_order' => 1]);
        $tea     = ProductCategory::create(['name' => 'Tea', 'name_id' => 'Teh', 'slug' => 'tea', 'icon' => '🍵', 'description' => 'Premium highland teas from Java and Sumatra.', 'description_id' => 'Teh dataran tinggi premium dari Jawa dan Sumatera.', 'sort_order' => 2]);
        $spices  = ProductCategory::create(['name' => 'Spices', 'name_id' => 'Rempah', 'slug' => 'spices', 'icon' => '🌿', 'description' => 'The original spice islands heritage — pepper, clove, nutmeg, and cinnamon.', 'description_id' => 'Warisan kepulauan rempah asli — lada, cengkeh, pala, dan kayu manis.', 'sort_order' => 3]);
        $fruits  = ProductCategory::create(['name' => 'Fruits', 'name_id' => 'Buah', 'slug' => 'fruits', 'icon' => '🍊', 'description' => 'Tropical fruits with protected geographical indication.', 'description_id' => 'Buah tropis dengan indikasi geografis terlindungi.', 'sort_order' => 4]);
        $culture = ProductCategory::create(['name' => 'Culture & Crafts', 'name_id' => 'Budaya & Kerajinan', 'slug' => 'culture-crafts', 'icon' => '🎭', 'description' => 'Traditional textiles, ceramics, and artisanal crafts.', 'description_id' => 'Tekstil tradisional, keramik, dan kerajinan artisan.', 'sort_order' => 5]);
        $gastro  = ProductCategory::create(['name' => 'Gastronomy', 'name_id' => 'Gastronomi', 'slug' => 'gastronomy', 'icon' => '🍽️', 'description' => 'Culinary heritage and traditional food products.', 'description_id' => 'Warisan kuliner dan produk makanan tradisional.', 'sort_order' => 6]);

        // ──────────────────────────────────
        // 5. DESTINATIONS & GI PRODUCTS
        // ──────────────────────────────────
        // ACEH - Gayo Highlands
        $gayo = Destination::create([
            'province_id' => $aceh->id, 'name' => 'Gayo Highlands', 'name_id' => 'Dataran Tinggi Gayo',
            'slug' => 'gayo-highlands', 'tagline' => 'Where the World\'s Finest Arabica Grows',
            'tagline_id' => 'Tempat Arabika Terbaik Dunia Tumbuh',
            'description' => 'Nestled in the volcanic highlands of Central Aceh, the Gayo region produces some of the world\'s most sought-after single-origin Arabica coffee. At elevations between 1,200-1,700 meters, the unique terroir creates a cup profile of full body, low acidity, and notes of dark chocolate, herbs, and tropical fruit.',
            'description_id' => 'Terletak di dataran tinggi vulkanik Aceh Tengah, wilayah Gayo menghasilkan beberapa kopi Arabika single-origin paling dicari di dunia. Pada ketinggian 1.200-1.700 meter, terroir unik menciptakan profil cangkir dengan body penuh, keasaman rendah, dan catatan cokelat hitam, herbal, dan buah tropis.',
            'latitude' => 4.6306, 'longitude' => 96.8336, 'is_featured' => true,
        ]);
        $gayoCoffee = GiProduct::create([
            'destination_id' => $gayo->id, 'category_id' => $coffee->id,
            'name' => 'Gayo Arabica Coffee', 'name_id' => 'Kopi Arabika Gayo',
            'slug' => 'gayo-arabica-coffee', 'is_featured' => true,
            'description' => 'Premium single-origin Arabica coffee from the volcanic highlands of Aceh, known for its full body, low acidity, and complex flavor profile.',
            'description_id' => 'Kopi Arabika single-origin premium dari dataran tinggi vulkanik Aceh, terkenal dengan body penuh, keasaman rendah, dan profil rasa yang kompleks.',
            'origin_story' => 'Gayo coffee cultivation dates back to the early 20th century when Dutch colonists introduced Arabica seedlings to the fertile volcanic soils of Central Aceh.',
            'origin_story_id' => 'Budidaya kopi Gayo dimulai sejak awal abad ke-20 ketika penjajah Belanda memperkenalkan bibit Arabika ke tanah vulkanik subur Aceh Tengah.',
            'taste_profile' => 'Full body, low acidity, notes of dark chocolate, herbal, tropical fruit, earthy undertones.',
            'taste_profile_id' => 'Body penuh, keasaman rendah, catatan cokelat hitam, herbal, buah tropis, undertone tanah.',
        ]);

        // CENTRAL JAVA - Dieng Plateau
        $dieng = Destination::create([
            'province_id' => $jateng->id, 'name' => 'Dieng Plateau', 'name_id' => 'Dataran Tinggi Dieng',
            'slug' => 'dieng-plateau', 'tagline' => 'Above the Clouds, Beyond the Ordinary',
            'tagline_id' => 'Di Atas Awan, Melampaui yang Biasa',
            'description' => 'At 2,000 meters above sea level, the mystical Dieng Plateau is home to ancient Hindu temples and extraordinary GI products including Arabica coffee, Carica fruit, and the legendary Purwaceng herb.',
            'description_id' => 'Pada ketinggian 2.000 meter di atas permukaan laut, Dataran Tinggi Dieng yang mistis adalah rumah bagi candi Hindu kuno dan produk IG luar biasa termasuk kopi Arabika, buah Carica, dan herbal legendaris Purwaceng.',
            'latitude' => -7.2100, 'longitude' => 109.9150, 'is_featured' => true,
        ]);
        $diengCoffee = GiProduct::create([
            'destination_id' => $dieng->id, 'category_id' => $coffee->id,
            'name' => 'Dieng Arabica Coffee', 'name_id' => 'Kopi Arabika Dieng',
            'slug' => 'dieng-arabica-coffee', 'is_featured' => true,
            'description' => 'Grown at extreme altitudes on the Dieng Plateau, this coffee offers a unique terroir-driven cup with bright acidity and floral notes.',
            'description_id' => 'Ditanam di ketinggian ekstrem di Dataran Tinggi Dieng, kopi ini menawarkan cangkir terroir yang unik dengan keasaman cerah dan catatan bunga.',
        ]);
        $carica = GiProduct::create([
            'destination_id' => $dieng->id, 'category_id' => $fruits->id,
            'name' => 'Dieng Carica', 'name_id' => 'Carica Dieng',
            'slug' => 'dieng-carica', 'is_featured' => true,
            'description' => 'A rare highland papaya species found only on the Dieng Plateau, known for its sweet-tangy flavor and used in premium preserves.',
            'description_id' => 'Spesies pepaya dataran tinggi langka yang hanya ditemukan di Dataran Tinggi Dieng, terkenal dengan rasa manis-asam dan digunakan dalam manisan premium.',
        ]);

        // BALI - Kintamani
        $kintamani = Destination::create([
            'province_id' => $baliProv->id, 'name' => 'Kintamani Highlands', 'name_id' => 'Dataran Tinggi Kintamani',
            'slug' => 'kintamani-highlands', 'tagline' => 'Coffee with a View of the Sacred Volcano',
            'tagline_id' => 'Kopi dengan Pemandangan Gunung Api Suci',
            'description' => 'Overlooking the majestic Mount Batur, Kintamani produces Indonesia\'s first Geographical Indication certified coffee. The unique Subak Abian farming system combines Balinese Hindu philosophy with sustainable agriculture.',
            'description_id' => 'Menghadap Gunung Batur yang megah, Kintamani menghasilkan kopi bersertifikat Indikasi Geografis pertama di Indonesia. Sistem pertanian Subak Abian yang unik menggabungkan filosofi Hindu Bali dengan pertanian berkelanjutan.',
            'latitude' => -8.2425, 'longitude' => 115.3667, 'is_featured' => true,
        ]);
        $kintamaniCoffee = GiProduct::create([
            'destination_id' => $kintamani->id, 'category_id' => $coffee->id,
            'name' => 'Kintamani Arabica Coffee', 'name_id' => 'Kopi Arabika Kintamani',
            'slug' => 'kintamani-arabica-coffee', 'is_featured' => true,
            'description' => 'Indonesia\'s first GI-certified coffee, grown under the Subak Abian system with citrus notes and medium body.',
            'description_id' => 'Kopi bersertifikat IG pertama di Indonesia, ditanam dengan sistem Subak Abian dengan catatan jeruk dan body medium.',
        ]);

        // SOUTH SULAWESI - Toraja
        $toraja = Destination::create([
            'province_id' => $sulsel->id, 'name' => 'Toraja', 'name_id' => 'Toraja',
            'slug' => 'toraja', 'tagline' => 'Land of the Heavenly Kings',
            'tagline_id' => 'Negeri Raja-Raja Surgawi',
            'description' => 'Toraja is a mystical highland region in South Sulawesi, renowned worldwide for its exceptional Arabica coffee and unique funeral ceremonies. The Toraja people have maintained their ancestral traditions for centuries.',
            'description_id' => 'Toraja adalah wilayah dataran tinggi mistis di Sulawesi Selatan, terkenal di seluruh dunia karena kopi Arabika yang luar biasa dan upacara pemakaman yang unik.',
            'latitude' => -3.0679, 'longitude' => 119.8456, 'is_featured' => true,
        ]);
        $torajaCoffee = GiProduct::create([
            'destination_id' => $toraja->id, 'category_id' => $coffee->id,
            'name' => 'Toraja Arabica Coffee', 'name_id' => 'Kopi Arabika Toraja',
            'slug' => 'toraja-arabica-coffee', 'is_featured' => true,
            'description' => 'Celebrated specialty coffee with a rich, full body and low acidity, featuring notes of dark chocolate and spice.',
            'description_id' => 'Kopi spesialti terkenal dengan body kaya dan penuh, keasaman rendah, menampilkan catatan cokelat hitam dan rempah.',
        ]);

        // MALUKU - Spice Islands
        $ternate = Destination::create([
            'province_id' => $maluku->id, 'name' => 'Ternate & Tidore', 'name_id' => 'Ternate & Tidore',
            'slug' => 'ternate-tidore', 'tagline' => 'The Original Spice Islands',
            'tagline_id' => 'Kepulauan Rempah Asli',
            'description' => 'The legendary Spice Islands that changed world history. Ternate and Tidore were the original source of cloves and nutmeg, sparking the age of exploration.',
            'description_id' => 'Kepulauan Rempah legendaris yang mengubah sejarah dunia. Ternate dan Tidore adalah sumber asli cengkeh dan pala, yang memicu era penjelajahan.',
            'latitude' => 0.7867, 'longitude' => 127.3760, 'is_featured' => true,
        ]);
        GiProduct::create([
            'destination_id' => $ternate->id, 'category_id' => $spices->id,
            'name' => 'Ternate Clove', 'name_id' => 'Cengkeh Ternate',
            'slug' => 'ternate-clove', 'is_featured' => true,
            'description' => 'The original clove from the Spice Islands, with an intense aromatic profile that changed the course of world trade.',
            'description_id' => 'Cengkeh asli dari Kepulauan Rempah, dengan profil aromatik yang intens yang mengubah arah perdagangan dunia.',
        ]);

        // WEST SUMATRA - Cassia Vera
        $kerinci = Destination::create([
            'province_id' => $sumbar->id, 'name' => 'Kerinci Valley', 'name_id' => 'Lembah Kerinci',
            'slug' => 'kerinci-valley', 'tagline' => 'The Cinnamon Heartland',
            'tagline_id' => 'Jantung Kayu Manis',
            'description' => 'Nestled between Mount Kerinci and lush rainforests, this valley produces the finest Cassia Vera cinnamon in the world.',
            'description_id' => 'Terletak di antara Gunung Kerinci dan hutan hujan yang rimbun, lembah ini menghasilkan kayu manis Cassia Vera terbaik di dunia.',
            'latitude' => -1.6972, 'longitude' => 101.2642, 'is_featured' => true,
        ]);
        GiProduct::create([
            'destination_id' => $kerinci->id, 'category_id' => $spices->id,
            'name' => 'Kerinci Cassia Vera', 'name_id' => 'Cassia Vera Kerinci',
            'slug' => 'kerinci-cassia-vera', 'is_featured' => true,
            'description' => 'Premium Indonesian cinnamon with a bold, sweet flavor. The bark is hand-harvested from centuries-old plantations.',
            'description_id' => 'Kayu manis Indonesia premium dengan rasa berani dan manis. Kulit kayu dipanen tangan dari perkebunan berusia berabad-abad.',
        ]);

        // EAST JAVA - Malang
        $malang = Destination::create([
            'province_id' => $jatim->id, 'name' => 'Malang & Batu', 'name_id' => 'Malang & Batu',
            'slug' => 'malang-batu', 'tagline' => 'The Apple City of Java',
            'tagline_id' => 'Kota Apel di Jawa',
            'description' => 'The cool highland city of East Java, famous for its Manalagi and Rome Beauty apples grown in the volcanic soils of Mount Arjuno.',
            'description_id' => 'Kota dataran tinggi sejuk di Jawa Timur, terkenal dengan apel Manalagi dan Rome Beauty yang ditanam di tanah vulkanik Gunung Arjuno.',
            'latitude' => -7.9775, 'longitude' => 112.6349, 'is_featured' => true,
        ]);
        GiProduct::create([
            'destination_id' => $malang->id, 'category_id' => $fruits->id,
            'name' => 'Malang Apple', 'name_id' => 'Apel Malang',
            'slug' => 'malang-apple', 'is_featured' => true,
            'description' => 'Crisp, sweet highland apples from Batu city, grown at elevations of 700-1,700 meters in volcanic soil.',
            'description_id' => 'Apel dataran tinggi yang renyah dan manis dari kota Batu, ditanam di ketinggian 700-1.700 meter di tanah vulkanik.',
        ]);

        // ──────────────────────────────────
        // 6. SUPPLY CHAIN (Trace the Origin) for Gayo Coffee
        // ──────────────────────────────────
        $steps = [
            ['gi_product_id' => $gayoCoffee->id, 'step_order' => 1, 'level' => 'country', 'label' => 'Indonesia', 'label_id' => 'Indonesia', 'description' => 'Republic of Indonesia, Southeast Asia', 'icon' => '🌏'],
            ['gi_product_id' => $gayoCoffee->id, 'step_order' => 2, 'level' => 'province', 'label' => 'Aceh Province', 'label_id' => 'Provinsi Aceh', 'description' => 'Northernmost province of Sumatra', 'icon' => '🏛️'],
            ['gi_product_id' => $gayoCoffee->id, 'step_order' => 3, 'level' => 'district', 'label' => 'Central Aceh Regency', 'label_id' => 'Kabupaten Aceh Tengah', 'description' => 'Highland region at 1,200-1,700m elevation', 'icon' => '🏘️'],
            ['gi_product_id' => $gayoCoffee->id, 'step_order' => 4, 'level' => 'village', 'label' => 'Takengon & Bener Meriah', 'label_id' => 'Takengon & Bener Meriah', 'description' => 'Coffee-growing villages of the Gayo highlands', 'icon' => '🏡'],
            ['gi_product_id' => $gayoCoffee->id, 'step_order' => 5, 'level' => 'farmer_group', 'label' => 'Gayo Organic Coffee Cooperative', 'label_id' => 'Koperasi Kopi Organik Gayo', 'description' => '2,500+ smallholder farmers practicing organic cultivation', 'icon' => '👨‍🌾'],
            ['gi_product_id' => $gayoCoffee->id, 'step_order' => 6, 'level' => 'processing', 'label' => 'Wet-Hulled (Giling Basah)', 'label_id' => 'Giling Basah', 'description' => 'Traditional Sumatran wet-hull processing for unique flavor profile', 'icon' => '⚙️'],
            ['gi_product_id' => $gayoCoffee->id, 'step_order' => 7, 'level' => 'product', 'label' => 'Gayo Arabica Coffee', 'label_id' => 'Kopi Arabika Gayo', 'description' => 'GI-certified single-origin Arabica, SCA score 84+', 'icon' => '📦'],
        ];
        foreach ($steps as $step) {
            SupplyChainStep::create($step);
        }

        // ──────────────────────────────────
        // 7. PRODUCERS (GI People)
        // ──────────────────────────────────
        $pak_ahmad = Producer::create([
            'destination_id' => $gayo->id, 'name' => 'Pak Ahmad Gayo', 'slug' => 'pak-ahmad-gayo',
            'role' => 'Master Coffee Farmer', 'role_id' => 'Petani Kopi Master',
            'village' => 'Takengon, Aceh Tengah',
            'story' => 'For three generations, Pak Ahmad\'s family has cultivated Gayo Arabica coffee on the volcanic slopes of Central Aceh. His 2-hectare organic farm produces some of the finest specialty-grade beans in the region.',
            'story_id' => 'Selama tiga generasi, keluarga Pak Ahmad telah membudidayakan kopi Arabika Gayo di lereng vulkanik Aceh Tengah. Kebun organiknya seluas 2 hektar menghasilkan beberapa biji kopi kelas spesialti terbaik di wilayah ini.',
            'is_featured' => true,
        ]);
        $pak_ahmad->products()->attach([$gayoCoffee->id]);

        $ibu_sari = Producer::create([
            'destination_id' => $dieng->id, 'name' => 'Ibu Sari Dieng', 'slug' => 'ibu-sari-dieng',
            'role' => 'Carica Processor', 'role_id' => 'Pengolah Carica',
            'village' => 'Desa Dieng Kulon, Wonosobo',
            'story' => 'Ibu Sari leads a women\'s cooperative that transforms the rare Dieng Carica into premium preserved products. Her enterprise empowers 30+ local women artisans.',
            'story_id' => 'Ibu Sari memimpin koperasi wanita yang mengubah Carica Dieng langka menjadi produk olahan premium. Usahanya memberdayakan 30+ pengrajin wanita lokal.',
            'is_featured' => true,
        ]);
        $ibu_sari->products()->attach([$carica->id]);

        $wayan = Producer::create([
            'destination_id' => $kintamani->id, 'name' => 'I Wayan Subak', 'slug' => 'i-wayan-subak',
            'role' => 'Subak Abian Leader', 'role_id' => 'Pemimpin Subak Abian',
            'village' => 'Catur, Kintamani',
            'story' => 'I Wayan leads the Subak Abian Tri Guna Karya, a traditional Balinese farming collective that manages over 200 hectares of shade-grown Arabica coffee using Hindu Tri Hita Karana philosophy.',
            'story_id' => 'I Wayan memimpin Subak Abian Tri Guna Karya, kolektif pertanian tradisional Bali yang mengelola lebih dari 200 hektar kopi Arabika naungan menggunakan filosofi Hindu Tri Hita Karana.',
            'is_featured' => true,
        ]);
        $wayan->products()->attach([$kintamaniCoffee->id]);

        // ──────────────────────────────────
        // 8. EXPERIENCE CATEGORIES
        // ──────────────────────────────────
        $expFarm = ExperienceCategory::create(['name' => 'Farm Experience', 'name_id' => 'Pengalaman Pertanian', 'slug' => 'farm-experience', 'icon' => '🌱', 'sort_order' => 1]);
        $expProd = ExperienceCategory::create(['name' => 'Production', 'name_id' => 'Produksi', 'slug' => 'production', 'icon' => '⚙️', 'sort_order' => 2]);
        $expGas  = ExperienceCategory::create(['name' => 'Gastronomy', 'name_id' => 'Gastronomi', 'slug' => 'gastronomy-exp', 'icon' => '🍽️', 'sort_order' => 3]);
        $expMeet = ExperienceCategory::create(['name' => 'Meet the Producer', 'name_id' => 'Temui Produsen', 'slug' => 'meet-producer', 'icon' => '🤝', 'sort_order' => 4]);
        $expCult = ExperienceCategory::create(['name' => 'Culture', 'name_id' => 'Budaya', 'slug' => 'culture-exp', 'icon' => '🎭', 'sort_order' => 5]);
        $expNat  = ExperienceCategory::create(['name' => 'Nature', 'name_id' => 'Alam', 'slug' => 'nature', 'icon' => '🏔️', 'sort_order' => 6]);

        // ──────────────────────────────────
        // 9. EXPERIENCES
        // ──────────────────────────────────
        Experience::create([
            'destination_id' => $gayo->id, 'category_id' => $expFarm->id,
            'name' => 'Gayo Coffee Plantation Tour', 'name_id' => 'Tur Perkebunan Kopi Gayo',
            'slug' => 'gayo-coffee-plantation-tour', 'is_featured' => true,
            'description' => 'Walk through organic Arabica coffee plantations, learn about shade-grown cultivation, pick ripe cherries, and enjoy a fresh cup on the farm.',
            'description_id' => 'Jelajahi perkebunan kopi Arabika organik, pelajari budidaya naungan, petik ceri matang, dan nikmati secangkir segar di kebun.',
            'duration' => '4 hours', 'price' => 350000, 'min_persons' => 2, 'max_persons' => 10,
            'includes' => ['Guided plantation tour', 'Coffee cherry picking', 'Fresh brewed coffee tasting', 'Local snack'],
        ]);
        Experience::create([
            'destination_id' => $gayo->id, 'category_id' => $expProd->id,
            'name' => 'Gayo Coffee Roasting Workshop', 'name_id' => 'Workshop Roasting Kopi Gayo',
            'slug' => 'gayo-coffee-roasting-workshop', 'is_featured' => true,
            'description' => 'Learn the art of coffee roasting from master roasters. Roast your own batch of Gayo Arabica to take home.',
            'description_id' => 'Pelajari seni roasting kopi dari master roaster. Roasting batch kopi Gayo Arabika sendiri untuk dibawa pulang.',
            'duration' => '3 hours', 'price' => 500000, 'min_persons' => 1, 'max_persons' => 6,
            'includes' => ['Professional roaster guidance', 'Green bean selection', '250g roasted coffee to take home', 'Cupping session'],
        ]);
        Experience::create([
            'destination_id' => $dieng->id, 'category_id' => $expNat->id,
            'name' => 'Dieng Sunrise & Golden Sunrise Trek', 'name_id' => 'Trek Sunrise Emas Dieng',
            'slug' => 'dieng-sunrise-trek', 'is_featured' => true,
            'description' => 'Trek to Sikunir Peak at dawn to witness the legendary Golden Sunrise above the clouds, followed by a visit to ancient Hindu temples and hot springs.',
            'description_id' => 'Trekking ke Puncak Sikunir saat fajar untuk menyaksikan Sunrise Emas legendaris di atas awan, diikuti kunjungan ke candi Hindu kuno dan sumber air panas.',
            'duration' => '6 hours', 'price' => 250000, 'min_persons' => 2, 'max_persons' => 15,
            'includes' => ['Guide', 'Entrance fees', 'Hot ginger coffee', 'Breakfast'],
        ]);
        Experience::create([
            'destination_id' => $kintamani->id, 'category_id' => $expGas->id,
            'name' => 'Kintamani Farm-to-Cup Coffee Journey', 'name_id' => 'Perjalanan Farm-to-Cup Kopi Kintamani',
            'slug' => 'kintamani-farm-to-cup', 'is_featured' => true,
            'description' => 'Experience the complete journey of coffee from tree to cup at a traditional Subak Abian farm overlooking Mount Batur.',
            'description_id' => 'Alami perjalanan lengkap kopi dari pohon ke cangkir di pertanian Subak Abian tradisional yang menghadap Gunung Batur.',
            'duration' => '5 hours', 'price' => 600000, 'min_persons' => 2, 'max_persons' => 8,
            'includes' => ['Plantation walk', 'Processing demo', 'Roasting class', '5-variety cupping', 'Balinese lunch'],
        ]);
        Experience::create([
            'destination_id' => $toraja->id, 'category_id' => $expCult->id,
            'name' => 'Toraja Cultural & Coffee Immersion', 'name_id' => 'Imersi Budaya & Kopi Toraja',
            'slug' => 'toraja-cultural-coffee-immersion', 'is_featured' => true,
            'description' => 'A deep cultural immersion into Toraja life, including Tongkonan house visits, traditional ceremonies, and Arabica coffee tasting.',
            'description_id' => 'Imersi budaya mendalam ke kehidupan Toraja, termasuk kunjungan rumah Tongkonan, upacara tradisional, dan icip kopi Arabika.',
            'duration' => 'Full day', 'price' => 800000, 'min_persons' => 2, 'max_persons' => 6,
            'includes' => ['Cultural guide', 'Tongkonan visit', 'Coffee plantation', 'Traditional lunch', 'Weaving demo'],
        ]);
        Experience::create([
            'destination_id' => $ternate->id, 'category_id' => $expMeet->id,
            'name' => 'Spice Island Heritage Walk', 'name_id' => 'Jalan Warisan Pulau Rempah',
            'slug' => 'spice-island-heritage-walk', 'is_featured' => true,
            'description' => 'Walk through clove and nutmeg plantations that once drove European nations to wage wars, with stories from local farmers.',
            'description_id' => 'Jelajahi perkebunan cengkeh dan pala yang pernah mendorong negara-negara Eropa berperang, dengan cerita dari petani lokal.',
            'duration' => '4 hours', 'price' => 400000, 'min_persons' => 2, 'max_persons' => 10,
            'includes' => ['Heritage guide', 'Spice plantation walk', 'Spice tasting', 'Sultan palace visit'],
        ]);

        // ──────────────────────────────────
        // 10. JOURNEYS
        // ──────────────────────────────────
        $j1 = Journey::create([
            'name' => 'Java Coffee & Culture Trail', 'name_id' => 'Jejak Kopi & Budaya Jawa',
            'slug' => 'java-coffee-culture-trail', 'is_featured' => true,
            'tagline' => 'Jakarta → Bandung → Dieng → Yogyakarta', 'tagline_id' => 'Jakarta → Bandung → Dieng → Yogyakarta',
            'description' => 'A 5-day journey through Java\'s cultural heartland, exploring highland coffee plantations, ancient temples, and the mystical Dieng Plateau.',
            'description_id' => 'Perjalanan 5 hari melalui jantung budaya Jawa, menjelajahi perkebunan kopi dataran tinggi, candi kuno, dan Dataran Tinggi Dieng yang mistis.',
            'route_summary' => 'Jakarta → Bandung (Tea Plantations) → Purwokerto → Dieng (Coffee & Carica) → Yogyakarta (Borobudur)',
            'duration_days' => 5, 'price_from' => 5500000, 'target_audience' => 'couple', 'style' => 'cultural',
        ]);
        JourneyStop::create(['journey_id' => $j1->id, 'destination_id' => $dieng->id, 'day_number' => 3, 'description' => 'Sunrise trek at Sikunir, Dieng coffee plantation visit, Carica factory tour, ancient temple exploration.', 'activities' => ['Golden Sunrise Trek', 'Coffee Plantation Tour', 'Carica Factory Visit', 'Temple Complex'], 'overnight' => true, 'sort_order' => 1]);

        $j2 = Journey::create([
            'name' => 'Sumatra Origin Explorer', 'name_id' => 'Penjelajah Asal Sumatera',
            'slug' => 'sumatra-origin-explorer', 'is_featured' => true,
            'tagline' => 'Medan → Lake Toba → Gayo Highlands', 'tagline_id' => 'Medan → Danau Toba → Dataran Tinggi Gayo',
            'description' => 'Explore Sumatra\'s extraordinary coffee origins from the shores of Lake Toba to the highlands of Gayo.',
            'description_id' => 'Jelajahi asal-usul kopi luar biasa Sumatera dari tepi Danau Toba hingga dataran tinggi Gayo.',
            'route_summary' => 'Medan → Simalungun → Lake Toba → Berastagi → Takengon (Gayo)',
            'duration_days' => 7, 'price_from' => 8500000, 'target_audience' => 'premium', 'style' => 'adventure',
        ]);
        JourneyStop::create(['journey_id' => $j2->id, 'destination_id' => $gayo->id, 'day_number' => 5, 'description' => 'Full immersion in Gayo coffee culture — plantation visits, processing demo, cupping session, and farmers\' dinner.', 'activities' => ['Gayo Coffee Plantation', 'Wet-Hull Processing Demo', 'Cupping Session', 'Dinner with Farmers'], 'overnight' => true, 'sort_order' => 1]);

        $j3 = Journey::create([
            'name' => 'Eastern Spice Route', 'name_id' => 'Rute Rempah Timur',
            'slug' => 'eastern-spice-route', 'is_featured' => true,
            'tagline' => 'Makassar → Toraja → Ternate', 'tagline_id' => 'Makassar → Toraja → Ternate',
            'description' => 'Retrace the ancient spice routes from Toraja\'s coffee highlands to the legendary Spice Islands of Maluku.',
            'description_id' => 'Telusuri kembali rute rempah kuno dari dataran tinggi kopi Toraja ke Kepulauan Rempah legendaris Maluku.',
            'route_summary' => 'Makassar → Rantepao → Toraja Highlands → Ternate → Tidore',
            'duration_days' => 8, 'price_from' => 12000000, 'target_audience' => 'premium', 'style' => 'expedition',
        ]);
        JourneyStop::create(['journey_id' => $j3->id, 'destination_id' => $toraja->id, 'day_number' => 3, 'description' => 'Explore Tongkonan houses, attend local ceremonies, and taste Toraja Arabica in its homeland.', 'activities' => ['Tongkonan Village', 'Coffee Plantation', 'Traditional Ceremony', 'Local Market'], 'overnight' => true, 'sort_order' => 1]);
        JourneyStop::create(['journey_id' => $j3->id, 'destination_id' => $ternate->id, 'day_number' => 6, 'description' => 'Explore the historic Spice Islands — clove and nutmeg plantations, Sultan\'s Palace, and Fort Oranje.', 'activities' => ['Spice Plantations', "Sultan's Palace", 'Fort Oranje', 'Spice Market'], 'overnight' => true, 'sort_order' => 2]);

        // ──────────────────────────────────
        // 11. ARTICLE CATEGORIES & ARTICLES
        // ──────────────────────────────────
        $catOrigin = ArticleCategory::create(['name' => 'Origin Stories', 'name_id' => 'Cerita Asal', 'slug' => 'origin-stories', 'sort_order' => 1]);
        $catPeople = ArticleCategory::create(['name' => 'People', 'name_id' => 'Manusia', 'slug' => 'people-stories', 'sort_order' => 2]);
        $catTaste  = ArticleCategory::create(['name' => 'Taste', 'name_id' => 'Rasa', 'slug' => 'taste', 'sort_order' => 3]);
        $catCultureA = ArticleCategory::create(['name' => 'Culture', 'name_id' => 'Budaya', 'slug' => 'culture-stories', 'sort_order' => 4]);
        $catJourney = ArticleCategory::create(['name' => 'Journey', 'name_id' => 'Perjalanan', 'slug' => 'journey-stories', 'sort_order' => 5]);
        $catSustain = ArticleCategory::create(['name' => 'Sustainability', 'name_id' => 'Keberlanjutan', 'slug' => 'sustainability-stories', 'sort_order' => 6]);

        Article::create([
            'category_id' => $catOrigin->id, 'title' => 'The 700-Year-Old Secret of Gayo Coffee', 'title_id' => 'Rahasia 700 Tahun Kopi Gayo',
            'slug' => '700-year-old-secret-gayo-coffee', 'is_featured' => true,
            'excerpt' => 'Deep in the highlands of Aceh, a coffee tradition that predates European colonialism continues to produce some of the world\'s finest beans.',
            'excerpt_id' => 'Di dataran tinggi Aceh, tradisi kopi yang lebih tua dari kolonialisme Eropa terus menghasilkan beberapa biji kopi terbaik dunia.',
            'body' => 'The story of Gayo coffee begins long before the Dutch East India Company arrived in the Indonesian archipelago. Local Gayo people had been cultivating coffee in the volcanic highlands for centuries, using techniques passed down through generations...',
            'author' => 'Sarah Wijaya', 'published_at' => now()->subDays(5),
        ]);
        Article::create([
            'category_id' => $catPeople->id, 'title' => 'Ibu Sari: The Woman Who Saved Dieng Carica', 'title_id' => 'Ibu Sari: Wanita yang Menyelamatkan Carica Dieng',
            'slug' => 'ibu-sari-woman-saved-dieng-carica', 'is_featured' => true,
            'excerpt' => 'When the rare highland papaya was on the verge of extinction, one woman\'s cooperative turned it into a thriving GI product.',
            'excerpt_id' => 'Ketika pepaya dataran tinggi langka hampir punah, koperasi seorang wanita mengubahnya menjadi produk IG yang berkembang.',
            'body' => 'In the misty highlands of Dieng, at 2,000 meters above sea level, Ibu Sari tends to her Carica orchard with the same dedication her grandmother once showed...',
            'author' => 'Budi Santoso', 'published_at' => now()->subDays(12),
        ]);
        Article::create([
            'category_id' => $catJourney->id, 'title' => 'Following the Ancient Spice Route: Ternate to Tidore', 'title_id' => 'Mengikuti Rute Rempah Kuno: Ternate ke Tidore',
            'slug' => 'following-ancient-spice-route', 'is_featured' => true,
            'excerpt' => 'A journey through the islands that launched a thousand ships and changed the course of world history.',
            'excerpt_id' => 'Sebuah perjalanan melalui pulau-pulau yang meluncurkan seribu kapal dan mengubah arah sejarah dunia.',
            'body' => 'Standing on the volcanic shore of Ternate, looking across the narrow strait to Tidore, it is hard to imagine that these tiny islands once controlled the global economy...',
            'author' => 'Marco Halim', 'published_at' => now()->subDays(20),
        ]);
        Article::create([
            'category_id' => $catSustain->id, 'title' => 'How Subak Abian Is Saving Bali\'s Coffee Future', 'title_id' => 'Bagaimana Subak Abian Menyelamatkan Masa Depan Kopi Bali',
            'slug' => 'subak-abian-saving-bali-coffee', 'is_featured' => false,
            'excerpt' => 'The traditional Balinese farming philosophy of Tri Hita Karana meets modern sustainable agriculture.',
            'excerpt_id' => 'Filosofi pertanian tradisional Bali Tri Hita Karana bertemu pertanian berkelanjutan modern.',
            'body' => 'In Kintamani, the concept of Subak Abian goes beyond simple cooperative farming. It embodies the Balinese principle of harmony...',
            'author' => 'I Ketut Artawan', 'published_at' => now()->subDays(30),
        ]);

        // ──────────────────────────────────
        // 12. EVENTS
        // ──────────────────────────────────
        Event::create(['title' => 'Gayo Coffee Festival 2026', 'title_id' => 'Festival Kopi Gayo 2026', 'slug' => 'gayo-coffee-festival-2026', 'event_type' => 'festival', 'start_date' => now()->addMonths(2), 'end_date' => now()->addMonths(2)->addDays(3), 'location' => 'Takengon, Aceh Tengah', 'province_id' => $aceh->id, 'product_category_id' => $coffee->id, 'description' => 'Annual celebration of Gayo Arabica coffee featuring cupping competitions, farm tours, and cultural performances.', 'description_id' => 'Perayaan tahunan kopi Arabika Gayo menampilkan kompetisi cupping, tur kebun, dan pertunjukan budaya.', 'is_featured' => true]);
        Event::create(['title' => 'Indonesia Spice Summit 2026', 'title_id' => 'Indonesia Spice Summit 2026', 'slug' => 'indonesia-spice-summit-2026', 'event_type' => 'trade_show', 'start_date' => now()->addMonths(3), 'end_date' => now()->addMonths(3)->addDays(2), 'location' => 'Jakarta Convention Center', 'province_id' => null, 'product_category_id' => $spices->id, 'description' => 'International trade summit connecting Indonesian spice producers with global buyers.', 'description_id' => 'Summit perdagangan internasional yang menghubungkan produsen rempah Indonesia dengan pembeli global.', 'is_featured' => true]);
        Event::create(['title' => 'Bali Coffee & Chocolate Expo', 'title_id' => 'Expo Kopi & Cokelat Bali', 'slug' => 'bali-coffee-chocolate-expo', 'event_type' => 'festival', 'start_date' => now()->addMonths(1), 'end_date' => now()->addMonths(1)->addDays(2), 'location' => 'Ubud, Bali', 'province_id' => $baliProv->id, 'product_category_id' => $coffee->id, 'description' => 'Showcase of Bali\'s finest coffees and bean-to-bar chocolates with workshops and tastings.', 'description_id' => 'Pameran kopi dan cokelat bean-to-bar terbaik Bali dengan workshop dan pencicipan.', 'is_featured' => true]);

        // ──────────────────────────────────
        // 13. MARKET LISTINGS
        // ──────────────────────────────────
        MarketListing::create(['gi_product_id' => $gayoCoffee->id, 'seller_name' => 'Gayo Organic Co-op', 'price' => 185000, 'unit' => '250g', 'stock' => 100, 'weight' => 250, 'description' => 'Premium organic Gayo Arabica, whole bean, medium roast. SCA score 84+.', 'description_id' => 'Kopi Arabika Gayo organik premium, biji utuh, roast medium. Skor SCA 84+.']);
        MarketListing::create(['gi_product_id' => $kintamaniCoffee->id, 'seller_name' => 'Subak Abian Collective', 'price' => 165000, 'unit' => '250g', 'stock' => 75, 'weight' => 250, 'description' => 'Kintamani Arabica, single origin, washed process. Citrus and chocolate notes.', 'description_id' => 'Arabika Kintamani, single origin, proses cuci. Catatan jeruk dan cokelat.']);
        MarketListing::create(['gi_product_id' => $torajaCoffee->id, 'seller_name' => 'Toraja Highland Farm', 'price' => 195000, 'unit' => '250g', 'stock' => 50, 'weight' => 250, 'description' => 'Toraja Sapan Arabica, wet-hulled, dark roast. Full body with earthy complexity.', 'description_id' => 'Arabika Toraja Sapan, giling basah, dark roast. Body penuh dengan kompleksitas tanah.']);
        MarketListing::create(['gi_product_id' => $carica->id, 'seller_name' => 'Dieng Carica Women Co-op', 'price' => 45000, 'unit' => 'jar', 'stock' => 200, 'weight' => 350, 'description' => 'Handmade Carica preserved in syrup, 350ml glass jar. Made by women\'s cooperative.', 'description_id' => 'Carica buatan tangan diawetkan dalam sirup, toples kaca 350ml. Dibuat oleh koperasi wanita.']);

        // ──────────────────────────────────
        // 14. MILESTONES
        // ──────────────────────────────────
        Milestone::create(['name' => 'GI Explorer', 'name_id' => 'Penjelajah IG', 'slug' => 'gi-explorer', 'description' => 'You\'ve started your GI journey!', 'description_id' => 'Anda telah memulai perjalanan IG!', 'icon' => '🌱', 'stamps_required' => 5, 'reward_type' => 'badge', 'sort_order' => 1]);
        Milestone::create(['name' => 'GI Traveler', 'name_id' => 'Pelancong IG', 'slug' => 'gi-traveler', 'description' => 'A seasoned GI destination traveler.', 'description_id' => 'Pelancong destinasi IG berpengalaman.', 'icon' => '🎒', 'stamps_required' => 15, 'reward_type' => 'certificate', 'sort_order' => 2]);
        Milestone::create(['name' => 'GI Master', 'name_id' => 'Master IG', 'slug' => 'gi-master', 'description' => 'You\'ve mastered the world of Indonesian GI.', 'description_id' => 'Anda telah menguasai dunia IG Indonesia.', 'icon' => '🏅', 'stamps_required' => 30, 'reward_type' => 'experience', 'sort_order' => 3]);
        Milestone::create(['name' => 'GI Ambassador', 'name_id' => 'Duta IG', 'slug' => 'gi-ambassador', 'description' => 'An ambassador of Indonesian Geographical Indication tourism.', 'description_id' => 'Duta pariwisata Indikasi Geografis Indonesia.', 'icon' => '👑', 'stamps_required' => 50, 'reward_type' => 'gift', 'sort_order' => 4]);

        // ──────────────────────────────────
        // 15. PARTNERS
        // ──────────────────────────────────
        Partner::create(['name' => 'Ministry of Tourism & Creative Economy', 'type' => 'government', 'is_featured' => true, 'sort_order' => 1]);
        Partner::create(['name' => 'DGIP Indonesia', 'type' => 'government', 'is_featured' => true, 'sort_order' => 2]);
        Partner::create(['name' => 'Specialty Coffee Association', 'type' => 'business', 'is_featured' => true, 'sort_order' => 3]);
        Partner::create(['name' => 'UNESCO Indonesia', 'type' => 'ngo', 'is_featured' => true, 'sort_order' => 4]);
        Partner::create(['name' => 'Indonesia Coffee Exporters Association', 'type' => 'business', 'is_featured' => true, 'sort_order' => 5]);

        $this->command->info('✅ Demo data seeded successfully!');
    }
}
