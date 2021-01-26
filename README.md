

# DAW-M07-UF2UF3-MVC-inProgress

Aplicació per gestionar usuaris, projectes, equips, tasques...

1 ) En una primera versió aprenem a connectar-nos a la BD
,a recuperar informació, afegir-ne de nova i a eleminar registres
Tot en una única pàgina.

2) En la segona versió creem una classe anomenada Usuaris que contindrà
tot el codi d'accés a la BD, estructurada en mètodes per : afegir, esborrar, recuperar 1 registre, recuper-los tots,...
També separem el codi que conté html en fitxers separats.
Aixó aconseguim estructurar una mica més l'aplicació. La classe Usuaris formarà part del model de l'aplicació.
Els fitxers llistat.php i formnew.php que contenen el codi en html serà part de la vista.
Esperem poder separar la nostra aplicació en 3 capes: M-V-C Model vista Controlador.

3)Hem estructurat el codi del controlador index.php en diferents m todes. Hem posat un switch que crida cada un d'aquest m todes segons un par metre GET anomenat operaci .
Hem afegit la vista formupdate per a poder actualitzar la informaci  d'un usuari. Hem afegit 2 m todes al controlador, un per mostrar el formulari i l'altre per desar la informaci  enviada a trav s d'aquest formulari. 

4) Creem la taula de projectes. Creem el model Projectes. Com els constructor, get, getAll, delete són mètodes molt semblants creem la classe Model i implementem aquests mètodes allà. Usuaris i Projectes hereten de la classe Model (afegim atribut $taula per a que els mètodes es puguin reutilitzar correctament).
Creem les vistes per a la gestió de la nova taula i també el controlador projectes.php, que tindrà un codi molt semblant al controlador que ja teníem, index.php. index.php però passa a anomenar-se usuaris.php i col·loquem el codi font dins de la carpeta controladors).
El fitxer index.php de la carpeta principal passa a tenir únicament dos enllaços per a cridar a cada controlador respectivament.


5) Fem que index.php passi a ser el controlador principal de l'aplicació. Afegirem el paràmetre control per especificar el controlador que volem carregar en cada moment. Les url de la nostra aplicació tindran la forma index.php?control=nomcontrol&accio=nomaccio&parametres=.....
Creem un controlador anomenat default per si no ens passen cap controlador en la url. El carregarem per defecte en aquest cas.

6) Els controladors passen a ser classes. En el constructor carreguem els models. Un mètode index serà el mètode que es carragarà per defecte.
Hem de canviar el controlador index.php per a que carregui els nous tipus de controladors.
Afegim header i footers a les vistes.

