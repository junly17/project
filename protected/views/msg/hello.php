<?php
$this->breadcrumbs=array(
	'Msg'=>array('msg/index'),
	'Hello',
);?>
<h1><?php echo $msg ?></h1>

<p><?php echo $sender?></p>

<?php
date_default_timezone_set('Asia/Bangkok');
$my_t=getdate(date("U"));
print("$my_t[weekday], $my_t[month] $my_t[mday], $my_t[year], $my_t[hours]:$my_t[minutes]:$my_t[seconds]");
echo '<br>';
$weekday = date("w D");
$day = date("Y-m-d");
$time = date("H:i:s");
echo '<br>';echo $weekday;
echo '<br>';echo $day;
echo '<br>';echo $time;
?>