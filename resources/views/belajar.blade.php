<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Belajar</title>
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

        .huruf,
        .angka,
        .hijaiyah {
            width: 95%;
            height: 300px;
            border-radius: 10px;
            margin-bottom: 10px;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

        }

        .text1,
        .text2,
        .text3 {
            background-color: white;
        }

        .text1 img,
        .text2 img,
        .text3 img{
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

            .huruf,
            .angka,
            .hijaiyah {
                width: 98%;
                height: 245px;
                display: flex;
                flex-direction: row;

            }

            .huruf img,
            .angka img,
            .hijaiyah img {
                margin-right: 250px;
            }
        }
    </style>
</head>

<body>
    <nav>
        <div class="back" onclick="back()">
            <img src="assets/Back.png">
        </div>
        <img src="assets/belajar.png" alt="">
    </nav>

    <div class="container">
        <div class="huruf" onclick="huruf()">
            <img src="assets/huruf.jpg" width="229px" height="156px">
            <div class="text1">
                <img src="assets/huruf.png">
            </div>
        </div>

        <div class="angka" onclick="angka()">
            <img src="assets/angka.jpg" width="292px" height="150px">
            <div class="text2">
                <img src="assets/angka.png">
            </div>
        </div>

        <div class="hijaiyah" onclick="hijaiyah()">
            <img src="assets/hijaiyah1.jpg" width="280px" height="180px">
            <div class="text3">
                <img src="assets/hijaiyah.png">
            </div>
        </div>
    </div>

    <script>
        function back() {
            window.location.href = "{{ route ('home') }}"
        }
        function huruf() {
            window.location.href = "{{route ('huruf')}}";
        }

        function angka() {
            window.location.href = "{{route ('angka')}}";
        }

        function hijaiyah() {
            window.location.href = "{{route ('hijaiyah')}}";
        }
    </script>
</body>

</html>