<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Murid</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            background-color: #D9D9D9;
        }

        nav {
            background-color: white;
            width: 100%;
            height: 80px;
            display: flex;
            flex-direction: row;
        }

        nav a {
            background-color: white;
        }

        nav a img {
            background-color: white;
            margin-left: 15px;
            margin-top: 25px;
            width: 42px;
            height: 32px;
        }

        .logo {
            background-color: white;
            flex-grow: 1;
            display: flex;
            justify-content: center;
        }

        .logo img {
            width: 70%;
            height: 80%;
            background-color: white;
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #D9D9D9;
            font-size: 25px;
        }

        .isi img {
            width: 50px;
            height: 50px;
            background-color: white;
            border-radius: 50%;
        }

        @media (max-width: 800px) {
            nav img {
                margin-top: 15px;
                width: 50px;
                height: 40px;
            }

            .logo img {
                width: 100%;
            }

        }
    </style>
</head>

<body>
    <nav>
        <a class="back" href="{{ route('melihat') }}">
            <img src="/assets/Back.png" alt="Back">
        </a>

        <div class="logo">
            <img src="assets/miniminds.png">
        </div>
    </nav>

    <table>
        <tr>
            <th>Nama</th>
            <th>Pencapaian</th>
        </tr>

        <tr class="isi">
            <th>Aurellia Az-Zahra</th>
            <th>
                <img src="" alt="">
                <img src="" alt="">
                <img src="" alt="">
                <div class="baris2">
                    <img src="" alt="">
                    <img src="" alt="">
                    <a href="{{ route ('catatan')}}">
                        <img src="assets/tambah.png">
                    </a>
                </div>
            </th>
        </tr>
    </table>
</body>

</html>