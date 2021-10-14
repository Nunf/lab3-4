<?php
// Налаштування для математичної функції h
const MATH_FUNC_H_ARG_A 			= 4.26; 		// значення агрументу a
const MATH_FUNC_H_ARG_B 			= 7.29; 		// значення агрументу b
const MATH_FUNC_H_COND_ARG_A 		= 8.3;				// значення агрументу a в умові
const MATH_FUNC_H_COND_ARG_B 		= 6.8;				// значення агрументу b в умові
const MATH_FUNC_H_RESULT_TEXT 		= "Математична функція h є ";	// Текст результату
const MATH_FUNC_H_RESULT_TRUE_TEXT 	= "дійсною";			// Текст результату дійсності
const MATH_FUNC_H_RESULT_FALSE_TEXT = "не дійсною<br>";			// Текст результату не дійстності

// Налаштування для математичної функції z
const MATH_FUNC_Z_ARG_A 			= 1.6; 						// значення агрументу a
const MATH_FUNC_Z_ARG_B 			= 14.3; 					// значення агрументу b
const MATH_FUNC_Z_MIN_ARG_RANGE_T 	= 2.75;							// мінімальне значення діапазону для аргументу t
const MATH_FUNC_Z_MAX_ARG_RANGE_T 	= 5.0;							// максимальне значення діапазону для аргументу t
const MATH_FUNC_Z_ITERATIONS_COUNT 	= 9;							// кількість ітерацій параметру t
const MATH_FUNC_Z_RESULT_TEXT 		= "Значення аргументу t - результат функції:<br>";	// Текст результату

echo MATH_FUNC_H_RESULT_TEXT . (f_mathFuncH(	MATH_FUNC_H_ARG_A,
						MATH_FUNC_H_ARG_B,
						MATH_FUNC_H_COND_ARG_A,
						MATH_FUNC_H_COND_ARG_B) ? 	MATH_FUNC_H_RESULT_TRUE_TEXT :
										MATH_FUNC_H_RESULT_FALSE_TEXT);

f_printMathFuncZ();

function f_mathFuncH($argA, $argB, $condArgA, $condArgB)
{
	$results = array(2);

	$results[0] = log($argA + $argB, 2) * $argB;
	$results[1] = log(pow($argB, 2) + $argA / $argB);

	if($results[0] <= $condArgB)
	{
		if($condArgA >= results[1] && results[1] > $condArgB)
		{
			return true;
		}
	}

	return false;
}

function f_mathFuncZ($argA, $argB, $minArgRangeT, $maxArgRangeT, $iterationsCount)
{
	$stepSize = ($maxArgRangeT - $minArgRangeT) / $iterationsCount;
	$argT = $minArgRangeT;
	$results = array(array(2));

	for($i = 0; $i < $iterationsCount; $i++)
	{
		$results[$i][0] = $argT;
		$results[$i][1] = log(exp($argT - $argA) + pow($argB, $argA)) * $argB / 2;
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
