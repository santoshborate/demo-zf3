<?php

declare(strict_types=1);

namespace Application\Hydrator;

use Laminas\Hydrator\ClassMethodsHydrator;

class RouterHydrator extends ClassMethodsHydrator
{
    /**
     * @param array $data
     * @param object $object
     * @return object|void
     */
    public function hydrate(array $data, object $object)
    {
        return parent::hydrate($data, $object);
    }

    /**
     * @param object $object
     * @return array
     */
    public function extract(object $object) : array
    {
        return [
            'id' => $object->getId(),
            'sapid' => $object->getSapid(),
            'hostname' => $object->getHostname(),
            'loopback' => $object->getLoopback(),
            'macaddress' => $object->getMacaddress(),
            'archive' => $object->getArchive(),
        ];
    }
}