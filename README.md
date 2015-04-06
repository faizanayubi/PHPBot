# PHPBot
Complete Automated Web Bot Library in PHP that navigates on its own and fetches the customize field in a website

![PHPBot](https://github.com/faizanayubi/PHPBot/blob/master/Output.PNG?raw=true)

## Features
1. Uses Proxy
2. Database Storage (to be added soon)
3. Navigates on its own
4. Works awesome on CRON

## Example : Fetching title from variois site at once
1. Adding Url from where data is to be fetched
```
$urls = [
    'ecommerce' => 'www.amazon.in',
    'search' => 'www.google.com',
    'social' => 'https://twitter.com/faizanayubi'
];
```

2. Customizing the field we know
```
$document_fields = [
    'title' => '<title.*>(.*)<\/title>',
    'h2' => '<h2[^>]*?>(.*)<\/h2>',
];
```

3. Instantiate the Web Bot Class
```
$webbot = new \WebBot\WebBot($urls, $document_fields);
```

4. Execute fetch data from URLs
```
$webbot->execute();
```

5. Result
![PHPBot](https://github.com/faizanayubi/PHPBot/blob/master/Output.PNG?raw=true)

For Complete Code info and how to display output see index.php

## Working On
1. Efficiency
2. Speed
3. Caching
4. File Download
