<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Home</title>
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
            background-color: #684D8C;
            margin-bottom: 15px;
            display: flex;
            justify-content: flex-end;
        }

        nav img {
            max-width: 100%;
            max-height: 100%;
        }

        nav ul {
            list-style: none;
            background-color: #684D8C;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        nav li {
            height: 50px;
        }

        nav a {
            height: 100%;
            background-color: #684D8C;
            padding: 0 30px;
            text-decoration: none;
            display: flex;
            align-items: center;
            color: white;
        }

        nav a img {
            background-color: #684D8C;
            height: 50px;
        }

        nav a:hover {
            text-decoration: underline;
            cursor: pointer;
        }

        .sidebar {
            position: fixed;
            top: 0;
            right: 0;
            height: 100vh;
            width: 200px;
            background-color: white;
            display: none;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
        }

        .sidebar li {
            width: 100%;
        }

        .sidebar a {
            width: 100%;
            background-color: white;
            color: black;
        }

        i {
            font-size: 50px;
            color: black;
            background-color: white;
        }

        .menu-button {
            display: none;
        }

        .container {
            margin: 0 10;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .belajar,
        .bermain {
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

        .belajar img,
        .bermain img {
            margin-top: 5px;
        }

        .belajar h2,
        .bermain h2 {
            color: #EC27E4;
            font-family: 'Nerko One', cursive;
            font-size: 40px;
            background-color: white;
        }

        @media (min-width: 1024px) {
            nav ul {
                margin-right: 75px;
                margin-left: 500px;
            }

            .belajar,
            .bermain {
                width: 98%;
                height: 245px;
                display: flex;
                flex-direction: row;

            }

            .belajar img,
            .bermain img {
                margin-right: 250px;
            }
        }

        @media (max-width: 800px) {
            .hideOnMobile {
                display: none;
            }

            .menu-button {
                display: block;
            }
        }
    </style>
</head>

<body>
    <nav>
        <img src="assets/minimind.png">

        <ul class="sidebar">
            <li onclick=hideSidebar()><a href="#"><i class="fa-solid fa-xmark"></i></a></li>
            <li><a href="">Profil</a></li>
            <li><a href="">Data Murid</a></li>
            <li><a href="{{ route ('login') }}">Logout</a></li>
        </ul>

        <ul>
            <li class="hideOnMobile"><a href="">Profil</a></li>
            <li class="hideOnMobile"><a href="">Data Murid</a></li>
            <li class="hideOnMobile"><a href="{{ route ('login') }}">Logout</a></li>
            <li class="menu-button" onclick=showSidebar()><a href="#"><img src="assets/menu.png"></a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="belajar" onclick="belajar()">
            <img src="assets/belajar.jpg" width="246px" height="216px">
            <h2>BELAJAR</h2>
        </div>

        <div class="bermain" onclick="bermain()">
            <img src="assets/bermain.jpg" width="289px" height="238px">
            <h2>BERMAIN</h2>
        </div>
    </div>

    <script>
        function belajar() {
            window.location.href = "{{route ('belajar')}}";
        }

        function bermain() {
            window.location.href = "{{route ('bermain')}}";
        }

        function showSidebar() {
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'flex'
        }

        function hideSidebar() {
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'none'
        }
    </script>
</body>

</html>