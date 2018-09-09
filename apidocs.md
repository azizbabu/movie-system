FORMAT: 1A

# Laracrud API

# Actor [/actors]
Actor

## List of Actor [GET /actors]


+ Parameters
    + page: (integer, optional) - The page of results to view.
        + Default: 1

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    [
                        []
                    ]
                ]
            }

## Show details about a Actor [GET /actors/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Actor

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    []
                ]
            }

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [App\Models\Actor]."
            }

## Create a Actor [POST /actors/store]


+ Request (application/json)
    + Body

            {
                "name": "required|max:191",
                "gender": "required|in:male,female",
                "phone": "nullable|max:191"
            }

+ Response 200 (application/json)
    + Body

            []

+ Response 500 (application/json)
    + Body

            {
                "message": "Error occurred while saving Actor"
            }

## Update a existing Actor [PUT /actors/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Actor

+ Request (application/json)
    + Body

            {
                "name": "required|max:191",
                "gender": "required|in:male,female",
                "phone": "nullable|max:191"
            }

+ Response 200 (application/json)
    + Body

            []

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [App\Models\Actor]."
            }

## Delete an existing Actor [DELETE /actors/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Actor

+ Response 200 (application/json)
    + Body

            {
                "status": 200,
                "message": "Actor successfully deleted"
            }

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [App\Models\Actor]."
            }

+ Response 500 (application/json)
    + Body

            {
                "message": "Error occurred while deleting Actor"
            }

# Cinema [/cinemas]
Cinema

## List of Cinema [GET /cinemas]


+ Parameters
    + page: (integer, optional) - The page of results to view.
        + Default: 1

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    [
                        []
                    ]
                ]
            }

## Show details about a Cinema [GET /cinemas/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Cinema

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    []
                ]
            }

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [App\Models\Cinema]."
            }

## Create a Cinema [POST /cinemas/store]


+ Request (application/json)
    + Body

            {
                "name": "required|max:191"
            }

+ Response 200 (application/json)
    + Body

            []

+ Response 500 (application/json)
    + Body

            {
                "message": "Error occurred while saving Cinema"
            }

## Update a existing Cinema [PUT /cinemas/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Cinema

+ Request (application/json)
    + Body

            {
                "name": "required|max:191"
            }

+ Response 200 (application/json)
    + Body

            []

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [App\Models\Cinema]."
            }

## Delete an existing Cinema [DELETE /cinemas/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Cinema

+ Response 200 (application/json)
    + Body

            {
                "status": 200,
                "message": "Cinema successfully deleted"
            }

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [App\Models\Cinema]."
            }

+ Response 500 (application/json)
    + Body

            {
                "message": "Error occurred while deleting Cinema"
            }

# Movie [/movies]
Movie

## List of Movie [GET /movies]


+ Parameters
    + page: (integer, optional) - The page of results to view.
        + Default: 1

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    [
                        []
                    ]
                ]
            }

## Show details about a Movie [GET /movies/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Movie

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    []
                ]
            }

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [App\Models\Movie]."
            }

## Create a Movie [POST /movies/store]


+ Request (application/json)
    + Body

            {
                "cinema_id": "required|exists:cinemas,id|numeric",
                "name": "required|max:191",
                "director_name": "required|max:191"
            }

+ Response 200 (application/json)
    + Body

            []

+ Response 500 (application/json)
    + Body

            {
                "message": "Error occurred while saving Movie"
            }

## Update a existing Movie [PUT /movies/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Movie

+ Request (application/json)
    + Body

            {
                "cinema_id": "required|exists:cinemas,id|numeric",
                "name": "required|max:191",
                "director_name": "required|max:191"
            }

+ Response 200 (application/json)
    + Body

            []

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [App\Models\Movie]."
            }

## Delete an existing Movie [DELETE /movies/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Movie

+ Response 200 (application/json)
    + Body

            {
                "status": 200,
                "message": "Movie successfully deleted"
            }

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [App\Models\Movie]."
            }

+ Response 500 (application/json)
    + Body

            {
                "message": "Error occurred while deleting Movie"
            }

# Spectator [/spectators]
Spectator

## List of Spectator [GET /spectators]


+ Parameters
    + page: (integer, optional) - The page of results to view.
        + Default: 1

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    [
                        []
                    ]
                ]
            }

## Show details about a Spectator [GET /spectators/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Spectator

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    []
                ]
            }

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [App\Models\Spectator]."
            }

## Create a Spectator [POST /spectators/store]


+ Request (application/json)
    + Body

            {
                "name": "required|max:191",
                "gender": "required|in:male,female",
                "phone": "nullable|max:191"
            }

+ Response 200 (application/json)
    + Body

            []

+ Response 500 (application/json)
    + Body

            {
                "message": "Error occurred while saving Spectator"
            }

## Update a existing Spectator [PUT /spectators/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Spectator

