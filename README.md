# Masks
 ![Release Version](https://img.shields.io/github/v/release/live-controls/masks)
 ![Packagist Version](https://img.shields.io/packagist/v/live-controls/masks?color=%23007500)
 Input Masks library for live-controls

## Requirements
- Laravel 9+
- Livewire 2+


## Translations
- English (en)
- German (de)
- Brazilian Portuguese (pt_BR)


## Installation

1. Install Masks package
```ps
composer require live-controls/masks
```
### CDN Installation
1) Include @livecontrolsMasks() before /head tag
2) In case you did publish the configuration file, set local_files to false (This is the default option)

### Local Installation
1) Run:
```
npm install imask
```
2) Add to app.js:
```
import IMask from 'imask';
```
3) Run:
```
npm run build;
```
4) Run:
```
php artisan vendor:publish --tag="livecontrols.masks.config";
```
5) Edit config/livecontrols-masks.php:
```
'local_files' => true, //Set local_files to true
```

## Usage

