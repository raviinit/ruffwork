<?php
interface ifaceVisited {
	
}

class userEntered {
	public $rfid; // rfid tag
	public $myStalls;	// rfid reader

	public function userExited() 
        {
            // $this->rfid - assume user is visited
            return true;
	}

	public function userVisited() {
            if (userExited($this->rfid))
            {
                // sudo code 
                // data table contain stall ids, user's rfids 
                $stallDetails = StallDetails::select({'mystallid', 'userrfid', ?}, $myStallIds)->toArray();
                $userVisitedMyStall = array_values($stallDetails);
                return in_array($this->rfid, $userVisitedMyStall);
            }
	}



}










