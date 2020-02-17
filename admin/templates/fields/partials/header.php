<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$header = new FieldsBuilder('header');

$header
    ->addTab('header', ['placement' => 'left'])
        ->addText('intro', ['label' => 'Introduction'])
            ->setInstructions('An introduction to be shown before the title.')
            
        ->addTrueFalse('subtitle', ['ui' => 1])
            ->setInstructions('A subtitle to be shown after the title.');
            
return $header;