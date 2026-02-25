<?php

namespace App\Services;

use BinaryTorch\LaRecipe\Contracts\MarkdownParser;

class CustomMarkdownParser implements MarkdownParser
{
    /**
     * Parse the given source to Markdown, using your Markdown parser of choice.
     *
     * @param string $source Markdown source contents
     *
     * @return null|string|string[] HTML output
     */
    public function parse($source)
    {
        return (new CustomParsedownExtra())->text($source);
    }
}
