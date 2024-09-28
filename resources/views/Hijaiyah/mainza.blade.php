<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://fonts.googleapis.com/css?family=Lexend" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Lemon&display=swap" rel="stylesheet"/>
    <title>Tebak Huruf</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Lexend', sans-serif;
            background-color: #f5f5f5;
            background-image: url('../assets/background.jpg');
            background-size: cover;
        }

        .Kotak {
            position: relative;
            top: 55px;
            background: white;
            margin: 1rem auto;
            padding: 30px;
            width: 75%;
            height: 455px;
            max-width: 340px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .Header {
            display: flex;
            align-items: center;
            padding: 5px;
            gap: 15px;
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
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .Pilihan {
            position: relative; top: 50px;
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
            width: 135px;
            height: 160px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .Pilihan img:hover {
            transform: scale(1.1);
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
            <a id="kembaliButton" href="10.html">
                <img src="../assets/angle-left.png" alt="Kembali" />
            </a>
        </div>

        <div class="Text">
            <p>Yang manakah huruf za?</p> <!-- Question as text -->
        </div>

        <div class="Pilihan">
            <div class="row">
                <img src="../assets/zai.jpg " alt="Alif" data-correct="true" />
                <img src="../assets/sin.jpg" alt="Ba" data-correct="false" />
            </div>
            <div class="row">
                <img src="../assets/sod.jpg" alt="Ta" data-correct="false" /> 
            </div>
        </div>
    </div>

    <script>
      let wrongAttempts = 0;

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

// Fungsi untuk memutar audio soal dan menurunkan volume backsound
function playAudio(audioSrc) {
    const audio = new Audio(audioSrc);

    // Turunkan volume backsound menjadi 40% (0.4)
    backgroundAudio.volume = 0.4;

    // Putar audio soal
    audio.play();

    // Mengembalikan volume backsound ke 100% setelah audio soal selesai
    audio.addEventListener('ended', () => {
        backgroundAudio.volume = 1.0;
    });
}

// Putar audio soal saat halaman dimulai
window.onload = () => {
    playAudio('../assets/za.mp3');
};

// Event listener untuk tombol kembali
const kembaliButton = document.getElementById('kembaliButton');
if (kembaliButton) { // Pastikan elemen ada
    kembaliButton.addEventListener('click', function() {
        history.back();
    });
}

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
                text: 'Ini adalah huruf zai!',
                confirmButtonText: '<a href="12.html" style="color: white; text-decoration: none;">Lanjut</a>'
            });
        } 
        // Jika salah, tambahkan jumlah kesalahan dan tangani feedback
        else {
            wrongAttempts++;
            if (wrongAttempts >= 2) {
                Swal.fire({
                    icon: 'error',
                    title: 'Salah!',
                    text: 'Anda sudah salah 2 kali, mengulang ke halaman awal.',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = '1.html'; // Redirect ke halaman awal setelah 2 kesalahan
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Salah!',
                    text: 'Ini bukan huruf zai, silahkan coba lagi!',
                    confirmButtonText: 'OK'
                });
            }
        }
    });
});


    </script>
</body>
</html>
