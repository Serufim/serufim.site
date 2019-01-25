import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class CouponsTable extends Component {
    constructor(props) {
        super(props);
        this.state = {
            message: "",
            loading: false,
            status: "",
        };
        this.sendMessage = this.sendMessage.bind(this);
        this.handleChange = this.handleChange.bind(this);
    }

    sendMessage(e) {
        //Отправляем короч на сервер
        e.preventDefault();
        this.setState({loading: true});
        let message = this.state.message;
        axios.post('/api/send_coupon', {message: message}).then(resp => {
            this.setState({status: "success",message:""}, () => {
                setTimeout(() => this.setState({status: ""}), 2000)
            });
        })
            .catch(() => {
                this.setState({status: "error"}, () => {
                    setTimeout(() => this.setState({status: ""}), 2000)
                });
            });
    }

    handleChange(event) {
        this.setState({message: event.target.value});
    }

    render() {
        const {status} = this.state
        return (
            <section className="container">
                <h3 className="coupons_title title is-3 is-size-4-mobile">Знаете купоны, которые не знаем мы???</h3>
                <p className="coupons_subtitle subtitle">Обязательно напишите нам об этом</p>
                <div className="columns">
                    <form action="" className="coupons-form form column is-4" onSubmit={this.sendMessage}>
                        <div className="field">
                            <label className="label">Ваше сообщение</label>
                            <div className="control">
                            <textarea name="message"
                                      className={`textarea ${status === "error" ? "is-danger" : null} ${status === "success" ? "is-success" : null}`}
                                      value={this.state.message} onChange={this.handleChange}
                                      placeholder="Укажите максимально подробную информацию о известном вам купоне"></textarea>
                            </div>
                            <p className={`help ${status === "error" ? "is-danger" : null} ${status === "success" ? "is-success" : null}`}>{status === "error" ? "Произошла ошибка, попробуйте позже" : null} {status === "success" ? "Форма успешно отправлена" : null}</p>
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