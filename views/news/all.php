<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css" style="text/css">
    <title>Загрузить статью</title>
</head>
<body>
<a href="index.php?ctrl=Admin&act=All&id=<?php echo $item->id; ?>">Администрирование</a>
<a href="index.php?ctrl=<?php echo $ctrl; ?>&act=Edit&id=<?php echo $item->id;?>" ><?php echo ' '.$inf; ?></a>
<a href="index.php?ctrl=<?php echo $ctrl; ?>&act=Errors&id=<?php echo $item->id;?>" ><?php echo ' '.$errors; ?></a>

<?php foreach ($items as $item): ?>
    <h3><?php echo $item->title; ?></h3>
    <p><?php echo $item->text; ?></p>
    <a href="index.php?ctrl=<?php echo $ctrl; ?>&act=<?php echo $act;?>&id=<?php echo $item->id;?>" >Читать далее...</a>
    <a href="index.php?ctrl=<?php echo $ctrl; ?>&act=Edit&id=<?php echo $item->id;?>" ><?php echo $edit; ?></a>
<?php endforeach; ?>
</body>
</html>