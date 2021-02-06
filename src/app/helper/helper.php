<?php

class Helper {

    public function __construct() {}

    public static function ObjectToString(Object $object, $newLine = false) {
        $str = '';

        foreach ($object as $key=>$val) {
            $str .= $key . ': ' . $val;

            if ($newLine) {
                $str .= "\n";
            }
        }

        return $str;
    }

    public static function NewLineToHTMLBreak(String $str) {
        return str_replace("\n", "<br>", $str);
    }
}