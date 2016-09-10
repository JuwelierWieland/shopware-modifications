<?php

/**
 * Created by PhpStorm.
 * User: Sebastian
 * Date: 2016-09-10
 * Time: 17:36
 */
use WielandShopwareModifications\Models\Font;

class Shopware_Controllers_Backend_WielandGravurFonts extends Shopware_Controllers_Backend_Application
{
    protected $model = Font::class;
    protected $alias = 'font';

    protected function getListQuery()
    {
        $query = parent::getListQuery();

        $query->addSelect('media');
        $query->leftJoin('font.fontFileMedia', 'media');

        return $query;
    }

    public function updateAction()
    {
        $params = $this->Request()->getParams();

        if (isset($params['id'])) {
            parent::updateAction();
        } else {
            $success = true;
            $data = [];
            unset($params['_dc']);
            unset($params['module']);
            unset($params['controller']);
            unset($params['action']);

            foreach ($params as $entry) {
                $updateResult = $this->save($entry);
                if (!$updateResult['success']) {
                    $success = false;
                }

                $data[] = $updateResult['data'];
            }

            $this->View()->assign([
                'success' => $success,
                'data' => $data
            ]);
        }
    }
}