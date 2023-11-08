<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .visible {
            display: block;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div id="element1" class="visible">要素1</div>
    <div id="element2" class="hidden">要素2</div>
    <button id="toggle-button">切り替え</button>
    <script>
        const element1 = document.getElementById("element1");
        const element2 = document.getElementById("element2");
        const toggleButton = document.getElementById("toggle-button");

        toggleButton.addEventListener("click", function() {
            if (element1.classList.contains("visible")) {
                element1.classList.remove("visible");
                element1.classList.add("hidden");
                element2.classList.remove("hidden");
                element2.classList.add("visible");
            } else {
                element1.classList.remove("hidden");
                element1.classList.add("visible");
                element2.classList.remove("visible");
                element2.classList.add("hidden");
            }
        });
    </script>
</body>

</html>