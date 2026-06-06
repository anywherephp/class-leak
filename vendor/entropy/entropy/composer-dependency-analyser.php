<?php

// @see https://github.com/shipmonk-rnd/composer-dependency-analyser/
declare (strict_types=1);
namespace ClassLeak202606;

use ClassLeak202606\ShipMonk\ComposerDependencyAnalyser\Config\Configuration;
use ClassLeak202606\ShipMonk\ComposerDependencyAnalyser\Config\ErrorType;
return (new Configuration())->ignoreErrorsOnExtension('ext-filter', [ErrorType::SHADOW_DEPENDENCY]);
