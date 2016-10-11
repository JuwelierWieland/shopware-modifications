<?php

/**
 * Created by PhpStorm.
 * User: Sebastian
 * Date: 2016-09-10
 * Time: 20:32
 */
use WielandShopwareModifications\Models\Font;

class Shopware_Controllers_Frontend_WielandGravurFonts extends Enlight_Controller_Action
{
    public function fontOverviewModalAction()
    {
        $view = $this->View();

        /** @var Font[] $fonts */
        $fonts = $this->get('wieland_shopware_modifications.font_service')->getFonts();

        $view->loadTemplate('frontend/plugins/WielandShopwareModifications/wieland_gravur_fonts/font_overview_modal.tpl');
        $view->assign('fonts', $fonts);
    }
}