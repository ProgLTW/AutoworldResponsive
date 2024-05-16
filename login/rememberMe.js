function alertRmb () {
    // la variabile remember contiene un valore booleano
    // ( dipendente dallo stato della checkbox )
    var remember = document . getElementById ( " rmb " ). checked ;
    if ( remember ) {
    window . alert ( " Hai scelto di essere ricordato per i prossimi accessi " );
    }
    else {
    window . alert ( " Hai scelto di non essere ricordato per i prossimi accessi " );
    }
    }