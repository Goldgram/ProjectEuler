<!-- 
Consider all integer combinations of ab for 2 ≤ a ≤ 5 and 2 ≤ b ≤ 5:
22=4, 23=8, 24=16, 25=32
32=9, 33=27, 34=81, 35=243
42=16, 43=64, 44=256, 45=1024
52=25, 53=125, 54=625, 55=3125
If they are then placed in numerical order, with any repeats removed, we get the following sequence of 15 distinct terms:
4, 8, 9, 16, 25, 27, 32, 64, 81, 125, 243, 256, 625, 1024, 3125
How many distinct terms are in the sequence generated by ab for 2 ≤ a ≤ 100 and 2 ≤ b ≤ 100?
 -->
<?php $startTime = microtime(true);

$bigStr = "=";
for ($i=2; $i <= 100; $i++) { 
	for ($j=2; $j <= 100; $j++) {
		$currentStr = ".".bcpow($i,$j).".";
		if (!strpos($bigStr,$currentStr)) {
			$bigStr .= $currentStr;
		}
	}
}

$answer = substr_count($bigStr,".")/2;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 9183
// Time: 2.76s