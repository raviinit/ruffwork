<?php

class BunchCam1 {
	public $CapCount;

	public function __construct() {
		$this->CapCount++;
	}
	
	public function iFoundaCap() {
		if ($this->CapCount >= 7) {
                        $this->CapCount = 0;
			return "Now your wish is fulfilled.";
		}
		return $this->CapCount;
	}
}

class BunchCam {
	public $CapCount;

	public function __construct() {
		$this->CapCount++;
	}
	
	public function iFoundaCap() {
		if ($this->CapCount >= 7) {
                        $this->CapCount = 0;
			return "Now your wish is fulfilled.";
		}
		return $this->CapCount;
	}
}

$bunchCam = new BunchCam();
echo $bunchCam->iFoundaCap();
echo "<br/>";
echo $bunchCam->iFoundaCap();
echo "<br/>";
echo $bunchCam->iFoundaCap();
echo "<br/>";
echo $bunchCam->iFoundaCap();
echo "<br/>";
echo $bunchCam->iFoundaCap();
echo "<br/>";
echo $bunchCam->iFoundaCap();
echo "<br/>";
echo $bunchCam->iFoundaCap();
echo "<br/>";
echo $bunchCam->iFoundaCap();
echo "<br/>";

// echo $_SERVER['REMOTE_ADDR'] . '   ' . $_SERVER['REMOTE_HOST'];
echo getenv("REMOTE_ADDR");
echo '<br/>';

$a = '1,2,3,4,5,6,7';
$a = explode(',', $a);

var_dump(array_sum($a));

echo '<br/>';


function test(&$n) {
    $n=$n+10;
}
$m=5;
test($m);
echo $m;


echo '<br/>';
///

function test1(&$n) {
    $n=$n+10;
}
$m=5;
test1($m);
echo $m;


///

