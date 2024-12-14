<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude('var')
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        'yoda_style' => false,
        'increment_style' => false,
        'phpdoc_align' => ['align' => 'left'],
        'concat_space' => ['spacing' => 'one'],
    ])
    ->setFinder($finder)
;
