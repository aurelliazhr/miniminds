<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://fonts.googleapis.com/css?family=Lexend" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Lemon&display=swap" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/notifikasi.js"></script>
    <script src="js/huruf.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tebak Huruf</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Lexend', sans-serif;
            background-color: #f5f5f5;
            background-image: url('../assets/background.jpg');
            background-size: cover;
            height: 100vh;
        }

        .Kotak {
            position: relative;
            top: 15px;
            background: white;
            margin: 1rem auto;
            padding: 30px;
            width: 75%;
            height: 475px;
            max-width: 340px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .Header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px;
        }

        #kembaliButton {
            cursor: pointer;
            text-decoration: none;
        }

        #kembaliButton img {
            width: 20px;
            height: auto;
        }

        .Text {
            font-size: 18px;
            margin-right: 50px;
        }

        .Pilihan {
            position: relative;
            top: 50px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .Pilihan .row {
            display: flex;
            justify-content: center;
            gap: 20px;
            width: 100%;
        }

        .Pilihan img {
            width: 125px;
            height: 150px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .Pilihan img:hover {
            transform: scale(1.1);
        }

        @media (max-width: 800px) {
            body {
                height: 98vh;
            }

            .Kotak {
                top: 60px;
            }

            .Text {
            font-size: 18px;
            margin-left: 50px;
        }
        }
    </style>
</head>
<body>

    <audio id="background-audio" loop>
        <source src="../assets/happy-clappy-ukulele(chosic.com).mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <div class="Kotak">
        <div class="Header">
            <a id="kembaliButton" href="{{ route('huruf8') }}">
                <img src="../assets/angle-left.png" alt="Kembali" />
            </a>

        <div class="Text">
            <p>Yang manakah huruf X?</p> <!-- Question as text -->
        </div>
        </div>

        <div class="Pilihan">
            <div class="row">
                <img src="../assets/e.png" alt="Alif" data-correct="false" onclick="checkAnswer(this)"/>
                <img src="../assets/x.png" alt="Ba" data-correct="true" onclick="checkAnswer(this)"/>
            </div>
            <div class="row">
                <img src="../assets/k.png" alt="Ta" data-correct="false" onclick="checkAnswer(this)"/> 
            </div>
        </div>
    </div>

    <script>
 const backgroundAudio = document.getElementById('background-audio');

// Cek posisi terakhir dari LocalStorage
const lastPosition = localStorage.getItem('audioPosition');
if (lastPosition !== null) {
    backgroundAudio.currentTime = parseFloat(lastPosition);
}
backgroundAudio.volume = 1.0;
backgroundAudio.play();

// Simpan posisi audio sebelum meninggalkan halaman
window.addEventListener('beforeunload', () => {
    localStorage.setItem('audioPosition', backgroundAudio.currentTime);
});

// Fungsi untuk memutar audio lain dan mengurangi volume backsound sementara
function playAudio(audioSrc) {
    const audio = new Audio(audioSrc);
    backgroundAudio.volume = 0.003; // Kurangi volume backsound saat audio lain diputar
    audio.play();

    // Kembalikan volume backsound setelah audio lain selesai diputar
    audio.onended = () => {
        backgroundAudio.volume = 0.1; // Kembalikan volume backsound
    };
}

// Putar audio soal saat halaman dimulai
window.onload = () => {
    playAudio('../assets/mainX.mp3'); // Menggunakan file audio yang sesuai
};

// Event listener untuk tombol kembali
const kembaliButton = document.getElementById('kembaliButton');
kembaliButton.addEventListener('click', function() {
    history.back();
});

// Event listener untuk pilihan gambar
const pilihanImages = document.querySelectorAll('.Pilihan img');
pilihanImages.forEach(function(img) {
    img.addEventListener('click', function() {
        const isCorrect = img.getAttribute('data-correct') === 'true';

        // Jika benar, tampilkan sukses dan lanjut ke pertanyaan berikutnya
        if (isCorrect) {
            Swal.fire({
                icon: 'success',
                title: 'Benar!',
                confirmButtonText: '<a href="{{ route('huruf10') }}" style="color: white; text-decoration: none;">Lanjut</a>'
            });
        } 
        // Jika salah, tampilkan notifikasi kesalahan tanpa batasan jumlah
        else {
            Swal.fire({
                icon: 'error',
                    title: 'Salah!',
                    confirmButtonText: 'OK'

            });
        }
    });
});
    </script>
</body>
</html>
