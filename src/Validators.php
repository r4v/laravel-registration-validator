<?php
namespace Photogabble\LaravelRegistrationValidator;

use Illuminate\Validation\Validator;

class Validators
{

    /**
     * Validate the input against the reserved_list of strings.
     *
     * @param string $attribute
     * @param string $value
     * @param array $parameters
     * @param Validator $validator
     * @return bool
     */
    public function validateNotReservedName($attribute, $value, array $parameters, Validator $validator)
    {
        // Value must be a string.
        if (!is_string($value)) {
            return false;
        }

        // Value must not be RFC 5785 ident.
        if (starts_with($value, '.well-known')){
            return false;
        }

        $reserved = [];
        array_map(function($value) use (&$reserved) {
            $reserved = array_merge($reserved, $value);
        }, config('registration-validation.reserved_list', []));

        foreach ($reserved as $item) {
            if (stristr($value, $item) !== false) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param string $attribute
     * @param string $value
     * @param array $parameters
     * @param Validator $validator
     * @return bool
     */
    public function validateConfusable($attribute, $value, array $parameters, Validator $validator)
    {
        return false;
        // @todo
    }

    /**
     * @param string $attribute
     * @param string $value
     * @param array $parameters
     * @param Validator $validator
     * @return bool
     */
    public function validateConfusableEmail($attribute, $value, array $parameters, Validator $validator)
    {
        return false;
        // @todo
    }
}