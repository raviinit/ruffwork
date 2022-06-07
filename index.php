<?php

/*
	Ramakrishnan CS3:07 PM

		0 0 1 0
		0 0 0 1
		0 1 0 0
		0 0 0 1
		source (0,0)

	Ramakrishnan CS3:08 PM
		des (3,2)

	Ramakrishnan CS3:11 PM

		yourFuntion(arr, s1, s2, d1, d2)

		0 0 1 0
		1 1 0 1
		0 1 0 0
		0 0 0 1

	Ramakrishnan CS3:15 PM
		arr[s1][s2]

	Ramakrishnan CS3:17 PM

		s1 = 0
		s2 = 0
		arr[0][0]
		--> 0
*/
	
	$arr = [[0, 0, 1, 0], 
			[0, 0, 0, 1], 
			[0, 1, 0, 0], 
			[0, 0, 0, 1]];
	
	$s1 = 0;
	$s2 = 0;

	echo $arr[$s1][$s2];
	// directions or movements of pointer: 
	// i.e. we are at $arr[$i][$j]
	// 
	// right > $i, $j++
	// left > $i, $j--
	// top > $i--, $j
	// down > $i++, $j
	
	// Bowndary conditions or Limitations of movements:
	// i.e. we are at $arr[$i][$j]
	// ($i >= count($arr) || $i < 0)  return false;
	// ($j >= count($arr[$i]) || $j < 0)  return false;
	// 
	// ($arr[$i][$j] = 1)  return false;
	// 	
		
	function recFuntion($arr, $i, $j, $d1, $d2) {
		
		if ($i >= count($arr) || $i < 0) return false;
		if ($j >= count($arr[$i]) || $j < 0) return false;
		if ($arr[$i][$j] == 1) return false;
		if ($i == $d1 && $j == $d2) return true; // checking destination point
		
		return  recFuntion($arr, $i, $j+1, $d1, $d2) || // right
				recFuntion($arr, $i, $j-1, $d1, $d2) || // left
				recFuntion($arr, $i-1, $j, $d1, $d2) || // top
				recFuntion($arr, $i+1, $j, $d1, $d2); // down
				
	}


        
        
//  E:\wamp64\bin\php\php7.4.0\php.exe >php
//  
//  
//  where to keep 
//lord ganesha photo
//hanuman, 
//krishna photo, 
//gaja laxmi photo
//chandra yanthra 
//hanuman flying
//wu lu photo 


        
        
        
        
