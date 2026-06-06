<?php

declare (strict_types=1);
namespace TomasVotruba\ClassLeak\Commands;

use Closure;
use ClassLeak202606\Entropy\Console\Contract\CommandInterface;
use ClassLeak202606\Entropy\Console\Enum\ExitCode;
use ClassLeak202606\Entropy\Console\Output\HelpPrinter;
final class ListCommand implements CommandInterface
{
    /**
     * @var Closure():HelpPrinter
     * @readonly
     */
    private $helpPrinterFactory;
    /**
     * @param Closure():HelpPrinter $helpPrinterFactory Lazy, as HelpPrinter needs CommandRegistry with this command
     */
    public function __construct(Closure $helpPrinterFactory)
    {
        $this->helpPrinterFactory = $helpPrinterFactory;
    }
    public function getName() : string
    {
        return 'list';
    }
    public function getDescription() : string
    {
        return 'List available commands';
    }
    /**
     * @api called by entropy console via reflection
     *
     * @param bool $ansi Kept for backward compatibility, colored output is always on
     */
    public function run(bool $ansi = \false) : int
    {
        $helpPrinter = ($this->helpPrinterFactory)();
        $helpPrinter->print();
        return ExitCode::SUCCESS;
    }
}
