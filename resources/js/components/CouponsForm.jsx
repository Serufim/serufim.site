import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export  default class CouponsTable extends Component{
    constructor(props){
        super(props);
        this.state={
            message:"",
            veryfied:false
        };
        this.sendMessage = this.sendMessage.bind(this);
        this.handleChange = this.handleChange.bind(this);
    }
    sendMessage(e){
        //Отправляем короч на сервер
        e.preventDefault();
        let message = this.state.message;
        axios.post('/api/send_coupon',{message:message}).then(resp=>console.log(resp.data))
    }
    handleChange(event) {
        this.setState({message: event.target.value});
    }
    render() {
        return (
            <section className="container">
                <h3 className="coupons_title title is-3 is-size-4-mobile">Знаете купоны, которые не знаем мы???</h3>
                <p className="coupons_subtitle subtitle">Обязательно напишите нам об этом</p>
                <div className="columns">
                    <form action="" className="coupons-form form column is-4" onSubmit={this.sendMessage}>
                        <div className="field">
                            <label className="label">Ваше сообщение</label>
                            <div className="control">
                            <textarea name="message" className="textarea" value={this.state.message} onChange={this.handleChange}
                                  placeholder="Укажите максимально подробную информацию о известном вам купоне"></textarea>
                            </div>
                        </div>
                        <div className="buttons">
                            <button type="submit" className="button is-primary">Отправить</button>
                        </div>
                    </form>
                </div>
            </section>
        );
    }
}
if (document.getElementById('coupon_form')) {
    ReactDOM.render(<CouponsTable />, document.getElementById('coupon_form'));
}