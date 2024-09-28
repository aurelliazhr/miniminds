<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/notifikasi.js"></script>
    <title>Bermain</title>
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
            height: 100%;
            background-color: white;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;

        }

        nav img {
            max-width: 100%;
            max-height: 100%;
            background-color: white;
            margin-top: 5px;
            margin-right: 30%;

        }

        .back {
            background-color: white;
            height: 100%;
        }

        .back img {
            width: 65%;
            height: 45%;
            margin: 20px 10px;
        }

        .container {
            margin: 0 10;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .menebakH,
        .menebakA,
        .menebakHi,
        .menebak,
        .aktivitas,
        .eksplor {
            width: 95%;
            height: 300px;
            border-radius: 10px;
            margin-bottom: 10px;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .text1,
        .text2,
        .text3,
        .text4,
        .text5,
        .text6 {
            background-color: white;
        }

        .text1 img,
        .text2 img,
        .text3 img,
        .text4 img,
        .text5 img,
        .text6 img {
            background-color: white;
            margin-top: 30px;
        }

        @media (min-width: 1024px) {

            nav img {
                margin-right: 45%;
            }

            .back img {
                width: 100%;
                height: 100%;
                margin: 20px 20px;
            }

            .menebakH,
            .menebakA,
            .menebakHi,
            .menebak,
            .aktivitas,
            .eksplor {
                width: 98%;
                height: 245px;
                display: flex;
                flex-direction: row;

            }

            .menebakH img,
            .menebakA img,
            .menebakHi img,
            .menebak img,
            .eksplor img {
                margin-right: 250px;
            }

            .aktivitas img {
                margin-left: 100px;
            }

            .text1 img,
            .text2 img,
            .text4 img,
            .text6 img {
                margin: 0 auto;
            }

            .text3 img {
                margin-right: 50px;
            }

            .text5 img {
                margin-left: 250px;
            }
        }
    </style>
</head>

<body>
    <audio id="audio" autoplay>
        <source src="assets/bermain.mp3" type="audio/mpeg">
    </audio>
    
    <audio src="/assets/background.mp3" autoplay loop></audio>
    
    <nav>
        <div class="back" onclick="back()">
            <img src="assets/Back.png">
        </div>
        <img src="assets/bermain.png" alt="">
    </nav>

    <div class="container">
        <div class="menebakH" onclick="menebakH()">
            <img src="assets/menhu.png" width="175px" height="170px">
            <div class="text1">
                <img src="assets/menebakH.png">
            </div>
        </div>

        <div class="menebakA" onclick="menebakA()">
            <img src="assets/mena.png" width="231px" height="160px">
            <div class="text2">
                <img src="assets/menebakA.png">
            </div>
        </div>

        <div class="menebakHi" onclick="menebakHi()">
            <img src="assets/menhi.png" width="328px" height="160px">
            <div class="text3">
                <img src="assets/menebakHi.png">
            </div>
        </div>

        <div class="menebak" onclick="menebak()">
            <img src="assets/kumen.png" width="223px" height="163px">
            <div class="text4">
                <img src="assets/menebak.png">
            </div>
        </div>

        <div class="aktivitas" onclick="aktivitas()">
            <img src="assets/akkel.png" width="193px" height="164px">
            <div class="text5">
                <img src="assets/aktivitas.png">
            </div>
        </div>

        <div class="eksplor" onclick="eksplor()">
            <img src="assets/eks.png" width="280px" height="173px">
            <div class="text6">
                <img src="assets/eksplor.png">
            </div>
        </div>

    </div>

    <script>
        function back() {
            window.location.href = "{{ route ('home') }}"
        }

        function menebakH() {
            window.location.href = "{{route ('menebakH')}}";
        }

        function menebakA() {
            window.location.href = "{{route ('menebakAngka1')}}";
        }

        function menebakHi() {
            window.location.href = "{{route ('menebakHi')}}";
        }

        function menebak() {
            window.location.href = "{{route ('quiz1')}}";
        }

        function aktivitas() {
            window.location.href = "{{route ('aktivitas')}}";
        }

        function eksplor() {
            window.location.href = "{{route ('eksplor')}}";
        }
    </script>
</body>

</html>