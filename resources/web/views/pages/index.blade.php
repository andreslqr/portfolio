<?php

use function Laravel\Folio\name;

name('index');

?>

<x-web::layout>
   <x-web::pages.index.sections.landing />
   <x-web::pages.index.sections.about-me />
   <x-web::pages.index.sections.services />
</x-web::layout>
