<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('bbcode_to_html')) {
    function bbcode_to_html($text) {
        // Define the BBCode to HTML conversion patterns
        $bbcode_patterns = array(
            '/\[b\](.*?)\[\/b\]/is',           // Bold
            '/\[i\](.*?)\[\/i\]/is',           // Italics
            '/\[u\](.*?)\[\/u\]/is',           // Underline
            '/\[img\](.*?)\[\/img\]/is',       // Image
            '/\[url\=(.*?)\](.*?)\[\/url\]/is', // URL with link text
            '/\[url\](.*?)\[\/url\]/is',       // URL
            '/\[quote\](.*?)\[\/quote\]/is',   // Quote
            '/\[code\](.*?)\[\/code\]/is',     // Code
            '/\[list\](.*?)\[\/list\]/is',     // Unordered list
            '/\[olist\](.*?)\[\/olist\]/is',   // Ordered list
            '/\[color\=(.*?)\](.*?)\[\/color\]/is', // Color
            '/\[size\=(.*?)\](.*?)\[\/size\]/is',   // Size
            '/\[p\](.*?)\[\/p\]/is',           // Paragraph
            '/\[br\]/is'                       // Line Break
        );

        // Define the HTML replacements
        $html_replacements = array(
            '<strong>$1</strong>',
            '<em>$1</em>',
            '<u>$1</u>',
            '<img src="$1" alt="Image" width="80%">',
            '<a href="$1">$2</a>',
            '<a href="$1">$1</a>',
            '<blockquote>$1</blockquote>',
            '<pre><code>$1</code></pre>',
            '<ul>$1</ul>',
            '<ol>$1</ol>',
            '<span style="color:$1">$2</span>',
            '<span style="font-size:$1px">$2</span>',
            '<p>$1</p>',
            '<br/>'
        );

        // Replace list items in [list] and [olist] tags
        $text = preg_replace('/\[list\](.*?)\[\/list\]/is', '<ul>$1</ul>', $text);
        $text = preg_replace('/\[olist\](.*?)\[\/olist\]/is', '<ol>$1</ol>', $text);
        $text = preg_replace('/\[\*\](.*?)\[\*\]/is', '<li>$1</li>', $text);

        // Perform the BBCode to HTML conversion
        $html_text = preg_replace($bbcode_patterns, $html_replacements, $text);

        // Return the converted HTML text
        return $html_text;
    }
}

if (!function_exists('html_to_bbcode')) {
    function html_to_bbcode($text) {
        // Define the HTML to BBCode conversion patterns
        $html_patterns = array(
            '/<strong>(.*?)<\/strong>/is',         // Bold
            '/<em>(.*?)<\/em>/is',                 // Italics
            '/<u>(.*?)<\/u>/is',                   // Underline
            '/<img src="(.*?)" alt="Image" width="80%">/is',   // Image
            '/<a href="(.*?)">(.*?)<\/a>/is',      // URL with link text
            '/<a href="(.*?)">(.*?)<\/a>/is',      // URL
            '/<blockquote>(.*?)<\/blockquote>/is', // Quote
            '/<pre><code>(.*?)<\/code><\/pre>/is', // Code
            '/<ul>(.*?)<\/ul>/is',                // Unordered list
            '/<ol>(.*?)<\/ol>/is',                // Ordered list
            '/<span style="color:(.*?)">(.*?)<\/span>/is', // Color
            '/<span style="font-size:(.*?)px">(.*?)<\/span>/is', // Size
            '/<p>(.*?)<\/p>/is',                  // Paragraph
            '/<br\/>/is'                          // Line Break
        );

        // Define the BBCode replacements
        $bbcode_replacements = array(
            '[b]$1[/b]',
            '[i]$1[/i]',
            '[u]$1[/u]',
            '[img]$1[/img]',
            '[url=$1]$2[/url]',
            '[url=$1]$1[/url]',
            '[quote]$1[/quote]',
            '[code]$1[/code]',
            '[list]$1[/list]',
            '[olist]$1[/olist]',
            '[color=$1]$2[/color]',
            '[size=$1]$2[/size]',
            '[p]$1[/p]',
            '[br]'
        );

        // Replace list items in [list] and [olist] tags
        $text = preg_replace('/<li>(.*?)<\/li>/is', '[*]$1', $text);

        // Perform the HTML to BBCode conversion
        $bbcode_text = preg_replace($html_patterns, $bbcode_replacements, $text);

        // Return the converted BBCode text
        return $bbcode_text;
    }
}
