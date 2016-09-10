<?php
/**
 * Created by PhpStorm.
 * User: Sebastian
 * Date: 2016-09-10
 * Time: 17:21
 */

namespace WielandShopwareModifications\Subscribers;


use Enlight\Event\SubscriberInterface;
use WielandShopwareModifications\WielandShopwareModifications;

class Controllers implements SubscriberInterface
{
    /** @var WielandShopwareModifications */
    private $plugin;

    public function __construct()
    {
        $this->plugin = Shopware()->Container()->get('kernel')->getPlugins()['WielandShopwareModifications'];
    }

    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Dispatcher_ControllerPath_Backend_WielandGravurFonts' => 'registerWielandGravurFontsController'
        ];
    }

    public function registerWielandGravurFontsController()
    {
        return $this->plugin->getPath() . '/Controllers/WielandGravurFonts.php';
    }
}