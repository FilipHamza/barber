# Přostředí

Vytvořeno na Windows 11 s WSL, Ubuntu a Docker for Windows.

# Instalace

1. stáhnout projekt do libovolné složky

``
$ git clone ...
``

2. upravit oprávnění na run.sh na spustitelný soubor

``
$ sudo chmod +x run.sh
``

3. spustit instalaci prostředí

``
$ ./run.sh
``

# Spuštění

1. spustit kontejnery

``
$ ./vendor/bin/sail up -d
``

2. spustit migrace

``
$ ./vendor/bin/sail php artisan migrate
``

3. vygenerovat css a js

``
$ ./vendor/bin/sail npm install
$ ./vendor/bin sail npm run build
``

V projektu jsou použity vzorové texty a vzorové obrázky vygenerované pomocí nástroje Chat GPT.

Projekt byl vytvořen za pomocí výukových videí na https://laracasts.com/ a za využití dokumentace
na https://laravel.com/docs/10.x/installation

Pro veřejnou část projektu byla použita šablona https://startbootstrap.com/theme/agency s licencí MIT.

Pro administrační část projektu byla použita šablona https://getbootstrap.com/docs/5.0/examples/dashboard/
a https://getbootstrap.com/docs/5.0/examples/sign-in/

# Popis projektu

Projekt řeší webovou a administrační část barber shopu. Nabízí one-page stránku s formulářem pro vytvoření rezervace a
současně i administrační rozhraní jak pro administrátora (majitele), tak pro jednotlivé holiče (zaměstnance).

## Webová část

Webová část prezentace je velmi jednoduchá, prezentuje informace o salonu a na konci stránky je formulář pro vytvoření
rezervace. Jednotlivé služby a jednotlivé osoby jsou vypsány v prezentaci dynamicky (dle uložených dat v databázi) a
zbytek textu na webu je statický.

Formulář zobrazuje validační chyby a dynamicky nabízí možné časy, kdy má daný holič "volno" (při výběru holiče a data se
na pozadí vytvoří request, který vrátí volné hodiny). Je ošetřena také možnost, kdy je již vybrán datum a čas, ale než
se rezervace vytvoří, je požadovaný čas již blokován.

## Možná rozšíření - co zlepšit - webová část

Více si pohrát s nabídkou volných dnů. Nyní je použit nativní kalendář HTML5, bylo by lepší implementovat rozšířený
kalendář (datepicker) a předávat mu dostupné dny. Také by bylo v produkčním prostředí nutné implementovat captchu.
Samozřejmě by bylo potřeba také odesílat na email potvrzení o vytvořené rezervaci, ideálně i s kalendářovou schůzkou (
viz RegioJet).

## Administrace

V administraci je možné:

1. přidávat, mazat, deaktivovat, upravovat (komplet CRUD) jednotlivé administrátory (pouze adminstrátor)
2. přidávat, mazat, deaktivovat, upravovat (komplet CRUD) jednotlivé holiče (pouze administrátor)
3. přidávat, mazat, deaktivovat, upravovat (komplet CRUD) nabízené služby (pouze adminstrátor)
4. vidět a mazat jednotlivé rezervace (pouze holič)

Seznam holičů a seznam služeb se propisuje na veřejnou část projektu a do těchto oddělení má přístup pouze uživatl s
označením "admin".

Naopak každý holič má k dispozici klendář (https://fullcalendar.io/), kde vidí rezervace vytvořené přes web. Tyto
rezervace může smazat.

## Možná rozšíření - co zlepšit - administrační část

Kalendář je připraven pro to, aby si holič mohl vkládat vlastní rezervace či vlastní události (v současné chvíli není
funkční). Tím si může vyblokovat čas a nelze přes web pak na daný čas vytvořit další rezervaci.
Také by bylo dobré přidat možnost, aby si každý holič definoval vlastní rozsah pracovní doby, případně i automaticky
blokovat státní svátky atd.
Z hlediska administrátora přidat možnost editovat zbylé texty na webu a mít možnost nahlížet (upravovat) kalendáře
jednotlivých holičů. Jednotlivé výpisy dat v administraci nyní nelze řadit a nelze v nich vyhledávat.

# Obecné poznámky - na čem jsem se nejvíce "seknul"

Díky využití frameworku laravel a jeho velmi výborné dokumentaci a videi byla tvorba projektu snadná. Nejvíce času
zabrala implentace kalendáře a dalších javascriptů v projektu.
