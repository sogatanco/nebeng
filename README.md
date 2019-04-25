# NeBeng Rest API


### Register and Login
*TOKEN : 1234567*

|API    | Method| Url    | Required|
|-------|-------|--------|---------|
|login  |POST   |/api/login/|email,pass, token|
|admin login | POST |/api/login/admin|username,pass, token|
|register |POST|/api/register|email, pass, token|

### Registered User (Pemilik Bengkel)
*TOKEN : private*

|API    | Method| Url    | Required|
|-------|-------|--------|---------|
|update profil| PUT | /api/editprofil |token, nama, hp, jk, pekerjaan, profil |
|update pass| PUT | /api/editprofil/password | token, lama, baru|
|delete akun | DELETE | /api/editprofil | token|

|API    | Method| Url    | Required|
|-------|-------|--------|---------|
|add bengkel|POST|/api/bengkel|token, nama, desc, foto, telpon, long, lat, layanan, day, time, kategori|
|update bengkel|PUT|/api/bengkel|token, id, nama, desc, foto, telpon, long, lat, layanan, day, time, kategori |
|delete bengkel|DELETE|/api/bengkel|token, id|
|view bengkel|GET|/api/bengkel|token,id|






