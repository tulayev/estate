<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class GalleryUrl implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (is_null($value) || trim($value) === '') {
            return; // Allow null or empty string
        }

        // Split the string by semicolon
        $urls = explode(';', $value);

        // Validate each URL
        foreach ($urls as $url) {
            if (!filter_var(trim($url), FILTER_VALIDATE_URL)) {
                $fail("The {$attribute} must be null or a semicolon-separated list of valid URLs.");
                return;
            }
        }
    }
}
