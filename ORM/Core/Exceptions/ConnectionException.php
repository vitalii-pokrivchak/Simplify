<?php


namespace ORM\Core\Exceptions;

use DateTime;

class ConnectionException extends \PDOException
{
    protected $message;
    protected $code;
    protected $date;

    public function __construct($message, $code, $log_level = LogLevel::INFO, \Throwable $previous = null)
    {
        $this->message = $message;
        $this->date = new DateTime();
        parent::__construct($this->message, $this->code, $previous);
        if ($this->code == 0) {
            $this->code = 404;
        } else {
            $this->code = $code;
        }
        $this->LogTo("./Logs/", $log_level);
    }

    /**
     * LogTo
     *
     *
     * @param string $path
     * @return void
     */
    private function LogTo(string $path, string $log_level)
    {
        if (!file_exists($path)) {
            if (mkdir($path)) {
                $filename = sprintf('%s.log', $this->date->format('d-m-Y'));
                $content = <<<LOG
                {{$log_level}} [{$this->date->format('H:i:s')}] |{$this->code}| : {$this->message}

                LOG;
                file_put_contents($path . $filename, $content, FILE_APPEND);
            }
        } else {
            $filename = sprintf('%s.log', $this->date->format('d-m-Y'));
            $content = <<<LOG
            {{$log_level}} [{$this->date->format('H:i:s')}] |{$this->code}| : {$this->message}

            LOG;
            file_put_contents($path . $filename, $content, FILE_APPEND);
        }
    }
}
