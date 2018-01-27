# Stock-Management-System

## Screenshots
### Login
![Login](https://image.prntscr.com/image/KDvSfkUlRf6rX5_PMpJ5OQ.jpg)
### Dashboard
![Dashboard](https://image.prntscr.com/image/XoYw81I1RG2WokJEN-kx6Q.jpg)
### Profile
![Profile](https://image.prntscr.com/image/rf6toHFzSBqv_zqmCg7TLg.jpg)
### Records
![Records](https://image.prntscr.com/image/7wAvaTW3QHOsmWJbfixPhg.jpg)
### Modifying Records
![Modifying Records](https://image.prntscr.com/image/z9Aj8Iw_TUyJSZoc5mt9WQ.jpg)

## How to install
1. Add this lines in path/to/xampp/apache/conf/extra/httpd-vhosts.conf:
```
<VirtualHost *:80>
    DocumentRoot "path/to/xampp/htdocs"
    ServerName localhost
</VirtualHost>


<VirtualHost *:80>
    DocumentRoot "path/to/project/public"
    ServerName project.dev
</VirtualHost>
```
2. Add this in C:\Windows\System32\drivers\etc\hosts file:
```
127.0.0.1 localhost
127.0.0.1 project.dev 
```
3. Make sure you restart xampp after following step 1 & 2.
4. Import database "project5.6" from sql file present in sql folder.
5. Get your CurrencyLayer API Key from [here](https://currencylayer.com/) and replace it in *path/to/project/public/dist/js/page.js* line number 1439. This is for receiving live commodity rates in dashboard. Don't forget to clear cache of browser after editing.
6. Enter "project.dev" in browser to visit the app, make sure your XAMPP(Apache, MySQL) is running. 
7. Done

### Note
If incase you're receiving alert that Editor Datatables trial has expired, download the editor-datatable's JS/CSS files from  [Editor](http://editor.datatables.net/download) and replace the content in css & js folder present in *path/to/project/public/vendor/datatables-editor*. Don't forget to clear cache after replacing files. 
If you are recieving some bugs in editing tables, maybe the project's js file handling the editor-datatables has became out of date. 
