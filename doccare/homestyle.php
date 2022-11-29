@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,100;1,300&display=swap');
<?php
header('content-type: text/css;') //connect css in php

 ?>
:root{
  --blue:#0188DF;
  --black:#354046;
}

*{
  font-family: 'Roboto', sans-serif;
  margin:0; padding:0;
  box-sizing: border-box;
  border:none !important;
  outline: none !important;
  text-decoration: none !important;
  text-transform: capitalize;
  font-weight: 400;
  transition: all .2s linear;
}

*::selection{
  background:var(--black);
  color:#fff;
}

html{
  font-size: 62.5%;
  overflow-x: hidden;
}

body{
  overflow-x: hidden;
}

section{
  overflow: hidden;
}

.button{
  height:3.5rem;
  width: 15rem;
  background:var(--blue);
  color:#fff;
  font-size: 1.7rem;
  text-transform: capitalize;
  border-radius: .5rem;
  cursor: pointer;
  position: relative;
  z-index: 0;
  overflow: hidden;
  margin:1rem 0;
}

.button::before{
  content: '';
  position: absolute;
  top: -100%; left: 0;
  height:100%;
  width: 100%;
  background-color: var(--black);
  z-index: -1;
  transition: .2s linear;
}

.button:hover:before{
  top: 0%;
}

.button:hover{
  box-shadow: .1rem .5rem var(--blue),
              0 .3rem .5rem rgba(0,0,0,.3);
}

.heading{
  text-align: center;
  font-size: 4rem;
  padding:1rem;
  padding-top: 8rem;
  color:var(--black);
}

.heading span{
  color:var(--white);
}

header{
  width:100%;
  position: fixed;
  top:0; left: 0;
  padding:2rem 1rem;
  z-index: 1000;
}

.header-active{
  background:#fff;
  box-shadow: 0 .1rem .3rem rgba(0,0,0,.3);
  padding: .5rem 1rem;
}

header .container{
  display: flex;
  align-items: center;
  justify-content: space-between;
}

header a{
  color:var(--black);
}

header a:hover{
  color:var(--blue);
}

header .container .logo{
  font-size: 3rem;
}

header .container .logo span{
  color:var(--blue);
}

header .nav ul{
  margin:0; padding: 0;
  display: flex;
  align-items: center;
  justify-content: space-between;
  list-style: none;
}

header .nav ul li{
  margin: 0 1rem;
}

header .nav ul li a{
  font-size: 2rem;
}

header .fa-bars{
  font-size: 3.5rem;
  color:var(--blue);
  cursor: pointer;
  display: none;
}

.home .content h1{
  font-size: 5rem;
  color:var(--black);
}

.home .content h1 span{
  color:var(--blue);
}

.home .content h3{
  font-size: 4rem;
  color:var(--black);
}

.about{
  background:#eee;
}

.about .content .box{
  margin:3rem 0;
}

.about .content .box h3{
  font-size: 2.5rem;
  color:var(--black);
}

.about .content .box h3 i{
  padding: 0 1rem;
  color:var(--blue);
}

.about .content .box p{
  font-size: 1.7rem;
  padding-left: 6rem;
  color:#666;
}

.facility{
  min-height: 100vh;
}

.facility .box-container{
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  padding-bottom: 3rem;
}

.facility .box-container .box{
  height:20rem;
  width:30rem;
  margin:.3rem;
  overflow: hidden;
}

.facility .box-container .box img{
  height:100%;
  width:100%;
  object-fit: cover;
}

.facility .box-container .box:hover img{
  transform: scale(1.3);
}

.review{
  background:url(../images/review-bg.jpg), linear-gradient(var(--black),var(--black)) no-repeat;
  background-size: cover;
  background-position: center;
  background-blend-mode: multiply;
}

.review .heading{
  color:#fff;
}

.review .box-container{
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  padding-bottom: 5rem;
}

.review .box-container .box{
  background:#fff;
  width:30rem;
  margin:5rem 1rem;
  padding:1.5rem;
  position: relative;
}

.review .box-container .box img{
  position: absolute;
  bottom: -7.5rem; left: -1rem;
  height:5rem;
  width:5rem;
  border-radius: 50%;
  object-fit: cover;
}

.review .box-container .box p{
  font-size: 1.4rem;
  color:var(--black);
}

.review .box-container .box h3{
  text-align: end;
  color:var(--blue);
}

.review .box-container .box span{
  text-align: end;
  color:var(--black);
  display: block;
  font-size: 1.5rem;
}

.review .box-container .box::before{
  content: '';
  position: absolute;
  bottom: -1rem; left:.4rem;
  height:2rem;
  width:2rem;
  background:#fff;
  transform: rotate(45deg);
}

