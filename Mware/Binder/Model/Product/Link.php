<?php

namespace Mware\Binder\Model\Product;

use Mware\Binder\Helper\Data;

class Link extends \Magento\Catalog\Model\ResourceModel\Product\Link
{
    protected $binderHelper;

    public function __construct(Data $binderHelper,
                                \Magento\Framework\Model\ResourceModel\Db\Context $context,
                                \Magento\Catalog\Model\ResourceModel\Product\Relation $catalogProductRelation,
                                $connectionName = null
    )
    {
        $this->binderHelper = $binderHelper;
        parent::__construct($context, $catalogProductRelation, $connectionName);
    }

    public function saveProductLinks($parentId, $data, $typeId)
    {
        parent::saveProductLinks($parentId, $data, $typeId);

        if ($this->binderHelper->isTypeEnabled($typeId) == 1) {

            $relatedId = key($data);

            $data2[$parentId] = array(
                'link_type' => $data[$relatedId]['link_type'],
                'position' => $data[$relatedId]['position'],
                'product_id' => $parentId
            );
            parent::saveProductLinks($relatedId, $data2, $typeId);
        }
        return $this;
    }

    public function deleteProductLink($linkId)
    {
        $connection = $this->getConnection();

        $select = $connection->select()->from(
                $this->getMainTable()
            )->where(
            'link_id = ?', $linkId
        );
        $res    = $connection->fetchRow($select);

        $select2 = $connection->select()->from(
                $this->getMainTable()
            )->where(
                'product_id = ?', (int) $res['linked_product_id']
            )->where(
                'linked_product_id = ?', (int) $res['product_id']
            )->where(
            'link_type_id = ?', (int) $res['link_type_id']
        );
        $res2    = $connection->fetchRow($select2);

        if ($res2['link_id']) {
            $linkId2 = (int) $res2['link_id'];
            $connection->delete($this->getMainTable(),
                ['link_id = ?' => $linkId2]);
        }

        return $connection->delete($this->getMainTable(), ['link_id = ?' => $linkId]);
    }
}