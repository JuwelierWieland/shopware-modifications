<?php
/**
 * Created by PhpStorm.
 * User: Sebastian
 * Date: 2018-04-21
 * Time: 10:16
 */

namespace WielandShopwareModifications\Bundle\MediaBundle;


use Shopware\Bundle\MediaBundle\MediaExtensionMappingServiceInterface;
use Shopware\Models\Media\Media;

class MediaExtensionMappingService implements MediaExtensionMappingServiceInterface
{
    /** @var MediaExtensionMappingServiceInterface */
    private $decoratedService;

    private $mapping = [
        'ttf' => Media::TYPE_UNKNOWN
    ];

    public function __construct(MediaExtensionMappingServiceInterface $decoratedService)
    {
        $this->decoratedService = $decoratedService;
    }

    public function isAllowed($extension)
    {
        $extension = \strtolower($extension);

        return \array_key_exists($extension, $this->mapping) ?: $this->decoratedService->isAllowed($extension);
    }

    public function getType($extension)
    {
        $extension = \strtolower($extension);

        return \array_key_exists($extension, $this->mapping) ? $this->mapping[$extension] : $this->decoratedService->getType($extension);
    }
}