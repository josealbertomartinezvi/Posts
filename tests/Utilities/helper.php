<?php

function create($class, $attr = []){
    return factory($class)->create($attr);
}

// agregar helper al autoload-dev del archivo composer.json
// ejecutar composer dump-autoload para usar el helper