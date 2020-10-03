<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ユーザー管理ページ</title>
    <style>
        section {
            margin-bottom: 20px;
            border-top: solid 1px;
        }

        table {
            width: 660px;
            border-collapse: collapse;
        }

        table,
        tr,
        th,
        td {
            border: solid 1px;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>ユーザー管理ページ</h1>
    <section>
        <div><a href="https://niko1105.github.io/bash-ec-portfolio/controller/admin.php">商品管理ページ</a></div>
    </section>
    <section>
        <h2>ユーザー情報一覧</h2>
        <table>
            <tr>
                <th>ユーザー名</th>
                <th>登録日時</th>
            </tr>
            <?php if (count($users) > 0) { ?>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?php print $user['name']; ?></td>
                        <td><?php print $user['created']; ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </table>
    </section>
</body>

</html>