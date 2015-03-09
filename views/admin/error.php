<!DOCTYPE html>
<html>
<head>
    <title>Ошибка</title>
    <meta charset="utf-8">
</head>
<body>
    <h2><?php echo $error->code_answer; ?></h2>

    <h2><?php echo 0 != $error->getCode(); ?></h2>
    <p><?php echo $error->getMessage(); ?></p>
    <p><?php echo $error->errorInfo; ?></p>

    <a href="index.php?ctrl=News&act=All">Вернуться на сайт</a>
</body>