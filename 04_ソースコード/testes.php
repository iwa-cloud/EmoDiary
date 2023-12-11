<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>テスト</title>
</head>
<body>
<button onclick="showElement('element1')">要素1を表示</button>
<button onclick="showElement('element2')">要素2を表示</button>
<button onclick="showElement('element3')">要素3を表示</button>

<div id="element1" class="element">要素1の内容</div>
<div id="element2" class="element" style="display: none;">要素2の内容</div>
<div id="element3" class="element" style="display: none;">要素3の内容</div>
<script>
function showElement(elementId) {
    let elements = document.getElementsByClassName('element');
    for (let i = 0; i < elements.length; i++) {
        elements[i].style.display = 'none';
    }
    document.getElementById(elementId).style.display = 'block';
}
</script>
</body>
</html>