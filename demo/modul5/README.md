# Demo Modul 5

## Endpoints

| No  | Endpoints                      | Methods |
| --- | ------------------------------ | ------- |
| 1   | [/book](#get-books)            | GET     |
| 2   | [/book/{id}](#get-books-id)    | GET     |
| 3   | [/book](#post-books)           | POST    |
| 4   | [/book/{id}](#put-books-id)    | PUT     |
| 5   | [/book/{id}](#delete-books-id) | DELETE  |

### Request

#### GET books

```
[
  {
    "id": 1,
    "title": "Book One",
    "description": "Description of Book One",
    "ISBN": "1234567890",
    "genre_id": 1,
    "author_name": "Author One",
    "genre_name": "Fiction"
  },
  {
    "id": 2,
    "title": "Book Two",
    "description": "Description of Book Two",
    "ISBN": "0987654321",
    "genre_id": 2,
    "author_name": "Author Two",
    "genre_name": "Non-Fiction"
  },
  // ... other books
]
```

#### GET books id

```
{
  "id": 1,
  "title": "Book One",
  "description": "Description of Book One",
  "ISBN": "1234567890",
  "genre_id": 1,
  "author_name": "Author One",
  "genre_name": "Fiction"
}
```

#### POST books id

```
POST /books
Content-Type: application/json

{
  "title": "New Book",
  "description": "Description of the new book",
  "ISBN": "5678901234",
  "genre_id": 2
}
```

```
{
  "id": 3,
  "title": "New Book",
  "description": "Description of the new book",
  "ISBN": "5678901234",
  "genre_id": 2,
  "author_name": null,  // No author assigned yet
  "genre_name": "Non-Fiction"
}
```

#### PUT books by id

```
PUT /books/3
Content-Type: application/json

{
  "title": "Updated New Book",
  "description": "Updated description of the new book",
  "ISBN": "5678901234",
  "genre_id": 1
}
```

```
{
  "id": 3,
  "title": "Updated New Book",
  "description": "Updated description of the new book",
  "ISBN": "5678901234",
  "genre_id": 1,
  "author_name": null,  // No author assigned yet
  "genre_name": "Fiction"
}
```

#### DELETE books id

```
{
  "message": "Book with ID 3 has been deleted successfully."
}
```
