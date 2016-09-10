<?php
/**
 * Created by PhpStorm.
 * User: Sebastian
 * Date: 2016-09-10
 * Time: 22:20
 */

namespace WielandShopwareModifications\Services;


use Shopware\Bundle\MediaBundle\MediaService;
use Shopware\Components\Model\ModelManager;
use WielandShopwareModifications\Models\Font;

class FontService
{
    /** @var ModelManager $entityManager */
    private $entityManager;

    /** @var MediaService $mediaService */
    private $mediaService;

    public function __construct(ModelManager $entityManager, MediaService $mediaService)
    {
        $this->entityManager = $entityManager;
        $this->mediaService = $mediaService;
    }

    /**
     * @return Font[]
     */
    public function getFonts()
    {
        $fontQueryBuilder = $this->entityManager->createQueryBuilder();
        $fontQueryBuilder
            ->select('font', 'media')
            ->from(Font::class, 'font')
            ->innerJoin('font.fontFileMedia', 'media')
            ->where($fontQueryBuilder->expr()->eq('font.active', true))
            ->orderBy('font.position', 'ASC');

        /** @var Font[] $fonts */
        $fonts = $fontQueryBuilder->getQuery()->getResult();

        foreach ($fonts as $font) {
            $font->getFontFileMedia()->setPath(
                $this->mediaService->getUrl(
                    $font->getFontFileMedia()->getPath()
                )
            );
        }

        return $fonts;
    }
}