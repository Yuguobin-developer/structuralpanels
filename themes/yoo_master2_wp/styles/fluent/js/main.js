// ----------------------------------- //
// Banner done by -------------------- //
// JoelSemczyszyn@gmail.com ---------- //
// ----------------------------------- //


// 
// Variables 
// ----------------------------------- //


var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");
var bg = document.getElementById("background");
var container = document.getElementById("banner");
var overlay = document.getElementById("banner-overlay")
var button = document.getElementById("bottom-bar-button");
var shine = document.getElementById("bottom-bar-shine");
var shinectx = shine.getContext("2d");


// 
// Canvas Work  
// ----------------------------------- //

// Gradients

var grd = ctx.createLinearGradient(0, 0, 0, 800);
grd.addColorStop(1, "rgba(0,169,224,1)" );
grd.addColorStop(0.5, "rgba(0,169,224,1)" );
grd.addColorStop(0.35, "rgba(0,169,224,0.5)" );
grd.addColorStop(0.2, "rgba(0,169,224,0)" );
grd.addColorStop(0, "rgba(0,169,224,0)" );

var sgrd = ctx.createLinearGradient(0, 0, 50, 0);
sgrd.addColorStop(0, "rgba(255,255,255,0.00)" );
sgrd.addColorStop(0.2, "rgba(255,255,255,0.50)" );
sgrd.addColorStop(0.6, "rgba(255,255,255,0.60)" );
sgrd.addColorStop(0.8, "rgba(255,255,255,0.00)" );

// Operations

ctx.fillStyle = grd;
ctx.fillRect(0, 0, 300, 800);
ctx.globalCompositeOperation = 'multiply';

shinectx.fillStyle = sgrd;
shinectx.fillRect(0, 0, 50, 36);
shinectx.globalCompositeOperation = 'overlay';


// 
// Greensock Animation 
// ------------------------------------- //


// Independent

TweenMax.from(".bottom-bar", 0.75, {opacity:0, delay:1.8, rotationX:15, transformOrigin:"top 50% 60", ease:Power1.easeOut});
TweenMax.fromTo(bg, 18, {scale:1.2},{scale:1});

// Timelines

var tl = new TimelineLite();
var tlbg = new TimelineLite();
var tlbtn = new TimelineLite();
var tlshine = new TimelineLite();
var btnlock = new TimelineLite();

// Main Timeline

TweenMax.set(container, {perspective:100});

btnlock.add(hoverLockOn);
btnlock.add(hoverLockOff, 4);

tl.add( TweenMax.staggerFrom(".slide1", 1.5, {delay:0.5, opacity: 0, rotationX:25, transformOrigin:"top 50% 120", ease:Power2.easeOut}, 0.25) )
	.staggerTo(".slide1", 0.8, {opacity: 0, rotationX: -25, transformOrigin:"top 50% 120", ease:Power3.easeIn}, 0.15, "+=1.2")
	.to(".slide1", 0, {display: "none"})
	.staggerFrom(".slide2", 1.2, {opacity: 0, rotationX:25, transformOrigin:"top 50% 120", ease:Power3.easeOut}, 0.15 )
	.staggerTo(".slide2", 0.8, {opacity: 0, rotationX: -25, transformOrigin:"top 50% 120", ease:Power3.easeIn}, 0.15, "+=2.0")
	.to(".slide2", 0, {display: "none"})
	.staggerFrom(".slide3", 1.2, {opacity: 0, y: 30, ease:Power3.easeOut}, 0.3, "+=1.2")
	.add(hoverLockOn)
	.to(button, 0.20, {scale:.9, ease:Power1.easeOut})
	.to(button, 0.20, {scale:1, ease:Power1.easeIn})
	.fromTo(shine, 0.6, {x:0},{ease:Power1.easeInOut, x: 140})
	.add(hoverLockOff) ;

// Gradient Background Timeline

 tlbg.add( TweenMax.to(c, 1.5, {y:-500, delay:0.25}) )
 	.to(c, 0.8, {y:100}, "+=8.6")
 	.to(c, 0, {display: "none"});

// Mouse-over Animation

function onHoverAnimation () {
	tlbtn.to(button, 0.20, {scale:.9, ease:Power1.easeOut})
		.to(button, 0.20, {scale:1, ease:Power1.easeIn})
		.fromTo(shine, 0.6, {x:0},{ease:Power1.easeInOut, x: 140}) ;
};

var hoverLock = 0;

function hoverLockOn () {
	hoverLock = 1;
}

function hoverLockOff () {
	hoverLock = 0;
}

overlay.addEventListener("mouseover", onHover);
function onHover () {

	if (tlbtn.isActive() ||  hoverLock == 1) {} else {
		tlbtn.to(button, 0.20, {scale:.9, ease:Power1.easeOut})
		.to(button, 0.20, {scale:1, ease:Power1.easeIn})
		.fromTo(shine, 0.6, {x:0},{ease:Power1.easeInOut, x: 140}) ;
	}
} ;
