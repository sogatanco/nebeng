# NeBeng Rest API


### Public User
*TOKEN : 1234567*

- Login and Register
|API    | Method| Url    | Required|
|-------|-------|--------|---------|
|login  |POST   |/api/login/|email,pass, token|
|admin login | POST |/api/login/admin|username,pass, token|
|register |POST|/api/register|email, pass, token|

- General
|API    | Method| Url    | Required|
|-------|-------|--------|---------|
|get bengkel|GET|/api/general/bengkel|token, pemilik, kategori, id|
|get user | GET |/api/general/user | token, email|
|get ulasan | GET |/api/general/ulasan |token, idbengkel|

### Registered User (Pemilik Bengkel)
*TOKEN : private*

- Profil
|API    | Method| Url    | Required|
|-------|-------|--------|---------|
|update profil| PUT | /api/editprofil |token, nama, hp, jk, pekerjaan, profil |
|update pass| PUT | /api/editprofil/password | token, lama, baru|
|delete akun | DELETE | /api/editprofil | token|

- Bengkel
|API    | Method| Url    | Required|
|-------|-------|--------|---------|
|add bengkel|POST|/api/bengkel|token, nama, desc, foto, telpon, long, lat, layanan, day, time, kategori|
|update bengkel|PUT|/api/bengkel|token, id, nama, desc, foto, telpon, long, lat, layanan, day, time, kategori |
|delete bengkel|DELETE|/api/bengkel|token, id|
|view bengkel|GET|/api/bengkel|token,id|

- Ulasan
|API    | Method| Url    | Required|
|-------|-------|--------|---------|
|add ulasan | POST | /api/ulasan | token, ulasan, rating, idbengkel |
|delete ulasan | DELETE | /api/ulasan | token, id |


### Admin

*TOKEN : private*

|API    | Method| Url    | Required|
|-------|-------|--------|---------|
|view unapprove bengkel | GET | /api/admin/viewbengkel | token |
|approve bengkel | PUT | /api/admin/approvebengkel |token, idbengkel |
|delete ulasan | DELETE | /api/admin/deleteulasan | token. id |
|delete bengkel | DELETE | /api/admin/deletebengkel | token, id |
|delete user | DELETE | /api/admin/deleteuser | token, id |









