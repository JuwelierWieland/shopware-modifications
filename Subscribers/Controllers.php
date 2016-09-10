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
            'Enlight_Controller_Dispatcher_ControllerPath_Backend_WielandGravurFonts' => 'registerBackendGravurFontsController',
            'Enlight_Controller_Dispatcher_ControllerPath_Frontend_WielandGravurFonts' => 'registerFrontendGravurFontsController'
        ];
    }

    public function registerBackendGravurFontsController()
    {
        return $this->plugin->getPath() . '/Controllers/Backend/WielandGravurFonts.php';
    }

    public function registerFrontendGravurFontsController()
    {
        return $this->plugin->getPath() . '/Controllers/Frontend/WielandGravurFonts.php';
    }
}