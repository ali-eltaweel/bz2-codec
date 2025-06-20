# BZ2 Codec

**BZip2 Codec**

- [BZ2 Codec](#bz2-codec)
  - [Installation](#installation)
  - [Usage](#usage)

***

## Installation

Install *bz2-codec* via Composer:

```bash
composer require ali-eltaweel/bz2-codec
```

## Usage

```php
use Codecs\Bz2Codec;

$bz2Codec = new Bz2Codec();

$code = $bz2Codec->encode($data);

$data = $bz2Codec->decode($code);
```

