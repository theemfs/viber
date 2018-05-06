<?php

namespace NZX\NotificationChannels\Viber;

class ViberMessage
{
    protected $to;
    protected $text;

    public function __construct($data)
    {
        if (array_key_exists('text', $data)) {
            $this->setText($data['text']);
        }

        if (array_key_exists('to', $data)) {
            $this->setTo($data['to']);
        }
    }

    public static function parse(array $data)
    {
        return new static($data);
    }

    public static function create($data)
    {
        return new static($data);
    }

    public function setTo($to)
    {
        $this->to = static::filter($to);

        return $this;
    }

    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function getText()
    {
        return $this->text;
    }
}
