<?php

declare (strict_types=1);
namespace ClassLeak202606\Entropy\Attributes;

use Attribute;
use ClassLeak202606\PHPUnit\Framework\TestCase;
#[Attribute(Attribute::TARGET_CLASS)]
final class RelatedTest
{
    /**
     * @param class-string<TestCase> $testClass
     */
    public function __construct(string $testClass)
    {
    }
}