.counter .box-container{
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  padding:2rem 0;
}

.counter .box-container .box{
  margin:2rem 5rem;
  text-align: center;
}

.counter .box-container .box i{
  color:var(--blue);
  font-size: 5rem;
}

.counter .box-container .box span{
  color:var(--black);
  font-size: 3rem;
  display: block;
  padding:1rem 0;
}

.counter .box-container .box h3{
  color:#666;
}

.contact{
  background:
}

.contact .heading{
  color:#fff;
}

.contact form{
  text-align: center;
}

.contact form .inputBox{
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
}

.contact form .inputBox input, select{
  height: 4rem;
  width:49%;
  padding:0 1rem;
  margin:1rem 0;
  font-size: 1.7rem;
  color:var(--black);
}

.contact form textarea{
  height:20rem;
  resize: none;
  padding:1rem;
  font-size: 1.5rem;
  width: 100%;
}

.contact form input[type="submit"]{
  width:20rem;
}

.contact form input[type="submit"]:hover{
  background:var(--black);
}

.post .box-container{
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
}

.post .box-container .box{
  width:30rem;
  margin:2rem 1rem;
  overflow: hidden;
  border-radius: .5rem;
  box-shadow: 0 .3rem .5rem rgba(0,0,0,.3);
}

.post .box-container .box img{
  height:20rem;
  width: 100%;
  object-fit: cover;
}

.post .box-container .box .content{
  padding:0 1.5rem;
}

.post .box-container .box .content span{
  color:#666;
  font-size: 1.5rem;
  display: block;
  padding:1rem 0;
}

.post .box-container .box .content h3{
  font-size: 2rem;
  color:var(--black);
}

.post .box-container .box .content:hover h3{
  color:var(--blue);
}

.post .box-container .box .content p{
  font-size: 1.3rem;
  color:var(--black);
}

.footer{
  background:var(--black);
}

.footer p{
  font-size: 1.5rem;
  color:#eee;
  padding:1rem 0;
}

.footer .col-md-4{
  padding:1.3rem
}

.footer .col-md-4:nth-child(1) a{
  font-size: 3rem;
  color:#fff;
}

.footer .col-md-4:nth-child(1) a span{
  color:var(--blue);
}

.footer a{
  font-size: 2rem;
  color:#ccc;
  display: block;
}

.footer h3{
  color:#fff;
  font-size: 3rem;
}

.footer a:hover{
  color:var(--blue);
}

.footer .credit{
  color:#fff;
  width:80%;
  margin:0;
  padding:2rem 0;
  padding-bottom: 4rem;
  border-top: .1rem solid #ccc !important;
}

.footer .credit span{
  color:var(--blue);
}




















header .fa-times{
  transform: rotate(180deg);
}

/* media queries  */

@media (max-width:768px){

  html{
    font-size: 55%;
  }

  header .fa-bars{
    display: block;
  }

  header .nav{
    position: fixed;
    top:-100rem; left:50%;
    transform: translate(-50%, -50%);
    box-shadow: 0 0 0 100vh rgba(0,0,0,.3);
    border-radius: .5rem;
    border:.3rem solid var(--blue) !important;
    background:#fff;
    width: 95%;
    opacity: 0;
  }

  header .nav ul{
    width: 100%;
    flex-flow: column;
    padding:2rem 0;
  }

  header .nav ul li{
    width: 100%;
    text-align: center;
    margin:1rem 0;
  }

  header .nav ul li a{
    font-size: 3rem;
    display: block;
  }

  header .nav-toggle{
    top:50%;
    opacity: 1;
  }

  .contact form .inputBox input, select{
    width: 100%;
  }

  .contact form input[type="submit"]{
    width:100%;
  }

}
.hover-4 img {
  width: 110%;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.hover-4 .hover-overlay {
  background: rgba(0, 0, 0, 0.4);
  z-index: 90;
}

.hover-4-title {
  position: absolute;
  bottom: 0;
  right: 0;
  padding: 3rem;
  z-index: 99;
}

.hover-4-description {
  position: absolute;
  top: 2rem;
  left: 2rem;
  text-align: right;
  border-right: 3px solid #fff;
  padding: 0 1rem;
  z-index: 99;
  transform: translateX(-1.5rem);
  opacity: 0;
  transition: all 0.3s;
}

@media (min-width: 992px) {
  .hover-4-description {
    width: 50%;
  }
}

.hover-4:hover img {
  width: 100%;
}

.hover-4:hover::after {
  opacity: 1;
  transform: none;
}

.hover-4:hover .hover-4-description {
  opacity: 1;
  transform: none;
}

.hover-4:hover .hover-overlay {
  background: rgba(0, 0, 0, 0.8);
}