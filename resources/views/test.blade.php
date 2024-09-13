<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Test 03</title>

    <style>
        .hidden {
            display: none;
        }
        .soal{
            margin-bottom: 20px;
        }
        .result{margin-top: 20px;}
        .star-img{width: 100px; height: auto;}
    </style>
</head>
<body>
    <h3>test no 03</h3>

    <div id="soal1" class="soal">
        <p>1.bagi kafka tb itu?</p>
        <button onclick="checkAnswer(1, 'A')">A.each others destiny</button>
        <button onclick="checkAnswer(1, 'B')">B.nothing happen between them</button>
        <button onclick="checkAnswer(1, 'C')">C.stranger</button>
    </div>
    <div id="soal2" class="soal hidden">
        <p>2.game fav gw.</p>
        <button onclick="checkAnswer(2, 'A')">A.fortnite</button>
        <button onclick="checkAnswer(2, 'B')">B.minecraft</button>
        <button onclick="checkAnswer(2, 'C')">C.ML</button>
    </div>
    <div id="soal3" class="soal hidden">
        <p>3.what happen in 1918 on vienna?</p>
        <button onclick="checkAnswer(3, 'A')">A.nothing happen</button>
        <button onclick="checkAnswer(3, 'B')">B.doomed nuh uh</button>
        <button onclick="checkAnswer(3, 'C')">C.WAR</button>
    </div>
    <div id="soal4" class="soal hidden">
        <p>4.acheron real name is?</p>
        <button onclick="checkAnswer(4, 'A')">A.raiden bosenmori mei</button>
        <button onclick="checkAnswer(4, 'B')">B.raiden mei</button>
        <button onclick="checkAnswer(4, 'C')">C.mei</button>
    </div>
    <div id="soal5" class="soal hidden">
        <p>5.jumlah stellaron hunter(tidak termasuk elio)</p>
        <button onclick="checkAnswer(5, 'A')">A.3</button>
        <button onclick="checkAnswer(5, 'B')">B.4</button>
        <button onclick="checkAnswer(5, 'C')">C.5</button>
    </div>
    <div id="soal6" class="soal hidden">
        <p>6.my current age rn?</p>
        <button onclick="checkAnswer(6, 'A')">A.18</button>
        <button onclick="checkAnswer(6, 'B')">B.16</button>
        <button onclick="checkAnswer(6, 'C')">C.17</button>
    </div>
    <div id="soal7" class="soal hidden">
        <p>7.rahu came from?</p>
        <button onclick="checkAnswer(7, 'A')">A.FAC??</button>
        <button onclick="checkAnswer(7, 'B')">B.i dont playing ptn</button>
        <button onclick="checkAnswer(7, 'C')">C.idk</button>
    </div>
    <div id="soal8" class="soal hidden">
        <p>8.ultah shalom tgl berapa?</p>
        <button onclick="checkAnswer(8, 'A')">A.13 september</button>
        <button onclick="checkAnswer(8, 'B')">B.19 september</button>
        <button onclick="checkAnswer(8, 'C')">C.6 september</button>
    </div>
    <div id="soal9" class="soal hidden">
        <p>9.timekeper real name?</p>
        <button onclick="checkAnswer(9, 'A')">A.mr.apple</button>
        <button onclick="checkAnswer(9, 'B')">B.regulus</button>
        <button onclick="checkAnswer(9, 'C')">C.vertin</button>
    </div>
    <div id="soal10" class="soal hidden">
        <p>10.gg ga?</p>
        <button onclick="checkAnswer(10, 'A')">A.yes</button>
        <button onclick="checkAnswer(10, 'B')">B.nope</button>
        <button onclick="checkAnswer(10, 'C')">C.perhaps</button>
    </div>

    <div id="result" class="result hidden">
        <h2>SELAMAT KAMU BERHASIL!!</h2>
        <p id="score">Score: 0 poin</p>
        <img id="starImage" class="star-img" src="" alt="Star Image">
    </div>

    <script>
        let currentQuestion = 1;
        let score = 0;
        let level = 1;
        let correctCount = 0;
        let userId = 1;
        let kategori = 'random';

        const correctAnswers = {
            1: 'A',
            2: 'B',
            3: 'C',
            4: 'A',
            5: 'B',
            6: 'C',
            7: 'A',
            8: 'B',
            9: 'C',
            10: 'A'
        };
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        console.log(csrfToken);

        function checkAnswer(soalNumber, answer) {
            if (correctAnswers[soalNumber] === answer) {
                correctCount++;
                if (correctCount % 2 === 0) { // Setiap 2 jawaban benar mendapatkan 10 poin
                    score += 10;
                }
            }

            if (soalNumber < 10) {
                document.getElementById(`soal${soalNumber}`).classList.add('hidden');
                document.getElementById(`soal${soalNumber + 1}`).classList.remove('hidden');
            } else {
                if (soalNumber <10) {
                    nextLevel();
                } else {
                    displayResult();
                }
            }
        }

        function nextLevel() {
            document.getElementById('level${level}').classList.add('hidden');
            level++;
            document.getElementById('level${level}').classList.remove('hidden');
            currentQuestion++;
        }

        function displayResult() {
            console.log(document.getElementById('level10'));  // Harus menampilkan elemen atau null
            document.getElementById('result').classList.remove('hidden');

            let stars = Math.floor(score / 10);
            document.getElementById('score').textContent = `Score: ${score} points`;

            if (stars >= 5){
                fetch('/store-stiker', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ kategori: 'random', stiker: 'random.jpg' })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('stiker berhasil disimpan:', data.message);
                    } else {
                        console.error('gagal menyimpan stiker:', data-message);
                    }
                })
            }

            if (stars > 0 && stars <= 5) {
                document.getElementById('starImage').src = `{{ asset('assets/bintang_${stars}.jpg') }}`;
            } else {
                document.getElementById('starImage').src = ''; // Sembunyikan gambar jika tidak ada bintang
            }
        }
    </script>
</body>
</html>