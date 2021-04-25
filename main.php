#!/usr/bin/env php

<?php

use Alfred\Workflows\Workflow;

require __DIR__ . '/vendor/autoload.php';

define('BASE_URL', 'https://httpstatuses.com');

$dom = new IvoPetkov\HTML5DOMDocument();
$dom->loadHTMLFile(BASE_URL);

$workflow = new Workflow;

foreach($dom->querySelectorAll('div.codes li a') as $it) {
    $workflow->result()
            ->uid(trim($it->getAttribute('href'),"/"))
            ->title($it->textContent)
            ->quicklookurl(BASE_URL.$it->getAttribute('href'))
            ->arg(BASE_URL.$it->getAttribute('href'));
}

echo $workflow->output();

?>