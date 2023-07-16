<?php 

function my_plugin_contact_form_api()
    {
        // Get the form data.
        $data = $_POST;

        // Send the form data to the API.
        $response = wp_remote_post('https://mail.sfa.com.ps/api/contact/save', [
            'data' => $data,
        ]);

        // Check the response.
        if (is_wp_error($response)) {
            _e("success");
        } else {
            // Get the data from the API response.
            $api_data = json_decode($response['body']);

            // Respond to the data from the API.
            if ($api_data->success) {
                _e("success");
            } else {
                _e("error");
            }
        }
    }
