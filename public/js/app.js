/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/


// define variable that will hold content DOM element
function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
var root = null;

// functions that load data, set up page content, handle user actions

// setup index page
function setupIndex() {
  placeLoader();

  // load JSON data
  fetch('http://localhost/data/get-top-car_models').then(function (response) {
    return response.json();
  }).then(function (carmodel) {
    // on success remove spinner and render index page
    removeLoader();
    renderIndex(carmodel);
  }).then(function () {
    // setup link handling
    setupLinks();
  });
}

// setup single carmodel page
function setupSingle(id) {
  placeLoader();

  // load JSON data
  fetch('http://localhost/data/get-car_models/' + id).then(function (response) {
    return response.json();
  }).then(function (carmodel) {
    // on success remove spinner and render carmodel page
    removeLoader();
    renderSingle(carmodel);
  }).then(function () {
    // load related car_models
    fetch('http://localhost/data/get-related-car_models/' + id).then(function (response) {
      return response.json();
    }).then(function (carmodel) {
      // render related car_models links
      renderRelated(carmodel);
    }).then(function () {
      // setup link handling
      setupLinks();
    });
  });
}

// render index page content
function renderIndex(car_models) {
  var i = 0;
  var _iterator = _createForOfIteratorHelper(car_models),
    _step;
  try {
    for (_iterator.s(); !(_step = _iterator.n()).done;) {
      var carmodel = _step.value;
      i++;

      // create row
      var row = document.createElement('div');
      row.classList = 'row mb-5 pt-5 pb-5 bg-light';

      // create info div
      var info = document.createElement('div');
      info.classList = 'col-md-6 mt-2 px-5 ' + (i % 2 == 0 ? 'text-end order-1' : 'text-start order-2');

      // create info items
      // title
      var title = document.createElement('p');
      title.classList = 'display-4';
      title.textContent = carmodel.name;
      info.appendChild(title);

      // description
      if (carmodel.description.length > 0) {
        var lead = document.createElement('p');
        lead.classList = 'lead';
        lead.textContent = carmodel.description.split(' ').slice(0, 32).join(' ') + '...';
        info.appendChild(lead);
      }

      // "See more" button
      var btn = document.createElement('a');
      btn.classList = 'btn btn-success see-more ' + (i % 2 == 0 ? 'float-right' : 'float-left');
      btn.textContent = 'Apskatīt';
      btn.href = '#';
      btn.dataset.bookId = carmodel.id;
      info.appendChild(btn);

      // add info div to row
      row.appendChild(info);

      // create image div
      var image = document.createElement('div');
      image.classList = 'col-md-6 text-center ' + (i % 2 == 0 ? 'order-2' : 'order-1');

      // create image
      var img = document.createElement('img');
      img.classList = 'img-fluid img-thumbnail rounded-lg w-50';
      img.alt = carmodel.name;
      img.src = carmodel.image;
      image.appendChild(img);

      // add image div to row
      row.appendChild(image);

      // add row to document
      root.appendChild(row);
    }
  } catch (err) {
    _iterator.e(err);
  } finally {
    _iterator.f();
  }
}

// render main panel of single carmodel page
function renderSingle(carmodel) {
  // create row
  var row = document.createElement('div');
  row.classList = 'row mb-5';

  // create info div
  var info = document.createElement('div');
  info.classList = 'col-md-6 pt-5';

  // create info items
  // title
  var title = document.createElement('h1');
  title.classList = 'display-3';
  title.textContent = carmodel.name;
  info.appendChild(title);

  // full description
  if (carmodel.description.length > 0) {
    var lead = document.createElement('p');
    lead.classList = 'lead';
    lead.textContent = carmodel.description;
    info.appendChild(lead);
  }

  // data
  var dl = document.createElement('dl');
  dl.classList = 'row';

  // year
  var yearLabel = document.createElement('dt');
  yearLabel.classList = 'col-sm-3';
  yearLabel.textContent = 'Gads';
  dl.appendChild(yearLabel);
  var yearValue = document.createElement('dd');
  yearValue.classList = 'col-sm-9';
  yearValue.textContent = carmodel.year;
  dl.appendChild(yearValue);

  // price
  var priceLabel = document.createElement('dt');
  priceLabel.classList = 'col-sm-3';
  priceLabel.textContent = 'Cena';
  dl.appendChild(priceLabel);
  var priceValue = document.createElement('dd');
  priceValue.classList = 'col-sm-9';
  priceValue.innerHTML = "&euro; " + carmodel.price;
  dl.appendChild(priceValue);

  // genre
  if (carmodel.genre.length > 0) {
    var genreLabel = document.createElement('dt');
    genreLabel.classList = 'col-sm-3';
    genreLabel.textContent = 'إ½anrs';
    dl.appendChild(genreLabel);
    var genreValue = document.createElement('dd');
    genreValue.classList = 'col-sm-9';
    genreValue.textContent = carmodel.genre;
    dl.appendChild(genreValue);
  }
  info.appendChild(dl);

  // "Go back" button
  var btn = document.createElement('a');
  btn.classList = 'btn btn-dark go-back float-left';
  btn.textContent = 'Uz sؤپkumu';
  btn.href = '#';
  info.appendChild(btn);

  // add info div to row
  row.appendChild(info);

  // create image div
  var image = document.createElement('div');
  image.classList = 'col-md-6 text-center p-5';

  // create image
  var img = document.createElement('img');
  img.classList = 'img-fluid img-thumbnail rounded-lg';
  img.alt = carmodel.name;
  img.src = carmodel.image;
  image.appendChild(img);

  // add image div to row
  row.appendChild(image);

  // add row to document
  root.appendChild(row);
}

