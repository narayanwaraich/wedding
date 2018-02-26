/*
function httpGetAsync(theUrl, callback)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
            callback(xmlHttp.responseText);
    }
    xmlHttp.open("GET", theUrl, true); // true for asynchronous
    xmlHttp.send(null);
}

httpGetAsync('https://www.instagram.com/explore/tags/wedding/?__a=1', function(response) {
  console.log(JSON.parse(response));
  //console.log(response);
});
*/

(function() {
//  console.log(require(['node_modules/selenium-webdriver/index']));
/*
var webdriver = require(['selenium-webdriver']),
    chrome = require(['selenium-webdriver/chrome']),
    firefox = require(['selenium-webdriver/firefox']);

var driver = new webdriver.Builder()
    .forBrowser('chrome')
    .build();

console.log(webdriver);
*/
})();
console.log(require(['selenium-webdriver']));
var webdriver = require(['selenium-webdriver']);
var chrome = require(['selenium-webdriver/chrome']);

var driver = new webdriver.Builder()
    .forBrowser('chrome')
    .build();

//console.log(webdriver);

/*
'use strict';

const {Builder, By, Key, until} = require(['selenium-webdriver']);
//const {Options} = require(['selenium-webdriver/chrome']);

let driver = new Builder()
    .forBrowser('chrome')
    .build();

driver.get('http://www.google.com/ncr');
driver.findElement(By.name('q')).sendKeys('webdriver', Key.RETURN);
driver.wait(until.titleIs('webdriver - Google Search'), 1000);
driver.quit();
*/
