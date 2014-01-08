<?php
namespace Skel\Lib;

/**
 * Convert PHP errors into exceptions
 */
class ErrorHandler
{
    /**
     * Error handler
     *
     * @param int $level Level of the error raised
     * @param string $message Error message
     * @param string $file Filename that the error was raised in
     * @param int $line Line number the error was raised at
     */
    public static function handle($level, $message, $file, $line)
    {
        if (!error_reporting()) {
            return;
        }

        throw new \ErrorException($message, 0, $level, $file, $line);
    }

    /**
     * Register error handler
     */
    public static function register()
    {
        set_error_handler(array(
                __CLASS__,
                'handle'
        ));
    }
}
