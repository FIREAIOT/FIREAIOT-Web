# Authentication

---

- [Login](#login)
- [Logout](#logout)

<a name="login"></a>
## Login

> {warning} Please note that the URI for this endpoint only should not prefixed with api/{{version}}, which means that the url will be: `appdomain.com/oauth/token`.

### Endpoint

|Method|URI|Headers|
|:-|:-|:-|
|POST|`/oauth/token`|Default|

### Data Params

```json
{
    "grant_type"    : "password",
    "client_id"     : "2",
    "client_secret" : "{client_secret}",
    "username"      : "string|email",
    "password"      : "string",
    "scope"         : "*"
}
```

> {info} The `client_secret` is the token that the server needs in order to authorize the request. See server configurations page for more details.

```php
$client_secret = @client
```

> {primary} Login request example

```json
{
    "grant_type"    : "password",
    "client_id"     : "2",
    "client_secret" : "@client",
    "username"      : "user-email@gmail.com",
    "password"      : "blablabla",
    "scope"         : "*"
}
```

> {success} Success Response

Code `200`

Content

> {info} The `access_token` now can be used to any subsequence API auth call.

```json
{
  "token_type"    : "Bearer",
  "expires_in"    : "integer",
  "access_token"  : "string|token",
  "refresh_token" : "string|token"
}
```



<a name="logout"></a>
## Logout

### Endpoint

|Method|URI|Headers|
|:-|:-|:-|
|POST|`/logout`|Auth|


> {success} Success Response

Code `204`

Content

```text
NO CONTENT
```