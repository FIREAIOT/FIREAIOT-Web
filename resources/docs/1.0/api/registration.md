# Registration

---

- [Create Account](#create-account)

<a name="create-account"></a>
## Create Account

### Endpoint

|Method|URI|Headers|
|:-|:-|:-|
|POST|`/register`|Default|

### Data Params

```json
{
    "name"         : "required|string|max:255",
    "email"        : "required|string|email|unique:users|max:255",
    "username"     : "required|string|unique:users|max:255",
    "password"     : "required|string|min:6|max:255",
    "mobile"       : "required|string|unique:users|max:255",
    "fcm_token"    : "required|string|max:255",
}
```


> {primary} Example request

```json
{
    "name"         : "Saleem Hadad",
    "email"        : "saleem@test.com",
    "username"     : "saleem",
    "password"     : "secret",
    "mobile"       : "+60182023284",
    "fcm_token"    : "ber3rfwe3fr43fgvwkin89ygh",
}
```


> {success} Success Response

Code `200`

Content

```json
{
    "user": {
        "id"           : 1,
        "name"         : "Saleem Hadad",
        "email"        : "saleem@test.com",
        "username"     : "saleem",
        "mobile"       : "+60182023284",
        "fcm_token"    : "ber3rfwe3fr43fgvwkin89ygh",
        "is_active"    : true
    }
}
```