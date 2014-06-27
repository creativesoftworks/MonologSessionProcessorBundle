<?php

namespace CreativeSoftworks\MonologSessionProcessorBundle\Processor;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SessionProcessor {
    
    /**
     * @var \Symfony\Component\HttpFoundation\Session\SessionInterface
     */
    private $session;
    
    /**
     * @param \Symfony\Component\HttpFoundation\Session\SessionInterface $session
     */
    public function __construct(SessionInterface $session) {
        $this->session = $session;
    }
    
    /**
     * @param array $record
     * @return array
     */
    public function processRecord(array $record)
    {
        $record['extra']['sessionId'] = $this->session->getId();

        return $record;
    }
}
