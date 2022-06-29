@extends('layouts.app')
@section('title')
    <title>Job Create</title>
@endsection
@section('content')
<style>
    body {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-rendering: optimizeLegibility;
}

.container {
    background: #fff;
    padding: 0;
    border-radius: 7px;
}

.profile-image {
    width: 50px;
    height: 50px;
    border-radius: 40px;
}

.settings-tray {
    background: lightgray;
    padding: 10px 15px;
    border-radius: 7px;
}

.settings-tray .no-gutters {
    padding: 0;
}

.settings-tray--right {
    float: right;
}

.settings-tray--right i {
    margin-top: 10px;
    font-size: 25px;
    color: grey;
    margin-left: 14px;
    transition: 0.3s;
}

.settings-tray--right i:hover {
    color: #74b9ff;
    cursor: pointer;
}

.search-box {
    background: #fafafa;
    padding: 10px 13px;
}

.search-box .input-wrapper {
    background: #fff;
    border-radius: 40px;
}

.search-box .input-wrapper i {
    color: grey;
    margin-left: 7px;
    vertical-align: middle;
}

input {
    border: none;
    border-radius: 30px;
    width: 85%;
}

input::placeholder {
    color: #e3e3e3;
    font-weight: 300;
    margin-left: 20px;
}

input:focus {
    outline: none;
}

.friend-drawer {
    padding: 10px 15px;
    display: flex;
    vertical-align: baseline;
    background: #fff;
    transition: 0.3s ease;
    background-color: #F5F5F5;
}

.friend-drawer--grey {
    background: lightgray;
}

.friend-drawer .text {
    margin-left: 12px;
    width: 70%;
}

.friend-drawer .text h6 {
    margin-top: 6px;
    margin-bottom: 0;
}

.friend-drawer .text p {
    margin: 0;
}

.friend-drawer .time {
    color: grey;
}

.friend-drawer--onhover:hover {
    background: #74b9ff !important;
    cursor: pointer;
}

.friend-drawer--onhover:hover p,
.friend-drawer--onhover:hover h6,
.friend-drawer--onhover:hover .time {
    color: #fff !important;
}

hr {
    margin: 5px auto;
    width: 90%;
}

.chat-bubble {
    padding: 10px 14px;
    background: #eee;
    margin: 10px 30px;
    border-radius: 9px;
    position: relative;
    animation: fadeIn 1s ease-in;
}

.chat-bubble:after {
    content: "";
    position: absolute;
    top: 50%;
    width: 0;
    height: 0;
    border: 20px solid transparent;
    border-bottom: 0;
    margin-top: -10px;
}

.chat-bubble--left:after {
    left: 0;
    border-right-color: #eee;
    border-left: 0;
    margin-left: -20px;
}

.chat-bubble--right:after {
    right: 0;
    border-left-color: #74b9ff;
    border-right: 0;
    margin-right: -20px;
}

@keyframes fadeIn {
    0% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}

.offset-md-9 .chat-bubble {
    background: #74b9ff;
    color: #fff;
}

.chat-box-tray {
    background: lightgray;
    display: flex;
    align-items: baseline;
    padding: 10px 15px;
    align-items: center;
    bottom: 0;
}

.chat-box-tray input {
    margin: 0 10px;
    padding: 6px 2px;
}

.chat-box-tray i {
    color: grey;
    font-size: 30px;
    vertical-align: middle;
}

.chat-box-tray i:last-of-type {
    margin-left: 25px;
}

.chat-box-tray i:hover {
    color: #74b9ff;
    cursor: pointer;
}
@import url(https://fonts.googleapis.com/css?family=Lato:100,300,400,700);
@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);

html, body {
    background: #e5e5e5;
    font-family: 'Lato', sans-serif;
    margin: 0px auto;
}
::selection{
  background: rgba(82,179,217,0.3);
  color: inherit;
}
a{
  color: rgba(82,179,217,0.9);
}

/* M E N U */

.menu {
    position: fixed;
    top: 0px;
    left: 0px;
    right: 0px;
    width: 100%;
    height: 50px;
    background: rgba(82,179,217,0.9);
    z-index: 100;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
}

.back {
    position: absolute;
    width: 90px;
    height: 50px;
    top: 0px;
    left: 0px;
    color: #fff;
    line-height: 50px;
    font-size: 30px;
    padding-left: 10px;
    cursor: pointer;
}
.back img {
    position: absolute;
    top: 5px;
    left: 30px;
    width: 40px;
    height: 40px;
    background-color: rgba(255,255,255,0.98);
    border-radius: 100%;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    -ms-border-radius: 100%;
    margin-left: 15px;
    }
.back:active {
    background: rgba(255,255,255,0.2);
}
.name{
    position: absolute;
    top: 3px;
    left: 110px;
    font-family: 'Lato';
    font-size: 25px;
    font-weight: 300;
    color: rgba(255,255,255,0.98);
    cursor: default;
}
.last{
    position: absolute;
    top: 30px;
    left: 115px;
    font-family: 'Lato';
    font-size: 11px;
    font-weight: 400;
    color: rgba(255,255,255,0.6);
    cursor: default;
}

/* M E S S A G E S */

