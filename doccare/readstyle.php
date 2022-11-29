<?php
header('content-type: text/css;') //connect css in php

 ?>
*{
  margin:0;
  padding:0;
:root {
    --bg-size: 100% 100%;
    --main_color: #fff;
    --title: 'Josefin Sans', sans-serif;
    --font-para: 'David Libre', serif;
    --btn-color: #bbe1fa;
    --btn-font-color: #000;
    --btn-font: 1.5rem;
    --eff: .3s all ease;
}

* {
    font-family: var(--font-para);
}

html {
    font-size: 62.5%;
}

p,
label,
input::placeholder {
    font-size: 1.9rem;
    line-height: 170%;
    color: #6c757d;
}

figure img,
.fab,
.fas {
    transition: var(--eff);
}

a,
a:hover {
    text-decoration: none;
    cursor: pointer;
}

body {
    background: hsl(84, 3%, 94%);
}

.main_heading {
    font-family: var(--title);
    font-weight: bold;
    font-size: 5rem;
    color: #000;
}

.main_heading__para {
    font-size: 2.2rem;
}

.main_header__div {
    height: calc(100vh - 40vh);
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0.8) 50%, rgba(0, 0, 0, 0)), url('https://images.pexels.com/photos/380769/pexels-photo-380769.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
    background-size: var(--bg-size);
}

.main_header__div p {
    font-weight: bold;
    font-size: 3.5rem;
    font-family: var(--title);
    color: var(--main_color);
    padding-bottom: 1rem;
    margin-bottom: 0;
}

.main_header__div h2 {
    font-size: 6.5rem;
    font-weight: bold;
    font-family: var(--title);
    color: var(--main_color);
    padding-bottom: 2rem;
    transition: var(--eff);
}

.main_header__div span {
    font-family: var(--title);
}

.animateWord div {
    overflow: hidden;
    position: relative;
    float: right;
    height: 8rem;
    padding-top: 1rem;
    margin-top: -1rem;
}

.animateWord div li {
    font-weight: bold;
    padding: 0 1rem;
    height: 4.5rem;
    margin-bottom: 4.5rem;
    display: block;
    font-family: var(--title);
}

.flip {
    -webkit-animation: flip4 10s cubic-bezier(0.23, 1, 0.32, 1.2) infinite;
    animation: flip4 10s cubic-bezier(0.23, 1, 0.32, 1.2) infinite;
}

@-webkit-keyframes flip4 {
    0% {
        margin-top: -360px;
    }

    5% {
        margin-top: -270px;
    }

    25% {
        margin-top: -270px;
    }

    30% {
        margin-top: -180px;
    }

    50% {
        margin-top: -180px;
    }

    55% {
        margin-top: -90px;
    }

    75% {
        margin-top: -90px;
    }

    80% {
        margin-top: 0px;
    }

    99.99% {
        margin-top: 0px;
    }

    100% {
        margin-top: -270px;
    }

}

@keyframes flip4 {
    0% {
        margin-top: -360px;
    }

    5% {
        margin-top: -270px;
    }

    25% {
        margin-top: -270px;
    }

    30% {
        margin-top: -180px;
    }

    50% {
        margin-top: -180px;
    }

    55% {
        margin-top: -90px;
    }

    75% {
        margin-top: -90px;
    }

    80% {
        margin-top: 0px;
    }

    99.99% {
        margin-top: 0px;
    }

    100% {
        margin-top: -270px;
    }

}

.main_header__div button {
    color: var(--btn-font-color);
    border-width: 0;
    font-size: var(--btn-font);
    transition: var(--eff);
    padding: .8rem 2rem;
    background-color: var(--btn-color);
    border-color: var(--btn-color);
    font-family: var(--title);
    outline: none;
}

.main_header__div button:hover,
figure img:hover,
.left_div__reply:hover,
.left_div__like:hover,
.subs_btn:hover {
    transform: translateY(-0.5rem);
    box-shadow: 0 1rem 3rem -1rem rgba(255, 255, 255, 0.7);
}

/*left side vblog stykle start*/
.blog_left__div h1 {
    font-family: var(--title);
    font-weight: bold;
    font-size: 3rem;
}

.blog_left__div .blog_title {
    font-weight: 400;
    font-size: 2.2rem;
}

.blog_left__div .blog_title span {
    color: #1b262c;
}

