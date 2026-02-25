<?php

namespace App\Services;

use ParsedownExtra;
use ReflectionMethod;

class CustomParsedownExtra extends ParsedownExtra
{
    protected function blockHeader($Line)
    {
        // Use reflection to call Parsedown::blockHeader
        $method = new ReflectionMethod(\Parsedown::class, 'blockHeader');
        $method->setAccessible(true);
        $Block = $method->invoke($this, $Line);

        if (! isset($Block)) {
            return null;
        }

        // Fix for undefined array key "text" in ParsedownExtra
        if (isset($Block['element']['text']) && preg_match('/[ #]*{('.$this->regexAttribute.'+)}[ ]*$/', $Block['element']['text'], $matches, PREG_OFFSET_CAPTURE))
        {
            $attributeString = $matches[1][0];

            $Block['element']['attributes'] = $this->parseAttributeData($attributeString);

            $Block['element']['text'] = substr($Block['element']['text'], 0, $matches[0][1]);
        }

        return $Block;
    }
}
