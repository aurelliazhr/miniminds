<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drawing App 🎨</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        html, body {
            height: 100%;
            width: 100%;
            overflow: hidden;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .main-container {
            display: flex;
            flex-grow: 1;
            height: calc(100vh - 50px); /* Canvas will take remaining space except the footer */
        }

        /* Sidebar styling */
        .nav {
            width: 100px;
            background: linear-gradient(to bottom, #4568DC, #B06AB3);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px 0;
            gap: 20px;
        }

        .clr {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            border: 2px solid white;
            transition: transform .3s;
            cursor: pointer;
        }

        .clr:hover {
            transform: scale(1.2);
        }

        button {
            border: none;
            outline: none;
            padding: .6em 1em;
            border-radius: 3px;
            background-color: #03bb56;
            color: #fff;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
            width: 80px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .save {
            background-color: #0f65d4;
        }

        input[type="color"] {
            margin-bottom: 10px;
            width: 80%;
        }

        .canvas-container {
            flex-grow: 1;
            position: relative;
            height: 100%;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        canvas {
            border: 1px solid #ccc;
            width: 100%;
            height: 100%;
            cursor: crosshair;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #4568DC;
            padding: 10px 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50px;
        }

        input[type="range"] {
            width: 80%;
            margin: 0 10px;
        }

        output {
            color: white;
            font-size: 16px;
            margin-left: 10px;
        }

        @media screen and (max-width: 768px) {
            .nav {
                width: 80px;
            }

            .clr {
                width: 30px;
                height: 30px;
            }

            button {
                font-size: 9px;
            }
        }
    </style>
</head>
<body>

    <div class="main-container">
        <div class="nav">
            <!-- Colors for drawing -->
            <div class="clr" style="background-color: #000;" data-clr="#000"></div>
            <div class="clr" style="background-color: red;" data-clr="red"></div>
            <div class="clr" style="background-color: orange;" data-clr="orange"></div>
            <div class="clr" style="background-color: blue;" data-clr="blue"></div>
            <div class="clr" style="background-color: purple;" data-clr="purple"></div>
            <div class="clr" style="background-color: yellowgreen;" data-clr="yellowgreen"></div>
            <div class="clr" style="background-color: yellow;" data-clr="yellow"></div>
            <div class="clr" style="background-color: white;" data-clr="#fff"></div>

            <!-- Color picker to change canvas background color -->
            <input type="color" id="favcolor" value="#FFFFFF">

            <!-- Action buttons -->
            <button class="clear">Bersihkan</button>
            <button class="save">Simpan</button>
        </div>

        <div class="canvas-container">
            <canvas id="canvas"></canvas>
        </div>
    </div>

    <div class="footer">
        <input type="range" name="ageInputName" id="ageInputId" value="5" min="1" max="10" oninput="ageOutputId.value = ageInputId.value">
        <output id="ageOutputId">5</output>
    </div>

    <script>
        const canvas = document.getElementById("canvas");
        const canvasContainer = document.querySelector('.canvas-container');
        const ctx = canvas.getContext("2d");

        // Set canvas size based on container size
        function resizeCanvas() {
            canvas.width = canvasContainer.clientWidth;
            canvas.height = canvasContainer.clientHeight;

            // Fill the canvas with the current background color
            ctx.fillStyle = canvas.style.backgroundColor || '#FFFFFF';
            ctx.fillRect(0, 0, canvas.width, canvas.height);
        }

        resizeCanvas(); // Call on load
        window.addEventListener("resize", resizeCanvas); // Resize canvas on window resize

        let drawingColor = '#000000'; // Default drawing color
        let lineWidth = 5;
        let prevX = null;
        let prevY = null;
        let draw = false;

        // Set up color picking
        const colors = document.querySelectorAll(".clr");
        colors.forEach(clr => {
            clr.addEventListener("click", () => {
                drawingColor = clr.dataset.clr; // Update drawing color
                ctx.strokeStyle = drawingColor; // Set stroke color
            });
        });

        // Change canvas background color
        const colorInput = document.getElementById("favcolor");
        colorInput.addEventListener("input", function() {
            canvas.style.backgroundColor = colorInput.value; // Change canvas background color
            resizeCanvas(); // Resize canvas to apply new background color
        }, false);

        // Set line width from range input
        document.getElementById("ageInputId").oninput = function() {
            lineWidth = this.value;
            document.getElementById("ageOutputId").innerHTML = lineWidth;
            ctx.lineWidth = lineWidth;
        };

        // Clear button functionality
        const clearBtn = document.querySelector(".clear");
        clearBtn.addEventListener("click", () => {
            Swal.fire({
                title: 'Anda yakin?',
                text: "Ini akan membersihkan seluruh gambar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!'
            }).then((result) => {
                if (result.isConfirmed) {
                    ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear canvas
                    canvas.style.backgroundColor = '#FFFFFF'; // Reset to white background
                    resizeCanvas(); // Resize canvas after clearing
                    Swal.fire(
                        'Dibersihkan!',
                        'Gambar telah dihapus.',
                        'success'
                    );
                }
            });
        });

        // Save button functionality
        const saveBtn = document.querySelector(".save");
        saveBtn.addEventListener("click", () => {
            const dataURL = canvas.toDataURL("image/png");
            const a = document.createElement("a");
            a.href = dataURL;
            a.download = "sketch.png";
            a.click();

            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Gambar telah disimpan.'
            });
        });

        // Mouse event listeners for drawing
        window.addEventListener("mousedown", (e) => {
            draw = true;
            prevX = e.clientX - canvas.getBoundingClientRect().left; // Get mouse position relative to canvas
            prevY = e.clientY - canvas.getBoundingClientRect().top; // Get mouse position relative to canvas
        });

        window.addEventListener("mouseup", () => draw = false);

        window.addEventListener("mousemove", (e) => {
            if (!draw) return;

            let currentX = e.clientX - canvas.getBoundingClientRect().left; // Get mouse position relative to canvas
            let currentY = e.clientY - canvas.getBoundingClientRect().top; // Get mouse position relative to canvas

            ctx.lineWidth = lineWidth;
            ctx.lineCap = "round";
            ctx.strokeStyle = drawingColor;

            if (prevX == null || prevY == null) {
                prevX = currentX;
                prevY = currentY;
            }

            ctx.beginPath();
            ctx.moveTo(prevX, prevY);
            ctx.lineTo(currentX, currentY);
            ctx.stroke();

            prevX = currentX;
            prevY = currentY;
        });
    </script>

</body>
</html>
