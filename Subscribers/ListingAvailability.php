<?php
/**
 * Created by PhpStorm.
 * User: Sebastian
 * Date: 2016-09-10
 * Time: 15:42
 */

namespace WielandShopwareModifications\Subscribers;


use Enlight\Event\SubscriberInterface;
use Enlight_Controller_ActionEventArgs as ActionEventArgs;
use Shopware_Components_Config as Config;

class ListingAvailability implements SubscriberInterface
{
    /** @var Config $config */
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public static function getSubscribedEvents()
    {
        return [
            ActionEventArgs::POST_SECURE_EVENT . '_Frontend_Listing' => 'onPostSecureFrontendListing',
            ActionEventArgs::POST_SECURE_EVENT . '_Widgets_Listing' => 'onPostSecureFrontendListing'
        ];
    }

    public function onPostSecureFrontendListing(ActionEventArgs $args)
    {
        $request = $args->getRequest();

        if ($request->getModuleName() === 'frontend'
            || $request->getModuleName() === 'widgets' && $request->getActionName() === 'ajaxListing'
        ) {
            $controller = $args->getSubject();
            $view = $controller->View();

            $displayListingAvailability = $this->config->getByNamespace('WielandShopwareModifications', 'displayListingAvailability');

            $view->assign('displayListingAvailability', $displayListingAvailability);
        }
    }
}