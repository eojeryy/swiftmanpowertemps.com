<?php

namespace Tests\Unit;

use App\Support\RichText;
use PHPUnit\Framework\TestCase;

class RichTextTest extends TestCase
{
    public function test_plain_text_preserves_paragraphs_unicode_and_literal_angle_brackets(): void
    {
        $html = RichText::html("Work in Montréal\nPay: $25 & benefits\nLift < 20 kg");
        $this->assertStringContainsString('Montréal', $html);
        $this->assertStringContainsString('Lift &lt; 20 kg', $html);
        $this->assertStringContainsString('<br>', $html);
        $this->assertSame("Work in Montréal\nPay: $25 & benefits\nLift < 20 kg", RichText::plainText($html));
    }

    public function test_visual_formatting_is_preserved_and_browser_tags_are_normalized(): void
    {
        $html = RichText::html('<h3>Responsibilities</h3><div><b>Pick</b> and <i>pack</i> orders.</div><ul><li>Work <u>safely</u>.</li></ul>');
        $this->assertSame('<h3>Responsibilities</h3><p><strong>Pick</strong> and <em>pack</em> orders.</p><ul><li>Work <u>safely</u>.</li></ul>', $html);
        $this->assertSame($html, RichText::html($html));
        $this->assertStringContainsString("Responsibilities\nPick and pack orders.\n", RichText::plainText($html));
    }

    public function test_executable_elements_attributes_and_urls_are_removed(): void
    {
        $html = RichText::html('<p onclick="alert(1)" style="color:red">Real work</p><script>alert(1)</script><svg onload="alert(1)"><text>Hidden</text></svg><iframe src="https://example.com">Hidden</iframe><img src=x onerror="alert(1)"><a href="javascript:alert(1)">Bad link</a><a href="data:text/html,test">Data link</a>');
        $this->assertSame('<p>Real work</p>Bad linkData link', $html);
    }

    public function test_links_allow_only_valid_web_and_email_addresses(): void
    {
        $html = RichText::html('<a href="https://example.com/jobs?a=1&amp;b=2" onclick="bad()">Details</a><a href="mailto:hr@example.com">Email</a><a href="//example.com">Relative</a><a href="https://">Invalid</a>');
        $this->assertStringContainsString('href="https://example.com/jobs?a=1&amp;b=2"', $html);
        $this->assertStringContainsString('rel="nofollow noopener noreferrer"', $html);
        $this->assertStringContainsString('href="mailto:hr@example.com"', $html);
        $this->assertStringNotContainsString('onclick', $html);
        $this->assertStringNotContainsString('href="//example.com"', $html);
        $this->assertStringNotContainsString('href="https://"', $html);
    }

    public function test_encoded_protocols_and_malformed_markup_cannot_escape_the_allowlist(): void
    {
        foreach ([
            '<a href="jav&#x61;script:alert(1)">Text</a>',
            '<a href="java&#10;script:alert(1)">Text</a>',
            '</body><script>alert(1)</script><p>Text</p>',
            '<math><mtext><img src=x onerror=alert(1)></mtext></math><p>Text</p>',
            '<p title="<img src=x onerror=alert(1)>">Text</p>',
        ] as $input) {
            $html = RichText::html($input);
            $this->assertStringNotContainsString('alert(1)', $html);
            $this->assertStringNotContainsString('<img', $html);
            $this->assertStringContainsString('Text', $html);
        }
    }

    public function test_empty_visual_editor_content_remains_empty(): void
    {
        $this->assertSame('', RichText::html(null));
        $this->assertSame('', RichText::html('<p><br></p>'));
        $this->assertSame('', RichText::html('<script>bad()</script>'));
    }
}
