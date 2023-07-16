<?php
/*
 * Plugin Name:       SFA Contact Form
 * Plugin URI:        https://pallancer.com.ps/
 * Description:       This plugin send the data to custom api
 * Version:           1.0.0
 * Requires at least: 5.2 wordpress version
 * Requires PHP:      7.2
 * Author:            Saeed al-areeni
 * Author URI:        https://github.com/saeedalareeni
 */

class formPlugin
{
    public function __construct()
    {
        add_shortcode("sfa_contact_form", array($this, 'contact_form'));
        add_action('wp_ajax_my_plugin_contact_form_api', array($this, 'my_plugin_contact_form_api'));


        // $response = wp_remote_get('https://mail.sfa.com.ps/api/contact/save');

        // if (is_wp_error($response)) {
        //     _e("this is error");
        // } else {
        //     _e("Success");
        // }

        // =======================> Another way to try <=========================== 

    }

    public function contact_form()
    {
        $action = plugin_dir_path('') . 'my_plugin_contact_form_api.php';

        $contact = <<<HEREA
         <form method="POST" action="$action" >
            <input type="hidden" name="contact_type" value="email" class="form-control">
            <input type="hidden" name="status" value="1" class="form-control">

            <label for="name">Name: </label>
            <input type="text" name="name" class="sfa-form-input" id="name">
            <br />

            <label for="mobile">Mobile: </label>
            <input type="text" name="mobile" class="sfa-form-input" id="mobile">
            <br />

            <label for="email">E-mail: </label>
            <input type="email" name="email" class="sfa-form-input" required id="email">
            <br />

            <input type="submit" name="submit" class="sfa-form-btn">
        </form>
        HEREA;

        // $http = new WP_Http();
        // echo $response = $http->get('https://mail.sfa.com.ps/api/contact/save');
       


        return __($contact);
    }

    
};

new formPlugin();
