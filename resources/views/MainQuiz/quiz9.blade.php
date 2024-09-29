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
            text-align: center;
            font-family: "Lexend", sans-serif;
            margin-bottom: 20px;
            font-size: 18px;
        }

        .Objek {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
        }

        .Objek img {
            max-width: 65%;
            height: auto;
            border-radius: 10px;
        }

        .Pilihan {
            display: flex;
            gap: 20px;
            text-align: center;
            justify-items: center;
        }

        .Pilihan .option {
            height: 60px;
            width: 140px;
            /* border: none; */
            border-radius: 10px;
            font-family: "Lemon", sans-serif;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }


        .option[data-color="blue"] {
            background-color: rgba(238, 231, 53, 1);
            color: black;
        }

        .option[data-color="red"] {
            background-color: rgba(53, 238, 161, 1);
            color: black;
        }


        .option:hover {
            opacity: 0.8;
        }

        .Next a:hover {
            background-color: rgb(41, 106, 183); /* Warna saat di-hover */
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
            <a id="kembaliButton" href="quiz9.html">
                <img src="../assets/angle-left.png" alt="Kembali" />
            </a>
        </div>

        <div class="Text">
            <p>ada berapakah jumlah pensil ini?</p>
        </div>

        <div class="Objek">
            <img src="../assets/pencil.jpg" alt="Pensil" />
        </div>

        <div class="Pilihan">
            <button class="option" data-color="blue" data-audio="../assets/4.mp3">4</button>
            <button class="option" data-color="red" data-audio="../assets/5.mp3">5</button>
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
    backgroundAudio.volume = 0.1;  // Kurangi volume backsound saat audio lain diputar
    audio.play();

    // Kembalikan volume backsound setelah audio lain selesai diputar
    audio.onended = () => {
        backgroundAudio.volume = 1.0;  // Kembalikan volume backsound
    };
}

// Putar audio soal saat halaman dimulai
window.onload = () => {
    playAudio('../assets/soal9quiz.mp3');
};

// Event listener untuk tombol kembali
const kembaliButton = document.getElementById('kembaliButton');
kembaliButton.addEventListener('click', function() {
    history.back();
});

// Event listener untuk pilihan jawaban
const pilihanButtons = document.querySelectorAll('.option');
pilihanButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        const audio = new Audio(button.getAttribute('data-audio'));
        backgroundAudio.volume = 0.1;  // Kurangi volume backsound saat jawaban dipilih
        audio.play();

        const selectedColor = button.getAttribute('data-color');

        audio.onended = () => {
            backgroundAudio.volume = 1.0;  // Kembalikan volume backsound setelah suara pilihan selesai

            // Tampilkan notifikasi setelah audio berakhir
            if (selectedColor === 'red') {
                Swal.fire({
                    icon: 'error',
                    title: 'Salah!',
                    text: 'salah pensil ini tidak berjumlah 5',
                    confirmButtonText: 'OK'
                });
            } else if (selectedColor === 'blue') {
                Swal.fire({
                    icon: 'success',
                    title: 'Benar!',
                    text: 'benar! pensil ini berjumlah 4',
                    confirmButtonText: '<a href="quiz10.html" style="color: white; text-decoration: none;">Lanjut</a>'
                });
            }
        };
    });
});

    </script>
</body>
</html>
