<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Documents;

/**
 * Response Document Interface
 */
interface ResponseDocumentInterface
{

    /**
     * @return string
     */
    public function getKind();

    /**
     * @return array|ResourceDocumentInterface[]
     */
    public function getData();
}
