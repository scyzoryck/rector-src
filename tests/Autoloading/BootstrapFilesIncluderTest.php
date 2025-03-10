<?php

declare(strict_types=1);

namespace Rector\Core\Tests\Autoloading;

use PHPUnit\Framework\Attributes\DoesNotPerformAssertions;
use Rector\Core\Autoloading\BootstrapFilesIncluder;
use Rector\Testing\PHPUnit\AbstractLazyTestCase;

final class BootstrapFilesIncluderTest extends AbstractLazyTestCase
{
    #[DoesNotPerformAssertions]
    public function test(): void
    {
        $bootstrapFilesIncluder = $this->make(BootstrapFilesIncluder::class);
        $bootstrapFilesIncluder->includeBootstrapFiles();
    }
}
