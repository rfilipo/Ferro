#!/bin/sh

echo ----- TESTES DO CMS BLINKX BRASIL -----

# Cada spec e' uma tarefa a cumprir
phpunit --story ImportaPlanilhaSpec testes/comportamento/ImportaPlanilhaSpec.php
