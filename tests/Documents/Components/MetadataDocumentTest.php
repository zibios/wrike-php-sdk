<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Tests\Documents\Components;

use Zibios\WrikePhpSdk\Documents\Components\MetadataDocument;
use Zibios\WrikePhpSdk\Tests\Documents\ResourceDocumentTestCase;

/**
 * Metadata Document Test
 */
class MetadataDocumentTest extends ResourceDocumentTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = MetadataDocument::class;

    /**
     * @var array
     */
    protected $properties = [
        'key',
        'value',
    ];
}