// render related car_models panel of single carmodel page
function renderRelated(car_models) {
  // create row
  var titleRow = document.createElement('div');
  titleRow.classList = 'row mt-5';

  // create col
  var titleDiv = document.createElement('div');
  titleDiv.classList = 'col-md-12';

  // create title
  var title = document.createElement('h2');
  title.classList = 'display-4';
  title.textContent = "Lؤ«dzؤ«gas grؤپmatas";

  // add elements to document
  titleDiv.appendChild(title);
  titleRow.appendChild(titleDiv);
  root.appendChild(titleRow);

  // create row element that will hold three related car_models
  var row = document.createElement('div');
  row.classList = 'row mb-5';
  var _iterator2 = _createForOfIteratorHelper(car_models),
    _step2;
  try {
    for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
      var carmodel = _step2.value;
      // create carmodel div
      var carmodelDiv = document.createElement('div');
      carmodelDiv.classList = 'col-md-4';

      // create card div
      var card = document.createElement('div');
      card.classList = 'card';

      // create card image
      var img = document.createElement('img');
      img.classList = 'card-img-top';
      img.alt = carmodel.name;
      img.src = carmodel.image;
      card.appendChild(img);

      // create card body
      var cardBody = document.createElement('div');
      cardBody.classList = 'card-body';

      // create card title
      var cardTitle = document.createElement('h5');
      cardTitle.classList = 'card-title';
      cardTitle.textContent = carmodel.name;
      cardBody.appendChild(cardTitle);

      // create card link
      var btn = document.createElement('a');
      btn.classList = 'btn btn-success see-more';
      btn.textContent = 'Apskatīt';
      btn.href = '#';
      btn.dataset.bookId = carmodel.id;
      cardBody.appendChild(btn);

      // add elements to row
      card.appendChild(cardBody);
      carmodelDiv.appendChild(card);
      row.appendChild(carmodelDiv);
    }

    // add row to document
  } catch (err) {
    _iterator2.e(err);
  } finally {
    _iterator2.f();
  }
  root.appendChild(row);
}

// set up link functionality
function setupLinks() {
  // "see more" links
  var seeMores = document.querySelectorAll('a.see-more');
  var _iterator3 = _createForOfIteratorHelper(seeMores),
    _step3;
  try {
    var _loop = function _loop() {
      var a = _step3.value;
      a.addEventListener("click", function (event) {
        event.preventDefault();
        var id = a.dataset.bookId;
        setupSingle(id);
      });
    };
    for (_iterator3.s(); !(_step3 = _iterator3.n()).done;) {
      _loop();
    }

    // "go back" links
  } catch (err) {
    _iterator3.e(err);
  } finally {
    _iterator3.f();
  }
  var goBacks = document.querySelectorAll('a.go-back');
  var _iterator4 = _createForOfIteratorHelper(goBacks),
    _step4;
  try {
    for (_iterator4.s(); !(_step4 = _iterator4.n()).done;) {
      var a = _step4.value;
      a.addEventListener("click", function (event) {
        event.preventDefault();
        setupIndex();
      });
    }
  } catch (err) {
    _iterator4.e(err);
  } finally {
    _iterator4.f();
  }
}

// replace content with spinner
function placeLoader() {
  // clear the root element
  root.innerHTML = "";

  // create loading div
  var loading = document.createElement('div');
  loading.id = 'loading';
  loading.classList = 'text-center p-5';

  // create spinner image
  var img = document.createElement('img');
  img.alt = '...';
  img.src = '/loading.gif';
  loading.appendChild(img);

  // add div to document
  root.appendChild(loading);
}

// remove spinner
function removeLoader() {
  document.getElementById('loading').remove();
}

// start when page is loaded
document.addEventListener("DOMContentLoaded", function () {
  // get root element
  root = document.getElementById('root');

  // create index page
  setupIndex();
});
/******/ })()
;