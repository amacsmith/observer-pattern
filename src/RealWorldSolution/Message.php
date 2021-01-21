<?php


namespace AMacSmith\ObserverPattern\RealWorldSolution;


use Carbon\Carbon;

class Message
{
    private Carbon $sent_at;
    private string $message;
    private string $from;

    /**
     * Message constructor.
     * @param string $message
     * @param string $from
     */
    public function __construct(string $message, string $from)
    {
        $this->from = $from;
        $this->message = $message;
        $this->sent_at = Carbon::now();
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @return Carbon
     */
    public function getSentAt(): Carbon
    {
        return $this->sent_at;
    }
}