<?php

declare(strict_types=1);

use Mautic\CoreBundle\DependencyInjection\MauticCoreExtension;
use MauticPlugin\PostmarkBundle\Mailer\Factory\PostmarkTransportFactory;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $configurator): void {
    $services = $configurator->services()
        ->defaults()
        ->autowire()
        ->autoconfigure()
        ->public();

    $services->load('MauticPlugin\\PostmarkBundle\\', '../')
        //->exclude('../{Config,Helper/PostmarkResponse.php,Mailer/Transport/PostmarkTransport.php}');
        ->exclude('../{' . implode(',', array_merge(MauticCoreExtension::DEFAULT_EXCLUDES, $excludes)) . '}');

    //$services->get(PostmarkTransportFactory::class)->tag('mailer.transport_factory');
};
