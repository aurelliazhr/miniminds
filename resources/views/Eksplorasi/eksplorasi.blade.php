<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drawing App 🎨</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/notifikasi.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            overflow: hidden;
            font-family: Arial, Helvetica, sans-serif;
        }

        .nav {
            width: auto;
            height: 50px;
            position: fixed;
            top: 1%;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            justify-content: space-around;
            transition: opacity .5s;
            background: linear-gradient(to right, #4568DC, #B06AB3);
            padding: 10px;
            border-radius: 10px;
            border: 3px solid white;
        }

        img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .nav div,
        button,
        input {
            margin: 5px;
        }

        .nav:hover {
            cursor: pointer;
        }

        buttton:hover {
            cursor: pointer;
        }

        .clr {
            height: 35px;
            width: 35px;
            background-color: blue;
            border-radius: 50%;
            border: 3px solid white;
            transition: transform .5s;
        }

        .clr:hover {
            transform: scale(1.2);
        }

        .clr:nth-child(1) {
            background-color: #000;
        }

        .clr:nth-child(2) {
            background-color: red;
        }

        .clr:nth-child(3) {
            background-color: orange;
        }

        .clr:nth-child(4) {
            background-color: blue;
        }

        .clr:nth-child(5) {
            background-color: purple;
        }

        .clr:nth-child(6) {
            background-color: yellowgreen;
        }

        .clr:nth-child(7) {
            background-color: yellow;
        }

        .clr:nth-child(8) {
            background-color: #fff;
        }

        button {
            border: none;
            outline: none;
            padding: .6em 1em;
            border-radius: 3px;
            background-color: #03bb56;
            color: #fff;
            border: 3px solid white;
            font-size: 15px;
            font-weight: bold;
        }

        .save {
            background-color: #0f65d4;
        }

        input[type="color"] {
            width: 60px;
            height: 40px;
        }

        #ageOutputId {
            color: white;
            font-weight: bold;
            font-size: 15pt;
        }

        #ageInputId {
            background: linear-gradient(to right, #000428 0%, #004e92 100%);
            height: 7px;
            outline: none;
            /* -webkit-appearance: none; */
            cursor: ew-resize;
            border-radius: 5px;
            border: 3px solid white;
            accent-color: white;
        }

        .emoji {
            font-size: 40px;
            padding-bottom: 10px;
        }
    </style>
</head>

<body>
    <canvas id="canvas"></canvas>
    <div class="nav">
        <div class="clr" data-clr="#000"></div>
        <div class="clr" data-clr="red"></div>
        <div class="clr" data-clr="orange"></div>
        <div class="clr" data-clr="blue"></div>
        <div class="clr" data-clr="purple"></div>
        <div class="clr" data-clr="yellowgreen"></div>
        <div class="clr" data-clr="yellow"></div>
        <div class="clr" data-clr="#fff"></div>
        <button class="clear">Bersihkan</button>
        <button class="save">Simpan</button>
        <input type="color" id="favcolor" value="#FFFFFF">
        <input type="range" name="ageInputName" id="ageInputId" value="5" min="1" max="10" oninput="ageOutputId.value = ageInputId.value">
        <output id="ageOutputId">5</output>
        <div class="emoji">🎨</div>
    </div>

    <script>
        const canvas = document.getElementById("canvas")
        const body = document.querySelector('body');
        canvas.height = window.innerHeight
        canvas.width = window.innerWidth
        var theColor = '';
        var lineW = 5;
        let prevX = null
        let prevY = null
        let draw = false

        body.style.backgroundColor = "#FFFFFF";
        var theInput = document.getElementById("favcolor");

        theInput.addEventListener("input", function() {
            theColor = theInput.value;
            body.style.backgroundColor = theColor;
        }, false);

        const ctx = canvas.getContext("2d")
        ctx.lineWidth = lineW;

        document.getElementById("ageInputId").oninput = function() {
            draw = null
            lineW = document.getElementById("ageInputId").value;
            document.getElementById("ageOutputId").innerHTML = lineW;
            ctx.lineWidth = lineW;
        };

        let clrs = document.querySelectorAll(".clr")
        clrs = Array.from(clrs)
        clrs.forEach(clr => {
            clr.addEventListener("click", () => {
                ctx.strokeStyle = clr.dataset.clr
            })
        })

        let clearBtn = document.querySelector(".clear")
        clearBtn.addEventListener("click", () => {
            ctx.clearRect(0, 0, canvas.width, canvas.height)
        })

        let saveBtn = document.querySelector(".save")
        saveBtn.addEventListener("click", () => {
            let data = canvas.toDataURL("imag/png")
            let a = document.createElement("a")
            a.href = data
            a.download = "sketch.png"
            a.click()
        })

        window.addEventListener("mousedown", (e) => draw = true)
        window.addEventListener("mouseup", (e) => draw = false)

        window.addEventListener("mousemove", (e) => {
            if (prevX == null || prevY == null || !draw) {
                prevX = e.clientX
                prevY = e.clientY
                return
            }

            let currentX = e.clientX
            let currentY = e.clientY

            ctx.beginPath()
            ctx.moveTo(prevX, prevY)
            ctx.lineTo(currentX, currentY)
            ctx.stroke()

            prevX = currentX
            prevY = currentY
        })
    </script>
</body>

</html>