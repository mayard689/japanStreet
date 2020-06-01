/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.scss in this case)
import '../css/app.scss';
//import './shopCarousel.js';

//load the jQuery and import the function from jQuery
const $ = require('jquery');

//load the JS bootstrap part - note that bootstrap doesn't export anything
require('bootstrap');

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
//import $ from 'jquery';

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');

let scrollContainer= document.querySelector(".scroll-container");
scrollContainer.addEventListener("scroll", function(){

    let pageX=scrollContainer.scrollLeft;
    console.log(pageX);

    let parallaxContainer1= document.querySelector(".parallax-container1");
    let backgroundShift1=0.55*pageX;
    parallaxContainer1.style.backgroundPosition=backgroundShift1+'px -100px';

    let parallaxContainer2= document.querySelector(".parallax-container2");
    let backgroundShift2=0.15*pageX;
    parallaxContainer2.style.backgroundPosition='left '+backgroundShift2+'px bottom 0px';
});