<?php
/**
 * Overriding the base login form to redirect somewhere useful,
 * in this case to the site index
 */
class MembershipLoginRedirect extends MemberLoginForm {
    public function dologin($data) {
        parent::dologin($data);

            $this->controller->response->removeHeader('Location');
            Director::redirect(Director::baseURL() . "assets/membership");

    }
}