.chat {
    min-height: 430px;
    max-height: 430px;
    list-style: none;
    background-color: #F5F5F5;
    margin: 0;
    padding: 0 0 10px 0;
}
.chat li {
    padding: 0.5rem;
    overflow: hidden;
    display: flex;
}
.chat .avatar {
    width: 40px;
    height: 40px;
    position: relative;
    display: block;
    z-index: 2;
    border-radius: 100%;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    -ms-border-radius: 100%;
    background-color: rgba(255,255,255,0.9);
}
.chat .avatar img {
    width: 40px;
    height: 40px;
    border-radius: 100%;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    -ms-border-radius: 100%;
    background-color: rgba(255,255,255,0.9);
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
}
.chat .day {
    position: relative;
    display: block;
    text-align: center;
    color: #c0c0c0;
    height: 1px;
    text-shadow: 7px 0px 0px #F5F5F5, 6px 0px 0px #F5F5F5, 5px 0px 0px #F5F5F5, 4px 0px 0px #F5F5F5, 3px 0px 0px #F5F5F5, 2px 0px 0px #F5F5F5, 1px 0px 0px #F5F5F5, 1px 0px 0px #F5F5F5, 0px 0px 0px #F5F5F5, -1px 0px 0px #F5F5F5, -2px 0px 0px #F5F5F5, -3px 0px 0px #F5F5F5, -4px 0px 0px #F5F5F5, -5px 0px 0px #F5F5F5, -6px 0px 0px #F5F5F5, -7px 0px 0px #F5F5F5;
    box-shadow: inset 20px 0px 0px #e5e5e5, inset -20px 0px 0px #e5e5e5, inset 0px -2px 0px #d7d7d7;
    line-height: 0px;
    margin-top: 5px;
    margin-bottom: 20px;
    cursor: default;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
}

.other .msg {
    order: 1;
    border-top-left-radius: 0px;
    box-shadow: -1px 2px 0px #D4D4D4;
}
.other:before {
    content: "";
    position: relative;
    top: 0px;
    right: 0px;
    left: 44px;
    width: 0px;
    height: 0px;
    border: 5px solid #fff;
    border-left-color: transparent;
    border-bottom-color: transparent;
}

.self {
    justify-content: flex-end;
    align-items: flex-end;
}
.self .msg {
    order: 1;
    border-bottom-right-radius: 0px;
    box-shadow: 1px 2px 0px #D4D4D4;
}
.self .avatar {
    order: 2;
}
.self .avatar:after {
    content: "";
    position: relative;
    display: inline-block;
    bottom: 14px;
    right: 5px;
    width: 0px;
    height: 0px;
    border: 5px solid #fff;
    border-right-color: transparent;
    border-top-color: transparent;
    box-shadow: 0px 2px 0px #D4D4D4;
}

.msg {
    background: white;
    min-width: 50px;
    max-width: 400px;
    padding: 10px;
    border-radius: 2px;
    box-shadow: 0px 2px 0px rgba(0, 0, 0, 0.07);
}
.msg p {
    font-size: 0.8rem;
    margin: 0 0 0.2rem 0;
    color: #777;
}
.msg img {
    position: relative;
    display: block;
    width: 450px;
    border-radius: 5px;
    box-shadow: 0px 0px 3px #eee;
    transition: all .4s cubic-bezier(0.565, -0.260, 0.255, 1.410);
    cursor: default;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
}
@media screen and (max-width: 800px) {
    .msg img {
    width: 300px;
}
}
@media screen and (max-width: 550px) {
    .msg img {
    width: 200px;
}
}

.msg time {
    font-size: 0.7rem;
    color: #ccc;
    margin-top: 3px;
    float: right;
    cursor: default;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
}
.msg time:before{
    content:"\f017";
    color: #ddd;
    font-family: FontAwesome;
    display: inline-block;
    margin-right: 4px;
}

emoji{
    display: inline-block;
    height: 18px;
    width: 18px;
    background-size: cover;
    background-repeat: no-repeat;
    margin-top: -7px;
    margin-right: 2px;
    transform: translate3d(0px, 3px, 0px);
}
emoji.please{background-image: url(https://imgur.com/ftowh0s.png);}
emoji.lmao{background-image: url(https://i.imgur.com/MllSy5N.png);}
emoji.happy{background-image: url(https://imgur.com/5WUpcPZ.png);}
emoji.pizza{background-image: url(https://imgur.com/voEvJld.png);}
emoji.cryalot{background-image: url(https://i.imgur.com/UUrRRo6.png);}
emoji.books{background-image: url(https://i.imgur.com/UjZLf1R.png);}
emoji.moai{background-image: url(https://imgur.com/uSpaYy8.png);}
emoji.suffocated{background-image: url(https://i.imgur.com/jfTyB5F.png);}
emoji.scream{background-image: url(https://i.imgur.com/tOLNJgg.png);}
emoji.hearth_blue{background-image: url(https://i.imgur.com/gR9juts.png);}
emoji.funny{background-image: url(https://i.imgur.com/qKia58V.png);}

@-webikt-keyframes pulse {
  from { opacity: 0; }
  to { opacity: 0.5; }
}

/* T Y P E */

input.textarea {
    position: fixed;
    bottom: 0px;
    left: 0px;
    right: 0px;
    width: 100%;
    height: 50px;
    z-index: 99;
    background: #fafafa;
    border: none;
    outline: none;
    padding-left: 55px;
    padding-right: 55px;
    color: #666;
    font-weight: 400;
}
.emojis {
    position: fixed;
    display: block;
    bottom: 8px;
    left: 7px;
    width: 34px;
    height: 34px;
    background-image: url(https://i.imgur.com/5WUpcPZ.png);
    background-repeat: no-repeat;
    background-size: cover;
    z-index: 100;
    cursor: pointer;
}
.emojis:active {
    opacity: 0.9;
}

.chat.scroll {
    overflow-y: scroll !important;
}

.chat::-webkit-scrollbar,
.group-permissions::-webkit-scrollbar {
    width: 6px;
    background-color: #fff;
}

.chat::-webkit-scrollbar-thumb,
.group-permissions::-webkit-scrollbar-thumb {
    background-color: #d6d1d1;
    border-radius: 7px;
}

.chat::-webkit-scrollbar-track,
.group-permissions::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}
</style>
    @livewire('chat.chat-list')
@endsection