<?php

namespace Database\Seeders;

use App\Models\AccessPoint;
use App\Models\Advantage;
use App\Models\Facility;
use App\Models\Faq;
use App\Models\GalleryItem;
use App\Models\HouseType;
use App\Models\SiteSetting;
use App\Models\Stat;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class LandingContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedStats();
        $this->seedAdvantages();
        $this->seedHouseTypes();
        $this->seedFacilities();
        $this->seedGalleryItems();
        $this->seedAccessPoints();
        $this->seedTestimonials();
        $this->seedFaqs();
        $this->seedSiteSettings();
    }

    private function seedStats(): void
    {
        $rows = [
            ['value' => '250+', 'label' => 'Unit Terbangun'],
            ['value' => '5.2 Ha', 'label' => 'Luas Kawasan'],
            ['value' => '200+', 'label' => 'Keluarga Bahagia'],
            ['value' => '10+', 'label' => 'Tahun Pengalaman'],
        ];

        foreach ($rows as $i => $row) {
            Stat::updateOrCreate(['label' => $row['label']], $row + ['sort_order' => $i]);
        }
    }

    private function seedAdvantages(): void
    {
        $rows = [
            ['icon' => 'location', 'title' => 'Lokasi Strategis', 'desc' => '10 menit ke pusat kota, dekat akses tol, sekolah, dan rumah sakit.'],
            ['icon' => 'shield', 'title' => 'Legalitas Aman', 'desc' => 'SHM per unit, IMB/PBG lengkap, proses KPR dibantu hingga akad.'],
            ['icon' => 'design', 'title' => 'Desain Modern', 'desc' => 'Fasad minimalis kontemporer dengan tata ruang yang efisien.'],
            ['icon' => 'facility', 'title' => 'Fasilitas Lengkap', 'desc' => 'Klaster asri dengan keamanan, taman, dan area rekreasi keluarga.'],
        ];

        foreach ($rows as $i => $row) {
            Advantage::updateOrCreate(['title' => $row['title']], $row + ['sort_order' => $i]);
        }
    }

    private function seedHouseTypes(): void
    {
        $rows = [
            [
                'name' => 'Tipe 36/72',
                'price' => 'Mulai Rp 385 Juta',
                'land' => '72 m²',
                'building' => '36 m²',
                'bedrooms' => 2,
                'bathrooms' => 1,
                'carport' => 1,
                'gradient_classes' => 'from-amber-300 to-amber-500',
                'featured' => false,
            ],
            [
                'name' => 'Tipe 45/90',
                'price' => 'Mulai Rp 525 Juta',
                'land' => '90 m²',
                'building' => '45 m²',
                'bedrooms' => 3,
                'bathrooms' => 2,
                'carport' => 1,
                'gradient_classes' => 'from-amber-400 to-yellow-600',
                'featured' => true,
            ],
            [
                'name' => 'Tipe 60/120',
                'price' => 'Mulai Rp 745 Juta',
                'land' => '120 m²',
                'building' => '60 m²',
                'bedrooms' => 4,
                'bathrooms' => 2,
                'carport' => 2,
                'gradient_classes' => 'from-yellow-500 to-amber-700',
                'featured' => false,
            ],
        ];

        foreach ($rows as $i => $row) {
            HouseType::updateOrCreate(['name' => $row['name']], $row + ['image' => null, 'sort_order' => $i]);
        }
    }

    private function seedFacilities(): void
    {
        $rows = [
            ['icon' => 'shield-check', 'name' => 'Keamanan 24 Jam', 'desc' => 'Cluster tertutup dengan satpam & CCTV berkeliling.'],
            ['icon' => 'sparkles', 'name' => 'Taman & RTH', 'desc' => 'Ruang terbuka hijau untuk bersantai bersama keluarga.'],
            ['icon' => 'mosque', 'name' => 'Masjid', 'desc' => 'Sarana ibadah yang nyaman di dalam kawasan.'],
            ['icon' => 'swim', 'name' => 'Kolam Renang', 'desc' => 'Fasilitas rekreasi keluarga di akhir pekan.'],
            ['icon' => 'run', 'name' => 'Jogging Track', 'desc' => 'Area olahraga untuk gaya hidup sehat setiap hari.'],
            ['icon' => 'kids', 'name' => 'Taman Bermain', 'desc' => 'Playground aman untuk buah hati Anda.'],
            ['icon' => 'road', 'name' => 'Jalan Lebar & Paving', 'desc' => 'Akses jalan lingkungan yang lapang dan rapi.'],
            ['icon' => 'water', 'name' => 'Air Bersih PDAM', 'desc' => 'Suplai air bersih lancar 24 jam ke setiap unit.'],
        ];

        foreach ($rows as $i => $row) {
            Facility::updateOrCreate(['name' => $row['name']], $row + ['sort_order' => $i]);
        }
    }

    private function seedGalleryItems(): void
    {
        $rows = [
            ['label' => 'Gerbang Utama', 'from_class' => 'from-gold-300', 'to_class' => 'to-gold-600', 'span' => 'sm:col-span-2 sm:row-span-2'],
            ['label' => 'Cluster Rumah', 'from_class' => 'from-amber-400', 'to_class' => 'to-gold-700', 'span' => ''],
            ['label' => 'Taman Bermain', 'from_class' => 'from-gold-400', 'to_class' => 'to-amber-600', 'span' => ''],
            ['label' => 'Jogging Track', 'from_class' => 'from-yellow-400', 'to_class' => 'to-gold-600', 'span' => ''],
            ['label' => 'Kolam Renang', 'from_class' => 'from-gold-300', 'to_class' => 'to-amber-700', 'span' => ''],
            ['label' => 'Masjid Kawasan', 'from_class' => 'from-amber-300', 'to_class' => 'to-gold-700', 'span' => 'sm:col-span-2'],
        ];

        foreach ($rows as $i => $row) {
            GalleryItem::updateOrCreate(['label' => $row['label']], $row + ['image' => null, 'sort_order' => $i]);
        }
    }

    private function seedAccessPoints(): void
    {
        $rows = [
            'Akses tol 10 menit',
            'Dekat sekolah & kampus',
            'Dekat rumah sakit & puskesmas',
            'Pasar & pusat perbelanjaan',
            'Jalur transportasi umum',
            'Kawasan berkembang & bebas banjir',
        ];

        foreach ($rows as $i => $text) {
            AccessPoint::updateOrCreate(['text' => $text], ['text' => $text, 'sort_order' => $i]);
        }
    }

    private function seedTestimonials(): void
    {
        $rows = [
            [
                'name' => 'Bapak Dedi Kurniawan',
                'role' => 'Pemilik Rumah Tipe 45/90',
                'quote' => 'Prosesnya cepat dan transparan, dari survei sampai akad kurang dari sebulan. Sekarang keluarga nyaman tinggal di sini.',
            ],
            [
                'name' => 'Ibu Sri Wahyuni',
                'role' => 'Pemilik Rumah Tipe 36/72',
                'quote' => 'Lingkungannya aman dan tenang, cocok untuk anak-anak bermain. Marketing-nya juga responsif menjawab pertanyaan.',
            ],
            [
                'name' => 'Bapak Andra Pratama',
                'role' => 'Investor, Tipe 60/120',
                'quote' => 'Selain untuk ditinggali, harga tanah di sini terus naik. Investasi yang tepat untuk jangka panjang.',
            ],
        ];

        foreach ($rows as $i => $row) {
            Testimonial::updateOrCreate(['name' => $row['name']], $row + ['rating' => 5, 'sort_order' => $i]);
        }
    }

    private function seedFaqs(): void
    {
        $rows = [
            ['q' => 'Apakah bisa KPR dan berapa DP minimal?', 'a' => 'Bisa. Kami bekerja sama dengan beberapa bank rekanan untuk KPR dengan DP mulai 10%, serta tersedia opsi cicilan bertahap langsung ke pengembang.'],
            ['q' => 'Bagaimana status legalitas rumah?', 'a' => 'Setiap unit memiliki SHM (Sertifikat Hak Milik) atas nama pembeli dan IMB/PBG lengkap yang diproses hingga selesai.'],
            ['q' => 'Berapa lama proses serah terima unit?', 'a' => 'Untuk unit ready stock, serah terima dapat dilakukan setelah proses akad kredit/lunas selesai, umumnya 2-4 minggu.'],
            ['q' => 'Apakah bisa survei lokasi langsung?', 'a' => 'Tentu, silakan hubungi tim marketing kami via WhatsApp untuk menjadwalkan kunjungan ke lokasi dan unit contoh (show unit).'],
            ['q' => 'Apakah tersedia unit ready stock?', 'a' => 'Tersedia beberapa unit ready stock dan sebagian indent. Ketersediaan berubah sewaktu-waktu, hubungi kami untuk info stok terbaru.'],
        ];

        foreach ($rows as $i => $row) {
            Faq::updateOrCreate(['q' => $row['q']], $row + ['sort_order' => $i]);
        }
    }

    private function seedSiteSettings(): void
    {
        SiteSetting::updateOrCreate(['id' => 1], [
            'hero_badge' => 'Cluster Baru — Grand Opening',
            'hero_headline_prefix' => 'Wujudkan Rumah Impian di',
            'hero_headline_highlight' => 'Gending Golden Park',
            'hero_subtext' => 'Hunian Asri, Investasi Berharga. Hunian modern dengan lingkungan asri, keamanan 24 jam, dan akses strategis — investasi terbaik untuk masa depan keluarga Anda.',
            'hero_cta_primary_label' => 'Lihat Tipe Rumah',
            'hero_cta_secondary_label' => 'Konsultasi Gratis',
            'hero_floating_title' => 'Keamanan 24 Jam',
            'hero_floating_desc' => 'Cluster tertutup & CCTV',

            'company_name' => 'Gending Golden Park',
            'company_tagline' => 'Hunian Asri, Investasi Berharga',
            'whatsapp' => env('COMPANY_WHATSAPP', '6281234567890'),
            'phone_display' => env('COMPANY_PHONE_DISPLAY', '0812-3456-7890'),
            'email' => env('COMPANY_EMAIL', 'info@gendinggoldenpark.id'),
            'address' => env('COMPANY_ADDRESS', 'Jl. Raya Gending No. 88, Probolinggo, Jawa Timur'),
            'maps_embed_src' => env('COMPANY_MAPS_EMBED', 'https://www.google.com/maps?q=Probolinggo,Jawa+Timur&output=embed'),
            'instagram' => env('COMPANY_INSTAGRAM', 'https://instagram.com/gendinggoldenpark'),
            'facebook' => env('COMPANY_FACEBOOK', 'https://facebook.com/gendinggoldenpark'),
            'tiktok' => env('COMPANY_TIKTOK', 'https://tiktok.com/@gendinggoldenpark'),
        ]);
    }
}
