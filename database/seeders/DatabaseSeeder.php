<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\DataJawaban;
use App\Models\DataPernyataan;
use App\Models\DataSolusiTerbaik;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Santi Aeri Anjani',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('@admin123'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'tes',
            'email' => 'tes@gmail.com',
            'password' => bcrypt('@tes123456'),
            'role' => 'user'
        ]);

        // if ($user) {
        //     Admin::create([
        //         'name' => 'Santi Aeri Anjani',
        //         'kategori' => 'Admin',
        //         'user_id' => $user->id,
        //         // 'ketegori' => 'contoh'
        //     ]);
        // }
        $pernyataan = DataPernyataan::create([
            'pernyataan' => 'Pernyataan 1',
        ]);
        if ($pernyataan) {
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 0,
                'jawaban' => 'Saya tidak merasa sedih.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 1,
                'jawaban' => 'Saya merasa sedih.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 2,
                'jawaban' => 'Saya merasa sedih sepanjang waktu dan tidak dapat mengatasinya.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 3,
                'jawaban' => 'Saya sangat sedih sehingga saya tidak tahan lagi.',
            ]);
        }
        $pernyataan = DataPernyataan::create([
            'pernyataan' => 'Pernyataan 2',
        ]);
        if ($pernyataan) {
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 0,
                'jawaban' => 'Saya tidak terlalu berkecil hati tentang masa depan.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 1,
                'jawaban' => 'Saya merasa berkecil hati tentang masa depan.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 2,
                'jawaban' => 'Saya merasa tidak ada sesuatu yang saya harapkan di masa depan.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 3,
                'jawaban' => 'Saya merasa masa depan adalah harapan dan bahwa segalanya tidak dapat diperbaiki.',
            ]);
        }
        $pernyataan = DataPernyataan::create([
            'pernyataan' => 'Pernyataan 3',
        ]);
        if ($pernyataan) {
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 0,
                'jawaban' => 'Saya tidak merasa gagal. ',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 1,
                'jawaban' => 'Saya merasa telah gagal dibandingkan yang lain.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 2,
                'jawaban' => 'Ketika saya melihat kembali hidup saya, yang bisa saya lihat adalah banyak kegagalan. ',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 3,
                'jawaban' => 'Saya merasa sebagai seorang pribadi yang gagal.',
            ]);
        }
        $pernyataan = DataPernyataan::create([
            'pernyataan' => 'Pernyataan 4',
        ]);
        if ($pernyataan) {
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 0,
                'jawaban' => 'Saya memperoleh kepuasan sama seperti dahulu.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 1,
                'jawaban' => 'Saya tidak menikmati sesuatu seperti sebelumnya.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 2,
                'jawaban' => 'Saya tidak mendapatkan kepuasan dari apapun lagi.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 3,
                'jawaban' => 'Saya tidak puas dengan segala sesuatu.',
            ]);
        }
        $pernyataan = DataPernyataan::create([
            'pernyataan' => 'Pernyataan 5',
        ]);
        if ($pernyataan) {
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 0,
                'jawaban' => 'Saya tidak merasa bersalah .',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 1,
                'jawaban' => 'Saya cukup sering merasa bersalah.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 2,
                'jawaban' => 'Saya sering merasa sangat bersalah. ',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 3,
                'jawaban' => 'Saya merasa bersalah sepanjang waktu.',
            ]);
        }
        $pernyataan = DataPernyataan::create([
            'pernyataan' => 'Pernyataan 6',
        ]);
        if ($pernyataan) {
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 0,
                'jawaban' => 'Saya tidak merasa saya sedang dihukum.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 1,
                'jawaban' => 'Saya merasa mungkin sedang dihukum.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 2,
                'jawaban' => 'Saya berharap dihukum.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 3,
                'jawaban' => 'Saya merasa saya sedang dihukum.',
            ]);
        }
        $pernyataan = DataPernyataan::create([
            'pernyataan' => 'Pernyataan 7',
        ]);
        if ($pernyataan) {
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 0,
                'jawaban' => 'Saya tidak merasa kecewa terhadap diri sendiri.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 1,
                'jawaban' => 'Saya kecewa pada diri sendiri.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 2,
                'jawaban' => 'Saya muak terhadap diri sendiri.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 3,
                'jawaban' => 'Saya membenci diri sendiri.',
            ]);
        }
        $pernyataan = DataPernyataan::create([
            'pernyataan' => 'Pernyataan 8',
        ]);
        if ($pernyataan) {
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 0,
                'jawaban' => 'Saya tidak merasa saya lebih buruk daripada orang lain.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 1,
                'jawaban' => 'Saya mengkritik diri sendiri karena kelemahan/kesalahan saya. ',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 2,
                'jawaban' => 'Saya menyalahkan diri sendiri sepanjang waktu untuk kesalahan saya.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 3,
                'jawaban' => 'Saya menyalahkan diri sendiri untuk segala sesuatu yang buruk yang terjadi.',
            ]);
        }
        $pernyataan = DataPernyataan::create([
            'pernyataan' => 'Pernyataan 9',
        ]);
        if ($pernyataan) {
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 0,
                'jawaban' => 'Saya tidak punya pikiran bunuh diri. 	',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 1,
                'jawaban' => 'Saya memiliki pikiran bunuh diri, tapi saya tidak ingin melakukannya.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 2,
                'jawaban' => 'Saya ingin bunuh diri.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 3,
                'jawaban' => 'Saya akan bunuh diri jika saya punya kesempatan.',
            ]);
        }
        $pernyataan = DataPernyataan::create([
            'pernyataan' => 'Pernyataan 9',
        ]);
        if ($pernyataan) {
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 0,
                'jawaban' => 'Saya tidak punya pikiran bunuh diri. 	',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 1,
                'jawaban' => 'Saya memiliki pikiran bunuh diri, tapi saya tidak ingin melakukannya.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 2,
                'jawaban' => 'Saya ingin bunuh diri.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 3,
                'jawaban' => 'Saya akan bunuh diri jika saya punya kesempatan.',
            ]);
        }
        $pernyataan = DataPernyataan::create([
            'pernyataan' => 'Pernyataan 10',
        ]);
        if ($pernyataan) {
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 0,
                'jawaban' => 'Saya tidak menangis lagi dibanding biasanya.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 1,
                'jawaban' => 'Sekarang saya lebih banyak menangis daripada sebelumnya. ',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 2,
                'jawaban' => 'Saya menangis sepanjang waktu sekarang.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 3,
                'jawaban' => 'Saya mungkin akan menangis, tapi sekarang saya tidak dapat menangis meskipun saya ingin menangis.',
            ]);
        }
        $pernyataan = DataPernyataan::create([
            'pernyataan' => 'Pernyataan 11',
        ]);
        if ($pernyataan) {
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 0,
                'jawaban' => 'Sekarang saya tidak merasa jengkel daripada sebelumnya.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 1,
                'jawaban' => 'Saya lebih mudah kesal daripada biasanya.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 2,
                'jawaban' => 'Saya merasa cukup kesal beberapa kali.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 3,
                'jawaban' => 'Saya merasa kesal sepanjang waktu.',
            ]);
        }
        $pernyataan = DataPernyataan::create([
            'pernyataan' => 'Pernyataan 12',
        ]);
        if ($pernyataan) {
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 0,
                'jawaban' => 'Saya belum kehilangan minat pada orang lain.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 1,
                'jawaban' => 'Saya kurang tertarik pada orang lain dibandingkan dahulu.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 2,
                'jawaban' => 'Saya telah kehilangan sebagian besar minat saya pada orang lain.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 3,
                'jawaban' => 'Saya telah kehilangan semua minat saya pada orang lain.',
            ]);
        }
        $pernyataan = DataPernyataan::create([
            'pernyataan' => 'Pernyataan 13',
        ]);
        if ($pernyataan) {
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 0,
                'jawaban' => 'Saya membuat keputusan sama seperti sebelumnya. ',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 1,
                'jawaban' => 'Saya sering menunda membuat keputusan dari biasanya.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 2,
                'jawaban' => 'Saya memiliki kesulitan yang lebih besar dalam pengambilan keputusan daripada biasanya. ',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 3,
                'jawaban' => 'Saya tidak bisa membuat keputusan sama sekali lagi.',
            ]);
        }
        $pernyataan = DataPernyataan::create([
            'pernyataan' => 'Pernyataan 14',
        ]);
        if ($pernyataan) {
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 0,
                'jawaban' => 'Saya tidak merasa bahwa saya tampak lebih buruk daripada dulu.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 1,
                'jawaban' => 'Saya khawatir bahwa saya tampak tua atau tidak menarik.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 2,
                'jawaban' => 'Saya merasa ada perubahan permanen dalam penampilan saya yang membuat saya terlihat menarik.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 3,
                'jawaban' => 'Saya percaya bahwa saya terlihat jelek.',
            ]);
        }
        $pernyataan = DataPernyataan::create([
            'pernyataan' => 'Pernyataan 15',
        ]);
        if ($pernyataan) {
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 0,
                'jawaban' => 'Saya dapat bekerja seperti sebelumnya.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 1,
                'jawaban' => 'Dibutuhkan usaha ekstra untuk memulai mengerjakan sesuatu.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 2,
                'jawaban' => 'Saya harus memaksa diri sendiri untuk mengerjakan sesuatu.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 3,
                'jawaban' => 'Saya tidak bisa mengerjakan pekerjaan sama sekali.',
            ]);
        }
        $pernyataan = DataPernyataan::create([
            'pernyataan' => 'Pernyataan 16',
        ]);
        if ($pernyataan) {
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 0,
                'jawaban' => 'Saya dapat tidur nyenyak seperti biasanya.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 1,
                'jawaban' => 'Saya tidak tidur nyenyak seperti biasanya.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 2,
                'jawaban' => 'Saya bangun 1-2 jam lebih awal dari biasanya dan sulit untuk kembali tidur.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 3,
                'jawaban' => 'Saya bangun beberapa jam lebih awal dari sebelumnya dan tidak bisa kembali tidur.',
            ]);
        }
        $pernyataan = DataPernyataan::create([
            'pernyataan' => 'Pernyataan 17',
        ]);
        if ($pernyataan) {
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 0,
                'jawaban' => 'Saya tidak mudah lelah dari biasanya.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 1,
                'jawaban' => 'Saya lebih mudah lelah dari biasanya.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 2,
                'jawaban' => 'Saya hampir selalu merasa lelah dalam mengerjakan sesuatu.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 3,
                'jawaban' => 'Saya merasa terlalu lelah untuk mengerjakan apa-apa.',
            ]);
        }
        $pernyataan = DataPernyataan::create([
            'pernyataan' => 'Pernyataan 18',
        ]);
        if ($pernyataan) {
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 0,
                'jawaban' => 'Nafsu makan saya masih seperti biasanya.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 1,
                'jawaban' => 'Nafsu makan saya tidak sebaik dulu.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 2,
                'jawaban' => 'Sekarang nafsu makan saya jauh lebih buruk.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 3,
                'jawaban' => 'Saya tidak punya nafsu makan sama sekali lagi.',
            ]);
        }
        $pernyataan = DataPernyataan::create([
            'pernyataan' => 'Pernyataan 19',
        ]);
        if ($pernyataan) {
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 0,
                'jawaban' => 'Saya tidak kehilangan banyak berat badan.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 1,
                'jawaban' => 'Saya telah kehilangan lebih dari 5 kilogram.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 2,
                'jawaban' => 'Saya telah kehilangan lebih dari 10 kilogram.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 3,
                'jawaban' => 'Saya telah kehilangan lebih dari 15 kilogram.',
            ]);
        }
        $pernyataan = DataPernyataan::create([
            'pernyataan' => 'Pernyataan 20',
        ]);
        if ($pernyataan) {
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 0,
                'jawaban' => 'Saya tidak khawatir tentang kesehatan saya dibanding biasanya.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 1,
                'jawaban' => 'Saya khawatir tentang masalah fisik seperti sakit, nyeri, sakit perut, atau sembelit.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 2,
                'jawaban' => 'Saya sangat khawatir tentang masalah fisik dan sulit untuk memikirkan hal yang lain.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 3,
                'jawaban' => 'Saya sangat khawatir tentang masalah fisik saya bahwa saya tidak dapat memikirkan hal lain.',
            ]);
        }
        $pernyataan = DataPernyataan::create([
            'pernyataan' => 'Pernyataan 21',
        ]);
        if ($pernyataan) {
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 0,
                'jawaban' => 'Saya tidak melihat ada perubahan terbaru dalam minat saya pada seks.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 1,
                'jawaban' => 'Saya kurang tertarik pada seks daripada sebelumnya.',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 2,
                'jawaban' => 'Saya hampir tidak memiliki minat pada seks. ',
            ]);
            DataJawaban::create([
                'pernyataan_id' => $pernyataan->id,
                'point' => 3,
                'jawaban' => 'Saya telah kehilangan minat pada seks sepenuhnya.',
            ]);
        }
        DataSolusiTerbaik::create([
            'kategori_depresi' => 'minimal/normal',
            'solusi_terbaik' => 'Menerapkan pola makan sehat, olahraga secara rutin, melakukan hobi, tidur yang cukup dan berkualitas, detoks media sosial, mengekspresikan perasaan, latihan berpikir positif.',
            'awal' => 0,
            'akhir' => 13,
        ]);
        DataSolusiTerbaik::create([
            'kategori_depresi' => 'depresi ringan',
            'solusi_terbaik' => 'Lakukan olahraga intensitas sedang selama 30 menit hampir setiap hari dalam seminggu, hindari alkohol dan obat-obatan terlarang, pastikan Anda mengonsumsi obat dengan benar, makanlah makanan yang bervariasi dan bergizi, temukan hal-hal yang Anda sukai untuk dilakukan, tidurlah yang cukup dan pastikan Anda memiliki lingkungan tidur yang tenang, carilah teman yang positif dan suportif yang menunjukkan kepedulian terhadap Anda.',
            'awal' => 14,
            'akhir' => 19,
        ]);
        DataSolusiTerbaik::create([
            'kategori_depresi' => 'depresi sedang',
            'solusi_terbaik' => 'Lakukan olahraga secara teratur,kelola tingkat stres,makan makanan yang sehat, cari dukungan sosial, dan terlibat dalam aktivitas yang anda nikmati.',
            'awal' => 20,
            'akhir' => 28,
        ]);
        DataSolusiTerbaik::create([
            'kategori_depresi' => 'depresi berat',
            'solusi_terbaik' => 'Bagikan perasaan Anda dengan teman dekat dan anggota keluarga, pahami bahwa pemulihan mungkin terjadi secara bertahap, tunda keputusan penting sampai Anda merasa lebih baik, tetap aktif dan berolahraga secara teratur, tertahankan rutinitas yang konsisten, tidur yang cukup. makan makanan yang seimbang dan bergizi, hindari alkohol, nikotin, obat-obatan , dan obat-obatan yang tidak diresepkan kepada Anda.',
            'awal' => 29,
            'akhir' => 63,
        ]);
    }
}
