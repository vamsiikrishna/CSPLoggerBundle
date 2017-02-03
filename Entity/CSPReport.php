<?php

namespace Sockam\CSPLoggerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CSPReport
 *
 * @ORM\Table(name="c_s_p_report")
 * @ORM\Entity(repositoryClass="Sockam\CSPLoggerBundle\Repository\CSPReportRepository")
 */
class CSPReport
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\Url()
     * @ORM\Column(name="document_uri", type="string", length=1000)
     */
    private $documentUri;

    /**
     * @var string
     * @Assert\Url()
     * @ORM\Column(name="referrer", type="string", length=1000)
     */
    private $referrer;

    /**
     * @var string
     * @Assert\Url()
     * @ORM\Column(name="blocked_uri", type="string", length=1000)
     */
    private $blockedUri;

    /**
     * @var string
     *
     * @ORM\Column(name="violated_directive", type="string", length=1000)
     */
    private $violatedDirective;

    /**
     * @var string
     *
     * @ORM\Column(name="original_policy", type="string", length=1000, nullable=true)
     */
    private $originalPolicy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_received", type="datetime")
     */
    private $dateReceived;

    /**
     * @var string
     * @Assert\Ip
     * @ORM\Column(name="sender_ip", type="string", length=255)
     */
    private $senderIp;

    /**
     * @var string
     * @ORM\Column(name="user_agent", type="string", length=1000)
     */
    private $userAgent;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set documentUri
     *
     * @param string $documentUri
     *
     * @return CSPReport
     */
    public function setDocumentUri($documentUri)
    {
        $this->documentUri = $documentUri;

        return $this;
    }

    /**
     * Get documentUri
     *
     * @return string
     */
    public function getDocumentUri()
    {
        return $this->documentUri;
    }

    /**
     * Set referrer
     *
     * @param string $referrer
     *
     * @return CSPReport
     */
    public function setReferrer($referrer)
    {
        $this->referrer = $referrer;

        return $this;
    }

    /**
     * Get referrer
     *
     * @return string
     */
    public function getReferrer()
    {
        return $this->referrer;
    }

    /**
     * Set blockedUri
     *
     * @param string $blockedUri
     *
     * @return CSPReport
     */
    public function setBlockedUri($blockedUri)
    {
        $this->blockedUri = $blockedUri;

        return $this;
    }

    /**
     * Get blockedUri
     *
     * @return string
     */
    public function getBlockedUri()
    {
        return $this->blockedUri;
    }

    /**
     * Set violatedDirective
     *
     * @param string $violatedDirective
     *
     * @return CSPReport
     */
    public function setViolatedDirective($violatedDirective)
    {
        $this->violatedDirective = $violatedDirective;

        return $this;
    }

    /**
     * Get violatedDirective
     *
     * @return string
     */
    public function getViolatedDirective()
    {
        return $this->violatedDirective;
    }

    /**
     * Set originalPolicy
     *
     * @param string $originalPolicy
     *
     * @return CSPReport
     */
    public function setOriginalPolicy($originalPolicy)
    {
        $this->originalPolicy = $originalPolicy;

        return $this;
    }

    /**
     * Get originalPolicy
     *
     * @return string
     */
    public function getOriginalPolicy()
    {
        return $this->originalPolicy;
    }

    /**
     * Set dateReceived
     *
     * @param \DateTime $dateReceived
     *
     * @return CSPReport
     */
    public function setDateReceived($dateReceived)
    {
        $this->dateReceived = $dateReceived;

        return $this;
    }

    /**
     * Get dateReceived
     *
     * @return \DateTime
     */
    public function getDateReceived()
    {
        return $this->dateReceived;
    }

    /**
     * Set senderIp
     *
     * @param string $senderIp
     *
     * @return CSPReport
     */
    public function setSenderIp($senderIp)
    {
        $this->senderIp = $senderIp;

        return $this;
    }

    /**
     * Get senderIp
     *
     * @return string
     */
    public function getSenderIp()
    {
        return $this->senderIp;
    }

    /**
     * Set userAgent
     *
     * @param string $userAgent
     *
     * @return CSPReport
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    /**
     * Get userAgent
     *
     * @return string
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }
}

