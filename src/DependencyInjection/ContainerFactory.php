<?php

declare (strict_types=1);
namespace TomasVotruba\ClassLeak\DependencyInjection;

use ClassLeak202606\Entropy\Console\Output\HelpPrinter;
use ClassLeak202606\Entropy\Container\Container;
use ClassLeak202606\PhpParser\Parser;
use ClassLeak202606\PhpParser\ParserFactory;
use TomasVotruba\ClassLeak\Commands\ListCommand;
/**
 * @api
 */
final class ContainerFactory
{
    /**
     * @api
     */
    public function create() : Container
    {
        $container = new Container();
        // register manually, as the lazy HelpPrinter dependency cannot be autowired
        $container->service(ListCommand::class, static function (Container $container) : ListCommand {
            return new ListCommand(static function () use($container) : HelpPrinter {
                return $container->make(HelpPrinter::class);
            });
        });
        $container->autodiscover(__DIR__ . '/..');
        $container->service(Parser::class, static function () : Parser {
            $parserFactory = new ParserFactory();
            return $parserFactory->createForHostVersion();
        });
        return $container;
    }
}
