<?php

namespace App\Lib;

class Locale {
    public static function t($name) {
        global $langFile;
        if (empty($langFile)) {
            return $name;
        }

        $data = $langFile;
        foreach (explode('.', $name) as $value) {
            if (empty($data[$value])) {
                return $name;
            }
            $data = $data[$value];
        }
        return $data;
    }

    public static function getBrowserLanguage() {
        return locale_lookup(['ja', 'en'], $_SERVER['HTTP_ACCEPT_LANGUAGE'], false, 'ja');
    }
}
