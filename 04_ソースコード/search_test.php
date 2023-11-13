<!DOCTYPE html>
<html>
<head>
    <title>検索サイト</title>
</head>
<body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    const searchForm = document.getElementById("search-form");
    const searchInput = document.getElementById("search-input");
    searchInput.addEventListener("keyup", function(event) {
        if (event.key === "Enter") {
            searchForm.submit();
        }
    });
});
</script>
    <form id="search-form" action="search_text2.php" method="GET">
        <input type="text" id="search-input" name="q" placeholder="検索キーワードを入力">
    </form>
</body>
</html>