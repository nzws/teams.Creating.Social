<?php

namespace App\Lib;

class Locale {
    public static function t($name, $args = []) {
        $data = self::loadLocale();

        foreach (explode('.', $name) as $value) {
            if (empty($data[$value])) {
                return $name;
            }
            $data = $data[$value];
        }

        foreach ($args as $key => $item) {
            $data = str_replace("{{$key}}", $item, $data);
        }

        return $data;
    }

    public static function loadLocale() {
        global $langData;
        if (!empty($langData)) {
            return $langData;
        }

        $dir = __DIR__ . '/../locales/';

        $lang = include $dir . self::getBrowserLanguage() . '.php';
        $default = include $dir . 'ja.php';

        $langData = array_merge($default, $lang);
        return $langData;
    }

    public static function getBrowserLanguage() {
        return locale_lookup(['ja', 'en'], locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']), false, 'ja');
    }
}
