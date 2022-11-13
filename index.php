<?php
echo '<h3>Москалик Василь, СП-41 (4.11.2022)</h3>';
echo '<br>';
echo '<img src="Screenshot_2.png"/>';

echo '<form action="" method="post">
    <input type="text" name="text" placeholder="Введіть текст:" >
    <input type="submit" name="submit" value="Виконати">
</from>';
$regexp="%[a-zа-я]%";
$str=$_POST["text"];
if(preg_match_all($regexp,$str)){
    $fp=fopen("file_1.txt","w+");
    fwrite($fp,$str);
    fclose($fp);

    $readFile=fopen("file_1.txt","r");
    $textFile=fgets($readFile);
    fclose($readFile);
    $max = "";
    $arr = explode(" ", $textFile);
    for ($i=0; $i<count($arr); $i++) {
        if(strlen($arr[$i]) > strlen($max)){

            $max = $arr[$i];
        }
    }
    echo "<div><br>Найдовше слово у файлі: $max<br></div>";
     $maxWordCount=substr_count($textFile,$max);
    echo "<div><br>Це слово зустрічається $maxWordCount рази<br></div>";
    }
else
    echo "Потрібно вводить тільки букви!!";
?>
