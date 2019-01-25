import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import io from 'socket.io-client'

var socket = io('http://localhost:3000/chat');
export default class Chat extends Component{
    constructor(props){
        super(props);
        this.state={
            login:false,
            messages:[],
            message:"",
            name:"",
            loginError:false,
            loginErrorMessage:"",
            needScroll:false,
        }
        this.handleChandge = this.handleChandge.bind(this)
        this.login = this.login.bind(this)
        this.sendMessage = this.sendMessage.bind(this)
    }
    componentDidMount() {
        const {messages} = this.state;
        socket.on('connect',()=>console.log('Подключено'));
        socket.on('disconnect',()=>console.log('Отключено'));
        socket.on('login_error',(data)=>this.setState({loginError:true,loginErrorMessage:data.message}));
        socket.on('login_success',()=>this.setState({login:true}));
        socket.on('reply',(data)=>{
            messages.push(data);
            this.setState({messages:messages})
        });
    }

    componentDidUpdate(prevProps, prevState, snapshot) {
        const elem = document.querySelector('.chat__box');
        if(prevState.needScroll){
            elem.scrollTop = elem.scrollHeight;
            this.setState({needScroll:false})
        }else if (elem.scrollTop + 125 >= elem.scrollHeight - elem.clientHeight) {
            elem.scrollTop = elem.scrollHeight;
        }
    }

    handleChandge(field,e){
        let {state} = this;
        state[field] = e.target.value;
        this.setState(state)
    }
    login(e){
        e.preventDefault();
        const {name} = this.state;
        let token = document.head.querySelector('meta[name="admin-token"]');
        if(token)
            token= token.content;
        socket.emit('login',{name:name,token:token});
        this.setState({name:""});
    }
    sendMessage(e){
        e.preventDefault();
        const {message} = this.state;
        socket.emit('chat_message',message);
        this.setState({message:"",needScroll:true});
    }
    render() {
        const {login, name, messages, message, loginError, loginErrorMessage} = this.state;
        return(
            <div className="chat container container--with-paddings">
                <h1 className="title is-1 has-text-centered">@Seruchat</h1>
                <p className="subtitle has-text-centered">Прогрессивный веб чат</p>
                <div className="chat__box">
                    {messages.map((message, i) => <div key={i} className="chat__message message box"><span
                        className={message.admin?"has-text-danger":"has-text-info"}>{message.name}</span> {message.message}</div>)}
                </div>
                <div className="chat__control">
                    {login?
                        <form action="" method="POST" onSubmit={this.sendMessage}>
                            <label className="label">Сообщение</label>
                            <div className="field has-addons">
                                <div className="control is-expanded">
                                    <input type="text" className="input" value={message} onChange={(e)=>this.handleChandge('message',e)} required/>
                                </div>
                                <div className="control">
                                    <button type="submit" className="button is-primary">Отправить</button>
                                </div>
                            </div>
                        </form>:
                        <form action="" method="POST" onSubmit={this.login}>
                            <label className="label">Логин</label>
                            <div className="field has-addons">
                                <div className="control is-expanded">
                                    <input type="text" className={`input ${loginError? 'is-danger':null}`}value={name} onChange={(e)=>this.handleChandge('name',e)}/>
                                </div>
                                <div className="control">
                                    <button className="button is-info" type="submit">
                                        <span className="icon">
                                            <i className="fab fa-telegram-plane"></i>
                                        </span>
                                        <span>Войти</span>
                                    </button>
                                </div>
                                <p className="help is-danger">{loginErrorMessage}</p>
                            </div>
                        </form>
                    }
                </div>
            </div>
        )
    }
}
if (document.getElementById('chat')) {
    ReactDOM.render(<Chat />, document.getElementById('chat'));
}