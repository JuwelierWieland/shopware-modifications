<?php
/**
 * Created by PhpStorm.
 * User: Sebastian
 * Date: 2016-09-10
 * Time: 17:06
 */

namespace WielandShopwareModifications\Models;

use Doctrine\ORM\Mapping as ORM;
use Shopware\Components\Model\ModelEntity;
use Shopware\Models\Media\Media;

/**
 * Class Font
 * @package WielandShopwareModifications\Models
 * @ORM\Entity
 * @ORM\Table(name="wieland_gravur_font")
 */
class Font extends ModelEntity
{
    /**
     * @var int $id
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $name
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var string $label
     * @ORM\Column(name="label", type="string")
     */
    private $label;

    /**
     * @var boolean $active
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var int $fontFileMediaId
     * @ORM\Column(name="font_file_media_id", type="integer")
     */
    private $fontFileMediaId;

    /**
     * @var Media $fontFileMedia
     * @ORM\ManyToOne(targetEntity="Shopware\Models\Media\Media")
     * @ORM\JoinColumn(name="font_file_media_id", referencedColumnName="id")
     */
    private $fontFileMedia;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Font
     */
    public function setName(string $name): Font
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     * @return Font
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param boolean $active
     * @return Font
     */
    public function setActive(bool $active): Font
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return int
     */
    public function getFontFileMediaId(): int
    {
        return $this->fontFileMediaId;
    }

    /**
     * @param int $fontFileMediaId
     * @return Font
     */
    public function setFontFileMediaId(int $fontFileMediaId): Font
    {
        $this->fontFileMediaId = $fontFileMediaId;
        return $this;
    }

    /**
     * @return Media
     */
    public function getFontFileMedia(): Media
    {
        return $this->fontFileMedia;
    }

    /**
     * @param Media $fontFileMedia
     * @return Font
     */
    public function setFontFileMedia(Media $fontFileMedia): Font
    {
        $this->fontFileMedia = $fontFileMedia;
        return $this;
    }
}