# Cushon Scenario
Cushon wants to offer retail customers the posibility to easily deposit money into any fund that they have opened, in our specific scenario a user wants to deposit £25,000 into their Cushon Equities Fund. I have tried to stick close to this scenario while also implementing some extra features with this MVC application made in the Yii2 PHP framwork which connects to a MySQL database in order to persist user data. 

## Assumptions
- User is already registered and logged in.
- User has opened 1 or more funds already, which they can deposit into.
- Take into account the maximum savings limit of £20,000.

## What has been implemented
- Go into deposit page, select a fund to deposit into, and deposit amount.
- "Quick links", user can click on them from any page to be taken to the deposit page with the fund pre-selected.
- View all investments make by the user, with fund name, amount and date invested.
- Filter investments by fund, e.g.: only see "Cushon Equities Fund" investments.
- Aspects of data-driven design, only funds which user has opened and are active will be loaded into app.

## Entity Relationship Diagram
![Screenshot from 2023-10-09 20-24-30](https://github.com/win20/cushon/assets/22985058/6759ad76-a641-4a45-8f31-1c536743b319)

## Challenges
- Lack of domain knowlegde.
- Not being able to communicate to skateholder during project.
- Deciding what features to implement and which to ommit given time constraints.

## Possible enhancements
- Responsiveness
- Adding unit and end to end testing
- CI/CD
- Loading states for when we have more data
- Pagination on investment page
- Sorting on investment page, currently sorted by descending dates by default.
