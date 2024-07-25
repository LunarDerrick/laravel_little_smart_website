<?php

namespace App\Http\Helpers;

use ParsedownExtra;

class CustomParsedown extends ParsedownExtra
{
    // Additional implementations to account for markdowns that aren't properly applied in original ParsedownExtra
    public function __construct()
    {
        // Ensure the parent constructor is called
        parent::__construct();

        // Register the custom inline method
        $this->InlineTypes['+'][] = 'Underline';

        // Ensure the custom inline method is available
        $this->inlineMarkerList .= '+';
    }

    // underline
    protected function inlineUnderline($Excerpt)
    {
        if (preg_match('/\+\+(.*?)\+\+/', $Excerpt['text'], $Matches)) {
            return [
                'element' => [
                    'name' => 'u',
                    'text' => $Matches[1],
                ],
                'extent' => strlen($Matches[0]), // Correct extent calculation
            ];
        }
    }

    // strikethrough
    protected function inlineStrikethrough($Excerpt)
    {
        if (preg_match('/~~(.*?)~~/', $Excerpt['text'], $Matches)) {
            return [
                'element' => [
                    'name' => 'del',
                    'text' => $Matches[1],
                ],
                'text' => $Matches[0],
            ];
        }
    }

    // subscript
    protected function inlineSubscript($Excerpt)
    {
        if (preg_match('/\~\~(.*?)\~\~/', $Excerpt['text'], $Matches)) {
            return [
                'element' => [
                    'name' => 'sub',
                    'text' => $Matches[1],
                ],
                'text' => $Matches[0],
            ];
        }
    }

    // superscript
    protected function inlineSuperscript($Excerpt)
    {
        if (preg_match('/\^\^(.*?)\^\^/', $Excerpt['text'], $Matches)) {
            return [
                'element' => [
                    'name' => 'sup',
                    'text' => $Matches[1],
                ],
                'text' => $Matches[0],
            ];
        }
    }

    // blockquote
    protected function blockQuote($Line)
    {
        if (strpos($Line['text'], '>') === 0) {
            return [
                'element' => [
                    'name' => 'blockquote',
                    'text' => trim(substr($Line['text'], 1)),
                ],
                'text' => $Line['text'],
            ];
        }
    }
}
