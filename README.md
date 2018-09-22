# Login_1DV608
Interface repository for 1DV608 assignment 2 and 4


### _11/09/2018_

# How MVC pattern can help me write better code

1. User---(request)--->Controller<---(data)--->Model
2. Controller---(data)--->View
3. View---(response)--->User

* **Controllers** is for user to interact with. It's like triggers, if ($_get [?something])
* **Models** is basically a database
* **View** is the HTML, what the users sees

#### Why MVC?
1. Better structure for code! prolonging or maintaining a project 
2. Designers focus on front-end
3. Developers focus on back-end

#### Simple Route Matching

Routing Table |
 ---------- |
URL _ Controller _ Action

Request URL | URL | Controller | Action
 ---------- | --- | ---------- | ------
localhost/?posts/new | "posts/new" | Posts | new

#### Advanced Route Matching

Routing Table |
 ---------- |
URL

Request URL | URL | Controller | Action
 ---------- | --- | ---------- | ------
localhost/?posts/new | "[controller]/[action]" | Posts | new

# Controller
Controls the flow