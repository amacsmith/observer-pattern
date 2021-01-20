<?php


namespace AMacSmith\ObserverPattern\RealWorldSolution;


use Carbon\Carbon;

class Message
{
    private Carbon $sent_at;

    /**
     * Message constructor.
     * @param string $message
     * @param string $from
     */
    public function __construct(private string $message, private string $from)
    {
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