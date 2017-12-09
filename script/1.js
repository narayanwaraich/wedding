const helper = {
  monthNames : ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"],
  googleMapsAPIKey: 'AIzaSyBFT0lzOIciBgTcSjthtBSayFV3fBhg53g'
}

const weddingDate = new Date('2018-02-15');

function getFormattedDate(date) {
//  console.log(arguments.length);
  return date.getDate() + ' ' + helper.monthNames[date.getMonth()] + ', ' + date.getFullYear();
}

//document.getElementById('weddingDate').innerHTML = getFormattedDate(weddingDate);

function createCol() {
  let newCol = document.createElement('div');
  newCol.className = 'col';
  let newPNumber = document.createElement('p');
  newPNumber.className = 'counter-number';
  let newPTitle = document.createElement('p');
  newPTitle.className = 'counter-title';
  return { div: newCol, number: newPNumber, title: newPTitle }
}

//  Counter
function getTimeRemaining(endtime) {
  var t = endtime - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(endtime) {
  let daysP = document.getElementById('counter-days');
  let hoursP = document.getElementById('counter-hours');
  let minutesP = document.getElementById('counter-minutes');
  let secondsP = document.getElementById('counter-seconds');

  function updateClock() {
    let t = getTimeRemaining(endtime);

    daysP.innerHTML = t.days;
    hoursP.innerHTML = ('0' + t.hours).slice(-2);
    minutesP.innerHTML = ('0' + t.minutes).slice(-2);
    secondsP.innerHTML = ('0' + t.seconds).slice(-2);

    if (t.total <= 0) {
      clearInterval(timeinterval);
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}

initializeClock(weddingDate);

//  Google Maps
let map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 30.726705, lng: 76.767135},
    zoom: 13
  });
}
