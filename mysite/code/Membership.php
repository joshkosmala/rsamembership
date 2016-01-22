<?php

class Membership extends Member {

	private static $db = array(
		'HomePhone' => 'Varchar',
		'MobilePhone' => 'Varchar',
		'MembershipCardNumber' => 'Varchar',
		'DOB' => 'Date',
		'StreetAddress1'  => 'Varchar(255)',
		'StreetAddress2'  => 'Varchar',
		'PostOfficeBox' => 'Varchar',
		'Suburb'  => 'Varchar',
		'City'  => 'Varchar',
		'PostCode' => 'Varchar',
		'Country' => 'Varchar',
		'PostOnly' => 'Boolean',
		'Expiry' => 'Date',
		'OldMembershipType' => 'Varchar'
	);

	private static $has_one = array(
		'MembershipType' => 'MembershipType',
		'ProfileImage' => 'Image'
	);

	private static $default_to_locale = false;
	private static $default_country = 'NZ';

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeByName('Password');
		$fields->removeByName('LastVisited');
		$fields->removeByName('Locale');
		$fields->removeByName('DirectGroups');
		$fields->removeByName('DateFormat');
		$fields->removeByName('TimeFormat');
		$fields->removeByName('FailedLoginCount');
		$fields->addFieldToTab('Root.Main', new TextField('StreetAddress1', 'Street Address 1'), 'StreetAddress2');
		$fields->addFieldToTab('Root.Main', new TextField('StreetAddress2', 'Street Address 2'), 'PostOfficeBox');
		$fields->addFieldToTab('Root.Main', new TextField('PostOfficeBox', 'Post Office Box Number'), 'Suburb');
		$fields->addFieldToTab('Root.Main', new TextField('PostCode', 'Post Code'), 'Country');
		$fields->addFieldToTab('Root.Main', new CountryDropdownField('Country'), 'PostOnly');
		$fields->addFieldToTab('Root.Main', new CheckboxField('PostOnly', 'Post only (no email)'), 'MembershipTypeID');
		return $fields;
	}



}
