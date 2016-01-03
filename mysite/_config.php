<?php

global $project;
$project = 'mysite';

global $database;
$database = 'SS_rsa_db';

Object::useCustomClass("Member", "Membership");
//Object::useCustomClass("MemberLoginForm", "MembershipLoginRedirect");

require_once('conf/ConfigureFromEnv.php');

// Set the site locale
i18n::set_locale('en_NZ');

//CountryDropdownField::default_to_locale(false);

CMSMenu::remove_menu_item('CMSPagesController');
CMSMenu::remove_menu_item('AssetAdmin');
CMSMenu::remove_menu_item('ReportAdmin');
