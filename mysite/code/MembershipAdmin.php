<?php
/**
 * Provides CMS Administration of Members
 */
class MembershipAdmin extends ModelAdmin {

    private static $managed_models = array(
        'Membership',
        'MembershipType'
    );

    private static $menu_icon = 'framework/admin/images/menu-icons/16x16/document.png';
//    private static $menu_priority = -0.4;
    private static $menu_title = 'Membership';
    private static $url_segment = 'membership';

    private static $allowed_actions = array(
        'EditForm'
    );

    public function init() {
        parent::init();
    }

}
