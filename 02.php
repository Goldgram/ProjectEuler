<!-- 
Each new term in the Fibonacci sequence is generated by adding the previous two terms. By starting with 1 and 2, the first 10 terms will be:
1, 2, 3, 5, 8, 13, 21, 34, 55, 89, ...
By considering the terms in the Fibonacci sequence whose values do not exceed four million, find the sum of the even-valued terms.
 -->
<?php $startTime = microtime(true);

$a = 1;
$b = 2;
$total = 0;
while ($a <= 4000000) {
	if ($a%2==0) { $total += $a; }
	$b = $a + $b;
	$a = $b - $a;
}

$answer = $total;
$endTime = microtime(true);
echo 'Answer: ',$answer,'<br>Time: ',($endTime - $startTime);
?>