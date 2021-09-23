<?php
declare(strict_types=1);

namespace OCA\FullTextSearch_AdminAPI\AppInfo;

use OCP\AppFramework\App;
use OCA\FullTextSearch_Elasticsearch\Service\ConfigService;
use OCA\FullTextSearch_Elasticsearch\Service\MiscService;

class Application extends App {
    const APP_NAME = 'FullTextSearch_AdminAPI';

    public function __construct() {
        parent::__construct(self::APP_NAME);
    }

    public function registerClasses(): void {
        # force loading of elasticsearch app
        \OC::$server->query(\OCA\FullTextSearch_Elasticsearch\Service\SearchMappingService::class);

        $container = \OC::$server->getRegisteredAppContainer('FullTextSearch_Elasticsearch');

        $container->registerAlias("OCA\FullTextSearch_Elasticsearch\Service\SearchMappingService", "OCA\FullTextSearch_AdminAPI\Service\SearchMappingService");
        $container->registerAlias("OCA\FullTextSearch_Elasticsearch\Service\IndexMappingService", "OCA\FullTextSearch_AdminAPI\Service\IndexMappingService");
    }

}
