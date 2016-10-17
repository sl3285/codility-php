<?php

/***********************************************************************/
/*                        Task description 

A binary gap within a positive integer N is any maximal sequence of consecutive zeros that is surrounded by ones at both ends in the binary representation of N.

For example, number 9 has binary representation 1001 and contains a binary gap of length 2. The number 529 has binary representation 1000010001 and contains two binary gaps: one of length 4 and one of length 3. The number 20 has binary representation 10100 and contains one binary gap of length 1. The number 15 has binary representation 1111 and has no binary gaps.

Write a function:
	function solution($N);
that, given a positive integer N, returns the length of its longest binary gap. The function should return 0 if N doesn't contain a binary gap.

For example, given N = 1041 the function should return 5, because N has binary representation 10000010001 and so its longest binary gap is of length 5.

Assume that:
	N is an integer within the range [1..2,147,483,647].
	
Complexity:
	expected worst-case time complexity is O(log(N));
	expected worst-case space complexity is O(1).

Copyright 2009–2016 by Codility Limited. All Rights Reserved. Unauthorized copying, publication or disclosure prohibited. 

/* 1st submit: https://codility.com/demo/results/trainingDCX4JA-Y4V/   */
/* 2nd submit: https://codility.com/demo/results/training5EZ9T8-NZQ/   */
/***********************************************************************/

function solution($N) {
    $binary=decbin($N);
    $strb= (string)$binary;
    $len=strlen($strb);
    $arrayb=array();
    $gap=array();
    $g=0;
    for($i=0; $i <= $len-1; $i++){
        array_push($arrayb,$strb[$i]);
    }
    
    for($k=0; $k <= $len-1; $k++){
        if($arrayb[$len-$k-1]==1){
            for($j=$k+1; $j <= $len; $j++){
                if($arrayb[$len-$j]==0){
                    $g++;
                } else if ($arrayb[$len-$j]==1){
                    array_push($gap,$g);
                    $g=0;
                }
            }
        }
    }
    $value = max($gap);
    return (int)$value;   
}
