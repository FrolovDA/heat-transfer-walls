<?php


class Site
{
    /**
     * Loads data from file and generates text to display in <select>
     * For example: Сплошная кладка из крупноформатных пустотелых пористых керамических камней, r = 0.98
     * @return array
     */
    public static function getCoefNames()
    {
        $coefName = Array();
        $file = new SplFileObject(ROOT . '/data/coefficient.txt');
        while (!$file->eof()) {
            $line = str_replace(',', '.', trim($file->fgets()));
            $coefName[] = substr($line, 0, strrpos($line, ' ')) . ', r = ' .
                $coefValue[] = substr($line, strrpos($line, ' ') + 1, strlen($line) - strrpos($line, ' '));
        }
        $file = null;
        return $coefName;
    }

    /**
     * Loads data from file and generates text with coefficient values
     * For example: Сплошная кладка из крупноформатных пустотелых пористых керамических камней 0,98
     * @return array
     */
    public static function getCoefValues()
    {
        $coefValue = Array();
        $file = new SplFileObject(ROOT . '/data/coefficient.txt');
        while (!$file->eof()) {
            $line = trim($file->fgets());
            $coefValue[] = $line;
        }
        $file = null;
        return $coefValue;
    }

    /**
     * Loads data from file and generates text to display in <select>
     * For example: Майкоп, Республика Адыгея
     * @return array
     */
    public static function getClimateNames()
    {
        $state = "";
        $climateName = Array();
        $file = new SplFileObject(ROOT.'/data/climate.txt');
        while (!$file->eof()) {
            $line = trim($file->fgets());
            if (strstr($line, '***') == true) {
                $climateName[] = $line;
                $state = substr($line, 3, strlen($line) - 3);
                continue;
            }
            $left = substr($line, 0, strrpos($line, ' '));
            $left = substr($left, 0, strrpos($left, ' '));
            $climateName[] = $left . ', ' . $state;
        }
        $file = null;
        return $climateName;
    }

    /**
     * Loads data from file and generates text with climate values
     * For example: Майкоп, Республика Адыгея 148 2,3
     * @return array
     */
    public static function getClimateValues()
    {
        $state = "";
        $climateValue = Array();
        $file = new SplFileObject(ROOT.'/data/climate.txt');
        while (!$file->eof()) {
            $line = trim($file->fgets());
            if (strstr($line, '***') == true) {
                $climateValue[] = null;
                $state = substr($line, 3, strlen($line) - 3);
                continue;
            }
            $left = substr($line, 0, strrpos($line, ' '));
            $right = substr($left, strrpos($left, ' ') + 1, strlen($left) - strrpos($left, ' ')) .
                ' ' . substr($line, strrpos($line, ' ') + 1, strlen($line) - strrpos($line, ' '));
            $left = substr($left, 0, strrpos($left, ' '));
            $climateValue[] = "$left, $state $right";
        }
        $file = null;
        return $climateValue;
    }

    /**
     * Loads data from file and generates text to display in <select>
     * For example: Плиты из пенополистирола 0.052, &lambda;a = 0.052, &lambda;б = 0.059
     * @return array
     */
    public static function getThermalNames()
    {
        $thermalName = Array();
        $file = new SplFileObject(ROOT.'/data/thermal.txt');
        while (!$file->eof()) {
            $line = str_replace(',', '.', trim($file->fgets()));
            if (strstr($line, '***') == true) {
                $thermalName[] = $line;
                continue;
            }
            $valueB = substr($line, strrpos($line, ' ') + 1, strlen($line) - strrpos($line, ' '));
            $line = substr($line, 0, strrpos($line, ' '));
            $valueA = substr($line, strrpos($line, ' ') + 1, strlen($line) - strrpos($line, ' '));
            $thermalName[] = "$line, &lambda;a = $valueA, &lambda;б = $valueB";
        }
        $file = null;
        return $thermalName;
    }

    /**
     * Loads data from file and generates text with thermal values
     * For example: Плиты из пенополистирола 0,052 0,059
     * @return array
     */
    public static function getThermalValues()
    {
        $thermalValue = Array();
        $file = new SplFileObject(ROOT.'/data/thermal.txt');
        while (!$file->eof()) {
            $line = trim($file->fgets());
            if (strstr($line, '***') == true) {
                $thermalValue[] = null;
                continue;
            }
            $thermalValue[] = $line;
        }
        $file = null;
        echo $thermalValue[1];
        return $thermalValue;
    }
}