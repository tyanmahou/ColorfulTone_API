<?php
namespace ct_api;

class DateTimeUtil
{
    const FORMAT = 'Y-m-d H:i:s';

    public static function getCurrentDateTime(): string
    {
        return date(self::FORMAT);
    }
    public static function toTimestamp(string $dateTime): int
    {
        return strtotime($date);
    }

    public static function toDateTime(
        int $timestamp, 
        string $format = self::FORMAT
    ): string {
        return date($format, $timestamp);
    }

    public static function isOnBetween($current, $start, $end): bool
    {
        return $start <= $current && $current < $end;
    }

    public static function isOnBetweenDefault($current, $start, $end): bool
    {
        return ($start ?? Constants::MIN_DATETIME) <= $current && 
        $current < ($end ?? Constants::MAX_DATETIME);
    }
}