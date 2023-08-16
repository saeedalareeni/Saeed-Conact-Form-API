<?php
/*
 * Plugin Name:       Saeed Contact Form
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
        add_shortcode("saeed_contact_form", array($this, 'contact_form'));
        add_action('wp_enqueue_scripts', array($this, 'my_custom_script'));
        add_action('wp_enqueue_scripts', array($this, 'my_custom_script'));
    }

    public function contact_form()
    {
        // $action = $this->my_plugin_contact_form_api();

        // Go to main.js file, I made this api sending by axios lib.

        $contact = <<<HEREB
         <form method="POST">
            <input type="hidden"  id="contact_type" value="email" class="form-control">
            <input type="hidden" id="status" value="1" class="form-control">
            <div class="form-group-name">
                <label for="name">Name: </label>
                <input type="text" id="name" class="saeed-form-input">
            </div>
            
            <div class="form-group-mobile">
                <label for="mobile">Mobile: </label>
                <input type="text" id="mobile" class="saeed-form-input">
            </div>

            <div class="form-group-email">
                <label for="email">E-mail: </label>
                <input type="email" id="email" class="saeed-form-input" required>
            </div>

            <button type="button" name="submit" class="saeed-form-btn" id="send" onclick="savee()">Send </button>
        </form>
        
        HEREB;

        return __($contact);

        // You can send the api from main.js file (( I used axios to send api)).

    }

    public function my_custom_script()
    {
        wp_enqueue_script('saeed-contact-axios', "https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js");
        wp_enqueue_script('saeed-contact-sweetalert', "https://cdn.jsdelivr.net/npm/sweetalert2@11");

        wp_enqueue_script('saeed-contact-form-js', plugins_url('main.js', __FILE__));

        wp_enqueue_style('saeed-contact-form-css', plugins_url('style.css', __FILE__));
    }
};

new formPlugin();
