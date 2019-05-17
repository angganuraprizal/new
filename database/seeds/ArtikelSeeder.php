<?php

use App\User;
use App\Role;
use App\Kategori;
use App\Artikel;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Kategori
        $kategori1 = Kategori::create([
            'nama' => 'Kegiatan',
            'slug' => 'kegiatan'
        ]);

        $kategori2 = Kategori::create([
            'nama' => 'Kunjungan',
            'slug' => 'kunjungan'
        ]);

        $kategori3 = Kategori::create([
            'nama' => 'Uji Sertifikasi',
            'slug' => 'uji-sertifikasi'
        ]);
        
        // Membuat role admin
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();

        // Membuat sample admin
        $admin = new User();
        $admin->provider_id = '';
        $admin->provider = '';
        $admin->name = 'Admin News';
        $admin->email = 'admin@news.com';
        $admin->password = bcrypt('newsnews');
        $admin->save();
        $admin->attachRole($adminRole);

        // Membuat role admin
        $memberRole = new Role();
        $memberRole->name = "member";
        $memberRole->display_name = "Member";
        $memberRole->save();

        // Membuat sample member
        $member = new User();
        $member->provider_id = '';
        $member->provider = '';
        $member->name = 'Member News';
        $member->email = 'member@news.com';
        $member->password = bcrypt('newsnews');
        $member->save();
        $member->attachRole($memberRole);

        // Artikel
        $artikel1 = Artikel::create([
            'judul' => 'SISWA BINAAN AXIOO DI SMK NEGERI 2 KALIANDA LAMPUNG MELAKSANAKAN UJI SERTIFIKASI MTCNA (MIKROTIK)',
            'slug' => 'siswa-binaan-axioo-di-smk-negeri-2-kalianda-lampung-melaksanakan-uji-sertifikasi-mtcna-mikrotik',
            'foto' => 'https://axiooclassprogram.org/wp-content/uploads/2019/04/50843299_2537421729605514_8112799704355438592_n.jpg',
            'isi' => '<p>Pelaksanaan uji Sertifikasi MTCNA (MIKROTIK) kepada siswa binaan AXIOO di SMK Negeri 2 Kalianda Lampung pada pekan uji sertifkasi Axioo Class Program.</p>
            <p><strong>Tentang Axioo Class Program</strong></p>
            <p><em>Axioo Class Program adalah sebuah program pendidikan dalam membantu siswa SMK menjadi siap kerja dan sesuai dengam kebutuhan industri lewat program sinkronisasi kurikulum, workshop berkelanjutan bagi guru, pembelajaran berbasis IT serta validasi sertifikasi bertaraf internasional. Axioo Class Program adalah salah satu bentuk kepedulian Axioo terhadap minimnya tenaga kerja siap pakai. Sekaligus membantu dunia pendidikan yang kesulitan menyalurkan lulusannya. Program ini memberikan pelatihan terpadu kepada siswa dan guru.</em></p>
            <p><em>Pelatihan bekerjasama dengam industri IT lain seperti Intel, Seagate, Mikrotik, ls Cable &amp; System Korea, Telview Technology, Microsoft, dan beberapa perusahaan lainnya. Saat ini lebih dari 300 SMK dari berbagai wilayah tanah air telah bergabung dalam Axioo Class Program. Di setiap SMK binaan, Axioo memiliki satu kelas binaan yang terdiri dari 36 siswa yang telah lolos seleksi.</em></p>
            <p><em>Dalam menggelar program Corporate Social Responsibility (CSR)-nya ini Axioo memberikan sekitar 9 sertifikasi pada para lulusan. Semua sertifikasi ini bisa diperoleh jika siswa berhasil menyelesaikan sampai 12 kelas. Pihak Axioo sendiri memulai Axioo Class Program ini sejak 2011, namun program yang ditunjang sertifikasi sendiri dimulai sejak angkatan 2013.</em></p>
            <p>Sebagai visi Axioo Class Program membantu dunia pendidikan di Indonesia menghasilkan lulusan yang siap kerja sehingga bisa bermanfaat baik bagi negara dan dunia industri.</p>
            <p><strong>Tentang Axioo Internasional</strong></p>
            <p><em>Axioo adalah&nbsp;</em><em>sebuah&nbsp;</em><em>merk&nbsp;</em><em>Brand&nbsp;</em><em>kelas dunia dari produsen perangkat ICT</em><em>&nbsp;(Information Communication and Technology)</em>&nbsp;<em>yang memiliki keunggulan dalam perancangan desain hingga Fasilitas Produksi yang terintegrasi di Indonesia.&nbsp;</em><em>seiring berjalannya waktu Axioo&nbsp; terus mengembangkan dan mendominasi pasar industry lokal berkualitas internasional yang selalu konsisten mengeluarkan produk-produk berkualitas dengan teknologi terkini. Diantaranya&nbsp;</em><em>Notebook, Smartphone, Tablet serta Desktop PC dan Peripherals.</em>&nbsp;<em>Axioo memasuki pasar untuk teknologi komputasi portabel di Indonesia pada tahun 2004,&nbsp;</em><em>dan&nbsp;</em><em>menawarkan&nbsp;</em><em>kinerja yang unik</em><em>, estetika, dan aksesibilitas.&nbsp;</em><em>Prinsip Axioo yaitu&nbsp;</em><em>Ekonomis namun inovatif, sederhana namun bergaya, beragam,&nbsp;</em><em>dan kualitas yang terbaik hingga sampai saat ini Axioo berada di posisi 3 Indonesia. Keutamaan Axioo adalah Integrity, passion, Excllence.</em></p>
            <!-- <blockquote class="blockquote">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            </blockquote>
            <p>
                Nulla porttitor accumsan tincidunt. Cras ultricies ligula sed magna dictum porta. Mauris blandit
                aliquet elit, eget tincidunt
                nibh pulvinar a. Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Donec sollicitudin molestie malesuada.
            </p> -->',
            'kategori_id' => $kategori3->id,
            'user_id' => $admin->id
        ]);

        $artikel2 = Artikel::create([
            'judul' => 'UJI SERTIFIKASI INTERNASIONAL ADOBE PHOTOSHOP DI SMK NEGERI 3 BOJONEGORO',
            'slug' => 'uji-sertifikasi-internasional-adobe-photoshop-di-smk-negeri-3-bojonegoro',
            'foto' => 'https://axiooclassprogram.org/wp-content/uploads/2019/04/52753330_2584566991557654_2427492477494624256_n.jpg',
            'isi' => '<p>Pelaksanaan uji Sertifikasi Internasional Adobe Photoshop kepada siswa binaan AXIOO di SMK Negeri 3 Bojonegoro pada pekan uji sertifkasi Axioo Class Program.</p>
            <p><strong>Tentang Axioo Class Program</strong></p>
            <p><em>Axioo Class Program adalah sebuah program pendidikan dalam membantu siswa SMK menjadi siap kerja dan sesuai dengam kebutuhan industri lewat program sinkronisasi kurikulum, workshop berkelanjutan bagi guru, pembelajaran berbasis IT serta validasi sertifikasi bertaraf internasional. Axioo Class Program adalah salah satu bentuk kepedulian Axioo terhadap minimnya tenaga kerja siap pakai. Sekaligus membantu dunia pendidikan yang kesulitan menyalurkan lulusannya. Program ini memberikan pelatihan terpadu kepada siswa dan guru.</em></p>
            <p><em>Pelatihan bekerjasama dengam industri IT lain seperti Intel, Seagate, Mikrotik, ls Cable &amp; System Korea, Telview Technology, Microsoft, dan beberapa perusahaan lainnya. Saat ini lebih dari 300 SMK dari berbagai wilayah tanah air telah bergabung dalam Axioo Class Program. Di setiap SMK binaan, Axioo memiliki satu kelas binaan yang terdiri dari 36 siswa yang telah lolos seleksi.</em></p>
            <p><em>Dalam menggelar program Corporate Social Responsibility (CSR)-nya ini Axioo memberikan sekitar 9 sertifikasi pada para lulusan. Semua sertifikasi ini bisa diperoleh jika siswa berhasil menyelesaikan sampai 12 kelas. Pihak Axioo sendiri memulai Axioo Class Program ini sejak 2011, namun program yang ditunjang sertifikasi sendiri dimulai sejak angkatan 2013.</em></p>
            <p>Sebagai visi Axioo Class Program membantu dunia pendidikan di Indonesia menghasilkan lulusan yang siap kerja sehingga bisa bermanfaat baik bagi negara dan dunia industri.</p>
            <p><strong>Tentang Axioo Internasional</strong></p>
            <p><em>Axioo adalah&nbsp;</em><em>sebuah&nbsp;</em><em>merk&nbsp;</em><em>Brand&nbsp;</em><em>kelas dunia dari produsen perangkat ICT</em><em>&nbsp;(Information Communication and Technology)</em>&nbsp;<em>yang memiliki keunggulan dalam perancangan desain hingga Fasilitas Produksi yang terintegrasi di Indonesia.&nbsp;</em><em>seiring berjalannya waktu Axioo&nbsp; terus mengembangkan dan mendominasi pasar industry lokal berkualitas internasional yang selalu konsisten mengeluarkan produk-produk berkualitas dengan teknologi terkini. Diantaranya&nbsp;</em><em>Notebook, Smartphone, Tablet serta Desktop PC dan Peripherals.</em>&nbsp;<em>Axioo memasuki pasar untuk teknologi komputasi portabel di Indonesia pada tahun 2004,&nbsp;</em><em>dan&nbsp;</em><em>menawarkan&nbsp;</em><em>kinerja yang unik</em><em>, estetika, dan aksesibilitas.&nbsp;</em><em>Prinsip Axioo yaitu&nbsp;</em><em>Ekonomis namun inovatif, sederhana namun bergaya, beragam,&nbsp;</em><em>dan kualitas yang terbaik hingga sampai saat ini Axioo berada di posisi 3 Indonesia. Keutamaan Axioo adalah Integrity, passion, Excllence.</em></p>',
            'kategori_id' => $kategori3->id,
            'user_id' => $admin->id
        ]);

        $artikel3 = Artikel::create([
            'judul' => 'SMK MAITREYAWIRA BATAM SUKSES MELAKSANAKAN UJI SERTIFIKASI INTERNASIONAL ADOBE PHOTOSHOP',
            'slug' => 'smk-maitreyawira-batam-sukses-melaksanakan-uji-sertifikasi-internasional-adobe-photoshop',
            'foto' => 'https://axiooclassprogram.org/wp-content/uploads/2019/04/52868924_2584871601527193_1507644352527073280_n.jpg',
            'isi' => '<p>Pelaksanaan uji Sertifikasi Internasional Adobe Photoshop kepada siswa binaan AXIOO di SMK Maitreyawira Batam pada uji sertifkasi Axioo Class Program.</p>
            <p><strong>Tentang Axioo Class Program</strong></p>
            <p><em>Axioo Class Program adalah sebuah program pendidikan dalam membantu siswa SMK menjadi siap kerja dan sesuai dengam kebutuhan industri lewat program sinkronisasi kurikulum, workshop berkelanjutan bagi guru, pembelajaran berbasis IT serta validasi sertifikasi bertaraf internasional. Axioo Class Program adalah salah satu bentuk kepedulian Axioo terhadap minimnya tenaga kerja siap pakai. Sekaligus membantu dunia pendidikan yang kesulitan menyalurkan lulusannya. Program ini memberikan pelatihan terpadu kepada siswa dan guru.</em></p>
            <p><em>Pelatihan bekerjasama dengam industri IT lain seperti Intel, Seagate, Mikrotik, ls Cable &amp; System Korea, Telview Technology, Microsoft, dan beberapa perusahaan lainnya. Saat ini lebih dari 300 SMK dari berbagai wilayah tanah air telah bergabung dalam Axioo Class Program. Di setiap SMK binaan, Axioo memiliki satu kelas binaan yang terdiri dari 36 siswa yang telah lolos seleksi.</em></p>
            <p><em>Dalam menggelar program Corporate Social Responsibility (CSR)-nya ini Axioo memberikan sekitar 9 sertifikasi pada para lulusan. Semua sertifikasi ini bisa diperoleh jika siswa berhasil menyelesaikan sampai 12 kelas. Pihak Axioo sendiri memulai Axioo Class Program ini sejak 2011, namun program yang ditunjang sertifikasi sendiri dimulai sejak angkatan 2013.</em></p>
            <p>Sebagai visi Axioo Class Program membantu dunia pendidikan di Indonesia menghasilkan lulusan yang siap kerja sehingga bisa bermanfaat baik bagi negara dan dunia industri.</p>
            <p><strong>Tentang Axioo Internasional</strong></p>
            <p><em>Axioo adalah&nbsp;</em><em>sebuah&nbsp;</em><em>merk&nbsp;</em><em>Brand&nbsp;</em><em>kelas dunia dari produsen perangkat ICT</em><em>&nbsp;(Information Communication and Technology)</em>&nbsp;<em>yang memiliki keunggulan dalam perancangan desain hingga Fasilitas Produksi yang terintegrasi di Indonesia.&nbsp;</em><em>seiring berjalannya waktu Axioo&nbsp; terus mengembangkan dan mendominasi pasar industry lokal berkualitas internasional yang selalu konsisten mengeluarkan produk-produk berkualitas dengan teknologi terkini. Diantaranya&nbsp;</em><em>Notebook, Smartphone, Tablet serta Desktop PC dan Peripherals.</em>&nbsp;<em>Axioo memasuki pasar untuk teknologi komputasi portabel di Indonesia pada tahun 2004,&nbsp;</em><em>dan&nbsp;</em><em>menawarkan&nbsp;</em><em>kinerja yang unik</em><em>, estetika, dan aksesibilitas.&nbsp;</em><em>Prinsip Axioo yaitu&nbsp;</em><em>Ekonomis namun inovatif, sederhana namun bergaya, beragam,&nbsp;</em><em>dan kualitas yang terbaik hingga sampai saat ini Axioo berada di posisi 3 Indonesia. Keutamaan Axioo adalah Integrity, passion, Excllence.</em></p>',
            'kategori_id' => $kategori3->id,
            'user_id' => $admin->id
        ]);

        $artikel4 = Artikel::create([
            'judul' => 'SISWA SMK NEGERI 1 RANDUDONGKAL MELAKSAKAN UJI SERTIFIKASI INTERNASIONAL MICROSOFT NETWORK',
            'slug' => 'siswa-smk-negeri-1-randudongkal-melaksakan-uji-sertifikasi-internasional-microsoft-network',
            'foto' => 'https://axiooclassprogram.org/wp-content/uploads/2019/04/53349962_2596702940344059_7655307402962534400_n.jpg',
            'isi' => '<p>Pelaksanaan uji Sertifikasi Internasional Microsoft Network kepada siswa binaan AXIOO di SMK Negeri 1 Randudongkal pada uji sertifkasi Axioo Class Program.</p>
            <p><strong>Tentang Axioo Class Program</strong></p>
            <p><em>Axioo Class Program adalah sebuah program pendidikan dalam membantu siswa SMK menjadi siap kerja dan sesuai dengam kebutuhan industri lewat program sinkronisasi kurikulum, workshop berkelanjutan bagi guru, pembelajaran berbasis IT serta validasi sertifikasi bertaraf internasional. Axioo Class Program adalah salah satu bentuk kepedulian Axioo terhadap minimnya tenaga kerja siap pakai. Sekaligus membantu dunia pendidikan yang kesulitan menyalurkan lulusannya. Program ini memberikan pelatihan terpadu kepada siswa dan guru.</em></p>
            <p><em>Pelatihan bekerjasama dengam industri IT lain seperti Intel, Seagate, Mikrotik, ls Cable &amp; System Korea, Telview Technology, Microsoft, dan beberapa perusahaan lainnya. Saat ini lebih dari 300 SMK dari berbagai wilayah tanah air telah bergabung dalam Axioo Class Program. Di setiap SMK binaan, Axioo memiliki satu kelas binaan yang terdiri dari 36 siswa yang telah lolos seleksi.</em></p>
            <p><em>Dalam menggelar program Corporate Social Responsibility (CSR)-nya ini Axioo memberikan sekitar 9 sertifikasi pada para lulusan. Semua sertifikasi ini bisa diperoleh jika siswa berhasil menyelesaikan sampai 12 kelas. Pihak Axioo sendiri memulai Axioo Class Program ini sejak 2011, namun program yang ditunjang sertifikasi sendiri dimulai sejak angkatan 2013.</em></p>
            <p>Sebagai visi Axioo Class Program membantu dunia pendidikan di Indonesia menghasilkan lulusan yang siap kerja sehingga bisa bermanfaat baik bagi negara dan dunia industri.</p>
            <p><strong>Tentang Axioo Internasional</strong></p>
            <p><em>Axioo adalah&nbsp;</em><em>sebuah&nbsp;</em><em>merk&nbsp;</em><em>Brand&nbsp;</em><em>kelas dunia dari produsen perangkat ICT</em><em>&nbsp;(Information Communication and Technology)</em>&nbsp;<em>yang memiliki keunggulan dalam perancangan desain hingga Fasilitas Produksi yang terintegrasi di Indonesia.&nbsp;</em><em>seiring berjalannya waktu Axioo&nbsp; terus mengembangkan dan mendominasi pasar industry lokal berkualitas internasional yang selalu konsisten mengeluarkan produk-produk berkualitas dengan teknologi terkini. Diantaranya&nbsp;</em><em>Notebook, Smartphone, Tablet serta Desktop PC dan Peripherals.</em>&nbsp;<em>Axioo memasuki pasar untuk teknologi komputasi portabel di Indonesia pada tahun 2004,&nbsp;</em><em>dan&nbsp;</em><em>menawarkan&nbsp;</em><em>kinerja yang unik</em><em>, estetika, dan aksesibilitas.&nbsp;</em><em>Prinsip Axioo yaitu&nbsp;</em><em>Ekonomis namun inovatif, sederhana namun bergaya, beragam,&nbsp;</em><em>dan kualitas yang terbaik hingga sampai saat ini Axioo berada di posisi 3 Indonesia. Keutamaan Axioo adalah Integrity, passion, Excllence.</em></p>
            <!-- <blockquote class="blockquote">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            </blockquote>
            <p>
                Nulla porttitor accumsan tincidunt. Cras ultricies ligula sed magna dictum porta. Mauris blandit
                aliquet elit, eget tincidunt
                nibh pulvinar a. Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Donec sollicitudin molestie malesuada.
            </p> -->',
            'kategori_id' => $kategori3->id,
            'user_id' => $admin->id
        ]);

        $artikel5 = Artikel::create([
            'judul' => 'UJI SERTIFIKASI INTERNASIONAL MICROSOFT NETWORK SUKSES DILAKSANAKAN OLEH SISWA DI SMK YADIKA CIREBON',
            'slug' => 'uji-sertifikasi-internasional-microsoft-network-sukses-dilaksanakan-oleh-siswa-di-smk-yadika-cirebon',
            'foto' => 'https://axiooclassprogram.org/wp-content/uploads/2019/04/53544672_2600369346644085_2297510300213051392_n-500x280.jpg',
            'isi' => '<p>Pelaksanaan uji Sertifikasi Internasional Microsoft Network kepada siswa binaan AXIOO di SMK Yadika Cirebon pada uji sertifkasi Axioo Class Program.</p>
            <p><strong>Tentang Axioo Class Program</strong></p>
            <p><em>Axioo Class Program adalah sebuah program pendidikan dalam membantu siswa SMK menjadi siap kerja dan sesuai dengam kebutuhan industri lewat program sinkronisasi kurikulum, workshop berkelanjutan bagi guru, pembelajaran berbasis IT serta validasi sertifikasi bertaraf internasional. Axioo Class Program adalah salah satu bentuk kepedulian Axioo terhadap minimnya tenaga kerja siap pakai. Sekaligus membantu dunia pendidikan yang kesulitan menyalurkan lulusannya. Program ini memberikan pelatihan terpadu kepada siswa dan guru.</em></p>
            <p><em>Pelatihan bekerjasama dengam industri IT lain seperti Intel, Seagate, Mikrotik, ls Cable &amp; System Korea, Telview Technology, Microsoft, dan beberapa perusahaan lainnya. Saat ini lebih dari 300 SMK dari berbagai wilayah tanah air telah bergabung dalam Axioo Class Program. Di setiap SMK binaan, Axioo memiliki satu kelas binaan yang terdiri dari 36 siswa yang telah lolos seleksi.</em></p>
            <p><em>Dalam menggelar program Corporate Social Responsibility (CSR)-nya ini Axioo memberikan sekitar 9 sertifikasi pada para lulusan. Semua sertifikasi ini bisa diperoleh jika siswa berhasil menyelesaikan sampai 12 kelas. Pihak Axioo sendiri memulai Axioo Class Program ini sejak 2011, namun program yang ditunjang sertifikasi sendiri dimulai sejak angkatan 2013.</em></p>
            <p>Sebagai visi Axioo Class Program membantu dunia pendidikan di Indonesia menghasilkan lulusan yang siap kerja sehingga bisa bermanfaat baik bagi negara dan dunia industri.</p>
            <p><strong>Tentang Axioo Internasional</strong></p>
            <p><em>Axioo adalah&nbsp;</em><em>sebuah&nbsp;</em><em>merk&nbsp;</em><em>Brand&nbsp;</em><em>kelas dunia dari produsen perangkat ICT</em><em>&nbsp;(Information Communication and Technology)</em>&nbsp;<em>yang memiliki keunggulan dalam perancangan desain hingga Fasilitas Produksi yang terintegrasi di Indonesia.&nbsp;</em><em>seiring berjalannya waktu Axioo&nbsp; terus mengembangkan dan mendominasi pasar industry lokal berkualitas internasional yang selalu konsisten mengeluarkan produk-produk berkualitas dengan teknologi terkini. Diantaranya&nbsp;</em><em>Notebook, Smartphone, Tablet serta Desktop PC dan Peripherals.</em>&nbsp;<em>Axioo memasuki pasar untuk teknologi komputasi portabel di Indonesia pada tahun 2004,&nbsp;</em><em>dan&nbsp;</em><em>menawarkan&nbsp;</em><em>kinerja yang unik</em><em>, estetika, dan aksesibilitas.&nbsp;</em><em>Prinsip Axioo yaitu&nbsp;</em><em>Ekonomis namun inovatif, sederhana namun bergaya, beragam,&nbsp;</em><em>dan kualitas yang terbaik hingga sampai saat ini Axioo berada di posisi 3 Indonesia. Keutamaan Axioo adalah Integrity, passion, Excllence.</em></p>
            <!-- <blockquote class="blockquote">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            </blockquote>
            <p>
                Nulla porttitor accumsan tincidunt. Cras ultricies ligula sed magna dictum porta. Mauris blandit
                aliquet elit, eget tincidunt
                nibh pulvinar a. Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Donec sollicitudin molestie malesuada.
            </p> -->',
            'kategori_id' => $kategori3->id,
            'user_id' => $admin->id
        ]);

        $artikel6 = Artikel::create([
            'judul' => 'MELIHAT PROSES PERAKITAN LAPTOP OLEH SISWA KELAS X SMK DOA BANGSA PALABUHANRATU',
            'slug' => 'melihat-proses-perakitan-laptop-oleh-siswa-kelas-x-smk-doa-bangsa-palabuhanratu',
            'foto' => 'https://axiooclassprogram.org/wp-content/uploads/2019/04/190327111959-206-500x280.jpg',
            'isi' => '<p><strong>SUKABUMIUPDATE.com</strong>&nbsp;–&nbsp;SMK Doa Bangsa&nbsp;kembali membuat inovasi baru dalam proses kegiatan belajar mengajar dengan membuka kelas industri pada jurusan Rekayasa Perangkat lunak (RPL) yang sudah memasuki tahun kedua. Sebanyak&nbsp;34 siswa yang tergabung dalam kelas industri Axioo melaksanakan Perakitan laptop Assembly &amp; Disassembly MyBook 14 secara mandiri.</p>
            <p>Tidak heran bila pelajar kelas X kompetensi keahlian RPL terampil dan kompeten dalam merakit sebuah MyBook. Sejak 2017 Sekolah yang terletak di ibu kota Kabupaten Sukabumi ini telah menjalin kerja sama (MoU) dengan Vendor Axioo untuk mendirikan kelas industri Kompetensi Keahlian Rekayasa Perangkat Lunak (RPL) dan saat ini hanya pertama juga satu satunya sekolah di Kabupaten Sukabumi atau Jawa Barat bagian selatan yang dipercaya bekerja sama dengan Axioo.</p>
            <p>Kelas yang diberi nama Axioo Class Program tersebut mulai aktif pada Juli 2017 yang lalu.</p>
            <p>Berawal dari harapan pendiri sekaligus Pembina Yayasan Pembina Pendidikan Doa Bangsa (YPPDB), Ayep Zaki untuk membangun lembaga pendidikan yang memenuhi visi dan misi serta tujuan pendidikan nasional, maka sejak 2011 beliau mendirikan lembaga pendidikan formal yang bernama SMK Doa Bangsa di Palabuhanratu.</p>
            <p>Adapun dalam proses perakitan laptop tersebut, seluruh spare part, perlengkapan standar dan tools disediakan oleh Axioo untuk siswa yang telah mengikuti program Student Starter Pack (SSP) dan didampingi oleh master dan trainer yang berasal dari unsur Industri dan Sekolah yang tersertifikat.</p>
            <p>Metode yang digunakan untuk perakitan ini dengan tutor sebaya jadi siswa yang merakit laptop akan dipandu oleh tutor yang tidak lain adalah temanya sendiri, tentunya tutor tersebut sudah dibimbing dan dipantau oleh Trainer ACP (Guru yang sudah mendapatkan Lisensi dari Axioo).</p>
            <p>Pembelajaran model seperti inilah yang sangat membantu siswa lebih cepat memahami materi.</p>
            <p>Selain hal tersebut siswa harus mematuhi seluruh rangkaian Standard Operating Prosedure (SOP) perakitan yang telah ditetapkan perusahaan. Hal ini sangat penting karena untuk menjaga kualitas perangkat yang telah dirakit, mulai dari persiapan yang meliputi keamanan diri sampai dengan proses troubleshoting peralatan yang dirakit.</p>
            <p>Setelah berhasil merakit, laptop tersebut menjadi hak milik siswa dan dapat digunakan pembelajaran sehari-hari. Siswa juga dibolehkan membongkar kembali laptopnya bila dirasa perlu untuk memahami kembali, tentunya harus mengacu Standard Operating Prosedur (SOP).</p>
            <p>Selain mendapatkan laptop, siswa yang mendapat SSP, juga mendapatkan hak/kesempatan untuk mengikuti uji sertifikasi bertaraf Internasional dari Microsoft, Mikrotik, Adobe, Ls Cable, Dicoding, Seagate, dan lain-lain gratis tanpa ada biaya. Sebab apabila melakukan ujian mandiri biayanya Cukup Mahal.</p>
            <p>Menurut Trainer ACP SMK Doa Bangsa Irwan Kurniawan, dengan adanya pengakuan sertifikasi internasional akan menjadi modal untuk menaikan nilai jual kompetensi yang dimiliki siswa ke dunia industri. Ini akan berdampak baik pada penyerapan tenaga kerja yang relevan di bidangnya.</p>
            <p>“Namun juga tidak mudah untuk mendapatkan Sertifikasi ini. Harus melalui rangkaian ujian online yang soalnya langsung dari vendor (Microsoft, Mikrotik, Adobe, dan lain-lain), sehingga sangat menekankan sekali kepada para siswa binaan akan persiapan serta proses yang semaksimal mungkin agar tujuan tersebut dapat tercapai,” tutur Irwan, kepada Sukabumiupdate.com.</p>
            <p>Kepala&nbsp;SMK Doa Bangsa&nbsp;Nanda Perdana, berharap dengan membekali siswa materi industri yang relevan dengan kompetensi keahlianya kedepannya akan dikembangkan menjadi teaching factory sebagaimana sejalan dengan program Direktorat Pendidikan SMK.</p>
            <p>“Mewujudkan Axioo Class Program hingga berjalan seperti sekarang tidaklah sederhana, maka program ini benar-benar sebuah bentuk kontribusi nyata SMK Doa Bangsa bagi masyarakat Sukabumi dan sekitarnya terutama generasi milenial yang benar-benar siap terjun di Industri terutama dalam menghadapi peluang dan tantangan di Era Revolusi Industri 4.0 sekarang ini,” ujar Nanda</p>
            <p>Dalam proses pendirian dan pengoperasionalan kelas ini seluruhnya mengacu pada standarisasi Industri yang telah ditetapkan Axioo. Baik dari sisi ruang kelas (Smart Class Room), perangkat kelas termasuk juga dengan trainer / guru pengampu materi Axioo.</p>
            <p>Sumber :&nbsp;<a href="https://sukabumiupdate.com/detail/edukasi/news-edukasi/53343-Melihat-Proses-Perakitan-Laptop-oleh-Siswa-Kelas-X-SMK-Doa-Bangsa-Palabuhanratu">https://sukabumiupdate.com/detail/edukasi/news-edukasi/53343-Melihat-Proses-Perakitan-Laptop-oleh-Siswa-Kelas-X-SMK-Doa-Bangsa-Palabuhanratu</a></p>
            <p><strong>Tentang Axioo Class Program</strong></p>
            <p><em>Axioo Class Program adalah sebuah program pendidikan dalam membantu siswa SMK menjadi siap kerja dan sesuai dengam kebutuhan industri lewat program sinkronisasi kurikulum, workshop berkelanjutan bagi guru, pembelajaran berbasis IT serta validasi sertifikasi bertaraf internasional. Axioo Class Program adalah salah satu bentuk kepedulian Axioo terhadap minimnya tenaga kerja siap pakai. Sekaligus membantu dunia pendidikan yang kesulitan menyalurkan lulusannya. Program ini memberikan pelatihan terpadu kepada siswa dan guru.</em></p>
            <p><em>Pelatihan bekerjasama dengam industri IT lain seperti Intel, Seagate, Mikrotik, ls Cable &amp; System Korea, Telview Technology, Microsoft, dan beberapa perusahaan lainnya. Saat ini lebih dari 300 SMK dari berbagai wilayah tanah air telah bergabung dalam Axioo Class Program. Di setiap SMK binaan, Axioo memiliki satu kelas binaan yang terdiri dari 36 siswa yang telah lolos seleksi.</em></p>
            <p><em>Dalam menggelar program Corporate Social Responsibility (CSR)-nya ini Axioo memberikan sekitar 9 sertifikasi pada para lulusan. Semua sertifikasi ini bisa diperoleh jika siswa berhasil menyelesaikan sampai 12 kelas. Pihak Axioo sendiri memulai Axioo Class Program ini sejak 2011, namun program yang ditunjang sertifikasi sendiri dimulai sejak angkatan 2013.</em></p>
            <p>Sebagai visi Axioo Class Program membantu dunia pendidikan di Indonesia menghasilkan lulusan yang siap kerja sehingga bisa bermanfaat baik bagi negara dan dunia industri.</p>
            <p><strong>Tentang Axioo Internasional</strong></p>
            <p><em>Axioo adalah&nbsp;</em><em>sebuah&nbsp;</em><em>merk&nbsp;</em><em>Brand&nbsp;</em><em>kelas dunia dari produsen perangkat ICT</em><em>&nbsp;(Information Communication and Technology)</em>&nbsp;<em>yang memiliki keunggulan dalam perancangan desain hingga Fasilitas Produksi yang terintegrasi di Indonesia.&nbsp;</em><em>seiring berjalannya waktu Axioo&nbsp; terus mengembangkan dan mendominasi pasar industry lokal berkualitas internasional yang selalu konsisten mengeluarkan produk-produk berkualitas dengan teknologi terkini. Diantaranya&nbsp;</em><em>Notebook, Smartphone, Tablet serta Desktop PC dan Peripherals.</em>&nbsp;<em>Axioo memasuki pasar untuk teknologi komputasi portabel di Indonesia pada tahun 2004,&nbsp;</em><em>dan&nbsp;</em><em>menawarkan&nbsp;</em><em>kinerja yang unik</em><em>, estetika, dan aksesibilitas.&nbsp;</em><em>Prinsip Axioo yaitu&nbsp;</em><em>Ekonomis namun inovatif, sederhana namun bergaya, beragam,&nbsp;</em><em>dan kualitas yang terbaik hingga sampai saat ini Axioo berada di posisi 3 Indonesia. Keutamaan Axioo adalah Integrity, passion, Excllence.</em></p>
            <!-- <blockquote class="blockquote">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            </blockquote>
            <p>
                Nulla porttitor accumsan tincidunt. Cras ultricies ligula sed magna dictum porta. Mauris blandit
                aliquet elit, eget tincidunt
                nibh pulvinar a. Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Donec sollicitudin molestie malesuada.
            </p> -->',
            'kategori_id' => $kategori1->id,
            'user_id' => $admin->id
        ]);

        $artikel7 = Artikel::create([
            'judul' => 'TEAM ESCIENCE INDONESIA BERSAMA BCA DATANG BERKUNJUNG KE SMK KUNINGAN PERTIWI',
            'slug' => 'team-escience-indonesia-bersama-bca-datang-berkunjung-ke-smk-kuningan-pertiwi',
            'foto' => 'https://axiooclassprogram.org/wp-content/uploads/2019/04/57029101_2658764787471207_665830268589834240_o-500x280.jpg',
            'isi' => '<p>Kunjungan team Escience Indonesia bersama Bank BCA Pusat untuk meninjau pelaksanaan Teaching Factory di SMK Pertiwi Kuningan yang sudah berjalan lebih dari 3 tahun, kegiatan merupakan dalam rangka studi banding dan persiapan perekrutan tenaga kerja di&nbsp;<a href="https://www.facebook.com/pages/Bank-Central-Asia/112833758731457?__tn__=K-R&amp;eid=ARAGMqM_vGKfMtIrX4Atlze0FJ9h0Nvgxk1ovV7gGnV5QTJI98LbQtkrqbfGo1_XoDfutAWTGHzAc6sr&amp;fref=mentions&amp;__xts__%5B0%5D=68.ARD-FyAXBnoa6EhDQwZh7pB7GeYluFu47TDEnz7fag6Fj2svOKkUmhHlDnjggUpHUrjDPIJn6MJemrG4Toq81QWzMdznPaR0AlhbEPmGPWq4gnRFTkoB4TfdbM0dX0ctYqkCRwWEWDheDZVMtq0CwnpXhpLxEmGJwbWmip1VhR090RZPTktkOMkxTNF19uNsfCOgVqAKX4Sprrp1fM99tudzx-upi9EghOHUZo7622Fw4evvopYB2VLD-pykrwQV0fZc-997KZapvWDEtPj3zlPJlu3KV21-kiAyFccnZug6zM4uKehVdFbXDOQofim83OzRr3xYsHs0jwYBQOciPt8uEQ">Bank Central Asia</a>&nbsp;bagi sekolah binaan Axioo nantinya…</p>
            <p>Ingin kerja di BCA ?<br>
            Yuk pantau terus social media Axioo…</p>
            <p><a href="https://www.facebook.com/hashtag/axiooclassprogram?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARD-FyAXBnoa6EhDQwZh7pB7GeYluFu47TDEnz7fag6Fj2svOKkUmhHlDnjggUpHUrjDPIJn6MJemrG4Toq81QWzMdznPaR0AlhbEPmGPWq4gnRFTkoB4TfdbM0dX0ctYqkCRwWEWDheDZVMtq0CwnpXhpLxEmGJwbWmip1VhR090RZPTktkOMkxTNF19uNsfCOgVqAKX4Sprrp1fM99tudzx-upi9EghOHUZo7622Fw4evvopYB2VLD-pykrwQV0fZc-997KZapvWDEtPj3zlPJlu3KV21-kiAyFccnZug6zM4uKehVdFbXDOQofim83OzRr3xYsHs0jwYBQOciPt8uEQ&amp;__tn__=%2ANK-R">#axiooclassprogram</a>&nbsp;<a href="https://www.facebook.com/hashtag/axiooindonesia?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARD-FyAXBnoa6EhDQwZh7pB7GeYluFu47TDEnz7fag6Fj2svOKkUmhHlDnjggUpHUrjDPIJn6MJemrG4Toq81QWzMdznPaR0AlhbEPmGPWq4gnRFTkoB4TfdbM0dX0ctYqkCRwWEWDheDZVMtq0CwnpXhpLxEmGJwbWmip1VhR090RZPTktkOMkxTNF19uNsfCOgVqAKX4Sprrp1fM99tudzx-upi9EghOHUZo7622Fw4evvopYB2VLD-pykrwQV0fZc-997KZapvWDEtPj3zlPJlu3KV21-kiAyFccnZug6zM4uKehVdFbXDOQofim83OzRr3xYsHs0jwYBQOciPt8uEQ&amp;__tn__=%2ANK-R">#axiooindonesia</a>&nbsp;<a href="https://www.facebook.com/hashtag/axioo?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARD-FyAXBnoa6EhDQwZh7pB7GeYluFu47TDEnz7fag6Fj2svOKkUmhHlDnjggUpHUrjDPIJn6MJemrG4Toq81QWzMdznPaR0AlhbEPmGPWq4gnRFTkoB4TfdbM0dX0ctYqkCRwWEWDheDZVMtq0CwnpXhpLxEmGJwbWmip1VhR090RZPTktkOMkxTNF19uNsfCOgVqAKX4Sprrp1fM99tudzx-upi9EghOHUZo7622Fw4evvopYB2VLD-pykrwQV0fZc-997KZapvWDEtPj3zlPJlu3KV21-kiAyFccnZug6zM4uKehVdFbXDOQofim83OzRr3xYsHs0jwYBQOciPt8uEQ&amp;__tn__=%2ANK-R">#axioo</a>&nbsp;<a href="https://www.facebook.com/hashtag/escienceindonesia?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARD-FyAXBnoa6EhDQwZh7pB7GeYluFu47TDEnz7fag6Fj2svOKkUmhHlDnjggUpHUrjDPIJn6MJemrG4Toq81QWzMdznPaR0AlhbEPmGPWq4gnRFTkoB4TfdbM0dX0ctYqkCRwWEWDheDZVMtq0CwnpXhpLxEmGJwbWmip1VhR090RZPTktkOMkxTNF19uNsfCOgVqAKX4Sprrp1fM99tudzx-upi9EghOHUZo7622Fw4evvopYB2VLD-pykrwQV0fZc-997KZapvWDEtPj3zlPJlu3KV21-kiAyFccnZug6zM4uKehVdFbXDOQofim83OzRr3xYsHs0jwYBQOciPt8uEQ&amp;__tn__=%2ANK-R">#escienceindonesia</a>&nbsp;<a href="https://www.facebook.com/hashtag/bca?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARD-FyAXBnoa6EhDQwZh7pB7GeYluFu47TDEnz7fag6Fj2svOKkUmhHlDnjggUpHUrjDPIJn6MJemrG4Toq81QWzMdznPaR0AlhbEPmGPWq4gnRFTkoB4TfdbM0dX0ctYqkCRwWEWDheDZVMtq0CwnpXhpLxEmGJwbWmip1VhR090RZPTktkOMkxTNF19uNsfCOgVqAKX4Sprrp1fM99tudzx-upi9EghOHUZo7622Fw4evvopYB2VLD-pykrwQV0fZc-997KZapvWDEtPj3zlPJlu3KV21-kiAyFccnZug6zM4uKehVdFbXDOQofim83OzRr3xYsHs0jwYBQOciPt8uEQ&amp;__tn__=%2ANK-R">#bca</a>&nbsp;<a href="https://www.facebook.com/hashtag/smkaxioo?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARD-FyAXBnoa6EhDQwZh7pB7GeYluFu47TDEnz7fag6Fj2svOKkUmhHlDnjggUpHUrjDPIJn6MJemrG4Toq81QWzMdznPaR0AlhbEPmGPWq4gnRFTkoB4TfdbM0dX0ctYqkCRwWEWDheDZVMtq0CwnpXhpLxEmGJwbWmip1VhR090RZPTktkOMkxTNF19uNsfCOgVqAKX4Sprrp1fM99tudzx-upi9EghOHUZo7622Fw4evvopYB2VLD-pykrwQV0fZc-997KZapvWDEtPj3zlPJlu3KV21-kiAyFccnZug6zM4uKehVdFbXDOQofim83OzRr3xYsHs0jwYBQOciPt8uEQ&amp;__tn__=%2ANK-R">#smkaxioo</a></p>
            <p><a href="https://www.facebook.com/hashtag/rekrutmen?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARD-FyAXBnoa6EhDQwZh7pB7GeYluFu47TDEnz7fag6Fj2svOKkUmhHlDnjggUpHUrjDPIJn6MJemrG4Toq81QWzMdznPaR0AlhbEPmGPWq4gnRFTkoB4TfdbM0dX0ctYqkCRwWEWDheDZVMtq0CwnpXhpLxEmGJwbWmip1VhR090RZPTktkOMkxTNF19uNsfCOgVqAKX4Sprrp1fM99tudzx-upi9EghOHUZo7622Fw4evvopYB2VLD-pykrwQV0fZc-997KZapvWDEtPj3zlPJlu3KV21-kiAyFccnZug6zM4uKehVdFbXDOQofim83OzRr3xYsHs0jwYBQOciPt8uEQ&amp;__tn__=%2ANK-R">#rekrutmen</a>&nbsp;<a href="https://www.facebook.com/hashtag/indonesia?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARD-FyAXBnoa6EhDQwZh7pB7GeYluFu47TDEnz7fag6Fj2svOKkUmhHlDnjggUpHUrjDPIJn6MJemrG4Toq81QWzMdznPaR0AlhbEPmGPWq4gnRFTkoB4TfdbM0dX0ctYqkCRwWEWDheDZVMtq0CwnpXhpLxEmGJwbWmip1VhR090RZPTktkOMkxTNF19uNsfCOgVqAKX4Sprrp1fM99tudzx-upi9EghOHUZo7622Fw4evvopYB2VLD-pykrwQV0fZc-997KZapvWDEtPj3zlPJlu3KV21-kiAyFccnZug6zM4uKehVdFbXDOQofim83OzRr3xYsHs0jwYBQOciPt8uEQ&amp;__tn__=%2ANK-R">#indonesia</a></p>
            <p><strong>Tentang Axioo Class Program</strong></p>
            <p><em>Axioo Class Program adalah sebuah program pendidikan dalam membantu siswa SMK menjadi siap kerja dan sesuai dengam kebutuhan industri lewat program sinkronisasi kurikulum, workshop berkelanjutan bagi guru, pembelajaran berbasis IT serta validasi sertifikasi bertaraf internasional. Axioo Class Program adalah salah satu bentuk kepedulian Axioo terhadap minimnya tenaga kerja siap pakai. Sekaligus membantu dunia pendidikan yang kesulitan menyalurkan lulusannya. Program ini memberikan pelatihan terpadu kepada siswa dan guru.</em></p>
            <p><em>Pelatihan bekerjasama dengam industri IT lain seperti Intel, Seagate, Mikrotik, ls Cable &amp; System Korea, Telview Technology, Microsoft, dan beberapa perusahaan lainnya. Saat ini lebih dari 300 SMK dari berbagai wilayah tanah air telah bergabung dalam Axioo Class Program. Di setiap SMK binaan, Axioo memiliki satu kelas binaan yang terdiri dari 36 siswa yang telah lolos seleksi.</em></p>
            <p><em>Dalam menggelar program Corporate Social Responsibility (CSR)-nya ini Axioo memberikan sekitar 9 sertifikasi pada para lulusan. Semua sertifikasi ini bisa diperoleh jika siswa berhasil menyelesaikan sampai 12 kelas. Pihak Axioo sendiri memulai Axioo Class Program ini sejak 2011, namun program yang ditunjang sertifikasi sendiri dimulai sejak angkatan 2013.</em></p>
            <p>Sebagai visi Axioo Class Program membantu dunia pendidikan di Indonesia menghasilkan lulusan yang siap kerja sehingga bisa bermanfaat baik bagi negara dan dunia industri.</p>
            <p><strong>Tentang Axioo Internasional</strong></p>
            <p><em>Axioo adalah&nbsp;</em><em>sebuah&nbsp;</em><em>merk&nbsp;</em><em>Brand&nbsp;</em><em>kelas dunia dari produsen perangkat ICT</em><em>&nbsp;(Information Communication and Technology)</em>&nbsp;<em>yang memiliki keunggulan dalam perancangan desain hingga Fasilitas Produksi yang terintegrasi di Indonesia.&nbsp;</em><em>seiring berjalannya waktu Axioo&nbsp; terus mengembangkan dan mendominasi pasar industry lokal berkualitas internasional yang selalu konsisten mengeluarkan produk-produk berkualitas dengan teknologi terkini. Diantaranya&nbsp;</em><em>Notebook, Smartphone, Tablet serta Desktop PC dan Peripherals.</em>&nbsp;<em>Axioo memasuki pasar untuk teknologi komputasi portabel di Indonesia pada tahun 2004,&nbsp;</em><em>dan&nbsp;</em><em>menawarkan&nbsp;</em><em>kinerja yang unik</em><em>, estetika, dan aksesibilitas.&nbsp;</em><em>Prinsip Axioo yaitu&nbsp;</em><em>Ekonomis namun inovatif, sederhana namun bergaya, beragam,&nbsp;</em><em>dan kualitas yang terbaik hingga sampai saat ini Axioo berada di posisi 3 Indonesia. Keutamaan Axioo adalah Integrity, passion, Excllence.</em></p>
            <!-- <blockquote class="blockquote">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            </blockquote>
            <p>
                Nulla porttitor accumsan tincidunt. Cras ultricies ligula sed magna dictum porta. Mauris blandit
                aliquet elit, eget tincidunt
                nibh pulvinar a. Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Donec sollicitudin molestie malesuada.
            </p> -->',
            'kategori_id' => $kategori1->id,
            'user_id' => $admin->id
        ]);

        $artikel8 = Artikel::create([
            'judul' => 'SERUNYA KUJUNGAN INDUSTRI SMK KUNINGAN PERTIWI DI PT.GRAHA MABITO',
            'slug' => 'serunya-kujungan-industri-smk-kuningan-pertiwi-di-ptgraha-mabito',
            'foto' => 'https://axiooclassprogram.org/wp-content/uploads/2019/04/57009039_2272259756176802_5036386003997163520_n-500x280.jpg',
            'isi' => '<p>SMK Kuningan Pertiwi merupakan salah satu sekolah yang berkesempatan datang dan melihat secara langsung PT.GRAHA MABITO , sambil belajar dan bermain mereka di perkenalakan tentang bagaiamana dunia kerja sesungguhnya. Tentang Axioo Class Program Axioo Class Program adalah sebuah program pendidikan dalam membantu siswa SMK menjadi siap kerja dan sesuai dengam kebutuhan industri lewat program sinkronisasi kurikulum, workshop berkelanjutan bagi guru, pembelajaran berbasis IT serta validasi sertifikasi bertaraf internasional. Axioo Class Program adalah salah satu bentuk kepedulian Axioo terhadap minimnya tenaga kerja siap pakai. Sekaligus membantu dunia pendidikan yang kesulitan menyalurkan lulusannya. Program ini memberikan pelatihan terpadu kepada siswa dan guru. Pelatihan bekerjasama dengam industri IT lain seperti Intel, Seagate, Mikrotik, ls Cable &amp; System Korea, Telview Technology, Microsoft, dan beberapa perusahaan lainnya. Saat ini lebih dari 300 SMK dari berbagai wilayah tanah air telah bergabung dalam Axioo Class Program. Di setiap SMK binaan, Axioo memiliki satu kelas binaan yang terdiri dari 36 siswa yang telah lolos seleksi. Dalam menggelar program Corporate Social Responsibility (CSR)-nya ini Axioo memberikan sekitar 9 sertifikasi pada para lulusan. Semua sertifikasi ini bisa diperoleh jika siswa berhasil menyelesaikan sampai 12 kelas. Pihak Axioo sendiri memulai Axioo Class Program ini sejak 2011, namun program yang ditunjang sertifikasi sendiri dimulai sejak angkatan 2013. Sebagai visi Axioo Class Program membantu dunia pendidikan di Indonesia menghasilkan lulusan yang siap kerja sehingga bisa bermanfaat baik bagi negara dan dunia industri. Tentang Axioo Internasional Axioo adalah sebuah merk Brand kelas dunia dari produsen perangkat ICT (Information Communication and Technology) yang memiliki keunggulan dalam perancangan desain hingga Fasilitas Produksi yang terintegrasi di Indonesia. seiring berjalannya waktu Axioo terus mengembangkan dan mendominasi pasar industry lokal berkualitas internasional yang selalu konsisten mengeluarkan produk-produk berkualitas dengan teknologi terkini. Diantaranya Notebook, Smartphone, Tablet serta Desktop PC dan Peripherals. Axioo memasuki pasar untuk teknologi komputasi portabel di Indonesia pada tahun 2004, dan menawarkan kinerja yang unik, estetika, dan aksesibilitas. Prinsip Axioo yaitu Ekonomis namun inovatif, sederhana namun bergaya, beragam, dan kualitas yang terbaik hingga sampai saat ini Axioo berada di posisi 3 Indonesia. Keutamaan Axioo adalah Integrity, passion, Excllence.</p>
            <!-- <blockquote class="blockquote">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            </blockquote>
            <p>
                Nulla porttitor accumsan tincidunt. Cras ultricies ligula sed magna dictum porta. Mauris blandit
                aliquet elit, eget tincidunt
                nibh pulvinar a. Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Donec sollicitudin molestie malesuada.
            </p> -->',
            'kategori_id' => $kategori2->id,
            'user_id' => $admin->id
        ]);

        $artikel9 = Artikel::create([
            'judul' => 'UJI SERTIFIKASI INTERNASIONAL MICROSOFT NETWORK TELAH DILAKSANAKAN SISWA-SISWI SMK MIFTAHUSSALAM CIAMIS',
            'slug' => 'uji-sertifikasi-internasional-microsoft-network-telah-dilaksanakan-siswa-siswi-smk-miftahussalam-ciamis',
            'foto' => 'https://axiooclassprogram.org/wp-content/uploads/2019/04/53713862_2604439002903786_1736479114841292800_n.jpg',
            'isi' => '<p>Pelaksanaan uji Sertifikasi Internasional Microsoft Network kepada siswa binaan AXIOO di SMK Miftahussalam Ciamis pada uji sertifkasi Axioo Class Program.</p>
            <p><strong>Tentang Axioo Class Program</strong></p>
            <p><em>Axioo Class Program adalah sebuah program pendidikan dalam membantu siswa SMK menjadi siap kerja dan sesuai dengam kebutuhan industri lewat program sinkronisasi kurikulum, workshop berkelanjutan bagi guru, pembelajaran berbasis IT serta validasi sertifikasi bertaraf internasional. Axioo Class Program adalah salah satu bentuk kepedulian Axioo terhadap minimnya tenaga kerja siap pakai. Sekaligus membantu dunia pendidikan yang kesulitan menyalurkan lulusannya. Program ini memberikan pelatihan terpadu kepada siswa dan guru.</em></p>
            <p><em>Pelatihan bekerjasama dengam industri IT lain seperti Intel, Seagate, Mikrotik, ls Cable &amp; System Korea, Telview Technology, Microsoft, dan beberapa perusahaan lainnya. Saat ini lebih dari 300 SMK dari berbagai wilayah tanah air telah bergabung dalam Axioo Class Program. Di setiap SMK binaan, Axioo memiliki satu kelas binaan yang terdiri dari 36 siswa yang telah lolos seleksi.</em></p>
            <p><em>Dalam menggelar program Corporate Social Responsibility (CSR)-nya ini Axioo memberikan sekitar 9 sertifikasi pada para lulusan. Semua sertifikasi ini bisa diperoleh jika siswa berhasil menyelesaikan sampai 12 kelas. Pihak Axioo sendiri memulai Axioo Class Program ini sejak 2011, namun program yang ditunjang sertifikasi sendiri dimulai sejak angkatan 2013.</em></p>
            <p>Sebagai visi Axioo Class Program membantu dunia pendidikan di Indonesia menghasilkan lulusan yang siap kerja sehingga bisa bermanfaat baik bagi negara dan dunia industri.</p>
            <p><strong>Tentang Axioo Internasional</strong></p>
            <p><em>Axioo adalah&nbsp;</em><em>sebuah&nbsp;</em><em>merk&nbsp;</em><em>Brand&nbsp;</em><em>kelas dunia dari produsen perangkat ICT</em><em>&nbsp;(Information Communication and Technology)</em>&nbsp;<em>yang memiliki keunggulan dalam perancangan desain hingga Fasilitas Produksi yang terintegrasi di Indonesia.&nbsp;</em><em>seiring berjalannya waktu Axioo&nbsp; terus mengembangkan dan mendominasi pasar industry lokal berkualitas internasional yang selalu konsisten mengeluarkan produk-produk berkualitas dengan teknologi terkini. Diantaranya&nbsp;</em><em>Notebook, Smartphone, Tablet serta Desktop PC dan Peripherals.</em>&nbsp;<em>Axioo memasuki pasar untuk teknologi komputasi portabel di Indonesia pada tahun 2004,&nbsp;</em><em>dan&nbsp;</em><em>menawarkan&nbsp;</em><em>kinerja yang unik</em><em>, estetika, dan aksesibilitas.&nbsp;</em><em>Prinsip Axioo yaitu&nbsp;</em><em>Ekonomis namun inovatif, sederhana namun bergaya, beragam,&nbsp;</em><em>dan kualitas yang terbaik hingga sampai saat ini Axioo berada di posisi 3 Indonesia. Keutamaan Axioo adalah Integrity, passion, Excllence.</em></p>
            <!-- <blockquote class="blockquote">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            </blockquote>
            <p>
                Nulla porttitor accumsan tincidunt. Cras ultricies ligula sed magna dictum porta. Mauris blandit
                aliquet elit, eget tincidunt
                nibh pulvinar a. Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Donec sollicitudin molestie malesuada.
            </p> -->',
            'kategori_id' => $kategori3->id,
            'user_id' => $admin->id
        ]);

        $artikel10 = Artikel::create([
            'judul' => 'PERWAKILAN SMKN 3 SORONG BERKUNJUNG KE PT. GRAHA MABITO',
            'slug' => 'perwakilan-smkn-3-sorong-berkunjung-ke-pt-graha-mabito',
            'foto' => 'https://axiooclassprogram.org/wp-content/uploads/2019/04/GRAHA-MABITO-500x280.jpg',
            'isi' => '<p>Salah satu perwakilan SMKN 3 Sorong Bpk. Umar di dampingi Bpk. Timmy melakukan tour room ke Graha Mabito atau kantor Axioo Class Program..</p>
            <p>Di kunjungan ini juga sebagai komitmen Axioo untuk hadir di seluruh wilayah indonesia khususnya indonesia timur Bpk. Timmy selaku direktur Axioo Class Program melakukan penandatangan MoU Axioo dengan SMKN 3 Sorong yang di wakilkan Bpk. Umar selaku wakil kepala sekolah..</p>
            <p>Kami berharap dengan adanya komitmen ini antara Axioo dengan pihak sekolah dapat mengimplementasikan Axioo Class Program di Tanah Papua Barat….</p>
            <p>Dalam waktu dekat ini Axioo Class Program di Tanah Papua Barat akan diresmikan…</p>
            <p><a href="http://www.facebook.com/hashtag/axiooclassprogram?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARChpITw8G6qRyKY0hp2CRkqEOkfNhaRtUnAdO0W14NjzEpRgCUVMl5we2YfrW2eOKkFDb7UG-WigCzta5pIVg46t5w7X6nXbBoFmA3b-pNbzzMVg0DKqdoTLa7__RoV-xv4FyCRPcGByGCPwLBMBZd--Fkdz__tbFpDOcUJwQSOgJ9lI3NYPMCEaN1KGzIVh-4V_1xOv0IVhH9EeL96iLT5qLZwauW3tvrdZV6sWLrkHswrRNlZLd_qC_LVaBqhYrR-JumOEDTW4Kr5NwmJuHxgp3t3Vs_hqzaT48LMjO8nG8EltgXi3KDqc5pGok7wHRggBMuT_lIrYBgTDZdGLV5znA&amp;__tn__=%2ANK-R">#axiooclassprogram</a> <a href="http://www.facebook.com/hashtag/axiooindonesia?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARChpITw8G6qRyKY0hp2CRkqEOkfNhaRtUnAdO0W14NjzEpRgCUVMl5we2YfrW2eOKkFDb7UG-WigCzta5pIVg46t5w7X6nXbBoFmA3b-pNbzzMVg0DKqdoTLa7__RoV-xv4FyCRPcGByGCPwLBMBZd--Fkdz__tbFpDOcUJwQSOgJ9lI3NYPMCEaN1KGzIVh-4V_1xOv0IVhH9EeL96iLT5qLZwauW3tvrdZV6sWLrkHswrRNlZLd_qC_LVaBqhYrR-JumOEDTW4Kr5NwmJuHxgp3t3Vs_hqzaT48LMjO8nG8EltgXi3KDqc5pGok7wHRggBMuT_lIrYBgTDZdGLV5znA&amp;__tn__=%2ANK-R">#axiooindonesia</a> <a href="http://www.facebook.com/hashtag/axioo?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARChpITw8G6qRyKY0hp2CRkqEOkfNhaRtUnAdO0W14NjzEpRgCUVMl5we2YfrW2eOKkFDb7UG-WigCzta5pIVg46t5w7X6nXbBoFmA3b-pNbzzMVg0DKqdoTLa7__RoV-xv4FyCRPcGByGCPwLBMBZd--Fkdz__tbFpDOcUJwQSOgJ9lI3NYPMCEaN1KGzIVh-4V_1xOv0IVhH9EeL96iLT5qLZwauW3tvrdZV6sWLrkHswrRNlZLd_qC_LVaBqhYrR-JumOEDTW4Kr5NwmJuHxgp3t3Vs_hqzaT48LMjO8nG8EltgXi3KDqc5pGok7wHRggBMuT_lIrYBgTDZdGLV5znA&amp;__tn__=%2ANK-R">#axioo</a> <a href="http://www.facebook.com/hashtag/axiooeducation?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARChpITw8G6qRyKY0hp2CRkqEOkfNhaRtUnAdO0W14NjzEpRgCUVMl5we2YfrW2eOKkFDb7UG-WigCzta5pIVg46t5w7X6nXbBoFmA3b-pNbzzMVg0DKqdoTLa7__RoV-xv4FyCRPcGByGCPwLBMBZd--Fkdz__tbFpDOcUJwQSOgJ9lI3NYPMCEaN1KGzIVh-4V_1xOv0IVhH9EeL96iLT5qLZwauW3tvrdZV6sWLrkHswrRNlZLd_qC_LVaBqhYrR-JumOEDTW4Kr5NwmJuHxgp3t3Vs_hqzaT48LMjO8nG8EltgXi3KDqc5pGok7wHRggBMuT_lIrYBgTDZdGLV5znA&amp;__tn__=%2ANK-R">#axiooeducation</a> <a href="http://www.facebook.com/hashtag/mou?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARChpITw8G6qRyKY0hp2CRkqEOkfNhaRtUnAdO0W14NjzEpRgCUVMl5we2YfrW2eOKkFDb7UG-WigCzta5pIVg46t5w7X6nXbBoFmA3b-pNbzzMVg0DKqdoTLa7__RoV-xv4FyCRPcGByGCPwLBMBZd--Fkdz__tbFpDOcUJwQSOgJ9lI3NYPMCEaN1KGzIVh-4V_1xOv0IVhH9EeL96iLT5qLZwauW3tvrdZV6sWLrkHswrRNlZLd_qC_LVaBqhYrR-JumOEDTW4Kr5NwmJuHxgp3t3Vs_hqzaT48LMjO8nG8EltgXi3KDqc5pGok7wHRggBMuT_lIrYBgTDZdGLV5znA&amp;__tn__=%2ANK-R">#mou</a> <a href="http://www.facebook.com/hashtag/grahamabito?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARChpITw8G6qRyKY0hp2CRkqEOkfNhaRtUnAdO0W14NjzEpRgCUVMl5we2YfrW2eOKkFDb7UG-WigCzta5pIVg46t5w7X6nXbBoFmA3b-pNbzzMVg0DKqdoTLa7__RoV-xv4FyCRPcGByGCPwLBMBZd--Fkdz__tbFpDOcUJwQSOgJ9lI3NYPMCEaN1KGzIVh-4V_1xOv0IVhH9EeL96iLT5qLZwauW3tvrdZV6sWLrkHswrRNlZLd_qC_LVaBqhYrR-JumOEDTW4Kr5NwmJuHxgp3t3Vs_hqzaT48LMjO8nG8EltgXi3KDqc5pGok7wHRggBMuT_lIrYBgTDZdGLV5znA&amp;__tn__=%2ANK-R">#grahamabito</a> <a href="http://www.facebook.com/hashtag/sorong?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARChpITw8G6qRyKY0hp2CRkqEOkfNhaRtUnAdO0W14NjzEpRgCUVMl5we2YfrW2eOKkFDb7UG-WigCzta5pIVg46t5w7X6nXbBoFmA3b-pNbzzMVg0DKqdoTLa7__RoV-xv4FyCRPcGByGCPwLBMBZd--Fkdz__tbFpDOcUJwQSOgJ9lI3NYPMCEaN1KGzIVh-4V_1xOv0IVhH9EeL96iLT5qLZwauW3tvrdZV6sWLrkHswrRNlZLd_qC_LVaBqhYrR-JumOEDTW4Kr5NwmJuHxgp3t3Vs_hqzaT48LMjO8nG8EltgXi3KDqc5pGok7wHRggBMuT_lIrYBgTDZdGLV5znA&amp;__tn__=%2ANK-R">#sorong</a> <a href="http://www.facebook.com/hashtag/papuabarat?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARChpITw8G6qRyKY0hp2CRkqEOkfNhaRtUnAdO0W14NjzEpRgCUVMl5we2YfrW2eOKkFDb7UG-WigCzta5pIVg46t5w7X6nXbBoFmA3b-pNbzzMVg0DKqdoTLa7__RoV-xv4FyCRPcGByGCPwLBMBZd--Fkdz__tbFpDOcUJwQSOgJ9lI3NYPMCEaN1KGzIVh-4V_1xOv0IVhH9EeL96iLT5qLZwauW3tvrdZV6sWLrkHswrRNlZLd_qC_LVaBqhYrR-JumOEDTW4Kr5NwmJuHxgp3t3Vs_hqzaT48LMjO8nG8EltgXi3KDqc5pGok7wHRggBMuT_lIrYBgTDZdGLV5znA&amp;__tn__=%2ANK-R">#papuabarat</a> <a href="http://www.facebook.com/hashtag/indonesiatimur?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARChpITw8G6qRyKY0hp2CRkqEOkfNhaRtUnAdO0W14NjzEpRgCUVMl5we2YfrW2eOKkFDb7UG-WigCzta5pIVg46t5w7X6nXbBoFmA3b-pNbzzMVg0DKqdoTLa7__RoV-xv4FyCRPcGByGCPwLBMBZd--Fkdz__tbFpDOcUJwQSOgJ9lI3NYPMCEaN1KGzIVh-4V_1xOv0IVhH9EeL96iLT5qLZwauW3tvrdZV6sWLrkHswrRNlZLd_qC_LVaBqhYrR-JumOEDTW4Kr5NwmJuHxgp3t3Vs_hqzaT48LMjO8nG8EltgXi3KDqc5pGok7wHRggBMuT_lIrYBgTDZdGLV5znA&amp;__tn__=%2ANK-R">#indonesiatimur</a></p>
            <p><strong>Tentang Axioo Class Program</strong></p>
            <p><em>Axioo Class Program adalah sebuah program pendidikan dalam membantu siswa SMK menjadi siap kerja dan sesuai dengam kebutuhan industri lewat program sinkronisasi kurikulum, workshop berkelanjutan bagi guru, pembelajaran berbasis IT serta validasi sertifikasi bertaraf internasional. Axioo Class Program adalah salah satu bentuk kepedulian Axioo terhadap minimnya tenaga kerja siap pakai. Sekaligus membantu dunia pendidikan yang kesulitan menyalurkan lulusannya. Program ini memberikan pelatihan terpadu kepada siswa dan guru.</em></p>
            <p><em>Pelatihan bekerjasama dengam industri IT lain seperti Intel, Seagate, Mikrotik, ls Cable &amp; System Korea, Telview Technology, Microsoft, dan beberapa perusahaan lainnya. Saat ini lebih dari 300 SMK dari berbagai wilayah tanah air telah bergabung dalam Axioo Class Program. Di setiap SMK binaan, Axioo memiliki satu kelas binaan yang terdiri dari 36 siswa yang telah lolos seleksi.</em></p>
            <p><em>Dalam menggelar program Corporate Social Responsibility (CSR)-nya ini Axioo memberikan sekitar 9 sertifikasi pada para lulusan. Semua sertifikasi ini bisa diperoleh jika siswa berhasil menyelesaikan sampai 12 kelas. Pihak Axioo sendiri memulai Axioo Class Program ini sejak 2011, namun program yang ditunjang sertifikasi sendiri dimulai sejak angkatan 2013.</em></p>
            <p>Sebagai visi Axioo Class Program membantu dunia pendidikan di Indonesia menghasilkan lulusan yang siap kerja sehingga bisa bermanfaat baik bagi negara dan dunia industri.</p>
            <p><strong>Tentang Axioo Internasional</strong></p>
            <p><em>Axioo adalah&nbsp;</em><em>sebuah&nbsp;</em><em>merk&nbsp;</em><em>Brand&nbsp;</em><em>kelas dunia dari produsen perangkat ICT</em><em>&nbsp;(Information Communication and Technology)</em><em>yang memiliki keunggulan dalam perancangan desain hingga Fasilitas Produksi yang terintegrasi di Indonesia.&nbsp;</em><em>seiring berjalannya waktu Axioo&nbsp; terus mengembangkan dan mendominasi pasar industry lokal berkualitas internasional yang selalu konsisten mengeluarkan produk-produk berkualitas dengan teknologi terkini. Diantaranya&nbsp;</em><em>Notebook, Smartphone, Tablet serta Desktop PC dan Peripherals.</em><em>Axioo memasuki pasar untuk teknologi komputasi portabel di Indonesia pada tahun 2004,&nbsp;</em><em>dan&nbsp;</em><em>menawarkan&nbsp;</em><em>kinerja yang unik</em><em>, estetika, dan aksesibilitas.&nbsp;</em><em>Prinsip Axioo yaitu&nbsp;</em><em>Ekonomis namun inovatif, sederhana namun bergaya, beragam,&nbsp;</em><em>dan kualitas yang terbaik hingga sampai saat ini Axioo berada di posisi 3 Indonesia. Keutamaan Axioo adalah Integrity, passion, Excllence.</em></p>
            <!-- <blockquote class="blockquote">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            </blockquote>
            <p>
                Nulla porttitor accumsan tincidunt. Cras ultricies ligula sed magna dictum porta. Mauris blandit
                aliquet elit, eget tincidunt
                nibh pulvinar a. Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Donec sollicitudin molestie malesuada.
            </p> -->',
            'kategori_id' => $kategori1->id,
            'user_id' => $admin->id
        ]);
    }
}
