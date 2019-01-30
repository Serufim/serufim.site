import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import io from 'socket.io-client'


export default class Chat extends Component{
    constructor(props){
        super(props);
        this.state={
            chatStatus:null,
            login:false,
            messages:[],
            message:"",
            name:"",
            users:0,
            slaves:0,
            loginError:false,
            loginErrorMessage:"",
            needScroll:false,
        };
        this.socket = null;
        this.handleChandge = this.handleChandge.bind(this)
        this.login = this.login.bind(this)
        this.updateUsers = this.updateUsers.bind(this)
        this.sendMessage = this.sendMessage.bind(this)
    }
    async componentDidMount() {
        await this.checkChat();
        const {messages} = this.state;
        this.socket.on('connect',()=>console.log('Подключено'));
        this.socket.on('disconnect',()=>console.log('Отключено'));
        this.socket.on('user_stat',(data)=>this.updateUsers(data));
        this.socket.on('login_error',(data)=>this.setState({loginError:true,loginErrorMessage:data.message}));
        this.socket.on('login_success',()=>this.setState({login:true}));
        this.socket.on('connect_failed', function() {
            document.write("Sorry, there seems to be an issue with the connection!");
        });
        this.socket.on('reply',(data)=>{
            messages.push(data);
            this.setState({messages:messages})
        });
    }

    async checkChat() {
        await axios.get(process.env.CHAT_URL+'/check')
            .then(resp => {
                if (resp.data.power){
                    this.setState({chatStatus:"on"});
                    this.socket = io(process.env.CHAT_URL+'/chat')
                }else
                    this.setState({chatStatus:"off"})
            })
                        .catch(err => this.setState({chatStatus:"off"}));
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
    updateUsers(data){
        this.setState({users:data.users,slaves:data.slaves})
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
        this.socket.emit('login',{name:name,token:token});
        this.setState({name:""});
    }
    sendMessage(e){
        e.preventDefault();
        const {message} = this.state;

        this.socket.emit('chat_message',message);
        this.setState({message:"",needScroll:true});
    }
    render() {
        const {chatStatus, login, name, messages, message, loginError, loginErrorMessage, users, slaves} = this.state;
        return(
            <div className="chat container container--with-paddings">
                <h1 className="title is-1 has-text-centered">@Seruchat</h1>
                <p className="subtitle has-text-centered">Прогрессивный веб чат</p>
                <div className="chat__slaves-count">
                    <span className="chat__slaves-connected has-text-grey-light">Подключено: {slaves} </span>
                    <span className="chat__slaves-connected has-text-info">В чате: {users} </span>
                    <span className="chat__slaves-connected has-text-danger">Админов: {users} </span>
                </div>
                <div className="chat__box">
                    <div className="chat__box-modal has-text-danger">{chatStatus==="off"?"Чат отключен, приходите потом":null}</div>
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
if (document.getElementById('chat')){

    ReactDOM.render(<Chat />, document.getElementById('chat'));
}