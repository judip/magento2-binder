<?php

namespace Mware\Binder\Helper;

/**
 * Contact base helper
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const XML_PATH_ENABLED = 'mwarebinder/setup';

    public function isTypeEnabled($typeId): int
    {
        $enabled = null;

        switch ($typeId) {
            case 1:
                $enabled = $this->scopeConfig->getValue(
                    'mwarebinder/setup/related_enabled',
                    \Magento\Store\Model\ScopeInterface::SCOPE_STORE
                );
                break;
            case 4:
                $enabled = $this->scopeConfig->getValue(
                    'mwarebinder/setup/upsell_enabled',
                    \Magento\Store\Model\ScopeInterface::SCOPE_STORE
                );
                break;
            case 5:
                $enabled = $this->scopeConfig->getValue(
                    'mwarebinder/setup/crosssell_enabled',
                    \Magento\Store\Model\ScopeInterface::SCOPE_STORE
                );
                break;
        }
        return $enabled;
    }
}