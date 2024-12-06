// Inisialisasi variabel dengan nilai dari localStorage, atau gunakan 0 jika tidak ada
let score = parseInt(localStorage.getItem('score')) || 0;
let stars = 0;
const userId = 1;
const kategori = 'huruf';
const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');


document.addEventListener("DOMContentLoaded", function() {
    updateScoreDisplay();
    updateStars();
});

function checkAnswer(element) {
    // Periksa apakah elemen yang diklik memiliki atribut data-correct
    if (!element) {
        console.error("Elemen yang diklik tidak ditemukan.");
        return;
    }

    // Mendapatkan nilai data-correct dan mengonversinya menjadi boolean
    const isCorrect = element.getAttribute('data-correct') === 'true';

    // Debugging tambahan untuk memeriksa hasil data-correct
    console.log("Atribut 'data-correct' pada elemen:", element.getAttribute('data-correct'));
    console.log("Jawaban yang dipilih:", element.alt, "Benar:", isCorrect);

    if (isCorrect) {
        console.log("Jawaban benar!");
        addPoints();
    } else {
        console.log("Jawaban salah.");
    }
}

// Fungsi untuk menambah poin
function addPoints() {
    score += 5; // Tambah 5 poin setiap jawaban benar
    localStorage.setItem('score', score);
    updateScoreDisplay();
    console.log("Poin setelah penambahan:", score);

    updateStars();
    // Perbarui tampilan skor di halaman
    //document.getElementById('scoreDisplay').textContent = `Score: ${score}`;
}

function updateScoreDisplay(){
    const scoreElement = document.getElementById('scoreDisplay');
    if (scoreElement) {
        scoreElement.textContent = 'Score: ${score}';
    } else {
        console.warn("elemen scoreDisplay tdk ditemukan.");
    }
}

function updateStars(){
    stars = Math.min(Math.floor(score / 10), 5);
    console.log("jumlah bintang berdasarkan score:", stars);

    localStorage.setItem('stars', stars);

    const starImageElement = document.getElementById('starImage');
    if (starImageElement){
        starImageElement.src = `/assets/bintang_${stars}.jpg`;
        console.log("ganti gambar bintang:", starImageElement.src);
    } else {
        starImageElement.src = '';
        console.log("tidak ada bintang");
    }

    if (stars === 5){
        giveStiker();
    }
    
}

function giveStiker(){
    if (stars >= 5){
        fetch('/store-stiker', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ kategori: 'huruf', stiker: 'huruf.jpg' })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('stiker berhasil disimpan:', data.message);
            } else {
                console.error('gagal menyimpan stiker:', data.message);
            }
        })
    }
}

function resetScore() {
    score = 0;
    stars = 0;
    localStorage.setItem('score', score); // Simpan skor yang di-reset ke localStorage
    localStorage.setItem('stars', stars);
    updateScoreDisplay();
    updateStars();
}