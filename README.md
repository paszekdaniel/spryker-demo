# FAQ
### SCHEMA
question -> id, title, body, owner_id(fk_spy_user), state(active, not_active)
vote -> question_id, upvote(1-up, -1-down), voter_id(fk_spy_customer), PK(question_id, voter_id)

## TODO:
[x] create schemas

### Thoughts
READ AGAIN DOC LOL( <br>
    spy_customer as owner -> does admin have to create customer account to be able to post sth? <br>
    or 2 columns referencing spy_customer and spy_user <br>
    or polimorfic relation owner_id and owner_type <br>)<br>

localized -> create separated few tables or make spryker config it by itself(different db(eu-docker, us-docker))

