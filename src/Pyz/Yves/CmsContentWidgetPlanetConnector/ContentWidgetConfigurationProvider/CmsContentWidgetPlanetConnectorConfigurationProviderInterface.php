<?php

namespace Pyz\Yves\CmsContentWidgetPlanetConnector\ContentWidgetConfigurationProvider;

use Spryker\Shared\CmsContentWidget\Dependency\CmsContentWidgetConfigurationProviderInterface;

interface CmsContentWidgetPlanetConnectorConfigurationProviderInterface extends
    CmsContentWidgetConfigurationProviderInterface
{
    /**
     * @return string
     */
    public function getFunctionName(): string;
    /**
     * @return array
     */
    public function getAvailableTemplates(): array;
    /**
     * @return string
     */
    public function getUsageInformation(): string;

}
