<?php

class MembershipType extends DataObject {

	private static $db = array(
		"Title" => "Varchar"
	);

   private static $has_many = array(
      "Memberships" => "Membership"
   );

   private static $summary_fields = array(
      'Title'
   );

}
