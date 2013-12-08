XenBridge nedir ?
=====================

Xenforo kütüphanelerini Laravel 4 üzerinde kullanmanızı sağlayan ve Xenforo oturumlarını otomatik aktarabilen küçük bir pakettir.

----------

Kurulum
---------
Laravel 4 composer.json dosyasının "require" dizisine ekleyiniz
```js
"metinseylan/xenbridge": "dev-master"
```
ardından komut satırına
```composer
composer update
```
çalıştırdıktan sonra Laravel 4 config klasörü altındaki app.php dosyasının "**providers**" dizisine
```php
'MetinSeylan\XenBridge\XenBridgeServiceProvider'
```
ekleyin ve yine aynı dosyanın "**aliases**" dizisine
```php
'XenBridge'     => 'MetinSeylan\XenBridge\Facades\XenBridge',
```
ekleyin ardından **vendor/metinseylan/xenbridge/config/config.php** altında 'xenforoFolder' a Xenforo'nun bulunduğu klasörü giriniz, eğer oturumları otomatik Laravel üzerinde görmek istiyorsanız autoLogin true yapınız

**Cookie Ayarı**
Xenforo farklı bir alt domainde çalışıyor ise
```php
$config['cookie'] = array(
    'prefix' => 'xf_',
    'path' => '/',
    'domain' => '.l4.dev'
);
```
Xenforo'nun config dosyasına bu kodu ekleyiniz (l4.dev domain adresiniz)




