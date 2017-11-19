# Laravel Yxksdk

Laravel Yxksdk is a package for Laravel 5 developed by [hank](http://cuiqingcai.com). It provides simple usage for laravel of [Yxksdk](http://www.youxiake.com/). 


## Installation

Laravel 5.0 or later is required.

To get the latest version of Laravel Geetest, simply require the project using Composer:

```
$ composer require maokeyang/yxksdk
```

Or you can add following to `require` key in `composer.json`:

```json
"maokeyang/yxksdk": "~1.0"
```

then run:

```
$ composer update
```

Next, You should need to register the service provider. Open up `config/app.php` and add following into the `providers` key:

```php
Maokeyang\Yxksdk\YxksdkServiceProvider::class
```

And you can register the Geetest Facade in the `aliases` of `config/app.php` :

```php
'Yxksdk' => Maokeyang\Yxksdk\Yxksdk::class
```

## Configuration

To get started, you need to publish config file using the following command:

```
$ php artisan vendor:publish --tag=yxksdk
```

This will create a config file named `config/yxksdk.php` which you can configure yxksdk as you like.


## Usage

Firstly, You need to register in [Geetest](http://www.geetest.com/). Creating an app and get `ID` and `KEY`.

For example. You can see app `ID` and `KEY` after you added an app in [Geetest Admin Page](http://account.geetest.com)

![](https://ws3.sinaimg.cn/large/006tKfTcly1fh3qherw91j31kw0e6q4p.jpg)

Then configure them in your `.env` file because you'd better not make them public.

Add them to `.env` as follows:

```
YXK_ID=10000
YXK_SECRET=maokeyang1031
```

## Contribution

If you find something wrong with this package, you can send an email to `cqc@cuiqingcai.com`

Or just send a pull request to this repository. 

Pull Requests are really welcomed.

## Author

[Maokeyang](http://cuiqingcai.com) , from Hangzhou China

## License

Laravel Yxksdk is licensed under [The MIT License (MIT)](https://github.com/Maokeyang/Yxksdk/blob/master/LICENSE).



 
