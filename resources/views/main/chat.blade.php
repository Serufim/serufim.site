@extends('main.layout')
@section('title', 'Прогрессивный чатек')
@section('content')
    <style>
        .container{
            padding: 0 1rem;
        }
        .chat__form{
            display: flex;
            flex-flow: row nowrap;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 1rem;
        }
        .input{
            border-radius: 4px 0 0 4px;
        }
        .field{
            width: 100%;
        }
        .button{
            border-radius: 0 4px 4px 0;
        }
        .chat{

        }
        .chat__box{
            height: 480px;
            position: relative;
            display: flex;
            flex-flow: column;
            justify-content: flex-end;
            overflow-x: auto;
            border: 2px solid black;
        }
        .chat__message{
            margin-top: 0.5rem;
            margin-bottom: 0!important;
        }
        .chat_box-modal{
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #fff;
        }
        .chat_box__block{
            width: 300px;
        }
        .hide{
            display: none;
        }
    </style>
 <h1 class="title is-1 has-text-centered">@Seruchat - Прогрессивный веб чат</h1>
    <div class="container">
        <div class="chat">
            <div class="chat__box">
                <div class="chat_box-modal ">
                    <div class="chat_box__block">
                        <div class="field">
                            <label for="" class="label">Ваше имя</label>
                            <div class="control">
                                <input id="username" class="input " type="text" placeholder="Primary input">
                            </div>
                        </div>
                        <button id="enter" class="button is-info">Войти</button>
                    </div>
                </div>
            </div>
            <from class="chat__form" action="/">
                <div class="field">
                    <div class="control">
                        <input class="input " id="message" type="text" placeholder="Primary input">
                    </div>
                </div>
                <div class="buttons">
                    <button type="submit" class="button is-primary" id="sendForm">
                    <span class="icon">
                        <i class="fab fa-telegram-plane"></i>
                    </span>
                        <span>Отправить</span>
                    </button>
                </div>
            </from>
        </div>
    </div>
    <script src="{{asset('js/chat.js')}}"></script>
@endsection