<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

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
Or (to Development with localhost)
```
php artisan serve --host=0.0.0.0 --port=8000
```

## Route API
base route: ``` localhost:8000/api```
Note: if you use localhost server
#### 1. Register
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
#### 2. Login
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
#### 3. Logout
```
/logout
```
- Header:
<table>
  <tr>
    <th>Key</th>
    <th>Value</th>
  </tr>
  <tr>
    <td>Accept</td>
    <td>application/json</td>
  </tr>
  <tr>
    <td>Content-Type</td>
    <td>application/json</td>
  </tr>
  <tr>
    <td>Authorization</td>
    <td>Bearer &lt;spasi&gt; Token</td>
  </tr>
</table>

 
- Response:
```
{
    "success": true,
    "message": "Logout Berhasil!"
}
```
#### 4. Get User
```
/user
```
- Header:
<table>
  <tr>
    <th>Key</th>
    <th>Value</th>
  </tr>
  <tr>
    <td>Accept</td>
    <td>application/json</td>
  </tr>
  <tr>
    <td>Content-Type</td>
    <td>application/json</td>
  </tr>
  <tr>
    <td>Authorization</td>
    <td>Bearer &lt;spasi&gt; Token</td>
  </tr>
</table>
 
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
#### 5. Create New Voltage Data
```
/voltage
```
- Request:
```
{
    "time" : "input-time",
    "voltage": "input-voltage",
}
```
- Response:
```
{
    "success": true,
    "message": "Data berhasil disimpan"
}
```
#### 6. Get All Voltage Data
```
/voltage
```
- Parameter
  - For filter by range
    ```
    start_date #2024-12-14
    end_date #2024-12-14
    ```
  - For filter by date
    ```
    date #2024-12-14
    ```
- Response:
```
{
    "success": true,
    "message": "Data Voltage",
    "data": [
        {
            "id": 2,
            "time": "456",
            "voltage": "1000",
            "created_at": "2024-12-14T10:05:51.000000Z",
            "updated_at": "2024-12-14T10:05:51.000000Z"
        },
        {
            "id": 1,
            "time": "231",
            "voltage": "12345",
            "created_at": "2024-12-14T09:03:14.000000Z",
            "updated_at": "2024-12-14T09:56:02.000000Z"
        }
    ]
}
```
#### 7. Detail Voltage Data by id
```
/voltage/{id?}
```
- Response:
```
{
    "success": true,
    "message": "Detail Voltage",
    "data": {
        "id": 1,
        "time": "231",
        "voltage": "12345",
        "created_at": "2024-12-14T09:03:14.000000Z",
        "updated_at": "2024-12-14T09:56:02.000000Z"
    }
}
```
#### 8. Update Voltage Data
```
/voltage
```
- Request:
```
{
    "id"  : "input_id",
    "time" : "input-time",
    "voltage": "input-voltage",
}
```
- Response:
```
{
    "success": true,
    "message": "Data berhasil diperbaharui"
}
```
#### 9. Delete Voltage Data
```
/voltage/{id?}
```
- Response:
```
{
    "success": true,
    "message": "Data berhasil dihapus!"
}
```