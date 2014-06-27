<?php

namespace CreativeSoftworks\MonologSessionProcessorBundle\Processor;

use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class UsernameProcessor {
    
    const ANNONYMOUS_USERNAME = 'anon';
    
    /**
     * @var \Symfony\Component\Security\Core\SecurityContextInterface
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
        if ($token instanceof TokenInterface) {
            $record['extra']['username'] = $token->getUsername();
        } else {
            $record['extra']['username'] = self::ANNONYMOUS_USERNAME;
        }

        return $record;
    }
}