+ Request (application/json)
    + Body

            {
                "name": "required|max:191",
                "gender": "required|in:male,female",
                "phone": "nullable|max:191"
            }

+ Response 200 (application/json)
    + Body

            []

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [App\Models\Spectator]."
            }

## Delete an existing Spectator [DELETE /spectators/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Spectator

+ Response 200 (application/json)
    + Body

            {
                "status": 200,
                "message": "Spectator successfully deleted"
            }

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [App\Models\Spectator]."
            }

+ Response 500 (application/json)
    + Body

            {
                "message": "Error occurred while deleting Spectator"
            }

# Ticket [/tickets]
Ticket

## List of Ticket [GET /tickets]


+ Parameters
    + page: (integer, optional) - The page of results to view.
        + Default: 1

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    [
                        []
                    ]
                ]
            }

## Show details about a Ticket [GET /tickets/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Ticket

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    []
                ]
            }

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [App\Models\Ticket]."
            }

## Create a Ticket [POST /tickets/store]


+ Request (application/json)
    + Body

            {
                "spectator_id": "required|numeric",
                "ticket_no": "required|unique:tickets,ticket_no|max:10",
                "start_time": "required|date",
                "end_time": "required|date"
            }

+ Response 200 (application/json)
    + Body

            []

+ Response 500 (application/json)
    + Body

            {
                "message": "Error occurred while saving Ticket"
            }

## Update a existing Ticket [PUT /tickets/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Ticket

+ Request (application/json)
    + Body

            {
                "spectator_id": "required|numeric",
                "ticket_no": "required|unique:tickets,ticket_no|max:10",
                "start_time": "required|date",
                "end_time": "required|date"
            }

+ Response 200 (application/json)
    + Body

            []

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [App\Models\Ticket]."
            }

## Delete an existing Ticket [DELETE /tickets/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Ticket

+ Response 200 (application/json)
    + Body

            {
                "status": 200,
                "message": "Ticket successfully deleted"
            }

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [App\Models\Ticket]."
            }

+ Response 500 (application/json)
    + Body

            {
                "message": "Error occurred while deleting Ticket"
            }

# Comment [/comments]
Comment

## List of Comment [GET /comments]


+ Parameters
    + page: (integer, optional) - The page of results to view.
        + Default: 1

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    [
                        []
                    ]
                ]
            }

## Show details about a Comment [GET /comments/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Comment

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    []
                ]
            }

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [App\Models\Comment]."
            }

## Create a Comment [POST /comments/store]


+ Request (application/json)
    + Body

            {
                "movie_id": "required|exists:movies,id|numeric",
                "spectator_id": "required|exists:spectators,id|numeric",
                "comment": "required|string"
            }

+ Response 200 (application/json)
    + Body

            []

+ Response 500 (application/json)
    + Body

            {
                "message": "Error occurred while saving Comment"
            }

## Update a existing Comment [PUT /comments/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Comment

+ Request (application/json)
    + Body

            {
                "movie_id": "required|exists:movies,id|numeric",
                "spectator_id": "required|exists:spectators,id|numeric",
                "comment": "required|string"
            }

+ Response 200 (application/json)
    + Body

            []

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [App\Models\Comment]."
            }

## Delete an existing Comment [DELETE /comments/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Comment

+ Response 200 (application/json)
    + Body

            {
                "status": 200,
                "message": "Comment successfully deleted"
            }

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [App\Models\Comment]."
            }

+ Response 500 (application/json)
    + Body

            {
                "message": "Error occurred while deleting Comment"
            }

# Rating [/ratings]
Rating

## List of Rating [GET /ratings]


+ Parameters
    + page: (integer, optional) - The page of results to view.
        + Default: 1

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    [
                        []
                    ]
                ]
            }

## Show details about a Rating [GET /ratings/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Rating

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    []
                ]
            }

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [App\Models\Rating]."
            }

## Create a Rating [POST /ratings/store]


+ Request (application/json)
    + Body

            {
                "movie_id": "required|exists:movies,id|numeric",
                "spectator_id": "required|exists:spectators,id|numeric",
                "ratings": "required|numeric"
            }

+ Response 200 (application/json)
    + Body

            []

+ Response 500 (application/json)
    + Body

            {
                "message": "Error occurred while saving Rating"
            }

## Update a existing Rating [PUT /ratings/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Rating

+ Request (application/json)
    + Body

            {
                "movie_id": "required|exists:movies,id|numeric",
                "spectator_id": "required|exists:spectators,id|numeric",
                "ratings": "required|numeric"
            }

+ Response 200 (application/json)
    + Body

            []

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [App\Models\Rating]."
            }

## Delete an existing Rating [DELETE /ratings/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Rating

+ Response 200 (application/json)
    + Body

            {
                "status": 200,
                "message": "Rating successfully deleted"
            }

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [App\Models\Rating]."
            }

+ Response 500 (application/json)
    + Body

            {
                "message": "Error occurred while deleting Rating"
            }