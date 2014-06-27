<?php

namespace spec\CreativeSoftworks\MonologSessionProcessorBundle\Processor;

use PhpSpec\ObjectBehavior;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class UsernameProcessorSpec extends ObjectBehavior
{
    public function let(SecurityContextInterface $securityContext)
    {
        $this->beConstructedWith($securityContext);
    }
    
    public function it_collects_username_into_record(SecurityContextInterface $securityContext, TokenInterface $token)
    {
        $securityContext->getToken()->shouldBeCalled()->willReturn($token);
        $token->getUsername()->willReturn('testUsername');
        
        $processedRecord = $this->processRecord(array());
        $processedRecord->shouldBe(array('extra' => array('username' => 'testUsername')));
    }
}