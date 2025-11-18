<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="bg-hmti-light py-20 text-center">
    <div class="container mx-auto px-6">
        <h1 class="text-4xl font-extrabold text-hmti-dark mb-4 mt-9">Hubungi Kami</h1>
        <p class="text-gray-600 max-w-xl mx-auto">Punya pertanyaan, kritik, saran, atau tawaran kerjasama? Jangan ragu untuk menghubungi kami.</p>
    </div>
</section>

<div class="container mx-auto px-6 py-12">
    <div class="flex flex-col lg:flex-row gap-12">
        
        <!-- Info Kontak & Maps -->
        <div class="w-full lg:w-1/2 space-y-8">
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Sekretariat HMTI</h3>
                <p class="text-gray-600 mb-4 flex items-start">
                    <i class="fas fa-map-marker-alt mt-1 mr-3 text-hmti-primary"></i>
                    Jl. Politeknik No.KM. 24, Senggarang, Kec. Tj. Pinang Kota, Kota Tanjung Pinang, Kepulauan Riau 29115
                </p>
                <p class="text-gray-600 mb-4 flex items-center">
                    <i class="fas fa-envelope mr-3 text-hmti-primary"></i>
                    hmti@umrah.ac.id
                </p>
                <p class="text-gray-600 flex items-center">
                    <i class="fab fa-instagram mr-3 text-hmti-primary"></i>
                    @hmti_umrah
                </p>
            </div>

            <!-- Embed Google Maps (FIXED LOCATION) -->
            <!-- Menggunakan query spesifik 'Fakultas Teknik UMRAH' agar pin tidak lari-lari -->
            <div class="rounded-xl overflow-hidden shadow-md h-64 bg-gray-200 relative">
                <iframe 
                    src="https://maps.google.com/maps?q=Fakultas+Teknik+UMRAH,+Senggarang&t=&z=16&ie=UTF8&iwloc=&output=embed" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        <!-- Form Kirim Pesan -->
        <div class="w-full lg:w-1/2">
            <div class="bg-white p-8 rounded-xl shadow-lg border-t-4 border-hmti-primary">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Kirim Pesan</h3>
                
                <?php if(session()->getFlashdata('success')) : ?>
                    <div class="bg-green-100 text-green-700 p-4 rounded mb-6 text-sm">
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <form action="/kontak/kirim" method="post">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Nama Lengkap</label>
                        <input type="text" name="nama" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:border-hmti-primary" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Email</label>
                        <input type="email" name="email" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:border-hmti-primary" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Subjek</label>
                        <input type="text" name="subjek" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:border-hmti-primary">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">Pesan</label>
                        <textarea name="pesan" class="w-full px-4 py-3 border rounded-lg h-32 focus:outline-none focus:border-hmti-primary" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-hmti-primary text-white font-bold py-3 rounded-lg hover:bg-hmti-dark transition shadow">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>