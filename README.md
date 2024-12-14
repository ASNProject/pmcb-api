# PMCB API
- Laravel Version ``` 8.83.29``` 

## Clone and Run Project
### Clone
- Clone this project
```
git clone https://github.com/ASNProject/pmcb-api.git
```
- Insert db_pmcb in xampp or other localhost
### Run 
- Open this project in Code Editor (VSCode)
- Run this command
```
php artisan serve
```

## Route API
base route: ``` localhost/api```
Note: if you use localhost server
1. Register
```
/register
```
- Request:
```
{
    "name" : "your-username",
    "password": "your-xxxxxx",
    "password_confirmation": "your-xxxxxx",
    "email": "your-email"
}
```
- Response:
```
{
    "success": true,
    "user": {
        "name": "xxxxxxx",
        "email": "xxxxx@xxxx.com",
        "updated_at": "2024-12-14T07:07:45.000000Z",
        "created_at": "2024-12-14T07:07:45.000000Z",
        "id": 1
    }
}
```
2. Login
```
/login
```
- Request:
```
{
    "name" : "your-username",
    "password": "your-xxxxxx",
}
```
- Response:
```
{
    "success": true,
    "user": {
        "id": 1,
        "name": "your-name",
        "email": "xxx@xxx.com",
        "email_verified_at": null,
        "created_at": "2024-12-14T07:07:45.000000Z",
        "updated_at": "2024-12-14T07:07:45.000000Z"
    },
    "token": "xxxxxxxxxxxxxxxxxxxxxxxxxx"
}
```
3. Logout
```
/logout
```
- Header:
|  Key          | Value                |
|---------------|----------------------|
| Accept        | application/json     |
| Content-Type  | application/json     |
| Authorization | Bearer <spasi> Token | 
- Response:
```
{
    "success": true,
    "message": "Logout Berhasil!"
}
```
3. Get User
```
/user
```
- Header:
|  Key          | Value                |
|---------------|----------------------|
| Accept        | application/json     |
| Content-Type  | application/json     |
| Authorization | Bearer <spasi> Token | 
- Response:
```
{
    "id": 1,
    "name": "your-name",
    "email": "xxxx@xxxx.com",
    "email_verified_at": null,
    "created_at": "2024-12-14T07:07:45.000000Z",
    "updated_at": "2024-12-14T07:07:45.000000Z"
}
```