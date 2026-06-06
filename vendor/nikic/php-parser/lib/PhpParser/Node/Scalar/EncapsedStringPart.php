<?php

declare (strict_types=1);
namespace ClassLeak202606\PhpParser\Node\Scalar;

use ClassLeak202606\PhpParser\Node\InterpolatedStringPart;
require __DIR__ . '/../InterpolatedStringPart.php';
if (\false) {
    /**
     * For classmap-authoritative support.
     *
     * @deprecated use \PhpParser\Node\InterpolatedStringPart instead.
     */
    class EncapsedStringPart extends InterpolatedStringPart
    {
    }
}
