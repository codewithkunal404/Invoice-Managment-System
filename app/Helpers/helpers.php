<?php

use App\Models\CompanySetting;
use App\Models\EmailTemplate;
use App\Models\NotificationEvent;
use App\Models\TinyMCE;

/**
 * Get company settings globally
 */
if (!function_exists('company')) {
    function company()
    {
        return CompanySetting::first();
    }
}

if (!function_exists('fn_get_tinymce_key')) {
    function fn_get_tinymce_key()
    {
        return TinyMCE::first()->api_key ?? null;
    }
}


if (!function_exists('fn_get_country_code')) {
    function fn_get_country_code()
    {
        $country = json_decode(file_get_contents(base_path('countries.json')), true);
        return $country;
    }
}

if (!function_exists('fn_get_events')) {
    function fn_get_events()
    {
        return NotificationEvent::all();
    }
}
if (!function_exists('fn_get_email_templates')) {
    function fn_get_email_templates()
    {
        return EmailTemplate::all();
    }
}


/**
 * Get company logo full path (PDF + Blade safe)
 */
if (!function_exists('company_logo_path')) {
    function company_logo_path()
    {
        $company = company();

        if (!$company || empty($company->logo)) {
            return null;
        }

        return public_path('storage/' . $company->logo);
    }
}

/**
 * Get company name
 */
if (!function_exists('company_name')) {
    function company_name()
    {
        return company()->name ?? 'Company Name';
    }
}
