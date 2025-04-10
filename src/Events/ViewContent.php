<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel\Events;

/**
 * Class ViewContent.
 */
class ViewContent extends AbstractEvent
{
    public const NAME = 'ViewContent';
    public const PROPERTY_NAME = 'content_name';
    public const PROPERTY_CATEGORY = 'content_category';
    public const PROPERTY_IDS = 'content_ids';
    public const PROPERTY_TYPE = 'content_type';

    /**
     * @param $name
     * @return AbstractEvent|ViewContent
     */
    public function withName($name)
    {
        return $this->setProperty(self::PROPERTY_NAME, $name);
    }

    /**
     * @param $category
     * @return AbstractEvent|ViewContent
     */
    public function withCategory($category)
    {
        return $this->setProperty(self::PROPERTY_CATEGORY, $category);
    }

    /**
     * @param array $ids
     * @return AbstractEvent|ViewContent
     */
    public function withIds(array $ids)
    {
        return $this->setProperty(self::PROPERTY_IDS, $ids);
    }

    /**
     * @param $type
     * @return AbstractEvent|ViewContent
     */
    public function withType($type)
    {
        return $this->setProperty(self::PROPERTY_TYPE, $type);
    }
}
