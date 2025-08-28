<?php

class Input
{
    public static function trim($value)
    {
        return is_string($value) ? trim($value) : $value;
    }

    public static function sanitize($value)
    {
        return filter_var(self::trim($value), FILTER_SANITIZE_STRING);
    }

    public static function validate($value, $type = 'string')
    {
        $value = self::trim($value);
        if ($value === null || $value === '') {
            return [false, 'Required'];
        }

        switch ($type) {
            case 'email':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    return [false, 'Invalid email'];
                }
                break;
            case 'int':
                if (filter_var($value, FILTER_VALIDATE_INT) === false) {
                    return [false, 'Invalid integer'];
                }
                break;
            case 'date':
                $d = \DateTime::createFromFormat('Y-m-d', $value);
                if (!$d || $d->format('Y-m-d') !== $value) {
                    return [false, 'Invalid date'];
                }
                break;
            case 'string':
            default:
                // no extra validation
        }

        return [true, self::sanitize($value)];
    }

    public static function sanitizeArray($input, $rules)
    {
        $sanitized = [];
        $errors = [];
        foreach ($rules as $field => $type) {
            $value = $input[$field] ?? null;
            list($valid, $result) = self::validate($value, $type);
            if (!$valid) {
                $errors[$field] = $result;
            } else {
                $sanitized[$field] = $result;
            }
        }
        return [$sanitized, $errors];
    }
}

?>
