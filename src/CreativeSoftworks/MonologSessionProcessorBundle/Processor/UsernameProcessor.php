<?php

namespace CreativeSoftworks\MonologSessionProcessorBundle\Processor;

use Symfony\Component\Security\Core\SecurityContextInterface;

class UsernameProcessor {
    
    /**
     * @var Symfony\Component\Security\Core\SecurityContextInterface
     */
    private $securityContext;

    /**
     * @param \Symfony\Component\Security\Core\SecurityContextInterface $securityContext
     */
    public function __construct(SecurityContextInterface $securityContext)
    {
        $this->securityContext = $securityContext;
    }

    /**
     * @param array $record
     * @return array
     */
    public function processRecord(array $record)
    {
        $token = $this->securityContext->getToken();
        $record['extra']['username'] = $token->getUsername();

        return $record;
    }
}
