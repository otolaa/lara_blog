<?php

namespace App\Helpers;

class Help
{
    /* How to Get Path in Laravel Application Root? */
    public static function getPath(int $num_path = 1): string
    {
        $path = '';

        switch ($num_path) {
            case 0:
                $path = public_path(); // /var/www/example-app/public
                break;
            case 1:
                $path = base_path(); // /var/www/example-app
                break;
            case 2:
                $path = storage_path(); // /var/www/example-app/storage
                break;
            case 3:
                $path = app_path(); // /var/www/example-app/app
                break;
        }


        return $path;
    }

    /* small functions for write to log file */
    public static function wtf($var, string $varName = "", string $fileName = ""): void
    {
        if (empty($fileName))
            $fileName = "__log.log";

        $data = "";
        if ($varName != "")
            $data .= $varName.":\n";

        if (is_array($var))
            $data .= print_r($var, true)."\n";
        else
            $data .= $var."\n";

        $tempFile = fopen(storage_path()."/logs/".$fileName, "a");
        fwrite($tempFile, $data."\n");
        fclose($tempFile);
    }
}