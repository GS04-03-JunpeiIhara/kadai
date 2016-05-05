<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>送信結果</title>
</head>

<body>
    <h1>送信しました</h1>

    <?php
        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $date = date('Y年m月d日 H:i:s');

        if ($name == '') {
            $name = '未入力';
        }
        if ($mail == '') {
            $mail = '未入力';
        }
        if ($age == '') {
            $age = '未入力';
        }
        if ($sex == '') {
            $sex = '未入力';
        }

        $array = array($name, $mail, $age, $sex, $date);
        $file = fopen('./data/data.csv', 'a');
        flock($file, LOCK_EX); //ファイルをロック
        fputcsv($file, $array); //ファイルに書き込み
        flock($file, LOCK_UN); //ファイルをロック解除
        fclose($file); //ファイルを閉じる
        ?>
        <main>
            ご入力ありがとうございました。
            <br>
            <a href="input_data.html">戻る</a>
            <br>
            <a href="output_data.html">アンケート結果</a>
        </main>
</body>

</html>