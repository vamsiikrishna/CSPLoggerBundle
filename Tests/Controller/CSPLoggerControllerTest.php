<?php

namespace Sockam\CSPLoggerBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CSPLoggerControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $method = 'POST';
        $uri = '/csp/log';
        $parameters = [];
        $files = [];
        $server = [
            'CONTENT_TYPE' => 'application/json',
        ];
        $content = <<<'JSON'
    {
  "csp-report": {
    "document-uri": "http://example.org/page.html",
    "referrer": "http://evil.example.com/",
    "blocked-uri": "http://evil.example.com/evil.js",
    "violated-directive": "script-src 'self' https://apis.google.com",
    "original-policy": "script-src 'self' https://apis.google.com; report-uri http://example.org/my_amazing_csp_report_parser"
  }
}
JSON;
        $client = static::createClient();
        $client->request($method, $uri, $parameters, $files, $server, $content);
        $response = $client->getResponse();
        $this->assertTrue($response->isSuccessful(), 'Accepting a valid log test failed');
    }
}
