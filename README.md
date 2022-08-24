# FAQ
### SCHEMA
question -> id, title, body, owner_id, state(active, not_active)
vote -> question_id, upvote(1-up, -1-down), voter_id, PK(question_id, voter_id)

## TODO:
[ ] create schemas

### Thoughts
localized -> create separated few tables or make spryker config it by itself(different db(eu-docker, us-docker))

