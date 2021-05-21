# Book Shop

A POC for DDD and CQRS applications using Symfony as framework and running with php8

### User Stories

- [ ] Come store manager voglio aggiungere/modificare un autore
- [ ] Come store manager voglio aggiungere/modificare/rimuovere un libro dal catalogo
- [ ] Come store manager voglio visualizzare gli ordini
- [X] Come utente dello shop voglio registrarmi al fine di effettuare acquisti
- [ ] Come store manager voglio che una mail di benvenuto venga inviata a tutti i nuovi utenti
- [ ] Come utente dello shop voglio ricercare un libro per titolo o autore al fine di visualizzare il prezzo e la disponibilità
- [ ] Come utente dello shop voglio leggere la quarta di copertina di un libro e visualizzare le informazioni al fine di valutarne l'acquisto
- [ ] Come utente dello shop voglio aggiungere un libro al carrello al fine di acquistarlo
- [ ] Come utente dello shop voglio pagare un ordine

### Pattern

- [X] Architettura esagonale
- [X] Command bus
- [X] Separare i read model dal write model condividendo lo storage
- [X] Ogni view dell'applicazione ha il suo read model che evolve indipendentemente
- [X] Collegare le entity attraverso gli id
- [X] Creazione di entity attraverso le factory
- [X] Modellazione di liste di entità come Collection
- [X] Le entity effettuano il dispatch di eventi
- [ ] Use case che si verifica a seguito di eventi di dominio
- [X] Persistere gli eventi di dominio 
- [X] Reagire a eventi di dominio asincronamente
- [X] Usare il DSL per la configurazione del IoC Container
- [X] Le eccezioni vengono create in maniera 'parlante'
- [X] Immutabilità con analisi statica

### Infrastruttura

- [X] Symfony Framework 
- [X] Doctrine ORM
- [ ] Doctrine Migrations
- [X] MySql
- [ ] Bref
- [ ] AWS
- [X] GitHub workflows
- [ ] OpenAPI

### QA Tools
- [X] Psalm
- [x] Deptrac
- [X] PhpCs

