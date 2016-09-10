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

        echo '<pre style="border:3px solid ' . sprintf('#%06X', mt_rand(0, 0xFFFFFF)) . '">';
        \Doctrine\Common\Util\Debug::dump($fonts);
        echo '</pre>';

        $view->assign('fonts', $fonts);
        $view->loadTemplate('frontend/plugins/WielandShopwareModifications/wieland_gravur_fonts/font_overview_modal.tpl');
    }
}