.blog_left__div p span {
    color: #1b262c;
}

.left_div_btns {
    margin-top: 3rem;
    transition: var(--eff);
}

.left_div__like {
    color: var(--btn-font-color);
    /*border-width: .2rem;*/
    font-size: var(--btn-font);
    transition: var(--eff);
    padding: .8rem 2rem;
    background-color: var(--btn-color);
    border-color: var(--btn-color);
    font-family: var(--title);
    outline: none;
    border: none;
}

.left_div__reply {
    color: var(--btn-font-color);
    /*border-width: .2rem;*/
    font-size: var(--btn-font);
    transition: var(--eff);
    padding: .8rem 2rem;
    background-color: var(--btn-color);
    border-color: var(--btn-color);
    font-family: var(--title);
    outline: none;
    border: none;
}

.replies {
    margin: 2rem 0;
    padding: 1rem 0;
    transition: var(--eff);
    display: none;
}

.thapa_show {
    margin: 20px 0;
    transition: var(--eff);
    display: block;
}

/*right sdie div style start*/
.about_me_div {
    width: auto;
    height: 40rem;
    display: flex;
    justify-content: flex-end;
    align-items: flex-start;
    flex-direction: column;
    background-image: linear-gradient(to bottom, transparent 50%, rgba(208, 206, 207, 0.8) 50%), url('../images/thapa.jpg');
    background-size: var(--bg-size);
}

.about_me_div p:first-child {
    padding-bottom: 0.2rem;
    font-size: 2.2rem;
}

.about_me_div p {
    font-size: 1.8rem;
    padding-bottom: 1rem;
    color: #000;
}

.right_div__title {
    background: #d0cecf;
    box-shadow: 0 1rem 3rem -1rem rgba(255, 255, 255, 0.7);
}

.right_div__title h2 {
    font-size: 2.5rem;
    padding-left: 2rem;
}

.popular_post__img1 {
    background-image: url('../images/bg.png');
    background-size: var(--bg-size);
}

.popular_post__img2 {
    background-image: url('../images/mz.jpg');
    background-size: var(--bg-size);
}

.popular_post__img3 {
    background-image: url('../images/zb.jpg');
    background-size: var(--bg-size);
}

.popular_post__img4 {
    background-image: url('../images/sj.jpg');
    background-size: var(--bg-size);
}

.right_sub__div {
    background: #fff;
    padding: 2.5rem 1rem;
}

.right_sub__div .row {
    margin-bottom: 2rem;
    padding-left: 1rem;
}

.right_sub__div .row:last-child {
    margin-bottom: 0;
}

.row>.right_div_post {
    padding-left: 0;
    padding-right: 0;
}

/*tags style*/
.tags_main {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(4rem, 8rem));
    grid-gap: .5rem;
}

.tags_main a {
    font-size: 1.7rem;
    line-height: 170%;
    font-weight: lighter;
    background: #6c757d;
    transition: var(--eff);
}

.tags_main a:hover {
    color: var(--btn-font-color);
    background: var(--btn-color);
}

/*adverstisment*/
.advertise_img {
    min-width: 10rem;
    height: 20rem;
    display: grid;
    place-items: center;
}

/*left side icons*/
.fab {
    color: #000;
}

.fab:hover {
    color: #d0cecf;
    transform: rotate(360deg);
}

/*right Subscribe  style*/
.right_sub__div #exampleInputEmail1 {
    padding: 1.5rem 1rem;
    margin: 1.5rem 0;
}

.subs_btn {
    color: #000;
    border-width: 0;
    font-size: var(--btn-font);
    transition: var(--eff);
    padding: .8rem 2rem;
    display: block;
    background-color: var(--btn-color);
    border-color: var(--btn-color);
    font-family: var(--title);
    outline: none;
}

footer p {
    margin-bottom: 0;
    padding-bottom: 0;
}

/*responsive code start*/
@media(max-width:998px) {
    html {
        font-size: 60%;
    }

    .left_div_blog {
        margin: 3rem 0;
    }

    p,
    label,
    input::placeholder {
        font-size: 2.2rem;
    }

    :root {
        --btn-font: 2rem;
    }

    .main_header h2 {
        font-size: 4.5rem;
    }

}

@media(max-width:768px) {
    html {
        font-size: 45%;
    }

    .left_div_blog {
        margin: 3rem 0;
    }

}