<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>アンケート入力</title>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
</head>

<body>
    <h1>アンケート入力</h1>
    <main>
        <form id="q1" class="questionnaire" method="post" action="fputs.php">
            「*」は必須入力項目。
            <fieldset>
                <legend>あなたの情報</legend>
                <p class="required"><span class="itemName">名前 *</span>

                    <span class="itemBody"><input class="answer required" type="text" name="name" size="20" title="お名前を入力してください。" required></span>
                </p>
                <p class="required"><span class="itemName">E-mail *</span>
                    <span class="itemBody"><input class="answer required" type="email" name="mail" size="20" title="E-mailアドレスを入力してください。" required pattern="^\S+@\S+\.\S+$"></span>
                </p>
                <p><span class="itemName">年齢</span>
                    <span class="itemBody"><input class="answer" type="number" name="age" min="0"></span>
                </p>
                <p><span class="itemName">性別</span>
                    <label class="radio">
                        <input type="radio" name="sex" value="男性" checked />男性</label>
                    <label class="radio">
                        <input type="radio" name="sex" value="女性" />女性</label>
                </p>
            </fieldset>
            <p id="submit">
                <input class="inactive" type="submit" value="送信">
            </p>
        </form>
    </main>
    <a href="output_data.html">アンケート結果</a>
</body>

</html>