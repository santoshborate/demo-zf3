<?php
declare(strict_types=1);

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="router")
 * @ORM\Entity(repositoryClass="Application\Repository\RouterRepository")
 */
class Router
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var integer $id
     */
    private $id;

    /**
     * @ORM\Column(name="sapid", type="integer", nullable=false)
     * @var integer $sapid
     */
    private $sapid;

    /**
     * @ORM\Column(name="hostname", type="string", nullable=false)
     * @var string $hostname
     */
    private $hostname;

    /**
     * @ORM\Column(name="loopback", type="string", nullable=false)
     * @var string $loopback
     */
    private $loopback;

    /**
     * @ORM\Column(name="macaddress", type="string", nullable=false)
     * @var string $mackaddress
     */
    private $macaddress;

    /**
     * @ORM\Column(name="archive", type="integer", nullable=false)
     * @var integer $archive
     */
    private $archive;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getSapid(): int
    {
        return $this->sapid;
    }

    /**
     * @param int $sapid
     */
    public function setSapid(int $sapid): void
    {
        $this->sapid = $sapid;
    }

    /**
     * @return string
     */
    public function getHostname(): string
    {
        return $this->hostname;
    }

    /**
     * @param string $hostname
     */
    public function setHostname(string $hostname): void
    {
        $this->hostname = $hostname;
    }

    /**
     * @return string
     */
    public function getLoopback(): string
    {
        return $this->loopback;
    }

    /**
     * @param string $loopback
     */
    public function setLoopback(string $loopback): void
    {
        $this->loopback = $loopback;
    }

    /**
     * @return string
     */
    public function getMacaddress(): string
    {
        return $this->macaddress;
    }

    /**
     * @param string $macaddress
     */
    public function setMacaddress(string $macaddress): void
    {
        $this->macaddress = $macaddress;
    }

    /**
     * @return int
     */
    public function getArchive(): int
    {
        return $this->archive;
    }

    /**
     * @param int $archive
     */
    public function setArchive(int $archive): void
    {
        $this->archive = $archive;
    }
}