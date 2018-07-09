#!/usr/bin/php
<?php

namespace Abs\Lang\Cmd;

use Abs\Lang\Tool;

require_once(__DIR__ . '/Tool.class.php');

// Run tool
try {
    $tool = new Tool();
    $tool->getUntranslatedPhrases();
} catch (\Exception $e) {
    echo("\n{$e->getMessage()}");
}