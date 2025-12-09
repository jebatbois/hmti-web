<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="relative pt-32 pb-28 md:pt-44 md:pb-40 overflow-hidden text-center text-white"
         style="background: linear-gradient(135deg, #14532d 0%, #0f172a 100%);">
    
    <div class="absolute top-0 left-0 w-full h-full bg-[url('/img/pattern.png')] opacity-5"></div>
    <div class="absolute -top-24 -left-24 w-72 h-72 bg-green-600 opacity-20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-yellow-500 opacity-10 rounded-full blur-3xl translate-y-1/2 translate-x-1/3"></div>

    <div class="container mx-auto px-4 relative z-10">
        <span class="inline-block py-1.5 px-4 rounded-full bg-white/10 border border-white/20 text-green-100 text-xs font-bold uppercase tracking-widest mb-6 backdrop-blur-sm">
            👋 Let's Connect
        </span>

        <h1 class="text-4xl md:text-6xl font-extrabold mb-6 tracking-tight drop-shadow-lg">
            Hubungi Kami
        </h1>
        <p class="text-gray-200 text-lg md:text-xl max-w-2xl mx-auto font-medium leading-relaxed">
            Punya pertanyaan, saran, tawaran kerjasama, atau sekadar ingin menyapa? Kami siap mendengar dari Anda.
        </p>
    </div>
</section>

<section class="relative z-20 -mt-16 pb-24 px-4 md:px-8">
    <div class="container mx-auto max-w-6xl">
        
        <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
            
            <div class="w-full lg:w-5/12 space-y-6">
                
                <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition duration-300 group">
                    <div class="flex items-start gap-6">
                        <div class="flex-shrink-0 w-14 h-14 bg-green-100 text-green-700 rounded-full flex items-center justify-center text-2xl group-hover:bg-green-600 group-hover:text-white transition duration-300 shadow-sm">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="pt-1">
                            <h4 class="text-lg font-bold text-gray-800 mb-1">Sekretariat HMTI</h4>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Jl. Politeknik No.KM. 24, Senggarang, Kota Tanjung Pinang, Kepulauan Riau 29115
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition duration-300 group">
                    
                    <div class="flex items-center mb-6 gap-4">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center shadow-sm transition duration-300 transform group-hover:scale-110"
                             style="background-color: #dbeafe; color: #2563eb;">
                            <i class="fas fa-envelope text-xl"></i>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 uppercase font-bold tracking-widest mb-0.5">Email Resmi</p>
                            <a href="mailto:hmti@umrah.ac.id" class="font-bold text-lg transition hover:underline" style="color: #1e40af;">
                                hmti@umrah.ac.id
                            </a>
                        </div>
                    </div>

                    <div class="flex items-center mb-6 gap-4">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center shadow-sm transition duration-300 transform group-hover:scale-110"
                             style="background-color: #fce7f3; color: #db2777;">
                            <i class="fab fa-instagram text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 uppercase font-bold tracking-widest mb-0.5">Instagram</p>
                            <a href="https://instagram.com/umrahhmti_" target="_blank" class="font-bold text-lg transition hover:underline" style="color: #db2777;">
                                @umrahhmti_
                            </a>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center shadow-sm transition duration-300 transform group-hover:scale-110"
                             style="background-color: #f0f0f0; color: #000000;">
                            <i class="fab fa-tiktok text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 uppercase font-bold tracking-widest mb-0.5">TikTok</p>
                            <a href="https://www.tiktok.com/@hmti.umrah" target="_blank" class="font-bold text-lg transition hover:underline" style="color: #000000;">
                                @hmti.umrah
                            </a>
                        </div>
                    </div>

                </div>

            <div class="rounded-2xl overflow-hidden shadow-lg border-4 border-white h-64 relative group">
                <iframe 
                    src="https://maps.google.com/maps?q=Universitas%20Maritim%20Raja%20Ali%20Haji%20Senggarang&t=&z=16&ie=UTF8&iwloc=&output=embed" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"
                    class="filter grayscale group-hover:grayscale-0 transition duration-700">
                </iframe>
                <div class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-lg shadow-sm text-xs font-bold text-gray-700 pointer-events-none border border-gray-200">
                    📍 Kampus Senggarang
                </div>
            </div>

            </div>

            <div class="w-full lg:w-7/12">
                <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-10 border border-gray-100 relative overflow-hidden h-full">
                    
                    <div class="absolute top-0 right-0 w-40 h-40 bg-green-50 rounded-bl-full -mr-16 -mt-16 opacity-70 pointer-events-none"></div>

                    <div class="relative z-10">
                        <h3 class="text-2xl font-extrabold text-gray-800 mb-2">Kirim Pesan</h3>
                        <p class="text-gray-500 mb-8">Kami akan membalas pesan Anda melalui email secepatnya.</p>
                        
                        <?php if(session()->getFlashdata('success')) : ?>
                            <div class="bg-green-50 border-l-4 border-green-600 text-green-800 p-4 rounded mb-6 text-sm flex items-center animate-pulse shadow-sm">
                                <i class="fas fa-check-circle mr-3 text-lg"></i> 
                                <span><?= session()->getFlashdata('success'); ?></span>
                            </div>
                        <?php endif; ?>

                        <form action="/kontak/kirim" method="post" class="space-y-5">
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase mb-2 tracking-wider">Nama Lengkap</label>
                                    <input type="text" name="nama" 
                                           class="w-full px-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-50 transition text-gray-700 placeholder-gray-400" 
                                           placeholder="Nama Anda" required>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase mb-2 tracking-wider">Alamat Email</label>
                                    <input type="email" name="email" 
                                           class="w-full px-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-50 transition text-gray-700 placeholder-gray-400" 
                                           placeholder="contoh@email.com" required>
                                </div>
                            </div>

                            <div class="relative">
                                <label class="block text-xs font-bold text-gray-400 uppercase mb-2 tracking-wider">Subjek Pesan</label>
                                <div class="relative">
                                    <select name="subjek" class="w-full px-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-50 transition text-gray-700 cursor-pointer appearance-none">
                                        <option value="Pertanyaan Umum">Pertanyaan Umum</option>
                                        <option value="Kritik & Saran">Kritik & Saran</option>
                                        <option value="Kerjasama">Kerjasama / Partnership</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-500">
                                        <i class="fas fa-chevron-down text-xs"></i>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase mb-2 tracking-wider">Isi Pesan</label>
                                <textarea name="pesan" 
                                          class="w-full px-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl h-40 focus:bg-white focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-50 transition text-gray-700 resize-none placeholder-gray-400" 
                                          placeholder="Tuliskan pesan Anda secara detail di sini..." required></textarea>
                            </div>

                            <button type="submit" class="w-full bg-green-700 text-white font-bold py-4 rounded-xl hover:bg-green-800 transition shadow-lg transform hover:-translate-y-1 active:scale-95 flex items-center justify-center group">
                                <i class="fas fa-paper-plane mr-2 group-hover:rotate-12 transition"></i> Kirim Pesan Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?= $this->endSection(); ?>