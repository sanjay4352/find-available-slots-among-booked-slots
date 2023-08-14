<?php
//Initial available slots
$freeSlots = array(
    array("start"=>"06:00AM","end"=>"11:00AM"),
    array("start"=>"11:00AM","end"=>"03:00PM"),
    array("start"=>"04:00PM","end"=>"9:00PM"),
);

function intersectTimeslots($fslts, $bkslts,$ndate)
{
   
    $freeSlot=[];

    for($j=0;$j<count($fslts);$j++){
$x1 = strtotime($ndate." ".$fslts[$j]["start"]);//slot
$x2 = strtotime($ndate." ".$fslts[$j]["end"]);
$x3 = strtotime($ndate." ".$bkslts["start"]);//slot
$x4 = strtotime($ndate." ".$bkslts["end"]);


        $n1 = $x3 - $x1;
        $n2 = $x4 - $x2;

        if($x3<$x2 && $x4<$x1){
            $freeSlot[] = array("start"=>date("h:iA",$x1),"end"=>date("h:iA",$x2),"c"=>"c00");

        }else if($x2<$x3 && $x2<$x4){
            $freeSlot[] = array("start"=>date("h:iA",$x1),"end"=>date("h:iA",$x2),"c"=>"c0");
        }else{



            if($n1>=0 && $n2>=0){

                $freeSlot[] = array("start"=>date("h:iA",$x1),"end"=>date("h:iA",$x3),"c"=>"c1");

            }else if($n1>=0 && $n2<=0){
                  $freeSlot[] = array("start"=>date("h:iA",$x1),"end"=>date("h:iA",$x3),"c"=>"c2");
                    $freeSlot[] = array("start"=>date("h:iA",$x4),"end"=>date("h:iA",$x2),"c"=>"c2");

            }else if($n1<=0 && $n2>=0){


            }else if($n1<=0 && $n2<=0){
 $freeSlot[] = array("start"=>date("h:iA",$x4),"end"=>date("h:iA",$x2),"c"=>"c4");
            }

}

}

return $freeSlot;
}


//Booked Slots
$bookedSlots = array(
    array("start"=>"07:00AM","end"=>"08:00AM"),
    array("start"=>"08:30AM","end"=>"11:00AM"),
    array("start"=>"11:00AM","end"=>"01:00PM"),
    array("start"=>"01:00PM","end"=>"04:00PM"),
);

$ndate = date("Y-m-d");
foreach ($bookedSlots as $bkslot) {
$freeSlots = intersectTimeslots($freeSlots, $bkslot,$ndate);
}


foreach($freeSlots as $fs){

    echo $fs["start"]." - ".$fs["end"]."\n";
}



?>
