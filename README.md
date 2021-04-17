### User Stories

- [ ] Come utente dello shop voglio registrarmi al fine di effettuare acquisti
- [ ] Come utente dello shop voglio ricercare un libro per titolo o autore al fine di visualizzare il prezzo e la disponibilità
- [ ] Come utente dello shop voglio leggere la quarta di copertina di un libro e visualizzare le informazioni al fine di valutarne l'acquisto
- [ ] Come utente dello shop voglio aggiungere un libro al carrello al fine di acquistarlo
- [ ] Come utente dello shop voglio pagare un ordine
- [ ] Come store manager voglio aggiungere/modificare/rimuovere un libro dal catalogo
- [ ] Come store manager voglio aggiungere/modificare un autore
- [ ] Come store manager voglio visualizzare gli ordini

### Pattern

- [X] Architettura esagonale
- [ ] Command bus
- [X] Separare i read model dal write model condividendo lo storage
- [X] Collegare le entity attraverso gli id
- [ ] Avere un command bus
- [ ] Le entity effettuano il dispatch di eventi
- [ ] Uno use case che si verifica a seguito di un evento di dominio
- [ ] Persistere gli eventi di dominio 
- [ ] Reagire a eventi di dominio asincronamente
- [ ] Esecuzione asincrona di comandi

### Infrastruttura

- [X] Symfony Framework
- [X] Doctrine ORM
- [X] MySql
- [ ] Bref
- [ ] AWS
