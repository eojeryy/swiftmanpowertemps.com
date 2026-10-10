<?php

namespace App\Support;

use DOMDocument;
use DOMElement;
use DOMNode;

final class RichText
{
    /** Keep the same small set of formatting elements wherever a description is displayed. */
    public static function html(?string $value): string
    {
        if ($value === null || trim($value) === '') {
            return '';
        }

        if (! preg_match('/<\/?[a-z][^>]*>/i', $value)) {
            return '<p>'.str_replace(["\r\n", "\r", "\n"], '<br>', htmlspecialchars(trim($value), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')).'</p>';
        }

        $document = new DOMDocument;
        $previous = libxml_use_internal_errors(true);

        try {
            $document->loadHTML('<?xml encoding="UTF-8"><html><body>'.$value.'</body></html>', LIBXML_NONET);
            $html = self::children($document);
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($previous);
        }

        return trim(html_entity_decode(strip_tags($html), ENT_QUOTES | ENT_HTML5, 'UTF-8')) === '' ? '' : $html;
    }

    public static function plainText(?string $value): string
    {
        $html = self::html($value);
        $html = preg_replace('/<br\s*\/?\s*>|<\/(?:p|h2|h3|li|blockquote|ul|ol)>/i', "\n", $html);

        return trim(html_entity_decode(strip_tags($html), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
    }

    private static function children(DOMNode $node): string
    {
        $html = '';
        foreach ($node->childNodes as $child) {
            $html .= self::node($child);
        }

        return $html;
    }

    private static function node(DOMNode $node): string
    {
        if ($node->nodeType === XML_TEXT_NODE) {
            return htmlspecialchars($node->textContent, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        }

        if (! $node instanceof DOMElement) {
            return '';
        }

        $tag = strtolower($node->tagName);
        if (in_array($tag, ['script', 'style', 'iframe', 'object', 'embed', 'svg', 'math', 'template', 'form', 'input', 'button', 'select', 'textarea', 'head'], true)) {
            return '';
        }

        $content = self::children($node);
        $tag = ['b' => 'strong', 'i' => 'em', 'div' => 'p'][$tag] ?? $tag;
        if (! in_array($tag, ['p', 'br', 'h2', 'h3', 'strong', 'em', 'u', 's', 'ul', 'ol', 'li', 'blockquote', 'a'], true)) {
            return $content;
        }

        if ($tag === 'br') {
            return '<br>';
        }

        if ($tag === 'a') {
            $url = trim($node->getAttribute('href'));
            $valid = (preg_match('/^https?:\/\//i', $url) && filter_var($url, FILTER_VALIDATE_URL))
                || (str_starts_with(strtolower($url), 'mailto:') && filter_var(substr($url, 7), FILTER_VALIDATE_EMAIL));
            if (! $valid) {
                return $content;
            }

            return '<a href="'.htmlspecialchars($url, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').'" rel="nofollow noopener noreferrer" target="_blank">'.$content.'</a>';
        }

        return '<'.$tag.'>'.$content.'</'.$tag.'>';
    }
}
