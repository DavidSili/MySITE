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
        'INDEX2' => 'PHP, MySQL, Java Script, jQuery, HTML, CSS, JSON',
        'INDEX3' => 'Do 31. septembra ograničeno dostupan, nakon tog potpuno dostupan.',
        'INDEX4' => 'Šta nudim',
        'INDEX5' => 'Bavim se izradom internet aplikacija koje se mogu koristiti na kompjuterima, tabletima i pametnim telefonima. Posebno volim da pravim mini-ERP rešenja i CRM programe.',
        'INDEX6' => 'Kontakt',
        'INDEX7' => 'U svakom trenutku možete da me kontaktirate putem e-mail-a, a preko mobilnog telefona radnim danima od 7:30 do 19:00 na +381 63 540 484 i biće mi drago da porazgovaramo o vašem projektu.',
        'SAMPLE_PROJECTS' => 'Neki od projekata:',
        'CALENDAR_TITLE' => 'Kalendar dostupnosti',
        'USUAL_AVAIL' => 'Uobičajena dostupnost',
        'AVAIL_TEXT' => 'Uglavnom sam dostupan svakog dana osim subote, ukoliko drugačije nije naznačeno u kalendaru. Najlakše ćete me dobiti preko mobilnog telefona do 19h na brojeve: 063/540-484 i 060/8080-612 a sa zadovoljstvom ću odvojiti vreme da se dogovorimo oko željenog projekta.</p><p>Čak i ako mi je raspored pun, slobodno mi ostavite poruku u vezi projekta za koji ste zainteresovani kako bi pokušali da nađemo neko rešenje koje bi odgovaralo i vama i meni.',
        'AVAIL_PLACEHOLDER' => 'Kontakt u vezi dostupnosti',
        'AVAIL_NAME' => 'Ime',
        'AVAIL_EMAIL' => 'E-mail',
        'AVAIL_OTHER' => 'Ostale informacije za kontakt - firma? mesto? veb-stranica?',
        'AVAIL_URL' => 'Ostaviti prazno!!',
        'AVAIL_WHEN' => 'Za kada vam je potrebna pomoć',
        'AVAIL_MESSAGE' => 'Poruka...',
        'AVAIL_SEND' => 'Pošalji poruku',
        'MSG_SENT' => 'Poruka je poslata. Prvom mogućom prilikom ću vas kontaktirati.',
        'CONTACT_ME' => 'Kontaktirajte me',
        'CONTACT_SENDMESSAGE' => 'Pošaljite mi poruku',
        'CONTACT_TEXT' => 'Otvoren sam i za rad po ugovoru i po projektu tako da ako postoji bilo šta što vas interesuje ili vam treba pomoć, slobodno me kontaktirajte. Najbrže me možete dobiti preko mobilnog telefona, ali najsigurniji način je ako mi pošaljete e-mail ili iskoristite ovo polje za slanje poruke.</p><p>Takođe <a href="views/availability.php">ovde možete da pogledate i moju dostupnost</a>, ali nemojte dozvoliti da vas obeshrabri ako primetite da je kalendar ispunjen, uvek sam spreman za razgovor i pronalaženje nekog rešenja koje će i vama i meni odgovarati.',
        'CONTACT_PLACEHOLDER' => 'Direktni kontakt',
        'CONTACT_PHONE' => 'Telefon:',
        'CONTACT_PHONENO' => '063/540-484<br>060/8080-612',
        'CONTACT_EMAIL' => 'E-mail:',
        'CONTACT_SOCIAL' => 'Društvene mreže:',
        'ABOUT_ME' => 'O meni:',
        'ABOUT_TEXT1' => 'Zovem se David Šili i bavim se razvojem internet aplikacija u PHP-u. Posebno volim da razvijam mini-ERP rešenja, kao i CRM aplikacije, a rado se pozabavim i bilo kojim drugim projektom koji se ponudi.</p><p class="veci_tekst">Tokom poslednje četiri godine razvijao sam jednostavne edukativne aplikacije, kao i složena mini-ERP rešenja za pojedince kao i za firme.',
        'ABOUT_TEXT2' => 'U mom poslu najviše se služim programiranjem u PHP-u uz korišćenje baze podataka MySQL. Imam iskustva i dobro znanje i u HTML, CSS, JavaScript i jQuery a trenutno učim i OOP.</p><p>Iako se moj posao zasniva na programskom delu razvoja veb sajtova, kada sam sam zadužen za razvoj celog sajta veoma sam pedantan po pitanju uklapanja boja i dimenzija koje se koriste, kako bi sajt bio vizuelno što ugodniji, da može brzo da se učitava, da se prilagođava različitim platformama i brovzerima, da bude dostupan vama, vašim klijentima i pretraživačima, bilo da koristite stolni kompjuter, laptop, tablet ili pametni telefon.</p><p>Stalno volim da učim nešto novo i kada se suočim sa nečim nepoznatim ne odustajem dok to ne naučim ili ne napravim plan kako do tog da stignem. U svakom novom projektu implementiram nove stvari koje sam naučio kako bih bio siguran da imate savremeni program i osigurao moj stalni napredak kao programera. Stalno imam neke nove ideje, a pošto sam kreativan i istrajan, često i uspem da razvijem te ideje do kraja. Ugodno mogu da radim sam na projektu od kuće, ali više uživam kada mojim sposobnostima mogu da doprinesem dobrom timu u radu na zajedničkom projektu. Kao što sam volim da učim, tako mi pričinjava i posebno zadovoljstvo kada sa drugima mogu da podelim moje znanje.</p><p>Prošle godine sam magistrirao Pastoralnu Teologiju na Newbold univerzitetu u Engleskoj, a poslednjih deset godina sam radio kao sveštenik u Srbiji. Iako je sasvim druga vrsta posla, u tom periodu sam stekao veoma korisno znanje kao i sposobnosti u oblasti srednjeg menadžmenta, administracije, psihologije i podučavanja. Poslednje 4 godine sve više sam uviđao korisnost optimizovanja rada korišćenjem internet aplikacija kako u mojoj službi, tako i za druge klijente, zbog čega sam počeo da razvijam aplikacije koje u mnogome poboljšavaju efikasnost poslovanja firmi pa i samih pojedinaca.</p><p>Još jedna od mojih velikih strasti je izviđaštvo. Trenutno sam zadužen za Master Gajd program u regionu koji podrazumeva obuku odraslih vođa izviđača za rad sa decom. U okviru te pozicije, zadužen sam za stvaranje i prenošenje vizije i misije, kao i razvijanje strategije programa sa timom.</p><p>Inače, sa mojom suprugom Petrom imam dve ćerke koji mi predstavljaju veliku radost u životu. Volim da kampujem i da osvajam planinske vrhove Balkana, da boravim u prirodi kao i u mojoj stolarskoj radionici gde pravim mala umetnička dela. U dvorištu držim pčele i bonsai drveće. Volim da radim sa elektronikom, tako da često popravljam laptopove i periferne uređaje, a ponekad ih i dokrajčim. Od literature volim da čitam specijalizovanu literaturu za psihologiju i teologiju na srpskom, bugarskom ili engleskom jeziku. Kada god radim volim da slušam muziku, uglavnom klasiku, duhovne ili evergreen pesme. Do sada sam pretrčao dva maratona, desetak polu maratona i dva sprint triatlona.',
        'ABOUT_TEXT3' => 'Klijenti sa kojima sam do sada radio:',
        'OV_PROJGITHUB' => 'Projekat na GitHub-u',
        'OV_PROJDEMO' => 'Primer',
        'ARCHIVE_TITLE' => 'Arhiva',
        'TAGS' => 'Naznake',
        'ALL_ARTICLES' => 'Svi članci',
        'WRITTEN_AT' => 'Napisano u',
    );
    return $lang[$phrase];
}