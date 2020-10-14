# Ilkbyte.com PHP API
[ilkbyte/api.ilkbyte.com](https://github.com/ilkbyte/api.ilkbyte.com) paketinin [wiki](https://github.com/ilkbyte/api.ilkbyte.com/wiki) dokümanı referans alınarak geliştirilmiştir.

## Kurulum
`Composer` paket yöneticisi ile yönetilen projenize aşağıdaki komut ile paketin eklenemesini sağlayıp, kullanmaya başlayabilirsiniz.
```bash
composer require tnhnclskn/ilkbyte-php
```

## Bağlantı
Kütüphanede erişim anahtarlarını (access ve secret) belirtmek için 2 tip yöntem mevcut. Biri ortam değişkenleri (environment) diğeri ise doğrudan dizi (array) ile beslemektir.

### Ortam Değişkenleri (Environment) ile Bağlanma
Projenizde bulunuyorsa `.env` dosyası içerisine veya doğrudan sisteminize `ILKBYTE_ACCESS_KEY` ve `ILKBYTE_SECRET_KEY` parametrelerini tanımlamalısınız.

```php
use Tnhnclskn\Ilkbyte\Ilkbyte;

$ilkbyte = Ilkbyte::create();
```

### Dizi (Array) ile Bağlanma
Örnekteki gibi kendi erişim anahtarlarınızı tanımlamalısınız.

```php
use Tnhnclskn\Ilkbyte\Ilkbyte;

$ilkbyte = Ilkbyte::create([
    'access_key' => 'xxxxxxxxx',
    'secret_key' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxx',
]);
```

# Genel Methodlar
## Erişim Testi
```php
$response = $ilkbyte->test();

var_dump($response);
```

## Hesap Bilgilerini Görüntüleme
```php
$response = $ilkbyte->account();

var_dump($response);
```

## Hesaba Bakiye Yükleme (Geliştiriliyor)
```php
$response = $ilkbyte->accountPayment();

var_dump($response);
```

# Sunucu Methodları
## Aktif Sunucuları Listeleme
```php
$response = $ilkbyte->serverList();

var_dump($response);
```

## Aktif Sunucuları Listeleme
```php
$response = $ilkbyte->serverList();

var_dump($response);
```

## Tüm Sunucuları Listeleme
```php
$response = $ilkbyte->serverListAll();

var_dump($response);
```

## Sunucu Oluşturmak için Gerekli Parametreler
```php
$response = $ilkbyte->serverCreate();

var_dump($response);
```

## Yeni Sunucu Oluşturma
```php
$osId = 14;
$appId = null;
$packageId = 5;
$response = $ilkbyte->serverCreateConfig('root', 'password', 'exampleserver', $osId, $appId, $packageId, 'ssh-rsa [YOUR-SSH-PUBLIC-KEY]');

var_dump($response);
```

## Sunucu Nesnesine Oluşturma
```php
$sunucu = $ilkbyte->server('exampleserver');
```

## Sunucu Durumunu Görüntüleme
```php
$response = $sunucu->show();

var_dump($response);
```

## Sunucu Monitoring Verilerini Görme (Geliştiriliyor)
```php
$response = $sunucu->monitor();

var_dump($response);
```

## Sunucu Güç Yönetimi
```php
$response = $sunucu->power('reboot');

var_dump($response);
```

## Sunucu için IP RDNS Kaydı
```php
$response = $sunucu->rdns('89.252.xxx.xx', 'ni.net.tr');

var_dump($response);
```

## Sunucu Snapshot Listeleme
```php
$response = $sunucu->snapshots();

var_dump($response);
```

## Sunucu Snapshot Geri Yüklemesi
```php
$snapshotId = 1234;
$response = $sunucu->snapshotRevert($snapshotId);

var_dump($response);
```

## Sunucu Backup Listeleme
```php
$response = $sunucu->backups();

var_dump($response);
```

## Sunucu Backup Geri Yüklemesi
```php
$backupId = 1234;
$response = $sunucu->backupRevert($backupId);

var_dump($response);
```

# DNS Methodları
## Kayıtlı Alan Adlarını Listeleme
```php
$response = $ilkbyte->domainList();

var_dump($response);
```

## Yeni Alan Adı Ekleme
```php
$response = $ilkbyte->domainCreate('ni.net.tr');

var_dump($response);
```

## Alan Adı Nesnesine Oluşturma
```php
$alanadi = $ilkbyte->domain('ni.net.tr');
```

## Alan Adı Durumunu Görüntüleme
```php
$response = $alanadi->show();

var_dump($response);
```

## Yeni DNS Kaydı Ekleme
```php
$response = $alanadi->add('server1', 'A', '89.252.xxx.xx');

var_dump($response);
```

## Mevcut DNS Kaydını Güncelleme
```php
$recordId = 1234;
$response = $alanadi->update($recordId, '89.252.xxx.xx');

var_dump($response);
```

## Mevcut DNS Kaydını Silme
```php
$recordId = 1234;
$response = $alanadi->delete($recordId);

var_dump($response);
```

## Yapılan Değişiklikleri DNS Sunucularına Gönderme
```php
$response = $alanadi->push();

var_dump($response);
```