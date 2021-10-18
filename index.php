<?php
// Налаштування для математичної функції h
const MATH_FUNC_H_ARG_A 			= 8.3; 							// значення агрументу a
const MATH_FUNC_H_ARG_B 			= 6.8; 							// значення агрументу b
const MATH_FUNC_H_ARGS_X			= array(4.26, 7.29);					// значення аргументу x для умов

// Налаштування для математичної функції z
const MATH_FUNC_Z_ARG_A 			= 1.6; 							// значення агрументу a
const MATH_FUNC_Z_ARG_B 			= 14.3; 						// значення агрументу b
const MATH_FUNC_Z_MIN_ARG_RANGE_T 		= 2.75;							// мінімальне значення діапазону для аргументу t
const MATH_FUNC_Z_MAX_ARG_RANGE_T 		= 5.0;							// максимальне значення діапазону для аргументу t
const MATH_FUNC_Z_ITERATIONS_COUNT 		= 9;							// кількість ітерацій параметру t
const MATH_FUNC_Z_RESULT_TEXT 			= "<br>Значення аргументу t - результат функції:<br>";	// Текст результату

f_mathFuncH(MATH_FUNC_H_ARG_A, MATH_FUNC_H_ARG_B, MATH_FUNC_H_ARGS_X);

f_printMathFuncZ();

function f_mathFuncH($argA, $argB, $argsX)
{
	foreach(MATH_FUNC_H_ARGS_X as $argX)
	{
		if($argX <= MATH_FUNC_H_ARG_B)
		{
			echo pow(log10($argA + $argB), 2) * $argB;
			echo "<br>";
		}
		else if(MATH_FUNC_H_ARG_A >= $argX && $argX > $MATH_FUNC_H_ARG_B)
		{
			echo log(pow($argB, 2) + $argA / $argB);
			echo "<br>";
		}
	}
}

function f_mathFuncZ($argA, $argB, $minArgRangeT, $maxArgRangeT, $iterationsCount)
{
	$stepSize = ($maxArgRangeT - $minArgRangeT) / $iterationsCount;
	$argT = $minArgRangeT + $stepSize;
	$results = array(array(2));

	for($i = 0; $i < $iterationsCount; $i++)
	{
		$results[$i][0] = $argT;
		$results[$i][1] = log10(exp($argT - $argA) + pow($argB, $argA)) * $argB / 2;
		$argT += $stepSize;
	}

	return $results;
}

function f_printMathFuncZ()
{
	$results = array(array(2));
	$results = f_mathFuncZ(	MATH_FUNC_Z_ARG_A,
							MATH_FUNC_Z_ARG_B,
							MATH_FUNC_Z_MIN_ARG_RANGE_T,
							MATH_FUNC_Z_MAX_ARG_RANGE_T,
							MATH_FUNC_Z_ITERATIONS_COUNT);
	echo MATH_FUNC_Z_RESULT_TEXT;
	for($i = 0; $i < MATH_FUNC_Z_ITERATIONS_COUNT; $i++)
	{
		echo "[";
		for($j = 0; $j < 2; $j++)
		{
			echo $results[$i][$j];
			if($j == 0)
			{
				echo " - ";
			}
		}
		echo "]<br>";
	}
}
?>
