<?php

namespace Pyz\Yves\CmsContentWidgetPlanetConnector\ContentWidgetConfigurationProvider;

use Spryker\Shared\CmsContentWidget\Dependency\CmsContentWidgetConfigurationProviderInterface;

class CmsContentWidgetPlanetConnectorConfigurationProvider implements CmsContentWidgetPlanetConnectorConfigurationProviderInterface
{
    public const FUNCTION_NAME = 'planet';

    public function getFunctionName(): string
    {
        return static::FUNCTION_NAME;
    }

    public function getAvailableTemplates(): array
    {
        return [
            CmsContentWidgetConfigurationProviderInterface::DEFAULT_TEMPLATE_IDENTIFIER => '@CmsContentWidgetPlanetConnector/views/cms-planet/cms-planet.twig',
        ];
    }

    public function getUsageInformation(): string
    {
        return "{{ planet(['name']) }}. To use a different template {{ planet(['name'], 'default') }}.";
    }
}
