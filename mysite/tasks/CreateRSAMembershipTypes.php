<?php
class CreateRSAMembershipTypes extends BuildTask {

    protected $title = 'Create Membership Types';

    protected $description = 'Populates the database with the default membership types';

    //protected $enabled = true;

    function run($request) {
      // list the different membership types
        $types = array(
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
        );

        foreach($types as $type){
           $t = MembershipType::create();
           $t->Title = $type;
           $t->write();
        }

        echo "Membership types created.";

    }
}
