<?php

declare(strict_types=1);

namespace Rector\Skipper\Skipper;

use Rector\Skipper\Matcher\FileInfoMatcher;

final class SkipSkipper
{
    public function __construct(
        private readonly FileInfoMatcher $fileInfoMatcher
    ) {
    }

    /**
     * @param array<string, string[]|null> $skippedClasses
     */
    public function doesMatchSkip(object | string $checker, string $filePath, array $skippedClasses): bool
    {
        foreach ($skippedClasses as $skippedClass => $skippedFiles) {
            if (! is_a($checker, $skippedClass, true)) {
                continue;
            }

            // skip everywhere
            if (! is_array($skippedFiles)) {
                return true;
            }

            if ($this->fileInfoMatcher->doesFileInfoMatchPatterns($filePath, $skippedFiles)) {
                return true;
            }
        }

        return false;
    }
}
