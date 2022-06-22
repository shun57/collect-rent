<?php

declare(strict_types=1);

namespace App\Logging;

use Monolog\Logger;
use Monolog\Formatter\LineFormatter;
use Monolog\Processor\IntrospectionProcessor;

class CustomizeFormatter
{
    /**
     *
     * @param  \Illuminate\Log\Logger  $logger
     * @return void
     */
    public function __invoke($logger): void
    {
        $format = "%datetime% [%channel%.%level_name%] - %extra.class%(L.%extra.line%) - %message%" . PHP_EOL;
        $dateFormat = "Y-m-d H:i:s";
        $lineFormatter = new LineFormatter($format, $dateFormat, true, true);

        $introspectionProcessor = new IntrospectionProcessor(Logger::DEBUG, ['Illuminate\\']);

        foreach ($logger->getHandlers() as $handler) {
            $handler->pushProcessor($introspectionProcessor);
            $handler->setFormatter($lineFormatter);
        }
    }
}
