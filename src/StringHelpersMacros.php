<?php


namespace Shegunbabs\LaravelHelpers;

use Closure;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class StringHelpersMacros
{


    /**
     * @return Closure
     */
    public function readDuration()
    {
        /**
         * Return a read duration in minutes assuming 200 words can be read per minute
         * @param mixed ...$text
         * @return int
         */
        return static function (...$text)
        {
            $totalWords = str_word_count(implode(" ", $text));
            $minutesToRead = round($totalWords/200);
            return (int) max(1, $minutesToRead);
        };
    }


    /**
     * @return Closure
     */
    public function betweenLast()
    {
        /**
         * betweenLast('[', ']', 'sin[90]*cos[180]')
         * returns '180'
         *
         * Return the last occurence of a string in-between a start and end characters
         * @param $start_character
         * @param $end_character
         * @param $subject
         * @return string
         */
        return static function($start_character, $end_character, $subject)
        {
            return static::afterLast(static::beforeLast($subject, $end_character), $start_character);
        };
    }


    /**
     * @return Closure
     */
    public function take()
    {
        /**
         * take(4, 'I love cakes', 2)
         * returns 'love'
         *
         * Take the length of characters from the start of a subject
         * also indicating length of characters to skip before take
         * @param $length
         * @param $subject
         * @param int $skip
         * @return false|string
         */
        return static function($length, $subject, $skip=0)
        {
            return substr($subject, $skip, $length);
        };
    }


    /**
     * @return Closure
     */
    public function reverseTake()
    {
        /**
         * Take the length of characters starting from the end of a subject
         * also indicating length of characters
         * @param $length
         * @param $subject
         * @param int $skip
         * @return false|string
         */
        return static function ($length, $subject, $skip=0)
        {
            if ( $skip === 0 ) {
                return substr($subject, -$length);
            }

            if ( $skip > 0 ) {
                $skip += $length;
                return substr($subject, -$skip, $length);
            }
        };
    }


    /**
     * @return Closure
     */
    public function extract()
    {
        return static function ($string, $pattern) {
            if (@preg_match($pattern, $string) === false) {
                $pattern = '#'.preg_quote($pattern, '#').'#';
            }

            preg_match($pattern, $string, $matches);

            return $matches[1] ?? null;
        };
    }


    /**
     * @return Closure
     */
    public function match()
    {
        return static function($string, $pattern) {
            if (@preg_match($pattern, $string) === false) {
                $pattern = '#'.preg_quote($pattern, '#').'#';
            }

            return preg_match($pattern, $string) === 1;
        };
    }


    /**
     * @return Closure
     */
    public function validate()
    {
        return function($data, $rules) {
            return Collection::make(
                Validator::make(['{placeholder}' => $data], ['{placeholder}' => $rules])
                    ->errors()
                    ->get('{placeholder}')
            )->map(function ($message) {
                return ucfirst(
                    trim(
                        str_replace('The {placeholder}', '',
                            str_replace('The selected {placeholder}', 'This selection',
                                $message)
                        )
                    )
                );
            });
        };
    }


    /**
     * @return Closure
     */
    public function wrap()
    {
        return static function($value, $cap) {
            return Str::start(Str::finish($value, $cap), $cap);
        };
    }
}