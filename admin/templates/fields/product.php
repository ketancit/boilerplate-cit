<?php

// namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$post = new FieldsBuilder('product');

$post
    ->setLocation('post_type', '==', 'product');
  
$post
    ->addFields(get_field_partial('partials.general'))
    ->addFields(get_field_partial('partials.header'));

return $post;