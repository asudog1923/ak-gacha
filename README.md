# Arknigts Gacha Simulator

Arknigts Gacha Simulator is a web based gacha / summon simulator based from mobile games entitled "Arknights".

## Requirement

- PHP 7+ and any webserver.

Well basically it does support PHP 5 but i don't reccommended it anyway.

You can visit this [demo](https://demo.teamxproject.online/akgacha) if you don't want to install it. But since it hosted on free hosting service, the site may often down.
## Features

- Banner swap.
- Pity rate calculation (reset when pity triggered).
- Total pull calculation (reset when pity triggered).


## Usage

To change operator's default rarity percentage, open and edit ``json/rate.json``.

Note : Currently this will return error when you change six stars percentage because there's too much condition checker that have to be changed first, probably gonna do this next update.

```php
{
  "6s": 0.02, //Six stars rate, default 2%
  "5s": 0.08, //Five stars rate, default 8%
  "4s": 0.5, //Four stars rate, default 50%
  "3s": 0.4 //Three stars rate, default 40%
}
```

If you want to load operator's assets directly from this repo, you can rename ``json/operator.json`` into anything, then rename ``json/operator-ex.json`` into ``json/operator.json``.

## Probably to do list

- Money spent calculation.
- Better interface.


## Contributing
Pull requests are welcome. If you have any suggestion feel free to contact me.

## License
Licensed under MIT. See [license](https://github.com/ookamiiixd/ak-gacha/blob/master/LICENSE) file.