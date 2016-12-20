<?php

namespace Flaky;

class Flaky {
    protected static $symbols = array(
      "base64" => "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+/",
      "base64URL" => "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_"
    );

    private static $hostbin;

    public static function init() {
        if (empty(self::$hostbin)) {
            $hostname = gethostname();
            $hosthash = sha1($hostname);
            self::$hostbin = self::binStrSize(base_convert(substr($hosthash, 0, 4), 16, 2), 16);
        }
    }

    // public static function nanotime() {
    //     ob_start();
    //     $nanotime = system('date +"%s%N"');
    //     ob_end_clean();
    //     return $nanotime;
    // }

    public static function binStrSize($str, $size) {
        return str_pad(substr($str, 0, $size), $size, '0', STR_PAD_LEFT);
    }

    public static function getNodeId() {
        return self::$hostbin;
    }

    public static function toBase($binStr, $base, $symbols) {
        if ($base > strlen($symbols) || $base < 2) {
            throw new Exception("Invalid base $base");
        }

        $num = gmp_init('0b' . $binStr);
        $encoded = '';
        while (gmp_intval($num) > 0) {
            $divmod = gmp_div_qr($num, $base);
            $num = $divmod[0];
            $encoded = substr($symbols, gmp_intval($divmod[1]), 1) . $encoded;
        }

        return $encoded;
    }

    public static function id($base = null, $symbols = null) {
        self::init();

        $gSymbols = self::$symbols;
        if ($symbols) {
            if (array_key_exists($symbols, $gSymbols)) {
                $symbols = $gSymbols[$symbols];
            }
        } else {
            $symbols = $gSymbols['base64'];
        }

        // $time = self::nanotime();
        $mtime = explode(' ', microtime());
        $time = $mtime[1] . ($mtime[0] * 1000000);
        return self::toBase(self::getNodeId() . decbin($time), $base ?: 64, $symbols);
    }
}
