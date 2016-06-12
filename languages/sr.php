<?php
function lang($phrase){
    static $lang = array(
        'TITLE' => 'David Šili: PHP programer',
        'DESCRIPTION' => 'Ovo je moja lična prezentacija na kojoj možete da se informišete o mojim programerskim uslugama. Bavim se programiranjem u PHP-u a posebna oblast mog interesovanja su mini ERP sistemi i CMS.',
        'AUTHOR' => 'David Šili',
        'INDEX' => 'Početna',
        'ABOUT' => 'O meni',
        'PORTFOLIO' => 'Portfolio',
        'BLOG' => 'Blog',
        'AVAILABILITY' => 'Dostupnost',
        'CONTACT' => 'Kontakt',
        'INDEX1' => 'PHP programer',
        'INDEX2' => 'PHP, MySQL, Java Script, jQuery, HTML, CSS, AJAX',
        'INDEX3' => 'Do 31. septembra ograničeno dostupan, nakon tog potpuno dostupan.',
        'INDEX4' => 'Šta nudim',
        'INDEX5' => 'Bavim se izradom internet aplikacija koje se mogu koristiti na kompjuterima, tabletima i pametnim telefonima. Posebno volim da pravim mini-ERP rešenja i CRM programe.',
        'INDEX6' => 'Kontakt',
        'INDEX7' => 'U svakom trenutku možete da me kontaktirate putem e-mail-a, a preko mobilnog telefona radnim danima od 7:30 do 19:00 na +381 63 540 484 i biće mi drago da porazgovaramo o vašem projektu.',
    );
    return $lang[$phrase];
}