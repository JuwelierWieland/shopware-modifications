<?php
/**
 * Created by PhpStorm.
 * User: Sebastian
 * Date: 2016-09-10
 * Time: 22:25
 */

namespace WielandShopwareModifications\Subscribers;


use Enlight\Event\SubscriberInterface;
use Enlight_Controller_ActionEventArgs as ActionEventArgs;
use WielandShopwareModifications\Services\FontService;

class FontPreview implements SubscriberInterface
{
    /** @var FontService $fontService */
    private $fontService;

    public function __construct(FontService $fontService) {
        $this->fontService = $fontService;
    }

    public static function getSubscribedEvents()
    {
        return [
            ActionEventArgs::POST_SECURE_EVENT . '_Frontend_Detail' => 'onPostSecureFrontendDetail'
        ];
    }

    public function onPostSecureFrontendDetail(\Enlight_Controller_ActionEventArgs $args)
    {
        $view = $args->getSubject()->View();
        $view->assign('wielandFonts', $this->fontService->getFonts());
    }
}