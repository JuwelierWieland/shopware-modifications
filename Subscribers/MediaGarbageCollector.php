<?php
/**
 * Created by PhpStorm.
 * User: Sebastian
 * Date: 2018-04-21
 * Time: 10:34
 */

namespace WielandShopwareModifications\Subscribers;


use Doctrine\Common\Collections\ArrayCollection;
use Enlight\Event\SubscriberInterface;
use Shopware\Bundle\MediaBundle\Struct\MediaPosition;

class MediaGarbageCollector implements SubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            'Shopware_Collect_MediaPositions' => 'onCollectMediaPositions'
        ];
    }

    public function onCollectMediaPositions()
    {
        return new ArrayCollection([
            new MediaPosition('wieland_gravur_font', 'font_file_media_id'),
        ]);
    }
}