<p><a href="index.php?ctrl=<?php echo $ctrl; ?>&act=All&id=<?php echo $item->id; ?>">На главную</a></p>
<h3><?php echo $item->title; ?></h3>
<p><?php echo $item->text; ?></p>
<a href="index.php?ctrl=Admin&act=Del&id=<?php echo $item->id; ?>"><?php echo $del; ?></a>


