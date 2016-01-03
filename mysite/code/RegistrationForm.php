<?php

class RegistrationForm extends Page {

	
}
class RegistrationForm_Controller extends Page_Controller {
	

	
	function registration_fields() {
		return new FieldSet(
			//List of fields
			new TextField("FirstName", "First name"),
			new TextField("Surname", "Last name"),
			new TextField("UserName", "User name"),
			new DropdownField("Gender","Gender",array(" " => " ","Male" => "Male","Female" => "Female"),$value = " "),
			new SimpleImageField("Avatar", "Upload profile image"),
			new EmailField("Email", "Email address"),
			new ConfirmedPasswordField("Password", "Password"),
			new TextField("Address", "Address"),
			new TextField("Suburb", "Suburb"),
			new TextField("City", "City"),
			new DateField("DateOfBirth", "Date of birth"),
			new PhoneNumberField("HomePhone", "Home phone"),
			new PhoneNumberField("MobilePhone", "Mobile phone"),
			new CheckboxField("TermsAndConditions", "I agree to the <a href=\"terms-and-conditions\">terms and conditions</a>")
		);
	}
	
	function editable_fields() {
		return new FieldSet(
			//List of fields
			new TextField("FirstName", "First name"),
			new TextField("Surname", "Last name"),
			new TextField("UserName", "User name"),
			new SimpleImageField("Avatar", "Upload profile image"),
			new EmailField("Email", "Email address"),
			new TextField("Address", "Address"),
			new TextField("Suburb", "Suburb"),
			new TextField("City", "City"),
			new PhoneNumberField("HomePhone", "Home phone"),
			new PhoneNumberField("MobilePhone", "Mobile phone")
			);
	}
	
	function required_fields() {
		return new RequiredFields(array(
			"FirstName", "Surname", "UserName", "Gender", "Email", "Password", "Address", "Suburb", "City", "MobilePhone", "TermsAndConditions"
		));
	}
	// Registration Form (Database Schema edited in sapphire/security/member.php)
	function Form() {
		$action = new FieldSet(
			new FormAction("register", "Register")
		);
		return new Form($this, "Form", $this->registration_fields(), $action, $this->required_fields()); 
	}
	function register($data, $form){
		// Create a new Member object and load the form data into it
		$member = new Member();
		$form->saveInto($member);
		
		// Write it to the database
		$member->write();
		
		// Add the member to a group
		if($group = DataObject::get_one('Group', "Code = 'registered-users'")){
			$member->Groups()->add($group);
		}
		
		// Redirect to Thank You page
		Director::redirect('registration-successful/');
	}
	
	function edit() {
		if($member = Member::currentUser()) {
			$form = $this->EditForm();
			$form->loadDataFrom($member);
			return array(
				'Form' => $form
			);
		} else {
			Director::redirect('Security/login/');
		}
	}
	
	function EditForm() {
		$action = new FieldSet(
			new FormAction('doEditForm', 'Edit')
		);
		return new Form($this, 'EditForm', $this->editable_fields(), $action, $this->required_fields());
	}
	
	function doEditForm($data, $form) {
		$member = Member::currentUser();
		$form->saveInto($member);
		$member->write();
		
		Director::redirect('registration-edit-successful/');
	}
	
}

?>