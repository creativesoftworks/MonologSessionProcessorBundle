<?php

namespace spec\CreativeSoftworks\MonologSessionProcessorBundle\Processor;

use PhpSpec\ObjectBehavior;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SessionProcessorSpec extends ObjectBehavior
{
    public function let(SessionInterface $session)
    {
        $this->beConstructedWith($session);
    }
    
    public function it_collects_session_id_into_record(SessionInterface $session)
    {
        $session->getId()->shouldBeCalled()->willReturn('testId');
        
        $processedRecord = $this->processRecord(array());
        $processedRecord->shouldBe(array('extra' => array('sessionId' => 'testId')));
    }
}