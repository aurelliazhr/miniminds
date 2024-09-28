<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://fonts.googleapis.com/css?family=Lexend" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Lemon&display=swap" rel="stylesheet"/>
    <title>Permainan Kuis</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Lexend', sans-serif;
            background-color: #f5f5f5;
        }

        .Kotak {
            position: relative; top: 120px;
            background: white;
            margin: 1rem auto;
            padding: 30px;
            height: 300px;
            width: 75%;
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
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: "Lexend", sans-serif;
            margin-bottom: 20px;
            font-size: 18px;
        }

        .Text p {
            margin-right: 10px;
        }

        .volume-icon {
            cursor: pointer;
        }

        .Pilihan {
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
            <a id="kembaliButton" href="quiz7.html">
                <img src="../assets/angle-left.png" alt="Kembali" />
            </a>
        </div>

        <div class="Text">
            <p>Yang manakah bentuk segitiga?</p>
            <!-- Volume icon to play question audio -->
            <img src="../assets/volume.png" alt="Volume" class="volume-icon" width="24px" height="24px" />
        </div>

        <div class="Pilihan">
            <div class="row">
                <img src="../assets/segi5.jpg" alt="Alif" data-correct="false" />
                <img src="../assets/segi3.jpg" alt="Ba" data-correct="true" />
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

    // Fungsi untuk memutar audio soal
    function playAudio(audioSrc) {
        const audio = new Audio(audioSrc);
        backgroundAudio.volume = 0.1;  // Kurangi volume backsound saat audio soal diputar
        audio.play();

        // Kembalikan volume backsound setelah audio soal selesai diputar
        audio.onended = () => {
            backgroundAudio.volume = 1.0;  // Kembalikan volume backsound
        };
    }

    // Putar audio soal saat halaman dimuat
    window.onload = () => {
        playAudio('../assets/soal8quiz.mp3');
    };

    // Tambahkan event listener pada icon volume untuk memutar ulang audio soal
    const volumeIcon = document.querySelector('.volume-icon');
    volumeIcon.addEventListener('click', () => {
        playAudio('../assets/soal8quiz.mp3');
    });

    // Event listener untuk tombol kembali
    const kembaliButton = document.getElementById('kembaliButton');
    kembaliButton.addEventListener('click', function() {
        history.back();
    });

    // Event listener untuk pilihan jawaban
    const pilihanImages = document.querySelectorAll('.Pilihan img');
    pilihanImages.forEach(function(img) {
        img.addEventListener('click', function() {
            const isCorrect = img.getAttribute('data-correct') === 'true';

            if (isCorrect) {
                Swal.fire({
                    icon: 'success',
                    title: 'Benar!',
                    text: 'ini adalah segitiga',
                    confirmButtonText: '<a href="quiz9.html" style="color: white; text-decoration: none;">Lanjut</a>'
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Salah!',
                    text: 'Ini adalah segilima, silakan coba lagi!',
                    confirmButtonText: 'OK'
                });
            }
        });
    });

    </script>
</body>
</html>
