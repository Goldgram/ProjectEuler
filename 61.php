<!-- 
Triangle, square, pentagonal, hexagonal, heptagonal, and octagonal numbers are all figurate (polygonal) numbers and are generated by the following formulae:
Triangle	 	P3,n=n(n+1)/2	 	1, 3, 6, 10, 15, ...
Square	 	P4,n=n2	 	1, 4, 9, 16, 25, ...
Pentagonal	 	P5,n=n(3n−1)/2	 	1, 5, 12, 22, 35, ...
Hexagonal	 	P6,n=n(2n−1)	 	1, 6, 15, 28, 45, ...
Heptagonal	 	P7,n=n(5n−3)/2	 	1, 7, 18, 34, 55, ...
Octagonal	 	P8,n=n(3n−2)	 	1, 8, 21, 40, 65, ...
The ordered set of three 4-digit numbers: 8128, 2882, 8281, has three interesting properties.
The set is cyclic, in that the last two digits of each number is the first two digits of the next number (including the last number with the first).
Each polygonal type: triangle (P3,127=8128), square (P4,91=8281), and pentagonal (P5,44=2882), is represented by a different number in the set.
This is the only set of 4-digit numbers with this property.
Find the sum of the only ordered set of six cyclic 4-digit numbers for which each polygonal type: triangle, square, pentagonal, hexagonal, heptagonal, and octagonal, is represented by a different number in the set.
-->
<?php $startTime = microtime(true);

function isPolygon($numOfSides,$inputNum){
	$number = (sqrt((((8*$numOfSides)-16)*$inputNum)+(($numOfSides-4)*($numOfSides-4)))+$numOfSides-4)/((2*$numOfSides)-4);
	if (floor($number) == $number)
	{
		return true;
	}
	return false;
}
function isMultiplePolygon($inputNum) {
	for ($i=3; $i <= 8; $i++) { 
		if (isPolygon($i,$inputNum)) {
			return true;
		}
	}
	return false;
}
function isOneOfEachPolygon($resultArray) {
	foreach ($resultArray as $key0 => $value0) {
		if (isPolygon(8,$value0)) {
			unset($resultArray[$key0]);
			foreach ($resultArray as $key1 => $value1) {
				if (isPolygon(7,$value1)) {
					unset($resultArray[$key1]);
					foreach ($resultArray as $key2 => $value2) {
						if (isPolygon(6,$value2)) {
							unset($resultArray[$key2]);
							foreach ($resultArray as $key3 => $value3) {
								if (isPolygon(5,$value3)) {
									unset($resultArray[$key3]);
									foreach ($resultArray as $key4 => $value4) {
										if (isPolygon(4,$value4)) {
											unset($resultArray[$key4]);
											foreach ($resultArray as $key5 => $value5) {
												if (isPolygon(3,$value5)) {
													return true;
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
	return false;
}
$resultSum = 0;
for ($a=11; $a <= 99; $a++) {
	for ($b=11; $b <= 99; $b++) {
		$val1 = intval($a.$b);
		if (isMultiplePolygon($val1)) {
			for ($c=11; $c <= 99; $c++) {
				$val2 = intval($b.$c);
				if (isMultiplePolygon($val2)) {
					for ($d=11; $d <= 99; $d++) {
						$val3 = intval($c.$d);
						if (isMultiplePolygon($val3)) {
							for ($e=11; $e <= 99; $e++) {
								$val4 = intval($d.$e);
								if (isMultiplePolygon($val4)) {
									for ($f=11; $f <= 99; $f++) {
										$val5 = intval($e.$f);
										$val6 = intval($f.$a);
										if (isMultiplePolygon($val5)
											&& isMultiplePolygon($val6)
											) {
											if (isOneOfEachPolygon(array($val1,$val2,$val3,$val4,$val5,$val6))
												) {
												$resultSum = $val1 + $val2 + $val3 + $val4 + $val5 + $val6;
												break 6;
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
}

$answer = $resultSum;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// nswer: 28684
// Time: 0.35s