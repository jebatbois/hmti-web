/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/Views/**/*.php",
    "./public/**/*.js",
  ],
  theme: {
    extend: {
      // 1. KONFIGURASI WARNA LENGKAP & SEMANTIK
      colors: {
        // === BRAND IDENTITY (HMTI) ===
        hmti: {
          primary: '#16a34a',   // Green 600 (Warna Utama Organisasi)
          dark:    '#14532d',   // Green 900 (Footer/Hover Gelap)
          light:   '#dcfce7',   // Green 100 (Background Aksen/Ring) -> Dipergelap sedikit agar terlihat di putih
          accent:  '#facc15',   // Yellow 400 (Highlight/Badge)
        },

        // === HALAMAN: KONTAK (HUBUNGI KAMI) ===
        contact: {
          primary: '#16a34a',   // Green 600 (Tombol Kirim)
          dark:    '#0f172a',   // Slate 900 (Background Hero Gradient Kanan)
          deep:    '#14532d',   // Green 900 (Background Hero Gradient Kiri)
          surface: '#f8fafc',   // Slate 50  (Background Input Form)
          icon:    '#22c55e',   // Green 500 (Icon Markers)
        },

        // === HALAMAN: BERITA (NEWS PORTAL) ===
        news: {
          primary: '#1e40af',   // Blue 800
          dark:    '#0f172a',   // Slate 900
          hover:   '#1e3a8a',   // Blue 900
          light:   '#eff6ff',   // Blue 50
        },

        // === HALAMAN: BANK SOAL (AKADEMIK) ===
        academic: {
          primary: '#7e22ce',   // Purple 700
          dark:    '#581c87',   // Purple 900
          light:   '#faf5ff',   // Purple 50
          accent:  '#db2777',   // Pink 600
        },

        // === HALAMAN: MIMBAR BEBAS ===
        mimbar: {
          primary: '#0d9488',   // Teal 600
          dark:    '#115e59',   // Teal 800
          light:   '#f0fdfa',   // Teal 50
          paper:   '#fefce8',   // Yellow 50 (Sticky Note)
        }
      },

      // === 2. SOCIAL MEDIA & KONTAK (BARU) ===
        // Ini agar warna hover tidak putih/hilang
        brand: {
          email:    '#2563eb', // Blue 600 (Warna Email)
          email_dk: '#1e40af', // Blue 800 (Hover Email)
          ig:       '#db2777', // Pink 600 (Warna IG)
          ig_dk:    '#be185d', // Pink 700 (Hover IG)
        },

      // 2. KONFIGURASI FONT
      fontFamily: {
        sans: ['Inter', 'ui-sans-serif', 'system-ui'],
        handwriting: ['"Patrick Hand"', 'cursive'], // Untuk Mimbar Bebas
      },

      // 3. ANIMASI CUSTOM
      animation: {
        'bounce-slow': 'bounce 3s infinite',
        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
      }
    },
  },
  plugins: [],
}