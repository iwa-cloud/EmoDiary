<!DOCTYPE html>
<html>
<head>
    <title>選択要素の一覧</title>
    <style>
.custom-dropdown {
    position: relative;
    display: inline-block;
    margin-right: 50px;
}

.dropdown-toggle {
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    padding: 5px 10px;
    cursor: pointer;
}

.dropdown-list {
    width: 100px;
    display: none;
    position: absolute;
    border: 1px solid #ccc;
    background-color: #fff;
    list-style: none;
    margin: 0;
    padding: 0;
}

.dropdown-list li {
    padding: 5px;
    display: flex;
    align-items: center;
}

.delete_btn {
    margin-left: auto;
    background-color: #ff0000;
    color: #fff;
    border: none;
    cursor: pointer;
}

.add-button {
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    padding: 5px 10px;
    cursor: pointer;
}

.custom-list {
    width: 100px;
    display: none;
    position: absolute;
    border: 1px solid #ccc;
    background-color: #fff;
    list-style: none;
    margin: 0;
    padding: 0;
}

.custom-list li {
    padding: 5px;
    display: flex;
    align-items: center;
}

.add-item-button {
    margin-left: auto;
    background-color: #00cc00;
    color: #fff;
    border: none;
    cursor: pointer;
}



    </style>
</head>
<body>

<div class="custom-dropdown">
    <button class="dropdown-toggle" id="dropdown-btn">選択</button>
    <ul class="dropdown-list" id="dropdown-list">
        <li>項目1 <button class="delete_btn">削除</button></li>
        <li>項目2 <button class="delete_btn">削除</button></li>
        <li>項目3 <button class="delete_btn">削除</button></li>
    </ul>
</div>

<div class="custom-dropdown">
    <button class="add-button" id="add-button">追加</button>
    <ul class="custom-list" id="item-list">
        <li>項目1 <button class="add-item-button">追加</button></li>
        <li>項目2 <button class="add-item-button">追加</button></li>
        <li>項目3 <button class="add-item-button">追加</button></li>
    </ul>
</div>

<script>

let dropdownToggle = document.getElementById("dropdown-btn");
let dropdownList = document.getElementById("dropdown-list");

dropdownToggle.addEventListener("click", function () {
    dropdownList.style.display = dropdownList.style.display === "block" ? "none" : "block";
});

let deleteButtons = document.querySelectorAll(".delete_btn");
deleteButtons.forEach((button) => {
    button.addEventListener("click", function () {
        let listItem = this.parentElement;
        listItem.parentNode.removeChild(listItem);
    });
});

let addButton = document.getElementById("add-button");
let itemList = document.getElementById("item-list");

addButton.addEventListener("click", function () {
    itemList.style.display = itemList.style.display === "block" ? "none" : "block";
});

let addButtons = document.querySelectorAll(".add-item-button");

addButtons.forEach((button) => {
    button.addEventListener("click", function () {
        let newItem = document.createElement("li");
        newItem.innerHTML = '新しい項目 <button class="delete_btn">削除</button>';
        dropdownList.appendChild(newItem);
    });
});


</script>
</body>
</html>
