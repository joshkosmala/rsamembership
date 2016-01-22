<?php
class ReinstateMembershipTypes extends BuildTask {

    protected $title = 'Reinstate Membership Types';

    protected $description = 'Populates the database with the default membership types';

    //protected $enabled = true;

    function run($request) {
      // list the different membership types
        /*$types = array(
           'Associate',
           'Returned',
           'Returned Senior',
           'Returned Life',
           'Service',
           'Service Senior',
           'Service Life',
           'Honorary',
           'Honorary Life',
           'Associate Senior',
           'Service 90+',
           'Returned 90+',
           'Associate 90+'
        );*/

	$members = Member::get();

        foreach($members as $member){
	$type = $member->OldMembershipType;
	if($type){
	//	Debug::show($type);die();
//	$group = MembershipType::get()->filter(array('Title'=>$type))->first();
//	if($group){
	$member->MembershipType = $type;
//	$member->add($group);
	//Debug::show($type);
//Debug::show($group);
//die();		
$member->write();
//}
	}
	
          // $t = MembershipType::create();
           //$t->Title = $type;
           //$t->write();
        }

        echo "Membership types reinstated.";

    }
}
