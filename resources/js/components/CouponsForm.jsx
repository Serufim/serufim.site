import Captcha from './Captcha'
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class CouponsTable extends Component {
    constructor(props) {
        super(props);
        this.state = {
            message: "",
            loading: false,
            status: "",
            verified:false,
            token:"",
            hashes:512 //TODO: Поставить 512
        };
        this.childRef = React.createRef();
        this.sendMessage = this.sendMessage.bind(this);
        this.handleChange = this.handleChange.bind(this);
    }
    async sendMessage(e) {
        //Отправляем короч на сервер
        e.preventDefault();
        this.setState({loading: true});
        const {message,token,hashes} = this.state;
        await axios.post('/api/send_coupon', {message: message,token:token,hashes:hashes}).then(resp => {
            if (resp.data.status ==="success")
                this.setState({status: "success",message:"",verified:false}, () => {
                    setTimeout(() => this.setState({status: ""}), 2000)
                });
            else
                this.setState({status: "error",verified:false}, () => {
                    setTimeout(() => this.setState({status: ""}), 2000)
                });
        })
            .catch(() => {
                this.setState({status: "error",verified:false}, () => {
                    setTimeout(() => this.setState({status: ""}), 2000)
                });
            });
        this.childRef.current.reloadCaptcha();
    }

    handleChange(event) {
        this.setState({message: event.target.value});
    }

    render() {
        const {status, verified,shouldCaptchaRefresh} = this.state
        return (
            <section className="container">
                <h3 className="coupons_title title is-3 is-size-4-mobile">Знаете купоны, которые не знаем мы?</h3>
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
                        <Captcha ref={this.childRef} maxHash={512} shouldCheking={false} onComplete={(token,hashes)=>
                            this.setState({
                                verified:true,
                                token:token,
                                hashes:hashes})}>
                            <button className="captcha__checkbox" >
                                        <span className="captcha__checkbox-icon icon">
                                            <i className="fas fa-check"></i>
                                        </span>
                            </button>
                            <span>Я не робот</span>
                        </Captcha>
                        <div className="buttons">
                            <button type="submit" className="button is-primary" disabled={!verified}>Отправить</button>
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