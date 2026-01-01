<?php

use App\Models\CompanySetting;
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
