<?php
/**
 * Created by PhpStorm.
 * User: Sebastian
 * Date: 2016-09-10
 * Time: 14:44
 */

namespace WielandShopwareModifications;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Tools\SchemaTool;
use Shopware\Bundle\MediaBundle\Struct\MediaPosition;
use Shopware\Components\Model\ModelManager;
use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;
use Enlight_Controller_ActionEventArgs as ActionEventArgs;
use Shopware\Components\Theme\LessDefinition;
use WielandShopwareModifications\Models\Font;

class WielandShopwareModifications extends Plugin
{
    public function install(InstallContext $context)
    {
        $this->createSchema();

        parent::install($context);
    }

    public function uninstall(UninstallContext $context)
    {
        if (!$context->keepUserData()) {
            $this->removeSchema();
        }

        parent::uninstall($context);
    }

    private function createSchema()
    {
        /** @var ModelManager $entityManager */
        $entityManager = $this->container->get('models');
        $schemaTool = new SchemaTool($entityManager);

        $classes = [
            $entityManager->getClassMetadata(Font::class)
        ];

        $schemaTool->createSchema($classes);
    }

    private function removeSchema()
    {
        /** @var ModelManager $entityManager */
        $entityManager = $this->container->get('models');
        $schemaTool = new SchemaTool($entityManager);

        $classes = [
            $entityManager->getClassMetadata(Font::class)
        ];

        $schemaTool->dropSchema($classes);
    }

    public static function getSubscribedEvents()
    {
        return [
            ActionEventArgs::POST_SECURE_EVENT => 'onPostSecure',
            'Theme_Compiler_Collect_Plugin_Less' => 'addLessFiles',
            'Theme_Compiler_Collect_Plugin_Javascript' => 'addJsFiles',
            'Shopware_Collect_MediaPositions' => 'collectMediaPositions'
        ];
    }

    public function onPostSecure()
    {
        /** @var \Enlight_Template_Manager $templateManager */
        $templateManager = $this->container->get('template');
        $templateManager->addTemplateDir($this->getPath() . '/Resources/views/', null, \Enlight_Template_Manager::POSITION_PREPEND);
    }

    public function addLessFiles()
    {
        $lessDefinition = new LessDefinition([], [
            $this->getPath() . '/Resources/views/frontend/_public/src/less/all.less'
        ]);

        return new ArrayCollection([$lessDefinition]);
    }

    public function addJsFiles()
    {
        $jsFiles = [
            $this->getPath() . '/Resources/views/frontend/_public/js/font_overview.js'
        ];

        return new ArrayCOllection($jsFiles);
    }

    public function collectMediaPositions()
    {
        return new ArrayCollection([
            new MediaPosition('wieland_gravur_font', 'font_file_media_id')
        ]);
    }
}