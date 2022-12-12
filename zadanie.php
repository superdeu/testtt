<pre>
<?php

$array = array(
	array('id' => 1, 'date' => "12.01.2020", 'name' => "test1"),
	array('id' => 2, 'date' => "02.05.2020", 'name' => "test2"),
	array('id' => 4, 'date' => "08.03.2020", 'name' => "test4"),
	array('id' => 1, 'date' => "22.01.2020", 'name' => "test1"),
	array('id' => 2, 'date' => "11.11.2020", 'name' => "test4"),
	array('id' => 3, 'date' => "06.06.2020", 'name' => "test3")
);

///////////////////////////////----------------------------------------------------///////////////////////////////////////////
///////////////////////////////--------------Задание 1.1---------------------------///////////////////////////////////////////
///////////////////////////////----------------------------------------------------///////////////////////////////////////////
echo "Задание 1.1<br><br>";

function rec($int,$array) {
	static $z = 0;
	static $new_arr;
	$n = array_keys($array[0]);
	if ($int > $z) {
		$new_arr[$array[$z][$n[0]]] = array($n[0] => $array[$z][$n[0]], $n[1] => $array[$z][$n[1]], $n[2] => $array[$z][$n[2]]);
		$z++;
		rec($int,$array);
	}
	return $new_arr;
}

$count = count($array);
$new_arr =  rec($count,$array);
print_r($new_arr);

echo "<hr>";

///////////////////////////////----------------------------------------------------///////////////////////////////////////////
///////////////////////////////--------------Задание 1.2---------------------------///////////////////////////////////////////
///////////////////////////////----------------------------------------------------///////////////////////////////////////////

echo "Задание 1.2<br><br>";

$sort_arr = $array;
$keys = array_column($sort_arr, 'name'); // тут просто прописывем нужное поле для сортировки, дату сортирует как строку.
$new = array_multisort($keys, SORT_ASC, $sort_arr);
print_r($sort_arr);

echo "<hr>";

///////////////////////////////----------------------------------------------------///////////////////////////////////////////
///////////////////////////////--------------Задание 1.3---------------------------///////////////////////////////////////////
///////////////////////////////----------------------------------------------------///////////////////////////////////////////

echo "Задание 1.3<br><br>";

function rec_find_id($int,$array,$id) {
	static $z = 0;
	static $new_arr;
	$n = array_keys($array[0]);
	if ($int > $z) {
		if ($id == $array[$z][$n[0]]) {
			$new_arr[] = array($n[0] => $array[$z][$n[0]], $n[1] => $array[$z][$n[1]], $n[2] => $array[$z][$n[2]]);
		}
		$z++;
		rec_find_id($int,$array,$id);
	}
	return $new_arr;
}

$count = count($array);
$new_arr =  rec_find_id($count,$array,1); // тут указываем нужный ид
print_r($new_arr);

echo "<hr>";

///////////////////////////////----------------------------------------------------///////////////////////////////////////////
///////////////////////////////--------------Задание 1.4---------------------------///////////////////////////////////////////
///////////////////////////////----------------------------------------------------///////////////////////////////////////////


echo "Задание 1.4<br><br>";

function rec_zamena($int,$array) {
	static $z = 0;
	static $new_arr;
	$n = array_keys($array[0]);
	if ($int > $z) {
		$new_key = preg_replace('/\d/', '', $array[$z][$n[2]]).$array[$z][$n[0]];
		$new_arr[$array[$z][$n[0]]] = array($new_key => $array[$z][$n[0]], $n[1] => $array[$z][$n[1]], $n[2] => $array[$z][$n[2]]);
		$z++;
		rec_zamena($int,$array);
	}
	return $new_arr;
}

$count = count($array);
$new_arr =  rec_zamena($count,$array);
print_r($new_arr);

echo "<hr>";

///////////////////////////////----------------------------------------------------///////////////////////////////////////////
///////////////////////////////--------------Задание 1.5---------------------------///////////////////////////////////////////
///////////////////////////////----------------------------------------------------///////////////////////////////////////////

echo "Задание 1.5<br><br>";

echo 'SELECT g.id, g.name FROM goods AS g LEFT JOIN goods_tags tg on g.id = tg.goods_id GROUP BY g.id, g.name HAVING COUNT(tg.tag_id)';

echo "<hr>";


///////////////////////////////----------------------------------------------------///////////////////////////////////////////
///////////////////////////////--------------Задание 1.6---------------------------///////////////////////////////////////////
///////////////////////////////----------------------------------------------------///////////////////////////////////////////

echo "Задание 1.6<br><br>";

echo 'SELECT department_id FROM `evaluations` WHERE gender > 0 AND value > 5';

echo "<hr>";





?>








































