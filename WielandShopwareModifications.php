<?php
/**
 * Created by PhpStorm.
 * User: Sebastian
 * Date: 2016-09-10
 * Time: 14:44
 */

namespace WielandShopwareModifications;


use Doctrine\Common\Collections\ArrayCollection;
use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UpdateContext;
use Shopware\Components\Plugin\Context\UninstallContext;
use Shopware\Components\Plugin\Context\ActivateContext;
use Shopware\Components\Plugin\Context\DeactivateContext;
use Enlight_Controller_ActionEventArgs as ActionEventArgs;
use Shopware\Components\Theme\LessDefinition;

class WielandShopwareModifications extends Plugin
{
    public function install(InstallContext $context)
    {
        parent::install($context);
    }

    public function update(UpdateContext $context)
    {
        parent::update($context);
    }

    public function uninstall(UninstallContext $context)
    {
        parent::uninstall($context);
    }

    public function activate(ActivateContext $context)
    {
        parent::activate($context);
    }

    public function deactivate(DeactivateContext $context)
    {
        parent::deactivate($context);
    }

    public static function getSubscribedEvents()
    {
        return [
            ActionEventArgs::POST_SECURE_EVENT . '_Frontend' => 'onPostSecureFrontend',
            ActionEventArgs::POST_SECURE_EVENT . '_Widgets' => 'onPostSecureFrontend',
            'Theme_Compiler_Collect_Plugin_Less' => 'addLessFiles'
        ];
    }

    public function onPostSecureFrontend()
    {
        /** @var \Enlight_Template_Manager $templateManager */
        $templateManager = $this->container->get('template');
        $templateManager->addTemplateDir($this->getPath() . '/Resources/views/');
    }

    public function addLessFiles()
    {
        $lessDefinition = new LessDefinition([], [
            $this->getPath() . '/Resources/views/frontend/_public/src/less/all.less'
        ]);

        return new ArrayCollection([$lessDefinition]);
    }
}