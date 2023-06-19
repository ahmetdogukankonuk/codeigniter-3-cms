<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        // Load the user_agent library
        $this->load->library('user_agent');

        // Get the user's IP address
        $ip_address = $this->input->ip_address();

        // Fetch IP geolocation data
        $geolocation = json_decode(file_get_contents("http://ip-api.com/json/{$ip_address}?fields=countryCode"));

        // Extract the country code from the geolocation data
        $country_code = $geolocation->countryCode ?? "";

        // Check if the user has manually selected a language
        if ($this->session->userdata('lang')) {
            // User has manually selected a language
            $language = $this->session->userdata('lang');
        } else {
            // Set the user's language based on the country code
            if (strtolower($country_code) == "tr") {
                $language = "tr"; // Turkey
            } elseif (strtolower($country_code) == "fr") {
                $language = "fr"; // France
            } elseif (strtolower($country_code) == "ca") {
                $language = "fr"; // Canada
            } elseif (strtolower($country_code) == "be") {
                $language = "fr"; // Belgium
            } elseif (strtolower($country_code) == "ci") {
                $language = "fr"; // Côte d'Ivoire
            } elseif (strtolower($country_code) == "sn") {
                $language = "fr"; // Senegal
            } elseif (strtolower($country_code) == "ml") {
                $language = "fr"; // Mali
            } elseif (strtolower($country_code) == "ga") {
                $language = "fr"; // Gabon
            } elseif (strtolower($country_code) == "cm") {
                $language = "fr"; // Cameroon
            } elseif (strtolower($country_code) == "cd") {
                $language = "fr"; // Democratic Republic of the Congo (Zaire)
            } elseif (strtolower($country_code) == "mg") {
                $language = "fr"; // Madagascar
            } elseif (strtolower($country_code) == "bj") {
                $language = "fr"; // Benin
            } elseif (strtolower($country_code) == "ne") {
                $language = "fr"; // Niger
            } elseif (strtolower($country_code) == "rw") {
                $language = "fr"; // Rwanda
            } elseif (strtolower($country_code) == "ht") {
                $language = "fr"; // Haiti
            } elseif (strtolower($country_code) == "dz") {
                $language = "fr"; // Algeria
            } elseif (strtolower($country_code) == "mr") {
                $language = "fr"; // Mauritania
            } elseif (strtolower($country_code) == "tn") {
                $language = "fr"; // Tunisia
            } elseif (strtolower($country_code) == "lb") {
                $language = "fr"; // Lebanon
            } elseif (strtolower($country_code) == "cn") {
                $language = "zh"; // People's Republic of China
            } elseif (strtolower($country_code) == "tw") {
                $language = "zh"; // Taiwan
            } elseif (strtolower($country_code) == "sg") {
                $language = "zh"; // Singapore
            } elseif (strtolower($country_code) == "my") {
                $language = "zh"; // Malaysia
            } elseif (strtolower($country_code) == "hk") {
                $language = "zh"; // Hong Kong
            } elseif (strtolower($country_code) == "mo") {
                $language = "zh"; // Macao
            } elseif (strtolower($country_code) == "th") {
                $language = "zh"; // Thailand
            } elseif (strtolower($country_code) == "la") {
                $language = "zh"; // Laos
            } elseif (strtolower($country_code) == "mm") {
                $language = "zh"; // Myanmar
            } elseif (strtolower($country_code) == "de") {
                $language = "de"; // Germany
            } elseif (strtolower($country_code) == "at") {
                $language = "de"; // Austria
            } elseif (strtolower($country_code) == "li") {
                $language = "de"; // Liechtenstein
            } elseif (strtolower($country_code) == "eg") {
                $language = "ar"; // Egypt
            } elseif (strtolower($country_code) == "sa") {
                $language = "ar"; // Saudi Arabia
            } elseif (strtolower($country_code) == "ma") {
                $language = "ar"; // Morocco
            } elseif (strtolower($country_code) == "dz") {
                $language = "ar"; // Algeria
            } elseif (strtolower($country_code) == "ae") {
                $language = "ar"; // United Arab Emirates
            } elseif (strtolower($country_code) == "jo") {
                $language = "ar"; // Jordan
            } elseif (strtolower($country_code) == "ir") {
                $language = "fa"; // Iran
            } elseif (strtolower($country_code) == "ru") {
                $language = "ru"; // Russia
            } elseif (strtolower($country_code) == "by") {
                $language = "ru"; // Belarus
            } elseif (strtolower($country_code) == "kz") {
                $language = "ru"; // Kazakhstan
            } elseif (strtolower($country_code) == "kg") {
                $language = "ru"; // Kyrgyzstan
            } elseif (strtolower($country_code) == "uz") {
                $language = "ru"; // Uzbekistan
            } elseif (strtolower($country_code) == "am") {
                $language = "ru"; // Armenia
            } elseif (strtolower($country_code) == "pt") {
                $language = "pt"; // Portugal
            } elseif (strtolower($country_code) == "br") {
                $language = "pt"; // Brazil
            } elseif (strtolower($country_code) == "ao") {
                $language = "pt"; // Angola
            } elseif (strtolower($country_code) == "es") {
                $language = "es"; // Spain
            } elseif (strtolower($country_code) == "mx") {
                $language = "es"; // Mexico
            } elseif (strtolower($country_code) == "co") {
                $language = "es"; // Colombia
            } elseif (strtolower($country_code) == "ar") {
                $language = "es"; // Argentina
            } elseif (strtolower($country_code) == "pe") {
                $language = "es"; // Peru
            } elseif (strtolower($country_code) == "ve") {
                $language = "es"; // Venezuela
            } else {
                $language = "en";
            }
        }

        // Set the language in the session
        $this->session->set_userdata('lang', $language);

        // Load the language file
        $this->lang->load($language, $language);
    }

}