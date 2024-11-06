<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/notifikasi.js"></script>
    <title>Halaman Guru</title>
    <style>
        * {
            background-color: #C9C0D5;
        }

        body {
            margin: 0;
            padding: 0;
        }

        nav {
            width: 100%;
            height: 80px;
            background-color: #C9C0D5;
            margin-bottom: 15px;
            display: flex;
            justify-content: flex-start;
            position: fixed;
        }

        nav img {
            max-width: 60%;
            max-height: 60%;
            margin: 10px 15px;
            border-radius: 10px;
        }

        .container {
            margin: 0 10;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .menambah,
        .melihat {
            width: 95%;
            height: 350px;
            border-radius: 10px;
            margin-bottom: 10px;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .menambah {
            margin-top: 80px;
        }

        .menambah h2,
        .melihat h2 {
            color: black;
            font-family: 'Nerko One', cursive;
            font-size: 40px;
            background-color: white;
            text-align: center;
        }

        @media (min-width: 1024px) {

            .menambah,
            .melihat {
                width: 98%;
                height: 245px;
                display: flex;
                flex-direction: row;

            }

            .menambah img,
            .melihat img {
                margin-right: 250px;
                width: 255px;
                height: 230px;
            }
        }
    </style>
</head>

<body>
    <audio src="/assets/backsound.mp3" autoplay loop></audio>

    <nav>
        <img src="assets/Back.png" onclick="back()">
    </nav>

    <div class="container">
        <div class="menambah" onclick="menambah()">
            <img src="assets/menambah.jpg" width="240px" height="182px">
            <h2>Menambah Data <br> Murid</h2>
        </div>

        <div class="melihat" onclick="melihat()">
            <img src="assets/melihat.jpg" width="250px" height="182px">
            <h2>Melihat Data <br> Murid</h2>
        </div>
    </div>

    <script>
        function back() {
            window.location.href = "{{route ('home') }}"
        }

        function menambah() {
            window.location.href = "{{route ('menambah')}}";
        }

        function melihat() {
            window.location.href = "{{route ('melihat')}}";
        }
    </script>
</body>

</html>