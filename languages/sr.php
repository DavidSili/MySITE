<?php
function lang($phrase){
    static $lang = array(
        'TITLE' => 'David Šili: PHP programer',
        'DESCRIPTION' => 'Ovo je moja lična prezentacija na kojoj možete da se informišete o mojim programerskim uslugama. Bavim se programiranjem u PHP-u a posebna oblast mog interesovanja su mini ERP sistemi i CMS.',
        'AUTHOR' => 'David Šili',
        'INDEX' => 'Početna',
        'ABOUT' => 'O nama',
        'PORTFOLIO' => 'Portfolio',
        'BLOG' => 'Blog',
        'AVAILABILITY' => 'Dostupnost',
        'CONTACT' => 'Kontakt',
    );
    return $lang[$phrase];
}