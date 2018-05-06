<?php

namespace NZX\NotificationChannels\Kannel\Test;

use Mockery;
use NZX\NotificationChannels\Kannel\KannelHttp;
use PHPUnit\Framework\TestCase;

class KannelHTTPTest extends TestCase
{
    private $kannelHTTP;

    public function setUp()
    {
        parent::setUp();

        // $this->kannelHTTP = Mockery::mock(new KannelHttp('', '', ''));
        $this->kannelHTTP = new KannelHttp(env('KANNEL_URL'), env('KANNEL_USER'), env('KANNEL_PASSWORD'));
    }

    public function tearDown()
    {
        Mockery::close();
        parent::tearDown();
    }

    /** @test */
    public function it_sends_a_message_to_a_single_number()
    {
        $to = '79501111111';
        $message = 'Hi there I am a message';

        $response = $this->kannelHTTP->send($to, $message);

        $this->assertContains('0. Accepted to delivery', $response);
    }
}
