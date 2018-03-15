<?php
/** Text Helper */

namespace Translit\Helper;


/**
 * Class Text
 *
 * @package Acme\WebBundle\Utils
 * @author Vladimir Avdeev <avdeevvladimir@gmail.com>
 */
class Text
{
    const SLUG_LENGTH = 96; // max length

    /**
     * @static
     * @param string $text
     * @return mixed|string
     */
    static public function slugify($text)
    {
        // trim and lowercase
        $text = mb_strtolower(trim($text), 'UTF-8');

        // replace multiple spaces or tabs with a single -
        $text = preg_replace('/\s+/u', '-', $text);

        // remove ['"`’] from text
        $text = preg_replace('/[\\\'\"`’]+/u', '', $text);

        // remove all punctuation signs
        $text = preg_replace('/[\+,\.&!\?:;#~=\/\$£\^\(\)_<>%-]+/u', '-', $text);

        return trim($text, '-');
    }

    /**
     * Manual transliteration.
     *
     * @param string $text
     * @return string
     */
    public static function transliterate($text)
    {
        $lowerCase = array(
            // romanian
            'Ä' => 'A', 'Ă' => 'A', 'Â' => 'A', 'Î' => 'I', 'Ș' => 'S', 'Ş' => 'S', 'Ț' => 'T', 'Ţ' => 'T',
            'ă' => 'a', 'â' => 'a', 'î' => 'i', 'ș' => 's', 'ş' => 's', 'ț' => 't', 'ţ' => 't',
            // german
            'Ö' => 'O', 'Ü' => 'U',
            'ä' => 'a', 'é' => 'e', 'ö' => 'o', 'ü' => 'u', 'ß' => 'ss',
            // russian
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'IO', 'Ж' => 'ZH', 'З' => 'Z',
            'И' => 'I', 'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O', 'П' => 'P',
            'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'TS', 'Ч' => 'CH',
            'Ш' => 'SH', 'Щ' => 'SHI', 'Ъ' => 'I',  'Ы' => 'I', 'Ь' => '',  'Э' => 'E',  'Ю' => 'IU', 'Я' => 'IA' ,
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'io', 'ж' => 'zh', 'з' => 'z',
            'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p',
            'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'ts', 'ч' => 'ch',
            'ш' => 'sh', 'щ' => 'shi', 'ъ' => 'i', 'ы' => 'i', 'ь' => '', 'э' => 'e', 'ю' => 'iu', 'я' => 'ia',
            // others
            'Š'=>'S', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'Č'=>'C', 'Ć'=>'C', 'À'=>'A', 'Á'=>'A', 'Ã'=>'A',
            'Å'=>'A', 'Æ'=>'A',  'Ç'=>'C',  'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I',
            'Ï'=>'I', 'Ñ'=>'N',  'Ò'=>'O',  'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
            'Ú'=>'U', 'Û'=>'U',  'Ü'=>'U',  'Ý'=>'Y',
            'ć'=>'c', 'ž'=>'z', 'č'=>'c', 'š'=>'s', 'Þ'=>'B', 'à'=>'a', 'á'=>'a', 'ã'=>'a', 'å'=>'a',
            'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'ï'=>'i', 'ð'=>'o',
            'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u',
            'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',
        );
        $strtrText = strtr($text, $lowerCase);
        $text = $strtrText ? $strtrText : $text;

        // replace all utf-8 special chars with iso equivalent
        $iconvText = @iconv('UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE', $text);

        return $iconvText ? $iconvText : $text;
    }

    /**
     * Makes pretty url
     *
     * @param string $text
     * @return string
     */
    public static function urlFormat($text)
    {
        $text = self::transliterate($text);
        if (strlen($text) > self::SLUG_LENGTH) {
            $text = (preg_match('/^(.*)\W.*$/', substr($text, 0, self::SLUG_LENGTH + 1), $matches) ? $matches[1] :
                substr($text, 0, self::SLUG_LENGTH));
        }

        return self::slugify($text);
    }
}
