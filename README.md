# php-codes

#find available slots among booked slots
//Initial available slots
$freeSlots = array(
    array("start"=>"06:00AM","end"=>"11:00AM"),
    array("start"=>"11:00AM","end"=>"03:00PM"),
    array("start"=>"04:00PM","end"=>"9:00PM"),
);

//Booked Slots
$bookedSlots = array(
    array("start"=>"07:00AM","end"=>"08:00AM"),
    array("start"=>"08:30AM","end"=>"11:00AM"),
    array("start"=>"11:00AM","end"=>"01:00PM"),
    array("start"=>"01:00PM","end"=>"04:00PM"),
);
