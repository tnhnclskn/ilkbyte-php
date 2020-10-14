<?php

namespace Tnhnclskn\Ilkbyte;

class Domain
{
    private Ilkbyte $ilkbyte;
    private string $domain;

    public function __construct(Ilkbyte $ilkbyte, string $domain)
    {
        $this->ilkbyte = $ilkbyte;
        $this->domain = $domain;
    }

    public function show()
    {
        return $this->ilkbyte->domainShow($this->domain);
    }

    public function add($recordName, $recordType, $recordContent, $recordPriority = null)
    {
        return $this->ilkbyte->domainAdd($this->domain, $recordName, $recordType, $recordContent, $recordPriority);
    }

    public function update($recordId, $recordContent, $recordPriority = null)
    {
        return $this->ilkbyte->domainUpdate($this->domain, $recordId, $recordContent, $recordPriority);
    }

    public function delete($recordId)
    {
        return $this->ilkbyte->domainDelete($this->domain, $recordId);
    }

    public function push()
    {
        return $this->ilkbyte->domainPush($this->domain);
    }
}
