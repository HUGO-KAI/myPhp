<?php

/**
 * Retourner un formulaire pas encore fini
 * 
 */
class Form {
    public static $class = "form-control";
    public static function checkbox (string $name, string $value = null, array $data = []):string {
        $attributes = '';
        if (isset($data[$name]) && in_array($value, $data[$name])) {
            $attributes .= 'checked';
        }
        return <<<HTML
        <input type="checkbox" name="{$name}[]" value="$value" $attributes>
HTML;
    }
}