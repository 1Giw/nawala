<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('skip_validation_rule')) {
    function skip_validation_rule($rules, $skip_key) {
        return array_filter($rules, function($rule) use ($skip_key) {
            return $rule['field'] !== $skip_key;
        });
    }
}
